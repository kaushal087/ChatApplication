<?php

	include("server.php");

	//echo "Hello World!<br/>";

	session_start();

	
	$user = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
 
  	$username = mysql_real_escape_string($user);

	$pass = htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8');

  	$password = mysql_real_escape_string($pass);
  	


	$tempQuery = "SELECT * FROM login WHERE USERNAME ='".$username."' AND PASSWORD = '".$password."'";
	$result = mysql_query($tempQuery) or die("Error: ".mysql_error());;

	
	while($login_rows = mysql_fetch_array($result))
	{
		$isUserValid = true;
		$_SESSION['username']=$_POST['username'];
		$_SESSION['userid'] = $login_rows['id'];
		setcookie("username", $_POST['username'], time()+3600*24*365*10, '/');
		
	}

	if($isUserValid)
	{
		echo "successful login";
		header("Location: index.php");

	}
	else
	{
		echo "Invalid username or password<br/>";
		echo "<a href ='login.html'>Click here to login!</a>";
	}
	
?>
