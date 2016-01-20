<?php

	include("server.php");

	session_start();

	$username = $_SESSION['username'];
	$userid = $_SESSION['userid'];



   	$tempQuery = "select login.username, message.message, message.timestamp from login inner join message on login.id = message.userid inner join history on history.userid = login.id where message.timestamp > (select timestamp from history where history.userid =".$userid.")";


//	$tempQuery = "SELECT * FROM message";

	$result = mysql_query($tempQuery) or die("Error: ".mysql_error());;

	$updateLastActive = "UPDATE history SET requestno = requestno +1 WHERE userid IN ( SELECT id FROM login WHERE username ='".$username."')";

	$updateResult = mysql_query($updateLastActive) or die("Error: ".mysql_error());



	$data = array();
	
	while($meassage_rows = mysql_fetch_array($result))
	{
		$data[] = $meassage_rows;


	}

	header('Content-Type: application/json');
	
	print json_encode($data);

?>
