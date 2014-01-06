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
		<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
		<script src="js/jqzoom.pack.1.0.1.js" type="text/javascript"></script>
		<link rel="stylesheet" href="css/jqzoom.css" type="text/css">
		<script type="text/javascript">
			$(function() {
				$(".jqzoom").jqzoom();
			});
		</script>
		<script>
		$(document).ready(function(){
			$(".menu_body").hide();
			//toggle the componenet with class menu_body
			$(".menu_head").click(function(){
				$(this).next(".menu_body").slideToggle(600); 
				var plusmin;
				plusmin = $(this).children(".plusminus").text();
				
				if( plusmin == '+')
				$(this).children(".plusminus").text('-');
				else
				$(this).children(".plusminus").text('+');
			});
		});
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
		    	<div class="details-page">
		    		<div class="back-links">
		    			<ul>
		    				<li><a href="main.php">Home</a><img src="images/arrow.png" alt=""></li>
		    				<li><a href="products.php">Product</a><img src="images/arrow.png" alt=""></li>
		    				<li><a href="#">Product-Details</a><img src="images/arrow.png" alt=""></li>
		    			</ul>
		    		</div>
		    	</div>
		    	
		    				<?php
$conn=connect();
if(isset($username))
{
	if(isset($_GET["name"]))
	{
$name=$_GET["name"];
$name = mysql_real_escape_string($name); 
$name = mysql_real_escape_string($name); 
$html=<<<HERE
<div class="detalis-image">
		    		<div id="content"> <a href="images/$name.jpg" class="jqzoom" style="" title="$name"> <img src="images/$name.jpg"  title="Product-Name" style="border: 1px solid #e5e5e5;"> </a>
					</div>
		    	</div>
		    	<div class="detalis-image-details">
		    		<div class="details-categories">
		    			<ul>
HERE;
print $html;
$sql="SELECT * FROM products WHERE name='$name'";
$res = mysql_query($sql,$conn);
while($list=mysql_fetch_array($res))
{
	
    	 $id=$list["id"];
		$name=$list["name"];
		$rating=$list["rating"];
		$price=$list["mrp"];
		print "<li>Name of the product is $name and its rating is $rating</li>";
		$html=<<<END
		    			</ul>
		    		</div><br />
		    		<div class="brand-value">
		    			<h3>Product-Complete Details With Value</h3>
		    			<div class="left-value-details">
			    			<ul>
			    				<li>Price:Rs $price</li>
			    				
			    				
			    				<br />
			    				
			    			</ul>
		    			</div>
		    			<div class="right-value-details">
			    			
			    			<p>No reviews</p>
		    			</div>
		    			<div class="clear"> </div>
		    		</div>
		    		
		    		
		    		<div class="clear"> </div>
		    		
		    		</div>
		    		<div class="clear"> </div>
		    	
			</div>
			
		    	</div>
		    	<div class="content-sidebar">
		    		<h4>Categories</h4>
						<ul>
							<li><a href="products.php?type=food/beverages">Food and Beverages</a></li>
							<li><a href="products.php?type=grocery">Grocery</a></li>
							<li><a href="products.php?type=books">Books</a></li>
						
						</ul>
		    	</div>
		    </div>
		    <div class="clear"> </div>
		    </div>
		
		</div>
	</body>
</html>
END;
print $html;
}
	}
	else{
		  print "WRONG PRODUCT Id";
	}
	$_SESSION['user']=$username;
}
	else
{
	$_SESSION = array();
	session_destroy();
	 header('Location: ../index.php?err');
}
?>

