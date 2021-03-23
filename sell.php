
<?php  include('logincheck.php')?>
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
	 <?php if(isset($_SESSION['user'])){ 
	if($_SESSION['type'] == 2) {?>
	 <div class="pull-right">&nbsp;<a href="vender_order.php"><span class="btn btn-mini btn-primary"><em class="icon-shopping-cart icon-white"></em> Order List </span></a></div>
	 <?php } else { ?>
	 <div class="pull-right">&nbsp;<a href="product_summary.php"><span class="btn btn-mini btn-primary"><em class="icon-shopping-cart icon-white"></em> Itemes in your cart </span></a></div>
	 <?php } ?>
	 <?php } else { ?>
	 <div class="pull-right">&nbsp;<a href="product_summary.php"><span class="btn btn-mini btn-primary"><em class="icon-shopping-cart icon-white"></em> Itemes in your cart </span></a></div>
	 <?php } ?>
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
   <?php if(isset($_SESSION['user'])){ 
	if($_SESSION['type'] == "admin") {?>
	 <a class="brand" href="admin.php"><img src="themes/images/logo.png" alt="OMMS"/></a>
	 <?php } else { ?>
	 <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="OMMS"/></a>
	 <?php } ?>
	 <?php } else { ?>
	 <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="OMMS"/></a>
	 <?php } ?>
		<form class="form-inline navbar-search" method="post" action="http://localhost/OMMS/search.php" >
		<input type="text" id="srchFld" name="search" class="srchTxt" placeholder="Search" />
		  <select class="srchTxt" name="category">
			<option value="">All</option>
			<option value="ELECTRONICS"> ELECTRONICS </option>
			<option value="HOME & LIVING"> HOME & LIVING </option>
			<option value="PHARMACEUTICALS"> PHARMACEUTICALS </option>
			<option value="STATINARIES"> STATINARIES </option>
			<option value="CEREALS & CEREAL PRODUCTS"> CEREALS & CEREAL PRODUCTS </option>
			<option value="VEGETABLES & FRUITS"> VEGETABLES & FRUITS </option>
			<option value=" BAKERY"> BAKERY </option>
		</select> 
		  <button type="submit" name="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""></li>
	 
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
				<input type="text" id="inputEmail" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required autofocus />
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
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
 <?php if(isset($_SESSION['user'])){ 
	if($_SESSION['type'] == 2) {?>
	<div class="well well-small"><a id="myCart" href="vender_product.php"><img src="themes/images/ico-cart.png" alt="cart"> Your Products  </a></div>
	 <?php } else { ?>
	 <div class="well well-small"><a id="myCart" href="product_summary.php"><img src="themes/images/ico-cart.png" alt="cart"> Items in your cart  </a></div>	
	 <?php } ?>
	 <?php } else { ?>
	<div class="well well-small"><a id="myCart" href="product_summary.php"><img src="themes/images/ico-cart.png" alt="cart"> Items in your cart  </a></div>	
	 <?php } ?>	
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
			<img src="themes/images/slide1.jpg" alt=""/>
			<div class="caption"> </div>
		  </div><br/>
<br/>
			<div class="thumbnail">
				<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->
	<div class="span9" id="mainCol">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Item to Sell</li>
    </ul>
	<h3> Welcome To OMMS!</h3>
	<div class="well">
	<!--
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	<div class="alert fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	 <div class="alert alert-block alert-error fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div> -->
	<form class="form-horizontal" action="http://localhost/OMMS/images/upload.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="size" value="1000000">
	<h4>Submit a Free Ad</h4>
		<div class="control-group">
			<label class="control-label" for="title">Product Title<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="title" placeholder="Product Title" name="title" pattern="[A-Za-z0-9].{2,}" required autofocus >
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="category">Category<sup>*</sup></label>
			<div class="controls">
			  <select name="category" required>
			  <option></option>
  <optgroup label="ELECTRONICS">
    <option value="Cameras">Cameras</option>
	<option value="Computers, Tablets, laptop">Computer, Tablets & Laptops</option>
    <option value="Mobile Phone">Mobile Phone</option>
	<option value="Mobile and Computer Accessories">Mobile & Computer Accessories</option>
	<option value="Home Appliances">Home Appliances</option>
  </optgroup>
  <optgroup label="FASHIONS">
    <option value="Kids">Kids</option>
    <option value="Gents">Gents</option>
	<option value="Ladies">Ladies</option>
  </optgroup>
  <optgroup label="HOME & LIVING">
    <option value="Kichen ware">Kichen Ware</option>
    <option value="Furniture">Furniture</option>
	<option value="Home Decoration">Home Decorations</option>
	<option value="Tools and hardwares">Tools & Hardwares</option>
  </optgroup>
  <optgroup label="PHARMACEUTICALS">
    <option value="Medicines">Medicines</option>
    <option value="Medical Accessiories">Medical Accessories</option>
  </optgroup>
  <optgroup label="STATIONARIES">
    <option value="Stationaries">Stationaries</option>
  </optgroup>
  <optgroup label="CEREALS & CEREAL PRODUCTS">
    <option value="Cereals and Cereal products">Cereals & Cereal Products</option>
  </optgroup>
  <optgroup label="VEGETABLRS & FRUITS">
    <option value="Vegitables and Fruits">Vegetables & Fruits</option>
  </optgroup>
  <optgroup label="BAKERY">
    <option value="Cakes">Cakes</option>
	<option value="Hot and Cool">Hot & Cools</option>
	<option value="Bakery Products">Bakery Products</option>
  </optgroup>
</select>
			</div>
		</div>	
	   <div class="control-group">
  			<label class="control-label" for="description">Product Description<sup>*</sup></label>
			<div class="controls">
			  <textarea name="description" id="description" cols="40" rows="3" placeholder="Product Description " pattern="[A-Za-z\s]{9,}" required></textarea>
			</div>
		</div>
		 <div class="control-group">
		<label class="control-label" for="vid">Vendor_id<sup>*</sup></label>
		<div class="controls">
		  <input class="span1" type="number" id="vid" name="vid" value="<?php 
			  if(isset($_SESSION['user'])){ 
			  echo $_SESSION['vid'];
			  } else { 
			  echo ""; } ?>" readonly required />
		</div>
	  </div>
      <div class="control-group">
		<label class="control-label" for="price">Price<sup>*</sup></label>
		<div class="controls">
		  <input class="span1" type="text" id="price" placeholder="Price" name="price" pattern="[0-9]{2,}" required><big><b> ₹ </b></big>
		</div>
	  </div>	
      <div class="control-group">
  			<label class="control-label" for="image">Upload Photos<sup>*</sup></label>
			<div class="controls">
			  <input type="file" name="image1" accept="image/jpeg" required>
			  <input type="file" name="image2" accept="image/jpeg">
		  </div>
		  <div class="controls">
			  <input type="file" name="image3" accept="image/jpeg">
			  <input type="file" name="image4" accept="image/jpeg">
			</div>
		</div>
      
       <div class="control-group">
			<label class="control-label" for="name">Name<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="name" placeholder="Name" name="name" pattern="[A-Za-z\s]{3,}" value="<?php echo $_SESSION['user'];?>" required>
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="shpname">Shop Name<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="shpname" placeholder="Shop Name" name="shpname" pattern="[A-Za-z\s]{3,}" required>
			</div>
		 </div>
        <div class="control-group">
 		 <label class="control-label" for="mobile">Mobile Phone<sup>*</sup></label>
			<div class="controls">
			  <input type="text"  name="mobile" id="mobile" placeholder="Mobile Phone" pattern="[0-9]{10}" value="<?php echo $_SESSION['mobile'];?>" required /> 
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="city">Enter a City<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="city" placeholder="Enter a City" name="city" pattern="[A-Za-z\s]{3,}" value="<?php echo $_SESSION['city'];?>" required /> 
			</div>
		</div>
<div class="control-group">
  <div class="controls">
				<input class="btn btn-large btn-success" type="submit" name="upload" value="Submit" />
			</div>
		</div>		
	</form>
</div>
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>CONTACT AS</h5>
				<a href="contact.php">
				<p>NJC Cherupuzha, Kannur, 670511</p>
				<p>8281693900 / 9496583041 / 9497098569</p>
				<p>ommscpz@gmail.com</p>
				</a>
				<a href="contact.php">FEEDBACK</a>
			 </div>
			<div class="span3">
				<h5>T&C</h5>  
				<a href="tac.php">TERMS AND CONDITIONS</a> 
			 </div>
			 <div class="span3">
				<h5>Administrator</h5> 
				<?php if(isset($_SESSION['user'])){ ?>
				<a href="logout.php"><span class="btn btn-primary">Logout</span></a>
				<?php }else{ ?>
				<a href="adminlogin.php"><img src="themes/images/Admin.png" width="70" height="70"></a>
				<?php } ?>
			 </div>
			<div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA </h5>
				<a><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
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