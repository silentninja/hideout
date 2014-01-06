<?php
include('dbconn.php');
?>
<!doctype html public "-//W3C//DTD HTML 4.0 //EN">

<html>
<head>
       <title>Title here!</title>
</head>
<body>



<?php

$conn=connect();
if(isset($_POST['kw']) && $_POST['kw'] != '')
{
  $kws = $_POST['kw'];  
  $kws = mysql_real_escape_string($kws); 
  $query = "select * from products where name like '%".$kws."%' limit 10" ;
  $res = mysql_query($query,$conn);
  $count = mysql_num_rows($res);
  $i = 0;
  
  if($count > 0)
  {
    echo "<ul>";
    while($list = mysql_fetch_array($res))
    {
    	 $id=$list["id"];
  	    
  	    $name=$list["name"];
		$rating=$list["rating"];
		$hits=$list["hits"];
    	$url="/product.php?name=".$name;
      echo "<a href='$url'><li>";
      echo "<div id='rest'>";
      echo "$name";            
      echo "<br />";      
      echo "<div id='auth_dat'>rating:".$rating."</br>Hits=".$hits." </div>";
      echo "</div>";
      echo "<div style='clear:both;'></div></li></a>";
      $i++;
      if($i == 5) break;
    }
    echo "</ul>";
    if($count > 5)
    {
      echo "<div id='view_more'><a href='#'>View more results</a></div>";
    }
  }
  else
  {
    echo "<div id='no_result'>No result found !</div>";
  }
}
?>

</body>
</html>
