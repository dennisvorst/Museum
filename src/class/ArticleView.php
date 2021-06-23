<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iView.php";
require_once "Media.php";
require_once "Social.php";
require_once "PersonView.php";
/**
               </div>
                            <div class="col-lg-6">
                                <!-- main part of the website -->
                                array(2) {
  ["article"]=>
  array(6) {
    ["id"]=> 844
    ["mainTitle"]=> "Ongenaakbaar HCAW hoofdklasser na 12-1 overwinning op Storks"
    ["publishDate"]=> "13 september 1966"
    ["authorName"]=> ""
    ["text"]=>
    string(3071) "Door een grandioze 12"
    ["source"]=> {
      ["logo"]=> "./images/sources/courant.jpg"
    }
  }
  ["photos"]=> {
    [0]=> {
      ["id"]=>
      ["url"]=> "option=photos&id=372"
      ["image"]=> "372.jpg"
      ["subscript"]=> "Nog onder de indruk van het gejuich van de Bussumse supporters namen de spelers van HCAW in het honkbalstadion de Escamp afscheid. De laatste line-up in de eerste klasse. Door een 12Ã¢â‚¬â€1 overwinning werd glansrijk de hoofdklasse bereikt."
      ["source"]=> {
        ["id"]=> 19
      }
    }
    [1]=> {
      ["id"]=>373
      ["url"]=> "option=photos&id=373"
      ["image"]=> "373.jpg"
      ["subscript"]=> "Het naar de hoofdklasse van de K.N.H.B. gepromoveerde team van HCAW, onmiddellijk na de succesvolle wedstrijd tegen Storks in Den Haag. Jimmy Bell staat verscholen achter Rob Hoffmann."
      ["source"]=>{
        ["id"]=>19
      }
    }
    [2]=> {
      ["id"]=>
      int(374)
      ["url"]=>
      string(20) "option=photos&id=374"
      ["image"]=>
      string(7) "374.jpg"
      ["subscript"]=>
      string(115) "Jimmy Bell brengt de stand voor HCAW in de eerste innings op 3-0. Scheidsrechter Schijvenaar kijkt nauwlettend toe."
      ["source"]=>
      array(1) {
        ["id"]=>
        int(19)
      }
    }
  }
}*/

class ArticleView extends Media implements iView{
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
	protected $_photoCollection = [];
	protected $_personCollection = [];

	function __construct(string $json)
	{
		parent::__construct();

		if (empty($json)) 
		{
			throw new exception("Article is mandatory");
		}

		/** create the object */
		$articleArray = json_decode($json, true);

		/** article */
		$article = $articleArray['article'];
		$this->_id = $article['id']; // $object->article->id;
		$this->_mainTitle = $article['mainTitle'];
		$this->_publishDate = $article['publishDate'];
		$this->_authorName = $article['authorName'];
		$this->_articleText = $article['text'];
		$this->_subTitle = (isset($article['subTitle']) ? $article['subTitle'] : null);
		$this->_subSubTitle = (isset($article['subSubTitle']) ? $article['subSubTitle'] : null);

		/** source */
		$source = (isset($articleArray['article']['source']) ? $articleArray['article']['source'] : null);
		if (!empty($source)) 
		{
			$this->_sourceLogo = $source['logo'];
		}

		/** photos */
		$this->_photoCollection = (isset($articleArray['photos']) ? $articleArray['photos'] : []);

		/** persons */
		$this->_personCollection = (isset($articleArray['persons']) ? $articleArray['persons'] : []);

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

		/** create */
		$html = "";
		foreach ($this->_personCollection as $person)
		{
			$person = new PersonView(json_encode($person));
			$persons[] = $person->showThumbnail();

			$html .= $person->showThumbnail();
		}


		/** show */
		$html = "
		<div class='container'>
			<h2>Personen genoemd in dit artikel</h2>
			{$html}
		</div>";
	
		return $html;
		
	}
}
?>