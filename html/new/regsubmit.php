
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
   //need to check password
$conn=connect();
//getting user info
$type=filter_input(INPUT_POST,"type");
if($type=="customer")
{
$username=filter_input(INPUT_POST,"user");
print "welcome'$username'\n";
$password=filter_input(INPUT_POST,"pass");
$email=filter_input(INPUT_POST,"emailid");
$username=mysql_real_escape_string($username);
$password=mysql_real_escape_string($password);
$email=mysql_real_escape_string($email);
$password=md5($password);
$sql = <<<End
INSERT INTO caccounts 
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
}
else if($type=="company")
{
	
$username=filter_input(INPUT_POST,"name");
print "welcome'$username'\n";
$comtyp=filter_input(INPUT_POST,"comtype");
$email=filter_input(INPUT_POST,"emailid");
$comadd=filter_input(INPUT_POST,"comadd");
$username=mysql_real_escape_string($username);
$comtyp=mysql_real_escape_string($comtyp);
$comadd=mysql_real_escape_string($comadd)
$email=mysql_real_escape_string($email);
$password=md5($password);
$sql = <<<End
INSERT INTO pendingaccs 
       (username,email,comtyp,compadd) 
       VALUES('$username','$email','$comtyp','$comadd');
End;
$result=mysql_query($sql,$conn) or die (mysql_error());
if($result!=0)
{
	print "Your proposal is acknowledged.Please wait for call";
}

$_SESSION["user"]=$username;
$_SESSION["pass"]=$password;

print "click to continue<a href='main.php'>click</a>";
}
     

			



?>

</body>
</html>
