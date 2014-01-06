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

<h1>Company registration Form</h1>
<form action="regsubmit.php" method="post" id="regsubmit">

<div>
<input type="hidden" name="type" value="company"> 
<fieldset>
<label>Company Name</label>
<input type="text" name="name">
<label>Emailid</label>
<input type="text" name="emailid">s
<label>Company Type</label>
<input type="text" name="comtype">
<label>Company address</label>
<input type="textarea" name="comadd">
</fieldset>
</div>
<button type="submit">Submit</button>
</form>
HERE;
?>

