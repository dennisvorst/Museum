<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "SingleItemPage.php";
require_once "CheckBox.php";
require_once "VideoView.php";

class Video extends SingleItemPage{
	protected $_nmtable	= "videos";
	protected $_nmkey		= "idvideo";
	var $path		= "./images/videos/";
	var $width		= "200";


	protected $_nmvideo;
	protected $_nmurl;

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

		$this->_nmvideo		= $this->ftrecord['nmvideo'];
		$this->_nmurl		= $this->ftrecord['nmurl'];
		$this->is_featured		= $this->ftrecord['is_featured'];
	}

	function createThumbnail($nrsize = 3){

		/** collect */
		$json = json_encode(["videoId" => $this->_id, "videoName" => $this->_nmvideo, "videoUrl" => $this->getYoutubeThumbnail($this->_nmurl)]);
		$view = new VideoView($json);
		return $view->showThumbnail();


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

			$json = json_encode(["videoId" => $this->_id, "videoName" => $this->_nmvideo, "videoUrl" => "http://www.youtube.com/embed/" . $this->_nmurl]);
			$view = new VideoView($json);
			$html = $view->show();
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