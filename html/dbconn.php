<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title>Title here!</title>
</head>
<body>
<?php
 function connect()
	{
		$check=isset($conn);
		if($check)
			{
			return $conn;
			}
			else{
			$conn = mysql_connect("mysql.serversfree.com", "u516454942_new", "coolinuyasha95") or die (mysql_error());
			mysql_select_db("u516454942_new", $conn);
			return $conn;
				}
	}

?>
</body>
</html>
