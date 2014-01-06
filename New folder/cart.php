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
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		
		  
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
				<a href="main.php"><img src="images/logo.png" title="logo" /></a>
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
		    <!--start-image-slider---->
					<div class="wrap">
					<div class="image-slider">
						<!-- Slideshow 1 -->
					    <ul class="rslides" id="slider1">
					      <li><img src="images/1.png" alt=""></li>
					      <li><img src="images/2.png" alt=""></li>
					      <li><img src="images/1.png" alt=""></li>
					    </ul>
						 <!-- Slideshow 2 -->
					</div>
					<!--End-image-slider---->
					</div>
		    <div class="clear"> </div>
		    <div class="wrap">
		    <div class="content">
		    	<div class="top-3-grids">
		    		<div class="section group">
				<div class="grid_1_of_3 images_1_of_3">
					  <a href="products.php?type=food/beverages"><img src="images/grid-img1.jpg"></a>
					  <h3>Food and beverages </h3>
				</div>
				<div class="grid_1_of_3 images_1_of_3 second">
					   <a href="products.php?type=books"><img src="images/grid-img2.jpg"></a>
					  <h3>Books </h3>
				</div>
				<div class="grid_1_of_3 images_1_of_3 theree">
					   <a href="products.php?type=grocery"><img src="images/grid-img3.jpg"></a>
					  <h3>Grocery </h3>
				</div>
			</div>
		    	</div>
		    	
		    <div class="content-grids">
		    	

	
	<div id ="something" align="center">
		
		
		
		
		   
       <?php
       if(isset($username))
       {
       $conn=connect();
      
	
	$sql="SELECT cart FROM caccounts WHERE name='$username';";
	
	$result=mysql_query($sql,$conn) or die (mysql_error());
	
		$row=mysql_fetch_array($result);
	
	
	print "</br>Your shopping cart now has:</br>";
	$cart=explode(',',$row['cart']);
	if(isset($_GET["rm"]))
	{	$string='';
		$rm=$_GET["rm"];
		foreach($cart as $item)
		{
			if($item!=$rm)
			{
				
				$string.="$item,";
				
			}
		}
		$cart=explode(',',$string);
		$sql1="UPDATE caccounts	SET cart='$string' WHERE name = '$username';";
	$res=mysql_query($sql1,$conn) or die (mysql_error());
		
	}
	$quantity=array_count_values(array_filter($cart));
     print '<table border="1"><tr><td>Item</td><td>Quantity</td></tr>';


foreach($quantity as $item=>$quant)
{
	$y=explode(' ',$item);
	$no=count($y)-1;
	$ye=$y[$no];
	print "<tr>";
	print "<td><a href='cart.php?rm=$item'><img style='border:0;' src='/images/delete.jpg' alt='next' width='20' height='10'></a>$item</a></td><td>$quant</td><td>Recommendation:$ye</td></tr>";
	print $ye;				
}
print "<a href=products.php>Click here to return</a></div></div></br>";
print "<a href=checkout.php>Click here to check out</a></div></div>";



	$_SESSION['user']=$username;
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
	