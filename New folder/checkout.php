<?php 
include 'session.php';
include 'dbconn.php';

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
	
		<title>NinjaCart</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		
		<meta name="keywords" content="Shopping,cart,stores,food,beverages,books,price,stock," />
		<link href='http://fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
		<script type="text/javascript" src="js/jquery.livequery.js"></script>
		<link href="css/style1.css" rel="stylesheet" />
		<script type="text/javascript">

$(document).ready(function() {
	
	var Arrays=new Array();
	
	$('.add-to-cart-button').click(function(){
		
		var thisID 	  = $(this).parent().parent().attr('id').replace('detail-','');
		
		var itemname  = $(this).parent().find('.item_name').html();
		var itemprice = $(this).parent().find('.price').html();
		
		if(include(Arrays,thisID))
		{
			var price 	 = $('#each-'+thisID).children(".shopp-price").find('em').html();
			var quantity = $('#each-'+thisID).children(".shopp-quantity").html();
			quantity = parseInt(quantity)+parseInt(1);
			
			var total = parseInt(itemprice)*parseInt(quantity);
			
			$('#each-'+thisID).children(".shopp-price").find('em').html(total);
			$('#each-'+thisID).children(".shopp-quantity").html(quantity);
			
			var prev_charges = $('.cart-total span').html();
			prev_charges = parseInt(prev_charges)-parseInt(price);
			
			prev_charges = parseInt(prev_charges)+parseInt(total);
			$('.cart-total span').html(prev_charges);
			
			$('#total-hidden-charges').val(prev_charges);
		}
		else
		{
			Arrays.push(thisID);
			
			var prev_charges = $('.cart-total span').html();
			prev_charges = parseInt(prev_charges)+parseInt(itemprice);
			
			$('.cart-total span').html(prev_charges);
			$('#total-hidden-charges').val(prev_charges);
			
			var Height = $('#cart_wrapper').height();
			$('#cart_wrapper').css({height:Height+parseInt(45)});
			
			$('#cart_wrapper .cart-info').append('<div class="shopp" id="each-'+thisID+'"><div class="label">'+itemname+'</div><div class="shopp-price"> $<em>'+itemprice+'</em></div><span class="shopp-quantity">1</span><img src="images/remove.png" class="remove" /><br class="all" /></div>');
			
		}
		
	});	
	
	$('.remove').livequery('click', function() {
		
		var deduct = $(this).parent().children(".shopp-price").find('em').html();
		var prev_charges = $('.cart-total span').html();
		
		var thisID = $(this).parent().attr('id').replace('each-','');
		
		var pos = getpos(Arrays,thisID);
		Arrays.splice(pos,1,"0")
		
		prev_charges = parseInt(prev_charges)-parseInt(deduct);
		$('.cart-total span').html(prev_charges);
		$('#total-hidden-charges').val(prev_charges);
		$(this).parent().remove();
		
	});	
	
	$('#Submit').livequery('click', function() {
		
		var totalCharge = $('#total-hidden-charges').val();
		
		$('#cart_wrapper').html('Total Charges: $'+totalCharge);
		
		return false;
		
	});	
	
	// this is for 2nd row's li offset from top. It means how much offset you want to give them with animation
	var single_li_offset 	= 200;
	var current_opened_box  = -1;
	
	$('#wrap li').click(function() {
	
		var thisID = $(this).attr('id');
		var $this  = $(this);
		
		var id = $('#wrap li').index($this);
		
		if(current_opened_box == id) // if user click a opened box li again you close the box and return back
		{
			$('#wrap .detail-view').slideUp('slow');
			return false;
		}
		$('#cart_wrapper').slideUp('slow');
		$('#wrap .detail-view').slideUp('slow');
		
		// save this id. so if user click a opened box li again you close the box.
		current_opened_box = id;
		
		var targetOffset = 0;
		
		// below conditions assumes that there are four li in one row and total rows are 4. How ever if you want to increase the rows you have to increase else-if conditions and if you want to increase li in one row, then you have to increment all value below. (if(id<=3)), if(id<=7) etc
		
		if(id<=3)
			targetOffset = 0;
		else if(id<=7)
			targetOffset = single_li_offset;
		else if(id<=11)
			targetOffset = single_li_offset*2;
		else if(id<=15)
			targetOffset = single_li_offset*3;
		
		$("html:not(:animated),body:not(:animated)").animate({scrollTop: targetOffset}, 800,function(){
			
			$('#wrap #detail-'+thisID).slideDown(500);
			return false;
		});
		
	});
	
	$('.close a').click(function() {
		
		$('#wrap .detail-view').slideUp('slow');
		
	});
	
	$('.closeCart').click(function() {
		
		$('#cart_wrapper').slideUp();
		
	});
	
	$('#show_cart').click(function() {
		
		$('#cart_wrapper').slideToggle('slow');
		
	});
	
});

function include(arr, obj) {
  for(var i=0; i<arr.length; i++) {
    if (arr[i] == obj) return true;
  }
}

function getpos(arr, obj) {
  for(var i=0; i<arr.length; i++) {
    if (arr[i] == obj) return i;
  }
}

</script>

	</head>
	<body>
		<div class="wrap">
		<!----start-Header---->
		<div class="header">
			<div class="search-bar">
				<form>
					<input type="text"><input type="submit" value="Search" />
				</form>
			</div>
			<div class="clear"> </div>
			<div class="header-top-nav">
				<ul>
								
				<li><a href="account.php">My account</a></li>	
					
					<li><a href="checkout.php">Checkout</a></li>
					
					<li><a href="cart.php"><span>shopingcart</span></a>
					
				</ul>
			</div>
			<div class="clear"> </div>
		</div>
		</div>
		<div class="clear"> </div>
		<div class="top-header">
			<div class="wrap">
		<!----start-logo---->
			<div class="logo">
				<a href="index.html"><img src="images/logo.png" title="logo" /></a>
			</div>
		<!----end-logo---->
		<!----start-top-nav---->
		<div class="top-nav">
			<ul>
				<li><a href="main.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				
				<li><a href="products.php">Browse</a></li>
                
				
				<li><a href="contact.html">Contact</a></li>
			</ul>
		</div>
		<div class="clear"> </div>
		</div>
		</div>
		<!----End-top-nav---->
		<!----End-Header---->
		    <div class="clear"> </div>
		    <div class="wrap">
		    <div class="content">
		    <div class="content-grids">
		    <div id ="something" align="center">
<?php
if(isset($username))
{
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


$conn=connect();
$lat1=13.030923;
$lon1=80.269286;
$sql="SELECT cart FROM caccounts WHERE name ='$username'";
//print $sql;
$res = mysql_query($sql,$conn);
$cart=mysql_fetch_assoc($res);
$cart=array_unique($cart);
$cart=explode(',',$cart['cart']);
$cart=array_unique($cart);
$path=[];
while(!empty($cart))
{
	$list=[];
	$i=[];
	//print_r($cart);
	//print"</br>";
foreach($cart as $item)
{
	
	
	$sql1="SELECT companyid FROM sproduct WHERE name='$item';";
	
	$result = mysql_query($sql1,$conn);
	while($compid=mysql_fetch_assoc($result))
	{
	
	foreach($compid as $current)
	{
		
		
			if (!isset($list["$current"]))
  {
  	
  $list["$current"]=1;
  $i["$current"]=$item;
  }
else 
  {
  	
  $list["$current"]+=1;
  $temp=$i["$current"];
  $temp="$temp,$item";
  $i["$current"]=$temp;
  
  
  }
	}
	
	}
}
if(empty($list))
{
	
	break;
}
$max=max($list);


$a=array_keys($list,$max);



$unique=array_unique($list);
arsort($unique);

arsort($list);
foreach($a as $ids)
{
	//print $ids;
	
	$sql="SELECT * FROM comaccounts WHERE companyid='$ids';";
	
	$result = mysql_query($sql,$conn);
	while($current=mysql_fetch_assoc($result))
	{
		
	
		
			$lat2=$current["latitude"];
			$lon2=$current["longtitude"];
			$distance["$ids"]=getDistanceBetweenPointsNew($lat1,$lon1,$lat2,$lon2,$unit='Km');
			
			
		
		
		
	}
}
asort($distance);
foreach($distance as $id=>$val)
{
	$selected=$id;
	$dist[$id]=$val;
	
	break;
}
$ite=explode(',',$i["$selected"]);

$cart=array_diff($cart,$ite);

//asort($selected);




}
asort($dist);
print"Efficient travel path is via";
foreach($dist as $id=>$distance)
{
	$sql="SELECT * FROM comaccounts WHERE companyid='$id'";
		$result=mysql_query($sql,$conn) or die (mysql_error());
		$res=mysql_fetch_assoc($result);	
		$name=$res["name"];		
	print"=>$name(dist:$distance)";
}
					
	
$html=<<<END
  	<br clear="all" />
		</ul>
		<br clear="all" />
	</div>
	
		
</div>

		    </div>
		    </div>
		    	<div class="content-sidebar">
		    		<h4>Categories</h4>
						<ul>
							<li><a href="products.php?type=food/beverages">Food and beverages</a></li>
							<li><a href="products.php?type=grocery">Grocery</a></li>
							<li><a href="products.php?type=books">Books</a></li>
							
						</ul>
		    	</div>
		    </div>
		    <div class="clear"> </div>
		    </div>
		
		</div>
		</div>
END;
print $html;
}

	else
{
	$_SESSION = array();
	session_destroy();
	 header('Location: ../index.php?err');
}
	
?>
</body>
</html>
