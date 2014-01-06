


<?php 

include 'dbconn.php';

?>
<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title>Title here!</title>
</head>
<body>
<?php
$conn=connect();
function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'Mi') {
	
     $theta = $longitude1 - $longitude2;
     $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
     $distance = acos($distance);
     $distance = rad2deg($distance);
     $distance = $distance * 60 * 1.1515; switch($unit) {
          case 'Mi': break; case 'Km' : $distance = $distance * 1.609344;
     }
     return (round($distance,2));
}
$name=filter_input(INPUT_POST,"name");
$ulong=filter_input(INPUT_POST,"long");
$ulat=filter_input(INPUT_POST,"lat");
$sql="SELECT * FROM volunteer";

$result=mysql_query($sql,$conn) or die (mysql_error());
//loop to get volunteer details
while($volunteer=mysql_fetch_array($result))
{
	

	$n=$volunteer['Name'];
	
	$long=$volunteer['Longitude'];
	$lat=$volunteer['Latitude'];
	$dist["$n"]=getDistanceBetweenPointsNew($lat, $long, $ulat, $ulong, $unit = 'Mi');
}
asort($dist);

$i=0;
print "Check out the stores";
foreach($dist as $dis=>$value)
{
	
	if($i>10)
	{
		break;
	}
	$html=<<<HERE
					</br>Store name:$dis and Distance is $value</br>
HERE;
print $html;
$i+=1;

}

?>
</body>
</html>