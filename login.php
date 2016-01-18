<?php

	include("server.php");

	echo "Hello World!";

	session_start();

	$tempQuery = "SELECT * FROM login";

	$result = mysql_query($tempQuery) or die("Error: ".mysql_error());;


	$data = array();

	echo "<table>";
	
	while($login_rows = mysql_fetch_array($result))
	{

		$data[] = $login_rows;

		$userid = $login_rows['id'];
		$username = $login_rows['username'];
		$password = $login_rows['password'];
		$timestamp = $login_rows['timestamp'];

		echo "<tr>"; 

		echo "<td>".$userid."</td><td>".$username."</td><td>".$password."</td><td>".$timestamp."</td>";

		echo "</tr>";

	}
	
	echo "</table>";


	print json_encode($data);

?>
