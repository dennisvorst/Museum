<?php
/* retired numbers of a club */
require_once "class/SingleItemPage.php";

class Clubretired extends SingleItemPage{
	var $nmtable	= "clubretired";
	var $nmkey		= "idretired";
	var $nmparent;
	var $nrfk;

	var $ftrows;
	var $idretired;
	var $idclub;
	var $idperson;
	var $nrjersey;

	function __construct() {
		parent::__construct();
	}

	function processRecord(){
		$this->id				= $this->ftrecord['idretired'];

		$this->idclub			= $this->ftrecord['idclub'];
		$this->idperson			= $this->ftrecord['idperson'];
		$this->nrjersey			= $this->ftrecord['nrjersey'];
	}

	function createThumbnail(){
		/* create the thumbnail image */
    }

	function getContent($nmCurrentTab, $nrCurrentPage){
		/*******************
		 gather the data
		 *******************/
		/* get the retired jerseys */
		$this->ftrecord	= $this->getRecord($this->nmtable, $this->nmkey, $this->id);
		$this->processRecord();

		/*******************
		 create the content
		 *******************/
		echo "<h1>" . $this->nmfull . "</h1>\n";

		/*******************
		 search and display the additional information
		 *******************/
	}// getContent

	function getNameWithUrl(){
		return "<a href='". $this->getUrl() . "'>" . $this->nmfull . "</a>";
	}

	function getMainAdmin(){
		/* get the club data */
		if (!empty($this->id)){
			$this->ftrecord	= $this->getRecord($this->nmtable, $this->nmkey, $this->id);
			if (!empty($this->ftrecord))
			{
				$this->ftrecord = $this->ftrecord[0];
				$this->processRecord();
			}

		} else {
			$object = ucfirst($this->nmparent);
			$object = new $object();
			$this->ftrecord	= $this->getRecord($this->nmtable, $object->getKeyName(), $this->nrfk);
		}
		$ftrows = $this->ftrecord;


		/* get the subrecords */
		$nmobject = ucfirst($this->nmparent);
		$object = new $nmobject();
		$ftrow	= $object->withID($this->nrfk);

		?>
		<h1><?php echo $object->getFullName(); ?> Retired Jerseys</h1>
        <?php
		echo $this->getSubmenu();
		?>

        <form action="edit_record.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        <table id="records">
	        <tr>
    		    <td><?php if ($object->getKeyName() != "idclub"){ echo "Club"; } ?></td>
    		    <td><?php if ($object->getKeyName() != "idperson"){ echo "Person"; } ?></td>
    		    <td>Jersey</td>
        	</tr>
        	<?php
			if (count($ftrows)>0){
				for ($i = 0; $i < count($ftrows); $i++){
				?>
				<tr>
					<td>
					<?php
					if ($object->getKeyName() != "idclub"){
						echo Clubs::createSelect($ftrows[$i]['idclub'], "idclub" . ($i+1), "idclub" . ($i+1));
					} else {
					?>
						<input type="hidden" name="idclub<?php echo ($i+1); ?>" value="<?php echo $this->nrfk; ?>">
					<?php
					}
					?>
					</td>
					<td>
					<?php
					if ($object->getKeyName() != "idperson"){
						echo Persons::createSelect($ftrows[$i]['idperson'], "idperson" . ($i+1), "idperson" . ($i+1));
					} else {
						?>
						<input type="hidden" name="idperson<?php echo ($i+1); ?>" value="<?php echo $this->nrfk; ?>">
						<?php
					}
					?>
					</td>
					<td><input type="text" name="nrjersey<?php echo ($i+1); ?>" value="<?php echo $ftrows[$i]['nrjersey']; ?>"></td>
					<td><input type="hidden" name="idretired<?php echo ($i+1); ?>" value="<?php echo $ftrows[$i]['idretired']; ?>"></td>
					<td><input type="hidden" name="dtlastmut<?php echo ($i+1); ?>" value="<?php echo $ftrows[$i]['dtlastmut']; ?>"></td>
					<td><input type="hidden" name="nmlastmut<?php echo ($i+1); ?>" value="<?php echo $ftrows[$i]['nmlastmut']; ?>"></td>
					<td><input type="hidden" name="dtprevmut<?php echo ($i+1); ?>" value="<?php echo $ftrows[$i]['dtprevmut']; ?>"></td>

					</td>
				</tr>
				<?php
				}//endforeach
            } else {
				?>
				<tr>
					<td>
					<?php
					if ($object->getKeyName() != "idclub"){
						echo Clubs::createSelect("", "idclub1", "idclub1");
					} else {
					?>
						<input type="hidden" name="idclub1" value="<?php echo $this->nrfk; ?>">
					<?php
					}
					?>
					</td>
					<td>
					<?php
					if ($object->getKeyName() != "idperson"){
						echo Persons::createSelect("", "idperson1", "idperson1");
					} else {
						?>
						<input type="hidden" name="idperson1" value="<?php echo $this->nrfk; ?>">
						<?php
					}
					?>
					</td>
					<td><input type="text" name="nrjersey1" value=""></td>
					<td><input type="hidden" name="idretired1" value="<?php echo $this->getId(); ?>"></td>
					<td><input type="hidden" name="dtlastmut1" value=""></td>
					<td><input type="hidden" name="nmlastmut1" value=""></td>
					<td><input type="hidden" name="dtprevmut1" value=""></td>

					</td>
				</tr>
			<?php
			}
			?>
        </table>

        <p>
        <input type="hidden" name="nmclass" value="<?php echo strtolower(get_class($this))  ?>">
        <input type="hidden" name="nmparent" value="<?php echo $this->nmparent  ?>">
        <input type="hidden" name="nrfk" value="<?php echo $this->nrfk  ?>">

        <input type="button" value="Add Row" onclick="addNewRow()">
        <input type="submit" value="Submit">
        <input type="reset" value="Reset!">
        </p>
        </form>
        <?php
	}//getMainAdmin

	function getClubJerseys($id){
		/* get the retired jerseys of a club */
		$query 	= "SELECT * FROM " . $this->nmtable . " WHERE idclub = $id ORDER BY nrjersey";
		$this->ftrows = $this->queryDb($query);
		return $this->getPage();
	}

	function getPage(){
		/* create the page content */

		if (count($this->ftrows) == 0){
			return null;
		}
		$html	= "<h2 class='art-postheader'><i>'Retired'</i> rugnummers</h2>\n";

		$html	.= "<table>\n";
		$html	.= "<tr><th>Naam</th><th>Shirt</th>\n";
		foreach ($this->ftrows as $ftrow){
			$person 	= new Person();
			$person->withID($ftrow['idperson']);
			$nmfull		= $person->getFullName();
			$html 		.= "<tr><td>$nmfull</td><td align='right'>" . $ftrow['nrjersey'] . "</td>\n";
		}
		$html 	.= "</table>\n";
		return $html;
	}//getPage



	/* getters and setters */
	function getFullName(){
		return $this->nmclub;
	}
}
?>