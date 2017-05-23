<!DOCTYPE html>
<?php 
include('functions/function.php');
 ?>
	<html>
		<head>
			<title>My Online Shop</title>
			<link rel="stylesheet" href="style/style1.css" media="all">
		</head>
		<body>
		
		<!--Main Container start-->

			<div class="main_wrapper">

			<!--Header start-->

				<div class="header_wrapper">
					<img src="images/logo.jpg" alt="" id="logo" width="200" height="120">
					<img id="banner" src="images/banner.jpg" alt="" width="800" height="120">
				</div>

			<!--header end-->	
				
			<!--Menu Bar start-->

				<div class="menubar">
					<ul id="menu">
						<li>
							<a href="#">Home</a>
							<a href="#">All Products</a>
							<a href="#">My Account</a>
							<a href="#">Sign Up</a>
							<a href="#">Shopping Cart</a>
							<a href="#">Contact Us</a>
						</li>
					</ul>

					<div id="form">
						<form action="result.php" method="get" enctype="multipart/form-data">
							<input type="text" name="user_query" placeholder="Search a Product">
							<input type="submit" name="search" value="Search">
						</form>
					</div>

				</div>

			<!--Menu bar end-->

			<!--Main Content start-->

				<div class="content_wrapper">
					
					<div id="sidebar">
						<div id="sidebar_title">
							Categories
						</div>
						
						<ul id="cats">
								<?php getcats(); ?>
						</ul>

						<div id="sidebar_title">
							Brands
						</div>
						
						<ul id="cats">
								<?php getbrands(); ?>
						</ul>

					</div>


					<div id="content_area">
                        
                        <div id="shopping_cart">
                            <span style="float:right; font-size:18px; padding:5px; line-height:40px;">
                                Welcome Guest!! <b style="color:green">Shopping Cart - </b> Total Items - Total Price : <a href="cart.php" style="color:green;">Go to Cart</a>
                                
                            </span>
                        </div>
                        
						<div id="product_box">
							<?php
                            
                            if(isset($_GET['pro_id']))
                            {
                                $product_id=$_GET['pro_id'];
                                global $con;
		                          $get_pro="SELECT *FROM `products` WHERE product_id='$product_id'";
		                          $run_pro=mysqli_query($con,$get_pro);
		                          while ($row_pro=mysqli_fetch_array($run_pro)) 
                                  {
			                             # code...
			                             $pro_id=$row_pro['product_id'];
			                            
			                             $pro_title=$row_pro['product_title'];
			                             $pro_price=$row_pro['product_price'];
			                             $pro_image=$row_pro['product_image'];
                                         $pro_desc=$row_pro['product_desc'];

			                             echo "
				                                <div id='single_product'>
					                               <br>
					                               <h3>$pro_title</h3><br>
					                               <img src='admin_area/product_images/$pro_image' width='400' height='300'/><br><br>
					                               <p><b>Price : $ $pro_price</b></p><br>
                                                   <p>$pro_desc</p>   
					                               <a href='index.php' style='float:left;'>Go Back</a>
					                               <a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
					                               <br><br><br><hr>
				                                </div>
				                                ";
		                          }
                            }
                            
                            ?>
						</div>
					</div>
				</div>

				<!--Main Content end -->

				<!--footer start-->

				<div id="footer">
						<h2 style="text-align: center; padding-top: 30px; color: white; font-family: COMIC SANS MS;">&copy; 2017 by shoaib753.blogspot.com</h2>
				</div>

				<!--footer end-->



			</div>
			<!--Main Container end-->
		</body>
	</html>