
<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Word Find check</title>
<link rel = "stylesheet"
      type = "text/css"
      href = "wordFind.css" />

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
			$conn = mysql_connect("mysql.serversfree.com", "u516454942_ninja", "") or die (mysql_error());
			mysql_select_db("u516454942_accs", $conn);
			return $conn;
				}
	}
	$conn=connect();
	$puzzleName = $_SESSION["puzzleName"];
$key = $_SESSION["key"];
$cboard=$_SESSION["bboard"];


$username=$_SESSION["user"];
$sql=<<<HERE
SELECT * FROM accounts WHERE username='$username';
HERE;
$result=mysql_query($sql,$conn) or die(mysql_error());
$user=mysql_fetch_assoc($result);
$score=$user['score'];




print $username;


$canswer=filter_input(INPUT_POST,"wordcheckList");
$canswer=rtrim($canswer);
$canswer=split(" ",$canswer);
$iword=$canswer[0];
$sr=$canswer[1];
$sc=$canswer[2];
$lr=$canswer[3];
$lc=$canswer[4];
$dire=$canswer[5];

switch($dire)
{
	case "D":
	$j=$sc;
    for($i=$sr;$i<=$lr;$i++)
    {   
    	$pword.=$cboard[$i][$j];
    	$j++;
    }


break;
case "N":
print "<p>wrong</p>";
break;
}

if($pword==$iword)
{ 
		
	
		
	print"<p>correct</p>";
	$score++;
	
}
else 
{
print"<p>wrong</p>";
}
	$sql=<<<HERE
UPDATE accounts SET score='$score' WHERE username='$username';
HERE;
$result=mysql_query($sql,$conn) or die(mysql_error());

print "score is $score";

?>
</body>
</html>


    