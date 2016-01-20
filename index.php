<?php
session_start();
if(!$_SESSION['username'])
header("Location: login.html"); /* Redirect browser */

?>

<html>

<head>
  <title>Chat</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="script.js"></script>  

<link rel="stylesheet" href="style.css">
</head>
<body class="container">

 <span id="welcome"> </span> <a href="logout.php">Logout</a>

<div>
 <div id="messages">

 </div>
<div id="sidebar">
Online Users<hr>

 <div id="onusers">

 </div>
</div>

</div>
<div id="chatbox">

  <form  role="form" class="form-inline" action="save_message.php" method="POST" autocomplete="off">

  <input type="text" class="form-control " id="newchat" placeholder="New Message" name="newmessage">
  <button type="submit" id="sendchat" class="btn btn-info">Send</button>

  </form>


</div>


</body>

