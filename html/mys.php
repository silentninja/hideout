<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Show Heroes</title>
</head>
<body>
HINT
PHP 6/MySQL Programming for the Absolute Beginner 362
<h1>Show Heroes</h1>
<p>
<?php
//make the database connection
$conn = mysql_connect("mysql.serversfree.com", "u516454942_ninja", "") or die (mysql_error());
mysql_select_db("u516454942_accs", $conn);
$sql = "SELECT * FROM  `accounts` WHERE username =  \"silentninja\"LIMIT 0 , 30";
$result = mysql_query($sql, $conn) or die(mysql_error());
while($row = mysql_fetch_assoc($result)){
foreach ($row as $name => $value){
print "$name: $value <br />\n";
} // end foreach
print "<br /> \n";
} // end while
?>
</p>
</body>
</html>