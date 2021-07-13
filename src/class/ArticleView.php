<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iPageView.php";
require_once "MediaView.php";
require_once "ClubsView.php";
require_once "PersonsView.php";

class ArticleView extends MediaView implements iPageView{
	/* defaults */
	protected $_thumbTextLength = 380;

	/** article */
	protected $_id;
	protected $_mainTitle;
	protected $_publishDate;
	protected $_authorName;
	protected $_articleText;
	protected $_sourceLogo;

	/** collection */
	protected $_clubCollection = [];
	protected $_personCollection = [];
	protected $_photoCollection = [];

	function __construct(array $row)
	{
		parent::__construct();

		if (empty($row)) 
		{
			throw new InvalidArgumentException("Article is mandatory");
		}

		/** article */
		$article = $row['article'];

		$this->_id = $article['id']; // $object->article->id;
		$this->_mainTitle = $article['mainTitle'];
		$this->_publishDate = $article['publishDate'];
		$this->_authorName = $article['authorName'];
		$this->_articleText = $article['text'];
		$this->_subTitle = (isset($article['subTitle']) ? $article['subTitle'] : null);
		$this->_subSubTitle = (isset($article['subSubTitle']) ? $article['subSubTitle'] : null);

		/** source */
		$source = (isset($row['article']['source']) ? $row['article']['source'] : null);
		if (!empty($source)) 
		{
			$this->_sourceLogo = $source['logo'];
		}

		/** photos */
		$this->_photoCollection = (isset($row['photos']) ? $row['photos'] : []);

		/** persons */
		$this->_personCollection = (isset($row['persons']) ? $row['persons'] : []);

		/** clubs */
		$this->_clubCollection = (isset($row['clubs']) ? $row['clubs'] : []);

		if (!empty($this->_publishDate))
		{
			/* create the date */
			$dateObj	= new Date();
			$this->_publishDate	= $dateObj->translateDate($this->_publishDate, "W");
		}
	}


	function showThumbnail() : string
	{
		/** prepare */
		if (strlen($this->_articleText) > $this->_thumbTextLength){
			$this->_articleText	= substr($this->_articleText, 0, $this->_thumbTextLength);
			$position		= strrpos($this->_articleText, " ");
			$this->_articleText	= substr($this->_articleText, 0, $position + 1);
		}


		/** create */
		$thumbnail = "";

		$photo = (isset($this->_photoCollection[0]) ? $this->_photoCollection[0] : []);
		if (!empty($photo))
		{
			$subscript = (strlen($photo['subscript'])> 100 ? substr($photo['subscript'], 0, 100) . "..." : $photo['subscript']);
			$thumbnail = "
			<div class='col-lg-3'>
				<figure class='figure bg-light'>
					<img src='{$this->_thumbnailPath}{$photo['id']}.jpg' class='figure-img img-fluid rounded' alt='{$subscript}'>
	  			</figure>
			</div>
			";
		}

		$colSize = (empty($thumbnail) ? "col-lg-12" : "col-lg-9");

		/** show */
		return "
		<div class='card'>
			<div class='container'>
				<!-- title row -->
				<div class='row'>
					<b>{$this->_mainTitle}</b>
				</div>
				<!-- row with two columns one for picture one for text -->
				<div class='row'>
					<!-- column for photo -->
					{$thumbnail}
					<div class='{$colSize}'>
						<!-- date and author -->
						<div class='row'>
							<div class='col'>
							{$this->_publishDate}
							</div>
							<div class='col'>
							{$this->_authorName}
							</div>
						</div>
						<!-- row for the article -->
						<div class='row'>
							{$this->_articleText} 
							<a href='index.php?option=article&id={$this->_id}'>Lees meer</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		";
	}


	function show() : string
	{
		/** prepare */
		$this->_articleText = $this->_getArticle($this->_articleText);
		$persons = $this->_showPersons();
		$clubs = $this->_showClubs();
		

		/** show */
		return "
		<div class='container'>
			<div class='row'>
				<img border='0' src='" . $this->_sourceLogo . "'>
			</div>
			<div class='row'>
				<div class='col-sm'>{$this->_authorName}</div>
				<div class='col-sm'><span class='pull-right'>{$this->_publishDate}</span></div>
			</div>
			<!-- Title 1-->
			<div class='row'><h1>{$this->_mainTitle}</h1></div>
			<!-- Title 2-->
			<div class='row'><h2>{$this->_subTitle}</h2></div>
			<!-- Title 3-->
			<div class='row'><h2>{$this->_subSubTitle}</h2></div>

			<!-- article -->
			<div class='row'>{$this->_articleText}</div>
		</div>
		{$persons}
		{$clubs}
		";
	}


	protected function _getArticle() : string
	{
		/** collect */
		$paragraphCollection 	= $this->_getParagraphs($this->_articleText);
		$paragraphCollection 	= $this->_formatText($paragraphCollection);

		/** determine the number of paragraps per photo */
		$nextPhotoPosition = 0;
		if (count($this->_photoCollection) > 0 && count($paragraphCollection) > 0){
			$nextPhotoPosition = round(count($paragraphCollection) / count($this->_photoCollection));
		}

		/** create */
		$html = "";
		$photoNumber = 0;
		for ($x = 0; $x < count($paragraphCollection); $x++)
		{
			/** only insert photos when there are any, and the index has a value */
			if (count($this->_photoCollection) > $photoNumber && ($x===0 || $photoNumber == ($x/$nextPhotoPosition)))
			{
				$photo = $this->_photoCollection[$photoNumber++];
				$html .= "
				<figure class='figure bg-light'>
					  <img src='{$this->_path}{$photo['id']}.jpg' class='figure-img img-fluid rounded' alt='{$photo['subscript']}'>
					  <figcaption class='figure-caption'>{$photo['subscript']}</figcaption>
				</figure>
				";
			}
			$html .= $paragraphCollection[$x];
		}
		return $html;
	}


	protected function _getParagraphs(string $text) : array 
	{
		/* create an array of paragraphs from a string */
		$text = explode(chr(10), $text);

		/** if it is not an array, make it an array */
		if (!is_array($text)){
			$text = [$text];
		}

		return $text;
	}


	protected function _formatText(array $paragraphCollection) : array
	{
		$newCollection = [];
		$i = 0;
		foreach ($paragraphCollection as $paragraph)
		{
			// /** strip the eol */
			$paragraph = trim($paragraph);
			// $paragraph = str_replace("\n", "", $paragraph);

			/** Make the first paragraph bold and every string smaller than 25 characters */
			if(!empty($paragraph))
			{
				if ($i===0)
				{
					$paragraph = "<p class='lead'>" . $paragraph . "</p>\n";
					
				} elseif (strlen($paragraph) <= 25)
				{
					$paragraph = "<p><strong>" . $paragraph . "</strong></p>\n";
				} else {
					$paragraph = "<p>" . $paragraph . "</p>\n";
				}
			}
			$newCollection[] = $paragraph;
			$i++;
		}
		return $newCollection;
	}


	protected function _showPersons() : string 
	{
		if (empty($this->_personCollection)) 
		{
			return "";
		}

		$view = new PersonsView($this->_personCollection);
	
		return $view->showArticlePage();
	}


	protected function _showClubs() : string 
	{
		if (empty($this->_clubCollection)) 
		{
			return "";
		}

		$view = new ClubsView($this->_clubCollection);
	
		return $view->showArticlePage();
	}

}
?>