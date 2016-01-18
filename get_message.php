<?php

	include("server.php");
	
	session_start();

	$tempQuery = "SELECT * FROM message";

	$result = mysql_query($tempQuery) or die("Error: ".mysql_error());;


	$data = array();
	
	while($meassage_rows = mysql_fetch_array($result))
	{
		$data[] = $meassage_rows;
	}

	header('Content-Type: application/json');
	
	print json_encode($data);

?>
