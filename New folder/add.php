
<?php
include 'session.php';
include 'dbconn.php';
  if(isset($username))
       {
       $conn=connect();
if(isset($_GET["name"]))
       {
       $name=filter_input(INPUT_GET,"name");
       
	$name=mysql_real_escape_string($name);
	$name=(string) $name;
	$sql="SELECT cart FROM caccounts WHERE name='$username';";
	
	$result=mysql_query($sql,$conn) or die (mysql_error());
	
		$row=mysql_fetch_array($result);
	
		$str=$row["cart"];
		
		$str=$str.','.$name;
		
		
	$sql1="UPDATE caccounts	SET cart='$str' WHERE name = '$username';";
	$res=mysql_query($sql1,$conn) or die (mysql_error());
       }
	else{
	   print "Wrong id";
}
header('Location: ../cart.php');

	$_SESSION['user']=$username;
      }
       	else
{
	$_SESSION = array();
	session_destroy();
	 header('Location: ../index.php?err');
}
?>

