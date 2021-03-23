<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Online Market Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome!<strong> 
	<?php if(isset($_SESSION['user'])){
	echo $_SESSION['user'];
	} else {
	echo "User" ;
	}
	?>
	</strong></div>
	<div class="span6">
	<div class="pull-right">&nbsp;<a href="product_summary.php"><span class="btn btn-mini btn-primary"><em class="icon-shopping-cart icon-white"></em> [ 3 ] Itemes in your cart </span></a></div>
	</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="OMMS"/></a>
		<form class="form-inline navbar-search" method="post" action="products.php" >
		<input id="srchFld" class="srchTxt" type="text" />
		  <select class="srchTxt">
			<option>All</option>
			<option> ELECTRONICS </option>
			<option> HOME & LIVING </option>
			<option> PHARMACEUTICALS </option>
			<option> STATINARIES </option>
			<option> CEREALS & CEREAL PRODUCTS </option>
			<option> VEGETABLES & FRUITS </option>
			<option> BAKERY </option>
		</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="special_offer.php">Deal of the Day</a></li>
	 
	 <?php if(isset($_SESSION['user'])){ 
	if($_SESSION['type'] == 2) {?>
	 <li class=""><a href="sell.php">Item to Sell</a></li>
	 <?php } else { ?>
	 <li class=""><a href="normal.php">Orders</a></li>
	 <?php } ?>
	 <?php } else { ?>
	 <li class=""><a href="normal.php">Orders</a></li>
	 <?php } ?>
	 
	 <li class=""><a href="contact.php">Contact</a></li>
	 <li class="">
	 <?php if(isset($_SESSION['user'])){ ?>
	 <a href="logout.php"><span class="btn btn-large btn-success">Logout</span></a>
	 <?php }else{ ?>
	 <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
	<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
			<h3>Login Block</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm" action = "http://localhost/OMMS/logincheck.php" method = "post">
			<?php include('adminerrors.php'); ?>
			  <div class="control-group">
                <label><b>Email </b><sup>*</sup></label>			  
				<input type="text" id="inputEmail" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
			  </div>
			  <div class="control-group">
			  <label><b>Password </b><sup>*</sup></label>
				<input type="password" id="inputPassword" name="password" placeholder="Password" pattern="(?=.*\d).{8,}" title="Must contain at least one number and at least 8 or more characters" required>
			  </div>
			  <div class="control-group">
				<label class="checkbox">
				<input type="checkbox"> Remember me
				</label>
			  </div>
			  <button type="submit" name="login" class="btn btn-success">Sign in</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>  
			</form>		
		  </div>
		  <div class="control-group">
		       <label class="checkbox">
				<a href="register.php">New to OMMS? Register</a>
			   </label>
			  </div>
	 <?php } ?>
	</div>
	</li>
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->
<div id="carouselBlk">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">
		  <div class="item active">
		  <div class="container">
			<a href="register.php"><img style="width:100%" src="themes/images/carousel/1.png" alt="special offers"/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		  </div>
		  </div>
		  <div class="item">
		  <div class="container">
			<a href="register.php"><img style="width:100%" src="themes/images/carousel/2.png" alt=""/></a>
				<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		  </div>
		  </div>
		  <div class="item">
		  <div class="container">
			<a href="register.php"><img src="themes/images/carousel/3.png" alt=""/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
			
		  </div>
		  </div>
		   <div class="item">
		   <div class="container">
			<a href="register.php"><img src="themes/images/carousel/4.png" alt=""/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		   
		  </div>
		  </div>
		   <div class="item">
		   <div class="container">
			<a href="register.php"><img src="themes/images/carousel/5.png" alt=""/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
			</div>
		  </div>
		  </div>
		   <div class="item">
		   <div class="container">
			<a href="register.php"><img src="themes/images/carousel/6.png" alt=""/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		  </div>
		  </div>
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
	  </div> 
</div>
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="product_summary.php"><img src="themes/images/ico-cart.png" alt="cart">3 Items in your cart  <span class="badge badge-warning pull-right">₹155.00</span></a></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu open"><a> ELECTRONICS </a>
				<ul>
				<li><a class="active" href="products.php?nam=Cameras#menu"><i class="icon-chevron-right"></i>Cameras</a></li>
				<li><a href="products.php?nam=Computers, Tablets, laptop#menu"><i class="icon-chevron-right"></i>Computers, Tablets & laptop</a></li>
				<li><a href="products.php?nam=Mobile Phone#menu"><i class="icon-chevron-right"></i>Mobile Phone</a></li>
				<li><a href="products.php?nam=Mobile and Computer Accessories#menu"><i class="icon-chevron-right"></i>Mobile & Computer Accessories</a></li>
				<li><a href="Products.php?nam=Home Appliances#menu"><i class="icon-chevron-right"></i>Home Appliances</a></li>
				</ul>
			</li>
			<li class="subMenu"><a> FASHIONS </a>
			<ul style="display:none">
				<li><a href="products.php?nam=Kids#menu"><i class="icon-chevron-right"></i>Kids</a></li>
				<li><a href="products.php?nam=Gents#menu"><i class="icon-chevron-right"></i>Gents</a></li>									
			    <li><a href="products.php?nam=Ladies#menu"><i class="icon-chevron-right"></i>Ladies</a></li>	
			</ul>
			</li>
			<li class="subMenu"><a> HOME & LIVING </a>
			<ul style="display:none">
				<li><a href="products.php?nam=Kichen Ware#menu"><i class="icon-chevron-right"></i>Kitchen Ware</a></li>
				<li><a href="products.php?nam=Furniture#menu"><i class="icon-chevron-right"></i>Furniture</a></li>									
				<li><li><a href="products.php?nam=Home Decoration#menu"><i class="icon-chevron-right"></i>Home Decorations</a></li>	
				<li><a href="products.php?nam=Tools and hardwares#menu"><i class="icon-chevron-right"></i>Tools & Hardwares</a></li>
			</ul>
			</li>
			<li class="subMenu"><a> PHARMACEUTICALS </a>
			<ul style="display:none">
				<li><a href="products.php?nam=Medicines#menu"><i class="icon-chevron-right"></i>Medicines</a></li>
				<li><a href="products.php?nam=Medical Accessiories#menu"><i class="icon-chevron-right"></i>Medical Accessories</a></li>									<li>
			</ul>
			</li>
			<li><a href="products.php?nam=Stationaries#menu"> STATIONARIES </a>
			</li>
			<li><a href="products.php?nam=Cereals and Cereal products#menu"> CEREALS & CEREAL PRODUCTS </a>
			</li>
			<li><a href="products.php?nam=Vegitables and Fruits#menu"> VEGETABLES & FRUITS </a>
			</li>
			<li class="subMenu"><a> BAKERY </a>
			<ul style="display:none">
				<li><a href="products.php?nam=Cakes#menu"><i class="icon-chevron-right"></i>Cakes</a></li>
				<li><a href="products.php?nam=Hot and Cool#menu"><i class="icon-chevron-right"></i>Hot & Cools</a></li>									
				<li><li><a href="products.php?nam=Bakery Products#menu"><i class="icon-chevron-right"></i>Bakery Products</a></li>	
			</ul>
			</li>
			
		</ul>
		<br/>
		  <div class="thumbnail">
			<img src="themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera"/>
			<div class="caption">
			  <h5>Panasonic</h5>
			  <h4 style="text-align:center"><a class="btn" href="product_details.php"> <em class="icon-zoom-in"></em></a> <a class="btn" href="#">Add to <em class="icon-shopping-cart"></em></a>&nbsp;<a class="btn btn-primary" href="#">₹222.00</a></h4>
			</div>
		  </div><br/>
			<div class="thumbnail">
				<img src="themes/images/products/kindle.png" title="Bootshop New Kindel" alt="Bootshop Kindel">
				<div class="caption">
				  <h5>Kindle</h5>
				  <h4 style="text-align:center"><a class="btn" href="product_details.php"> <em class="icon-zoom-in"></em></a> <a class="btn" href="#">Add to <em class="icon-shopping-cart"></em></a> <a class="btn btn-primary" href="#">₹222.00</a></h4>
				</div>
			  </div><br/>
			<div class="thumbnail">
				<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->
		<div class="span9">		
			<div class="well well-small">
			<h4>Trending Offers <small class="pull-right">200+ featured products</small></h4>
			<div class="row-fluid">
			<div id="featured" class="carousel slide">
			<div class="carousel-inner">
			  <div class="item active">
			  <ul class="thumbnails">
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="product_details.php"><img src="themes/images/products/tr1.jpg" alt=""></a>
					<div class="caption">
					  <h5>Wrist Watches</h5>
					  <h6><b><center>Extra 5% Off<br> Shop Now!</center></b></h6>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="product_details.php"><img src="themes/images/products/tr2.jpg" alt=""></a>
					<div class="caption">
					  <h5>Men’s Casual shoes</h5>
					  <h6><b><center>Top Offers<br> Grub Now!</center></b></h6>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="product_details.php"><img src="themes/images/products/tr3.jpg" alt=""></a>
					<div class="caption">
					  <h5>Backpacks</h5>
					   <h6><b><center>Extra 10% Off<br> Hurry!</center></b></h6>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="product_details.php"><img src="themes/images/products/tr4.jpg" alt=""></a>
					<div class="caption">
					  <h5>Power Banks for Mobiles</h5>
					   <h6><b><center>Special Offers<br> Explore Now!</center></b></h6>
					</div>
				  </div>
				</li>
			  </ul>
			  </div>
			   <div class="item">
			  <ul class="thumbnails">
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="product_details.php"><img src="themes/images/products/tr5.jpg" alt=""></a>
					<div class="caption">
					  <h5>Grocery & Gourmet Food</h5>
					  <h6><b><center>Min 15% Off<br> Discover Now!</center></b></h6>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="product_details.php"><img src="themes/images/products/tr6.jpg" alt=""></a>
					<div class="caption">
					  <h5>Natural Fruits</h5>
					  <h6><b><center>Special Offers<br> Hurry!</center></b></h6>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
					<a href="product_details.php"><img src="themes/images/products/t2.jpg" alt=""></a>
					<div class="caption">
					  <h5>Televisions</h5>
					   <h6><b><center>Min 20% Off<br> Explore Now!</center></b></h6>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
					<a href="product_details.php"><img src="themes/images/products/8.jpg" alt=""></a>
					<div class="caption">
					  <h5>Card Reader</h5>
					   <h6><b><center>Extra 5% Off<br> Shop Now!</center></b></h6>
					</div>
				  </div>
				</li>
			  
			  </ul>
			  </div>
			  </div>
			  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
			  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
			  </div>
			  </div>
		</div>
			<h4>Super Savers<br>
		  </h4>
		  <ul class="thumbnails">
				<li class="span3">
				  <div class="thumbnail">
					<a  href="product_details.php"><img src="themes/images/products/6.jpg" alt=""/></a>
					<div class="caption">
					  <h5>Product name</h5>
					  <p> 
						Lorem Ipsum is simply dummy text. 
					  </p>
					  <h4 style="text-align:center"><a class="btn" href="product_details.php"> <em class="icon-zoom-in"></em></a> <a class="btn" href="#">Add to <em class="icon-shopping-cart"></em></a>&nbsp;<a class="btn btn-primary" href="#">₹222.00</a></h4>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
					<a  href="product_details.php"><img src="themes/images/products/7.jpg" alt=""/></a>
					<div class="caption">
					  <h5>Product name</h5>
					  <p> 
						Lorem Ipsum is simply dummy text. 
					  </p>
					  <h4 style="text-align:center"><a class="btn" href="product_details.php"> <em class="icon-zoom-in"></em></a> <a class="btn" href="#">Add to <em class="icon-shopping-cart"></em></a> <a class="btn btn-primary" href="#">₹222.00</a></h4>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
					<a  href="product_details.php"><img src="themes/images/products/8.jpg" alt=""/></a>
					<div class="caption">
					  <h5>Product name</h5>
					  <p> 
						Lorem Ipsum is simply dummy text. 
					  </p>
					  <h4 style="text-align:center"><a class="btn" href="product_details.php"> <em class="icon-zoom-in"></em></a> <a class="btn" href="#">Add to <em class="icon-shopping-cart"></em></a> <a class="btn btn-primary" href="#">₹222.00</a></h4>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
					<a  href="product_details.php"><img src="themes/images/products/9.jpg" alt=""/></a>
					<div class="caption">
					  <h5>Product name</h5>
					  <p>Top Brand up to</p>
					  <h4 style="text-align:center"><a class="btn" href="product_details.php"> <em class="icon-zoom-in"></em></a> <a class="btn" href="#">Add to <em class="icon-shopping-cart"></em></a> <a class="btn btn-primary" href="#">₹222.00</a></h4>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
					<a  href="product_details.php"><img src="themes/images/products/10.jpg" alt=""/></a>
					<div class="caption">
					  <h5>Product name</h5>
					  <p> 
						Lorem Ipsum is simply dummy text. 
					  </p>
					  <h4 style="text-align:center"><a class="btn" href="product_details.php"> <em class="icon-zoom-in"></em></a> <a class="btn" href="#">Add to <em class="icon-shopping-cart"></em></a> <a class="btn btn-primary" href="#">₹222.00</a></h4>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
					<a  href="product_details.php"><img src="themes/images/products/11.jpg" alt=""/></a>
					<div class="caption">
					  <h5>Product name</h5>
					  <p> 
						Lorem Ipsum is simply dummy text. 
					  </p>
					  <h4 style="text-align:center"><a class="btn" href="product_details.php"> <em class="icon-zoom-in"></em></a> <a class="btn" href="#">Add to <em class="icon-shopping-cart"></em></a> <a class="btn btn-primary" href="#">₹222.00</a></h4>
					</div>
				  </div>
				</li>
			  </ul>	

		</div>
		</div>
	</div>
</div>
<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>ACCOUNT</h5>
				<a href="login.php">YOUR ACCOUNT</a>
				<a href="login.php">PERSONAL INFORMATION</a> 
				<a href="login.php">ADDRESSES</a> 
				<a href="login.php">DISCOUNT</a>  
				<a href="login.php">ORDER HISTORY</a>
			 </div>
			<div class="span3">
				<h5>INFORMATION</h5>
				<a href="contact.php">CONTACT</a>  
				<a href="register.php">REGISTRATION</a>  
				<a href="legal_notice.php">LEGAL NOTICE</a>  
				<a href="tac.php">TERMS AND CONDITIONS</a> 
				<a href="faq.php">FAQ</a>
			 </div>
			<div class="span3">
				<h5>OUR OFFERS</h5>
				<a href="#">NEW PRODUCTS</a> 
				<a href="#">TOP SELLERS</a>  
				<a href="special_offer.php">SPECIAL OFFERS</a>  
				<a href="#">MANUFACTURERS</a> 
				<a href="#">SUPPLIERS</a> 
			 </div>
			<div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA </h5>
				<a href="#"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
			 </div> 
		 </div>

	</div><!-- Container End -->
	</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script> 
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	
	<!-- Themes switcher section ============================================================================================= -->

</body>
</html>