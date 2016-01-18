<?php
$servername = "127.0.0.1";
$username = "root";
$password = "Pass@123";
$db_name = "chatdb";

// Create connection
$conn = mysql_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



mysql_select_db($db_name, $conn) or die("Error: ".mysql_error());


?> 