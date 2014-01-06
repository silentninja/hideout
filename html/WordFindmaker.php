<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Word Find Puzzle Maker</title>
<link rel = "stylesheet"
      type = "text/css"
      href = "wordFind.css" />

</head>
<body>
<?php

$username=$_SESSION["user"];
function connect()
	{
		if(is_resource($conn))
			{
			return $conn;
			}
			else{
			$conn = mysql_connect("mysql.serversfree.com", "u516454942_ninja", "") or die (mysql_error());
			mysql_select_db("u516454942_accs", $conn);
			return $conn;
				}
	}
$conn=connect();



//sql query to fetch user data
$sql=<<<HERE
SELECT * FROM accounts WHERE username='$username';
HERE;
$result=mysql_query($sql,$conn) or die(mysql_error());

$user=mysql_fetch_assoc($result);
$score=$user['score'];//user score
$nog=$user['no'];//no of games played

print"your score is $score<br>";
print"no of games played is $nog";
$conn=$_SESSION["con"];
print <<<HERE
<form action = "wordFind.php"
      method = "post">
<fieldset>
<label>puzzle name</label>
<input type = "text"
       name = "name"
       value = "My Word Find" />

<label>height</label>       
<input type = "text"
             name = "height"
             value = "10"
             size = "5" />
             
<label>width</label>
<input type = "text"
             name = "width"
             value = "10"
             size = "5" />
<label>Word List</label>
<textarea rows="10" cols="60" name = "wordList"></textarea>

<p>Please enter one word per row, no spaces</p>

<button type="submit">
  make puzzle
</button>
</fieldset>
</form>
HERE;
?>
</body>
</html>
