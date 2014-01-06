
<?php
session_start(); 

				$check=isset($_SESSION["user"]);
				$check1=isset($_POST["user"]);
				
if($check)
{	
	$username=$_SESSION["user"];
}
else if($check1)
{
	
	$username=filter_input(INPUT_POST,"user");
	$password=filter_input(INPUT_POST,"pass");
	$username=mysql_real_escape_string($username);
	$password=mysql_real_escape_string($password);
	$password=md5($password);
}



	

?>
