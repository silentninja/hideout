<?php session_start() ?>

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


$puzzleName = $_SESSION["puzzleName"];
$key = $_SESSION["key"];
$cboard=$_SESSION["bboard"];



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
if(!isset($_SESSION["point"]))
	{
		$_SESSION["point"]=0;
	}
if($pword==$iword)
{ 
		
	
		
	print"<p>correct</p>";
	$a=$_SESSION["point"];
	$a++;
	$_SESSION["point"]=$a;
	
}
else 
{
print"<p>wrong</p>";
}
$curpoint=$_SESSION["point"];
print"</p>currect point is $curpoint</p>";
?>
</body>
</html>


    