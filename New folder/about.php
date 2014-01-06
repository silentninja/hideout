
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
				<li><a href="browse.php">BROWSE</a></li>
			</ul>
		</div>
		<div class="clear"> </div>
		</div>
		</div>
		<!----End-top-nav---->
		<!----End-Header---->
		<?php
if(isset($username))
{
$html=<<<HERE
		    <div class="clear"> </div>
		    <div class="wrap">
		    <div class="content">
		    	<div class="about">
		    	  <div class="section group">
					<div class="col_1_of_3 span_1_of_3 about-frist">
						<h3>Did You Know?</h3>
						<h3>Many people around the world do shopping about 60% in their life time.... ..</h3>
						<h5>&nbsp;</h5>
					</div>
					<div class="col_1_of_3 span_1_of_3 about-centre">
					  <h3>Our Mission</h3>
						<h5>Have you ever went to a shop and returned empty handed ??						</h5>
						<h5>WANT TO KNOW THE LASTEST ARRIVALS.....AND NEW STORES AROUND YOU ?????</h5>
						<h1>DONT WORRY.......						</h1>
						<h5>we give you the upto date product details and stores around you in the touch of your mouse pointer on ninjacart......</h5>
					</div>
					<div class="clear"> </div>
					<div class="section group"></div>
				</div>
				
		    	</div>
		    	</div>
		    	
		    </div>
		    <div class="clear"> </div>
		<div class="footer">
			<div class="wrap">
			<div class="section group"></div>
		</div>
		</div>
	</body>
</html>
HERE;
print $html;
}
	else
{
	$_SESSION = array();
	session_destroy();
	 header('Location: ../index.php?err');
}
	
?>

