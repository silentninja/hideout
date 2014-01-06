
<?php 
include 'session.php';
include 'dbconn.php';

?>

<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title>Submit Sucess!!!</title>
       </head>
       <body>
		   
       <?php
        <?php
       if(isset($username))
       {
       	header('Location: ../main.php');
       }
       else
       {
   //need to check password
$conn=connect();




	
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
       (name,password,emailid) 
       VALUES('$username','$password','$email');
End;
$result=mysql_query($sql,$conn) or die (mysql_error());
if($result!=0)
{
	print "account created successfully";
}

$_SESSION["user"]=$username;
$_SESSION["pass"]=$password;

header('Location: ../main.php');

       }
?>
</body>
</html>

