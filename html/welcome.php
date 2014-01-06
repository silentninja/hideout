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
//getting user info
$username=filter_input(INPUT_POST,"user");
print "welcome'$username'\n";
$password=filter_input(INPUT_POST,"pass");
$email=filter_input(INPUT_POST,"email");
$username=mysql_real_escape_string($username);
$password=mysql_real_escape_string($password);
$email=mysql_real_escape_string($email);
$password=md5($password);
$sql = <<<End
INSERT INTO accounts 
       (username,password,email) 
       VALUES('$username','$password','$email');
End;
$result=mysql_query($sql,$conn) or die (mysql_error());
if($result!=0)
{
	print "account created successfully";
}

$_SESSION["user"]=$username;
$_SESSION["pass"]=$password;

print "click to continue<a href='main.php'>click</a>";
     

			



?>

</body>
</html>
