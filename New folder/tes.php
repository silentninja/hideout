<!doctype html public '-//W3C//DTD HTML 4.0 //EN'>
<html>
<head>
       <title>Title here!</title>
</head>
<body>
<?php
$html=<<<END
		<div class='grid_1_of_4 images_1_of_4 products-info'>
					<img src='images/m1.jpg'>
				 <a href='product.php?name=name'>info</a>
					 <h3>price</h3>
					 <ul>
					 <li><a  class='cart' href='add.php?name=name'> </a></li>
					 <li><a  class='i' href='product.php?name=name'> </a></li>
					 <li><a  class='Wishlist' href='wishlist.php?name=name'> </a></li>
					 </ul>
				</div>
END;
			print $html;
?>
</body>
</html>
