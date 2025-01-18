<?php
	require_once("connection.php");
	
	$q = $_GET["name"];
	$SQLIsMember = "SELECT name FROM signup WHERE name LIKE '%$q%'";
	$ResIsMember = mysql_query($SQLIsMember);
	$json=array();
	while($rs = mysql_fetch_array($ResIsMember)) {
		$val = $rs['name'];
		array_push($json, trim($val));
	}
	echo json_encode($json);
	$SQLIsMember = "SELECT name FROM signup WHERE name LIKE '%$q%' ";

	$ResIsMember = mysql_query($SQLIsMember);
	$json=array();
	while($rs = mysql_fetch_array($ResIsMember)) {
		$val = $rs['name'];
		array_push($json, trim($val));
	}

	echo json_encode($json);
?>