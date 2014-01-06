<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title>Title here!</title>
</head>
<body>
<?php

include 'dbconn.php';
include 'session.php';
$conn=connect();

if(isset($username))
{
    print $username;
$sql="SELECT password FROM caccounts WHERE name='$username';";
$res = mysql_query($sql,$conn);
$details = mysql_fetch_array($res);
$p=$password;
print "$p</br>";
$a=$details["password"];
print $a;
if($a==$p)
{

        // Login success 
        header('Location: ../main.php');
        $_SESSION["user"]=$username;
    } else {
    	
    	
    	$_SESSION = array();
        // Login failed 
        
        
        //header('Location: ../index.php?err=1');
    }
}
else
{
	$_SESSION = array();
	session_destroy();
	 header('Location: ../index.php?error=1');
}
?>
</body>
</html>
