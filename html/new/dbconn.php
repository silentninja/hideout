<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title>Title here!</title>
</head>
<body>
<?php
 function connect()
	{
		if(is_resource($conn))
			{
			return $conn;
			}
			else{
			$conn = mysql_connect("mysql.serversfree.com", "u516454942_ninja", "coolinuyasha95") or die (mysql_error());
			mysql_select_db("u516454942_accs", $conn);
			return $conn;
				}
	}

?>
</body>
</html>
