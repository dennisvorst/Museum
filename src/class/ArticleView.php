<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iView.php";

// {
// 	"article":{
// 	   "id":844,
// 	   "mainTitle":"Ongenaakbaar HCAW hoofdklasser na 12-1 overwinning op Storks",
// 	   "publishDate":"13 september 1966",
// 	   "authorName":"",
// 	   "articleText":"Door een grandioze 12-1 overwinning in zeven innings heeft HCAW haar intrede gedaan in de hoogste afdeling van de Koninklijke Nederlandse Honkbal Bond. Het werd een werkelijk fantastische wedstrijd en wel een van de allerbeste van de laatste jaren. Een subliem werper Rob Hoffmann en een foutloos, enorm enthousiast spelend veld. De slagploeg werd de grote openbaring. Wekenlang "
// 	},
// 	"photo":{
// 	   "Thumbnail":"\r\n\t\t\t\t<div class='col-sm-3'>\r\n\t\t\t\t\t<img border='0' src='.\/images\/thumbnails\/0.jpg'>\r\n\t\t\t\t<\/div>"
// 	}
//  }

class ArticleView implements iView{
	/* constructor */
	/** article */
	protected $_id;
	protected $_mainTitle;
	protected $_publishDate;
	protected $_authorName;
	protected $_articleText;
	protected $_sourceLogo;

	/** photos */
	protected $_photoCollection = [];

	function __construct(string $json)
	{
		if (empty($json)) 
		{
			throw new exception("Article is mandatory");
		}

		/** create the object */
		$object = json_decode($json);

		/** article */
		$this->_id = $object->article->id;
		$this->_mainTitle = $object->article->mainTitle;
		$this->_publishDate = $object->article->publishDate;
		$this->_authorName = $object->article->authorName;
		$this->_articleText = $object->article->text;

		/** source */
		$this->_sourceLogo = (isset($object->source->logo) ? $object->source->logo : null);

		/** photos */
	}

	function showThumbnail() : string
	{
		/** create */
		$colSize = (empty($photoThumbnail) ? "col-lg-12" : "col-lg-9");


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
					{$this->_photoThumbnail}
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
						{$this->_articleText} {$this->getReadMoreButton()}
						</div>
					</div>
				</div>
			</div>
		</div>
		";
	}

	function show() : string
	{
		/* get the video */
		return "
		<div class='container'>
			<div class='row'>
				<img border='0' src='" . $sourceLogo . "'>
			</div>
			<div class='row'>
				<div class='col-sm'>{$this->nmauthor}</div>
				<div class='col-sm'><span class='pull-right'>{$dtpublish}</span></div>
			</div>
			<!-- Title 1-->
			<div class='row'>{$this->getArticleTitle($this->fttitle1, "h1")}</div>
			<!-- Title 2-->
			<div class='row'>{$this->getArticleTitle($this->fttitle2, "h2")}</div>
			<!-- Title 3-->
			<div class='row'>{$this->getArticleTitle($this->fttitle3, "h2")}</div>
			<!-- social media -->
			<div class='row'>{$media}</div>

			<!-- article -->
			<div class='row'>{$ftarticle}</div>
		</div>";
	}
}
// ?>