<?php
require_once "ListPage.php";
require_once "Video.php";
//require_once "MysqlDatabase.php";

class Videos extends ListPage{
	protected $_nmtitle		= "Video's";

	protected $_nmtable 		= "videos";
	protected $_nmsingle		= "video";
	protected $_option		= "Video";

	protected $_searchFields 		= ["nmvideo", "ftdepicted"];
	protected $_orderByFields 		= ["nmvideo"];

	/* for the tile list */
	var $nrcolumns = 3;

	/* constructor */
	function __construct(MysqlDatabase $db, Log $log)
	{
		parent::__construct($db, $log);
	}

	function getClubVideos($id, $nmCurrentTab, $nrCurrentPage){
		/* get the videos that go with a club
		These are always displayed in a tab page
		*/

		/* init */
		/* reset the page number when we switch tabs */
		if ($nmCurrentTab != "Videos") {
			$nrCurrentPage = 1;
		}

		/* get the total number of elements */
		$sql = "SELECT count(*) AS nrtotal FROM clubvideos cv, videos v WHERE v.idvideo = cv.idvideo AND cv.idclub = ?";
		$nrTotPages = $this->_db->select($sql, "i", [$id]);
		$nrTotPages = round($nrTotPages[0]['nrtotal']/$this->nrRecordsOnPage, 0);

		/* get the videos */
		$sql = "SELECT v.* FROM clubvideos cv, videos v WHERE v.idvideo = cv.idvideo AND cv.idclub = ? ORDER BY v.nmvideo";
		$this->_rows = $this->_db->select($sql, "i", [$id]);

		return $this->getTabPage("club", $id, $nmCurrentTab, $nrCurrentPage, $nrTotPages);
	}//getClubVideos

	function getPersonVideos($id, $nmCurrentTab, $nrCurrentPage){
		/* get the videos that go with a person
		These are always displayed in a tab page
		*/

		/* get the total number of elements */
		$sql = "SELECT count(*) AS nrtotal FROM personvideos pv, videos v WHERE v.idvideo = pv.idvideo AND pv.idperson = ?";
		$nrTotPages = $this->_db->select($sql, "i", [$id]);
		$nrTotPages = round($nrTotPages[0]['nrtotal']/$this->nrRecordsOnPage, 0);

		/* get the videos */
		$sql = "SELECT v.* FROM personvideos pv, videos v WHERE v.idvideo = pv.idvideo AND pv.idperson = ? ORDER BY v.nmvideo";
		$this->_rows = $this->_db->select($sql, "i", [$id]);

		return $this->getTabPage("person", $id, $nmCurrentTab, $nrCurrentPage, $nrTotPages);
	}//getMain
}
?>