<?php
require_once "ListPage.php";
require_once "Video.php";
require_once "MysqlDatabase.php";

class Videos extends ListPage{
	var $nmtitle		= "Video's";

	var $nmtable 		= "videos";
	var $nmsingle		= "video";
	var $nmclass		= "Video";

	protected $_searchFields 		= array("nmvideo", "ftdepicted");
	protected $_orderByFields 		= array("nmvideo");

	/* for the tile list */
	var $nrcolumns = 3;

	/* constructor */
	function __construct(MysqlDatabase $db)
	{
		parent::__construct($db);
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
		$ftquery = "SELECT count(*) AS nrtotal FROM clubvideos cv, videos v WHERE v.id = cv.idvideo AND cv.idclub = ?";
		$nrTotPages = $this->select($ftquery, "i", [$id]);
		$nrTotPages = round($nrTotPages[0]['nrtotal']/$this->nrRecordsOnPage, 0);

		/* get the videos */
		$ftquery = "SELECT v.* FROM clubvideos cv, videos v WHERE v.id = cv.idvideo AND cv.idclub = ? ORDER BY v.nmvideo";
		$this->ftrows = $this->select($ftquery, "i", [$id]);

		return $this->getTabPage("club", $id, $nmCurrentTab, $nrCurrentPage, $nrTotPages);
	}//getClubVideos

	function getPersonVideos($id, $nmCurrentTab, $nrCurrentPage){
		/* get the videos that go with a person
		These are always displayed in a tab page
		*/

		/* get the total number of elements */
		$ftquery = "SELECT count(*) AS nrtotal FROM personvideos pv, videos v WHERE v.id = pv.idvideo AND pv.idperson = ?";
		$nrTotPages = $this->select($ftquery, "i", [$id]);
		$nrTotPages = round($nrTotPages[0]['nrtotal']/$this->nrRecordsOnPage, 0);

		/* get the videos */
		$ftquery = "SELECT v.* FROM personvideos pv, videos v WHERE v.id = pv.idvideo AND pv.idperson = ? ORDER BY v.nmvideo";
		$this->ftrows = $this->select($ftquery, "i", [$id]);

		return $this->getTabPage("person", $id, $nmCurrentTab, $nrCurrentPage, $nrTotPages);
	}//getMain
}
?>