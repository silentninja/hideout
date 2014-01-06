<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title>Title here!</title>
</head>
<body>
<?php

include 'session.php';
// Unset all session values 
$_SESSION = array();
 
// get session parameters 
$params = session_get_cookie_params(); 
// Delete the actual cookie. 

// Destroy session 
session_destroy();
header('Location: ../index.php');
?>
</body>
</html>
