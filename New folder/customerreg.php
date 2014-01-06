<?php session_start(); 
include 'dbconn.php';
?>

<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title>Customer registration</title>
       </head>
       <body>
       <?php
      

print<<<HERE

<h1>Customer registration Form</h1>
<form action="regsubmit.php" method="post" id="regsubmit">

<div>
<fieldset>
<label>Name</label>    
<input type="hidden" name="type" value="customer">            
<input type="text" name="user">
<label>emailid</label>
<input type="text" name="emailid">
<label>Password</label>
<input type="password" name="pass">
<label>Verify Password</label>
<input type="password" name="vpass">
</fieldset>
</div>
<button type="submit">Submit</button>
</form>
HERE;
?>
