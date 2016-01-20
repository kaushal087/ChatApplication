<?php

	include("server.php");

	//echo "Hello World!<br/>";

	session_start();


	$userid =  $_SESSION['userid'];
/*
	$message = $_POST['message'];


	 // Get data and prevent XSS attack
  */
  	$msg = htmlentities($_POST['message'], ENT_QUOTES, 'UTF-8');

  // MySQL Injection prevention
  	$message = mysql_real_escape_string($msg);


  	if($message == '')
  	{
  		return;
  	}
  

	 $tempQuery = "INSERT INTO message(userid, message) VALUES (".$userid.", '"	.$message. "')";


	// echo $tempQuery;

	$result = mysql_query($tempQuery) or die("Error: ".mysql_error());



	//echo $result;
	
?>
