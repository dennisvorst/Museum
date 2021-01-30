<?php
/* retired numbers of a club */
require_once "SingleItemPage.php";
//require_once "MysqlDatabase.php";

class Clubretired extends SingleItemPage{
	var $nmtable	= "clubretired";
	var $nmkey		= "idretired";
	var $nmparent;
	var $nrfk;

	protected $_rows;
	var $idretired;
	var $idclub;
	var $idperson;
	var $nrjersey;

	function __construct(MysqlDatabase $db, Log $log){
		parent::__construct($db, $log);
	}

	function processRecord(){
		$this->_id				= $this->ftrecord['idretired'];

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
		$this->ftrecord	= $this->getRecord($this->nmtable, $this->nmkey, $this->_id);
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
		if (!empty($this->_id)){
			$this->ftrecord	= $this->getRecord($this->nmtable, $this->nmkey, $this->_id);
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
		$rows = $this->ftrecord;


		/* get the subrecords */
		$nmobject = ucfirst($this->nmparent);
		$object = new $nmobject();
		$row	= $object->withID($this->nrfk);

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
			if (count($rows)>0){
				for ($i = 0; $i < count($rows); $i++){
				?>
				<tr>
					<td>
					<?php
					if ($object->getKeyName() != "idclub"){
						echo Clubs::createSelect($rows[$i]['idclub'], "idclub" . ($i+1), "idclub" . ($i+1));
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
						echo Persons::createSelect($rows[$i]['idperson'], "idperson" . ($i+1), "idperson" . ($i+1));
					} else {
						?>
						<input type="hidden" name="idperson<?php echo ($i+1); ?>" value="<?php echo $this->nrfk; ?>">
						<?php
					}
					?>
					</td>
					<td><input type="text" name="nrjersey<?php echo ($i+1); ?>" value="<?php echo $rows[$i]['nrjersey']; ?>"></td>
					<td><input type="hidden" name="idretired<?php echo ($i+1); ?>" value="<?php echo $rows[$i]['idretired']; ?>"></td>
					<td><input type="hidden" name="updated_at<?php echo ($i+1); ?>" value="<?php echo $rows[$i]['updated_at']; ?>"></td>
					<td><input type="hidden" name="updated_by<?php echo ($i+1); ?>" value="<?php echo $rows[$i]['updated_by']; ?>"></td>
					<td><input type="hidden" name="created_at<?php echo ($i+1); ?>" value="<?php echo $rows[$i]['created_at']; ?>"></td>

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
					<td><input type="hidden" name="idretired1" value="<?php echo $this->getRecordId(); ?>"></td>
					<td><input type="hidden" name="updated_at" value=""></td>
					<td><input type="hidden" name="updated_by" value=""></td>
					<td><input type="hidden" name="created_at" value=""></td>

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

	/* todo : merge with _getRetiredNumberCollection in club */
	function getClubJerseys($id){
		/* get the retired jerseys of a club */
		$query 	= "SELECT * FROM " . $this->nmtable . " WHERE idclub = ? ORDER BY nrjersey";
		$this->_rows = $this->_db->select($query, "i", [$id]);
		return $this->getPage();
	}

	function getPage(){
		/* create the page content */

		if (count($this->_rows) == 0){
			return null;
		}
		$html	= "<h2 class='art-postheader'><i>'Retired'</i> rugnummers</h2>\n";

		$html	.= "<table>\n";
		$html	.= "<tr><th>Naam</th><th>Shirt</th>\n";
		foreach ($this->_rows as $row){
			$person 	= new Person($this->_db, $this->_log);
			$person->withID($row['idperson']);
			$nmfull		= $person->getFullName();
			$html 		.= "<tr><td>$nmfull</td><td align='right'>" . $row['nrjersey'] . "</td>\n";
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