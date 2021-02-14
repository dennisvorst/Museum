<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "SingleItemPage.php";
require_once "CheckBox.php";
//require_once "MysqlDatabase.php";

class Video extends SingleItemPage{
	protected $_nmtable	= "videos";
	protected $_nmkey		= "idvideo";
	var $path		= "./images/videos/";
	var $width		= "200";


	var $nmvideo;
	var $nmurl;

	/* constructor */
	function __construct(MysqlDatabase $db, Log $log)
	{
		parent::__construct($db, $log);
	}

	function processRecord(){
		if (empty($this->ftrecord)) 
		{
			return;
		}
		$this->_id			= $this->ftrecord['idvideo'];

		$this->nmvideo		= $this->ftrecord['nmvideo'];
		$this->nmurl		= $this->ftrecord['nmurl'];
		$this->is_featured		= $this->ftrecord['is_featured'];
	}

	function createThumbnail($nrsize = 3){
		/* new photo class */
		$photo = new Photo($this->_db, $this->_log);

		$html = "<div class='col-xs-" . $nrsize . "'>\n";
		$html .= "  <figure>\n";
		$html .= "    <figcaption>\n";
		$html .= "      <h4><a href='index.php?id=" . $this->getRecordId() . "&nmclass=video'>" . $this->nmvideo . "</a></h4>\n";
		$html .= "    </figcaption>\n";
		$html .= "    <a href='index.php?id=" . $this->getRecordId() . "&nmclass=video'>\n";
		$html .= "      <img width='200'  src='" . $this->getYoutubeThumbnail($this->nmurl) . "'>\n";
		$html .= "    </a>\n";
		$html .= "  </figure>\n";
		$html .= "</div>\n";

		return $html;
	}

	function getYoutubeThumbnail($nmurl){
		return "https://img.youtube.com/vi/{$nmurl}/0.jpg";
	}

	function getContent($nmCurrentTab, $nrCurrentPage){
		/* get the video */
		$html = "";
		$this->ftrecord	= $this->getRecord($this->_nmtable, $this->_nmkey, $this->_id);
		if (!empty($this->ftrecord))
		{
			$this->processRecord();

			$html = "<div class='container'>\n";
			$html .= "  <div class='row'>\n";
			$html .= "    <h1>" . $this->nmvideo . "</h1>\n";
			$html .= "  </div>\n";
			$html .= "  <div class='row'>\n";
			$html .= "    <iframe width='420' height='315' src='http://www.youtube.com/embed/" . $this->nmurl . "' frameborder='0' allowfullscreen></iframe>\n";
			$html .= "  </div>\n";
			$html .= "</div>\n";
		}
		return $html;
	}// getContent

	function getMenu(){
		/* needs to be overriden */
		?>
            <div>
                <div>
                    <h3 class="t">Personen</h3>
                </div>
            </div>
			<div>
		        <div>
        		    <h3 class="t">Clubs</h3>
		        </div>
            </div>
			<div>
		        <div>
        		    <h3 class="t">Competities</h3>
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
		$ftlabels["id"]			= "";
		$ftlabels["nmvideo"]	= "Titel";
		$ftlabels["nmurl"]		= "Hyperlink";

		$ftlabels = parent::getGenericLabels($ftlabels);

		return $ftlabels;
	}

	/******************
	Editable fields
	*******************/
}
?>