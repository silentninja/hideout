<?php session_start(); 
include 'dbconn.php';
?>
<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title>Title here!</title>
</head>
<body>
<?php

$conn=connect();
$username=filter_input(INPUT_POST,"user");
$password=filter_input(INPUT_POST,"pass");
$username=mysql_real_escape_string($username);
$password=mysql_real_escape_string($password);
$password=md5($password);
$sql=<<<HERE
SELECT password FROM accounts WHERE username ='$username';
HERE;
$result=mysql_query($sql,$conn) or die(mysql_error());
$user=mysql_fetch_assoc($result);
$upass=$user['password'];
if($password==$user['password'])
{
	print"Thank you for logging in</br>";

$_SESSION["user"]=$username;
$_SESSION["pass"]=$password;

print "click to continue<a href='main.php'>click</a>";
}
else
{
	print"wrong username or password.Try again";
	
}


?>
</body>
</html>
