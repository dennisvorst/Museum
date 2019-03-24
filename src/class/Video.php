<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "class/SingleItemPage.php";
require_once "class/CheckBox.php";

class Video extends SingleItemPage{
	var $nmtable	= "videos";
	var $nmkey		= "idvideo";
	var $path		= "./images/videos/";
	var $width		= "200";


	var $nmvideo;
	var $nmurl;

	/* constructor */
	function __construct(){
		parent::__construct();
	}

	function processRecord(){
		$this->id			= $this->ftrecord['idvideo'];

		$this->nmvideo		= $this->ftrecord['nmvideo'];
		$this->nmurl		= $this->ftrecord['nmurl'];
		$this->is_featured		= $this->ftrecord['is_featured'];
	}

	function createThumbnail($nrsize = 3){
		/* new photo class */
		$photo = new Photo();

		$html = "<div class='col-xs-" . $nrsize . "'>\n";
		$html .= "  <div>\n";
		$html .= "    <h4><a href='index.php?id=" . $this->getId() . "&nmclass=video'>" . $this->nmvideo . "</a></h4>\n";
		$html .= "  </div>\n";
		$html .= "  <div>\n";
		$html .= "    <a href='index.php?id=" . $this->getId() . "&nmclass=video'>\n";
		$html .= "      <img width='200'  src='" . $this->getYoutubeThumbnail($this->nmurl) . "'>\n";
		$html .= "    </a>\n";
		$html .= "  </div>\n";
		$html .= "</div>\n";

		return $html;
	}

	function getYoutubeThumbnail($nmurl){
		return "https://img.youtube.com/vi/{$nmurl}/0.jpg";
	}

	function getContent($nmCurrentTab, $nrCurrentPage){
		/* get the video */
		$this->ftrecord	= $this->getRecord($this->nmtable, $this->nmkey, $this->id);
		$this->processRecord();

		$html = "<div class='container'>\n";
		$html .= "  <div class='row'>\n";
		$html .= "    <h1>" . $this->nmvideo . "</h1>\n";
		$html .= "  </div>\n";
		$html .= "  <div class='row'>\n";
		$html .= "    <iframe width='420' height='315' src='http://www.youtube.com/embed/" . $this->nmurl . "' frameborder='0' allowfullscreen></iframe>\n";
		$html .= "  </div>\n";
		$html .= "</div>\n";

		return $html;
	}// getContent

	function getMenu(){
		/* needs to be overriden */
		?>
            <div class="art-block clearfix">
                <div class="art-blockheader">
                    <h3 class="t">Personen</h3>
                </div>
                <div class="art-blockcontent">
                </div>
            </div>
			<div class="art-block clearfix">
		        <div class="art-blockheader">
        		    <h3 class="t">Clubs</h3>
		        </div>
        		<div class="art-blockcontent">
                </div>
            </div>
			<div class="art-block clearfix">
		        <div class="art-blockheader">
        		    <h3 class="t">Competities</h3>
		        </div>
        		<div class="art-blockcontent">
                </div>
            </div>
        <?php
	}//getMenu

	function getSubtitle($fttitle){
		/* check if the string is filled if so return HTML else emptty string */
		if (empty($fttitle)){
			return("");
		} else {
			return "<tr>\n<td width=\"100%\">\n<h2 align=\"center\">" . $fttitle . "</h2>\n</td>\n</tr>\n";
		}
	}//getSubtitle

	/******************
	Labels
	*******************/
	function getLabels(){
		$ftlabels["idvideo"]		= "";
		$ftlabels["nmvideo"]		= "Titel";
		$ftlabels["nmurl"]			= "Hyperlink";

		$ftlabels = parent::getGenericLabels($ftlabels);

		return $ftlabels;
	}

	/******************
	Editable fields
	*******************/
}
?>