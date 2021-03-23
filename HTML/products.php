<?php  include('../logincheck.php')?>
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
    <link id="callCss" rel="stylesheet" href="../themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="../themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="../themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="../themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="../themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="../themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../themes/images/ico/apple-touch-icon-57-precomposed.png">
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
    <a class="brand" href="../index.php"><img src="../themes/images/logo.png" alt="OMMS"/></a>
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
	 <li class=""><a href="../special_offer.php">Deal of the Day</a></li>
	 
	 <?php if(isset($_SESSION['user'])){ 
	if($_SESSION['type'] == 2) {?>
	 <li class=""><a href="../sell.php">Item to Sell</a></li>
	 <?php } else { ?>
	 <li class=""><a href="../normal.php">Orders</a></li>
	 <?php } ?>
	 <?php } else { ?>
	 <li class=""><a href="../normal.php">Orders</a></li>
	 <?php } ?>
	 
	 <li class=""><a href="../contact.php">Contact</a></li>
	 <li class="">
	 <?php if(isset($_SESSION['user'])){ ?>
	 <a href="../logout.php"><span class="btn btn-large btn-success">Logout</span></a>
	 <?php }else{ ?>
	 <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
	<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
			<h3>Login Block</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm" action = "http://localhost/OMMS/logincheck.php" method = "post">
			<?php include('../adminerrors.php'); ?>
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
				<a href="../register.php">New to OMMS? Register</a>
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
		<div class="well well-small"><a id="myCart" href="../product_summary.php"><img src="../themes/images/ico-cart.png" alt="cart">3 Items in your cart  <span class="badge badge-warning pull-right">₹ 155.00</span></a></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu open"><a> ELECTRONICS </a>
				<ul>
				<li><a class="active" href="../products.php"><i class="icon-chevron-right"></i>Cameras</a></li>
				<li><a href="../products.php"><i class="icon-chevron-right"></i>Computers, Tablets & laptop</a></li>
				<li><a href="../products.php"><i class="icon-chevron-right"></i>Mobile Phone</a></li>
				<li><a href="../products.php"><i class="icon-chevron-right"></i>Mobile & Computer Accessories</a></li>
				<li><a href="../products.php"><i class="icon-chevron-right"></i>Home Appliances</a></li>
				</ul>
			</li>
			<li class="subMenu"><a> FASHIONS </a>
			<ul style="display:none">
				<li><a href="../products.php"><i class="icon-chevron-right"></i>Kids</a></li>
				<li><a href="../products.php"><i class="icon-chevron-right"></i>Gents</a></li>									
			    <li><a href="../products.php"><i class="icon-chevron-right"></i>Ladies</a></li>	
			</ul>
			</li>
			<li class="subMenu"><a> HOME & LIVING </a>
			<ul style="display:none">
				<li><a href="../products.php"><i class="icon-chevron-right"></i>Kitchen Ware</a></li>
				<li><a href="../products.php"><i class="icon-chevron-right"></i>Furniture</a></li>									
				<li><li><a href="../products.php"><i class="icon-chevron-right"></i>Home Decorations</a></li>	
				<li><a href="../products.php"><i class="icon-chevron-right"></i>Tools & Hardwares</a></li>
			</ul>
			</li>
			<li class="subMenu"><a> PHARMACEUTICALS </a>
			<ul style="display:none">
				<li><a href="../products.php"><i class="icon-chevron-right"></i>Medicines</a></li>
				<li><a href="../products.php"><i class="icon-chevron-right"></i>Accessories</a></li>									
			</ul>
			</li>
			<li><a href="../products.php"> STATIONARIES </a>
			</li>
			<li><a href="../products.php"> CEREALS & CEREAL PRODUCTS </a>
			</li>
			<li><a href="../products.php"> VEGETABLES & FRUITS </a>
			</li>
			<li class="subMenu"><a> BAKERY </a>
			<ul style="display:none">
				<li><a href="../products.php"><i class="icon-chevron-right"></i>Cakes</a></li>
				<li><a href="../products.php"><i class="icon-chevron-right"></i>Hot & Cools</a></li>									
				<li><li><a href="../products.php"><i class="icon-chevron-right"></i>Products</a></li>	
			</ul>
			</li>
			
		</ul>
		<br/>
		  <div class="thumbnail">
			<img src="../themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera"/>
			<div class="caption">
			  <h5>Panasonic</h5>
				<h4 style="text-align:center"><a class="btn" href="../product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">₹ 222.00</a></h4>
			</div>
		  </div><br/>
			<div class="thumbnail">
				<img src="../themes/images/products/kindle.png" title="Bootshop New Kindel" alt="Bootshop Kindel">
				<div class="caption">
				  <h5>Kindle</h5>
				    <h4 style="text-align:center"><a class="btn" href="../product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">₹ 222.00</a></h4>
				</div>
			  </div><br/>
			<div class="thumbnail">
				<img src="../themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="../index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Products Name</li>
    </ul>
          <?php
			$db = mysqli_connect("localhost", "root", "", "omms");
			$sql = "SELECT * FROM products";
			$result = mysqli_query($db, $sql); 
		    $ro = $result->num_rows;
          ?>
	<h3> Products Name <small class="pull-right"> <?php echo "$ro products are available " ?></small></h3>
<hr class="soft"/>
	<form class="form-horizontal span6">
		<div class="control-group">
		  <label class="control-label alignL">Sort By </label>
			<select>
              <option>Product name A - Z</option>
              <option>Product name Z - A</option>
              <option>Product Stoke</option>
              <option>Price Lowest first</option>
            </select>
		</div>
	  </form>
	  
<div id="myTab" class="pull-right">
 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
</div>
<br class="clr"/>
<div class="tab-content">
	<div class="tab-pane" id="listView">
	
 <?php
     $query = $db->query("SELECT * FROM products ORDER BY id DESC LIMIT 10");
     if($query->num_rows > 0){ 
     while($row = $query->fetch_assoc()){  
	?>
<hr class="soft"/>
 <div class="row">	  
  <div class="span2">
				<?php	echo "<img src='../images/uploads/".$row['image1']."' style='width:160px; height:160px;'>"; ?>
			</div>
			<div class="span4">
				<?php echo "<h3>".$row['title']."</h3>"; ?>				
				<hr class="soft"/>
				<?php echo "<h5>".$row['title']."</h5>"; ?>
				<?php echo "<p>".$row['description']."</p>"; ?>
				<a class="btn btn-small pull-right" href="../product_details.php">View Details</a>
				<br class="clr"/>
			</div>
			<div class="span3 alignR">
				<form class="form-horizontal qtyFrm">
				<?php echo "<h3>₹ ".$row['price']."</h3>" ; ?>
				<label class="checkbox">
				<input type="checkbox">  Adds product to compair
				</label><br/>
				
				<a class="btn btn-large btn-primary" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>"> Add to <i class=" icon-shopping-cart"></i></a>
				<a href="../product_details.php" class="btn btn-large"><i class="icon-zoom-in"></i></a>
				
				</form>
			</div>
		</div>
		<?php } }else{  ?>
		<p>Product(s) not found.....</p>
        <?php } ?>
		
		
		<hr class="soft"/>
	</div>

	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
		
			<?php
			$db = mysqli_connect("localhost", "root", "", "omms");
			$sql = "SELECT * FROM products";
			$result = mysqli_query($db, $sql); 
		    $ro = $result->num_rows;
			$query = $db->query("SELECT * FROM products ORDER BY id DESC LIMIT 10");
			if($query->num_rows > 0){ 
			while($row = $query->fetch_assoc()){  
			?>
		  <li class="span3">
			  <div class="thumbnail">
			  <?php	echo "<img src='../images/uploads/".$row['image1']."' style='width:160px; height:160px;'>"; 
			   echo "<h5>".$row['title']."</h5>"; ?>
				<!--<div class="caption">-->
				  <h4 style="text-align:center"><a class="btn" href="../product_details.php"> <em class="icon-zoom-in"></em></a> <a class="btn" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Add to <em class="icon-shopping-cart"></em></a>&nbsp;<a class="btn btn-primary" href="#">
				  <?php echo "<h7>₹ ".$row['price']."</h7>" ; ?> </a></h4>
				</div>
			 <!-- </div> -->
			</li>
			<?php } } else {?>
			<p>Product(s) not found.....</p>
			<?php } ?>
		
			
			
		 <li class="span3"> </li>
			<li class="span3"> </li>
			
			<li class="span3"> </li>
		  </ul>
	<hr class="soft"/>
	</div>
</div>

	<a href="../compair.php" class="btn btn-large pull-right">Compair Product</a>
	<div class="pagination">
			<ul>
			<li><a href="#">&lsaquo;</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">...</a></li>
			<li><a href="#">&rsaquo;</a></li>
			</ul>
			</div>
			<br class="clr"/>
</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>ACCOUNT</h5>
				<a href="../login.php">YOUR ACCOUNT</a>
				<a href="../login.php">PERSONAL INFORMATION</a> 
				<a href="../login.php">ADDRESSES</a> 
				<a href="../login.php">DISCOUNT</a>  
				<a href="../login.php">ORDER HISTORY</a>
			 </div>
			<div class="span3">
				<h5>INFORMATION</h5>
				<a href="../contact.php">CONTACT</a>  
				<a href="../register.php">REGISTRATION</a>  
				<a href="../legal_notice.php">LEGAL NOTICE</a>  
				<a href="../tac.php">TERMS AND CONDITIONS</a> 
				<a href="../faq.php">FAQ</a>
			 </div>
			<div class="span3">
				<h5>OUR OFFERS</h5>
				<a href="#">NEW PRODUCTS</a> 
				<a href="#">TOP SELLERS</a>  
				<a href="../special_offer.php">SPECIAL OFFERS</a>  
				<a href="#">MANUFACTURERS</a> 
				<a href="#">SUPPLIERS</a> 
			 </div>
			<div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA </h5>
				<a href="#"><img width="60" height="60" src="../themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="../themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="../themes/images/youtube.png" title="youtube" alt="youtube"/></a>
			 </div> 
		 </div>
	</div><!-- Container End -->
	</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="../themes/js/jquery.js" type="text/javascript"></script>
	<script src="../themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="../themes/js/bootshop.js"></script>
    <script src="../themes/js/jquery.lightbox-0.5.js"></script>
	
	<!-- Themes switcher section ============================================================================================= -->
</body>
</html>