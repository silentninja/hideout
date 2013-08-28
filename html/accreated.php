<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title>acc created!</title>
</head>
<body>
<?php
$conn = mysql_connect("mysql.serversfree.com", "u516454942_ninja", "coolinuyasha95") or die (mysql_error());
mysql_select_db("u516454942_accs", $conn);
$username=filter_input(INPUT_POST,"user");
print "$username";
$password=filter_input(INPUT_POST,"pass");
$username=mysql_real_escape_string($username);
$password=mysql_real_escape_string($password);
$password=md5($password);
$sql = <<<End
INSERT INTO accounts 
       (username,password,no,score) 
       VALUES('$username','$password',0, 0);
End;
$result=mysql_query($sql,$conn) or die (mysql_error());
$sq=<<<HERE
SELECT * FROM accounts WHERE username = 'silent';
HERE;
$re=mysql_query($sq,$conn) or die (mysql_error());;//result of second query
$ret=mysql_fetch_assoc($re);
foreach($ret as $key)
print "$key";




	?> 
</body>
</html>
