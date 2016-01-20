<?php
  session_start();
  include('server.php');
  if($_SESSION['username'])
  {
	session_destroy();
	header("Location: login.html"); /* Redirect browser */
  }
 exit;
?>
