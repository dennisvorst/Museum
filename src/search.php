<?php
/* search default is exact match */
$nmsearchtype = "E";
/* get the $_GET variables */
$keys = array_keys($_POST);
foreach ($keys as $key){
	${$key} = $_POST[$key];
}

header('Content-Type: text/html; charset=utf-8');
header('Location: index.php?nmclass=search&sql=' . $sql . "&nmsearchtype=" . $nmsearchtype);
?>