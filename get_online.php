<?php

	include("server.php");

	session_start();

//$t=time();


   	$tempQuery = "select SQL_NO_CACHE history.userid, login.username, history.timestamp from history  inner join login on login.id=history.userid where history.timestamp > Now()  - 5";


	$result = mysql_query($tempQuery) or die("Error: ".mysql_error());;

	$data = array();
	
	while($user_rows = mysql_fetch_array($result))
	{
		$data[] = $user_rows;
	}

	header('Content-Type: application/json');
	
	print json_encode($data);

?>
