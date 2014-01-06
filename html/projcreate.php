<?php include 'dbconn.php';
class project{
var $projectname ='NIL';
function __construct($pname,$con) {
 	$this->projectname = $pname;
 	print($projectname);
 	//creates project info table for the project
       
$sql=<<<HERE
CREATE TABLE $projectname(
userid INT NOT NULL,rating INT NOT NULL,postype VARCHAR(30) NOT NULL)
HERE;
$result=mysql_query($sql,$con) or die (mysql_error());
mkdir($projectname);
opendir($projectname);
$page=<<<HERE
	print("Welcome to your '$projectname' page");


HERE;

$this->create("Home",$page);
 }
 function create($cname,$put)
 {	print "$projectname.'/'.$cname.'.php'";
 	$fh = fopen($projectname.'/'.$cname.'.php','w') or die("can't create: $php_errormsg");
 	
 	$new=<<<HERE
 	<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
	<html>
	<head>
	<title>'$projectname'</title>
	</head>
	<body>
	<?php
	
HERE;
    fputs($fh,$new);
    fputs($fh,$put);
    $end=<<<HERE
    ?>
		</body>
		</html>
HERE;
		fputs($fh,$end);
    fclose($fh);
    
 }
 function template($type)
 {



 	if($type=='rmc')
 	{
	 	$page=<<<HERE
 	    print("This is the place where discussion about your robots brain goes into");
HERE;
 		$this->create("Robo Brain",$page);
 	}
 	else if($type=="Alog")
 	{
 		$page=<<<HERE
 	    print("This is the place where discussion about your analog circuits goes into");
HERE;
 		$this->create("analog design",$page);
 	}
 }
}
?>
<!doctype html public "-//W3C//DTD HTML 4.0 //EN">

<html>
<head>
       <title>Title here!</title>
</head>
<body>
<?php
$conn=connect();
$projectname=filter_input(INPUT_POST,"pname");
$ptype=filter_input(INPUT_POST,"ptype");
$projectname=mysql_real_escape_string($projectname);
$ptype=mysql_real_escape_string($ptype);
$tags=filter_input(INPUT_POST,"tags");
$ptags=mysql_real_escape_string($ptags);
$cat=filter_input(INPUT_POST,"cat");
$cat=mysql_real_escape_string($cat);
$cat=explode(" ",$cat);
foreach ($cat as $ccat){
$ccat = rtrim($ccat);
}
$a=new project($projectname,$conn);
$a->template($ptype);

?>
</body>
</html>
