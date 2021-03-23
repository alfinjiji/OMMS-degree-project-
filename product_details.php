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
			<img src="themes/images/slide1.jpg" alt=""/>		  </div><br/>
<br/>
			<div class="thumbnail">
				<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
  	 <?php
			$id= $_GET['id'];
			$db = mysqli_connect("localhost", "root", "", "omms");
			$query = $db->query("SELECT * FROM products WHERE id='".$id."'");
		//$query = $db->query("SELECT * FROM products");
			if($query->num_rows > 0){ 
			while($row = $query->fetch_assoc()){  
		?>
   
    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
    <li><a href="products.php?nam=<?php echo $row['category']; ?>#menu"><?php echo $row['category']; ?></a> <span class="divider">/</span></li>
    <li class="active"><?php echo $row['title']; ?></li>
    </ul>	
	<div class="row">
		<div id="gallery" class="span3">
            <?php
			$img1 = basename( $row['image1'] );
			echo "<a href='images/uploads/$img1'>";
		    echo "<img src='images/uploads/$img1' style='width:100%' ;'>"; 
            echo "</a>";
			?>	
			<div id="differentview" class="moreOptopm carousel slide">
                <div class="carousel-inner">
                  <div class="item active">
				  <?php
					$img2 = basename( $row['image2'] );
					if($img2==null) {
						echo "";
					} else {
					echo "<a href='images/uploads/$img2'>";
					echo "<img src='images/uploads/$img2' style='width:29%' ;'>"; 
					echo "</a>";
					} 
					$img3 = basename( $row['image3'] );
					if($img3==null) {
						echo "";
					} else {
					echo "<a href='images/uploads/$img3'>";
					echo "<img src='images/uploads/$img3' style='width:29%' ;'>"; 
					echo "</a>";
					}
					$img4 = basename( $row['image4'] );
					if($img4==null) {
						echo "";
					} else {
					echo "<a href='images/uploads/$img4'>";
					echo "<img src='images/uploads/$img4' style='width:29%' ;'>"; 
					echo "</a>";
					}
					?>					
                  </div>
                </div>
              <!--  
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
			  -->
              </div>
			</div>
			
			<div class="span6">
			  <h3><?php echo $row['title']; ?></h3>
			  <small>-<?php echo $row['category']; ?> </small>
			  <hr class="soft"/>
			  <form class="form-horizontal qtyFrm">
				  <div class="control-group">
					<label class="control-label"><span>₹ <?php echo $row['price']; ?></span></label>
					<div class="controls">
					<a href="cart/cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></a>
					</div>
				  </div>
				</form>
				
			  <hr class="soft"/>
			  <h4>100 items in stock</h4>
			  <hr class="soft clr"/>
			  <p><?php echo $row['description']; ?></p>
<br class="clr"/>
			<a href="#" name="detail"></a>
			<hr class="soft"/>
			</div>
			
			<div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
              <li><a href="#profile" data-toggle="tab">Related Products</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home">
              <h5>Features</h5>
				<p><?php echo $row['description']; ?></p>
			  <h4>Vendor Information</h4>
                <table class="table table-bordered">
				<tbody>
				<tr class="techSpecRow"><th colspan="2">Vendor Details</th></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Name: </td><td class="techSpecTD2"><?php echo $row['name']; ?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Shop Name:</td><td class="techSpecTD2"><?php echo $row['shpname']; ?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Place:</td><td class="techSpecTD2"><?php echo $row['city']; ?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Contact No.:</td><td class="techSpecTD2"><?php echo $row['mobile']; ?></td></tr>
				</tbody>
				</table>
              </div>
		<div class="tab-pane fade" id="profile">
		<div id="myTab" class="pull-right">
		 <a href="#listView" data-toggle="tab"></a>
		 <a href="#blockView" data-toggle="tab"></a>
		</div>
		<br class="clr"/>
<div class="tab-content">
  <div class="tab-pane" id="listView"> </div>
			<div class="tab-pane active" id="blockView">
				<ul class="thumbnails">
					
					<?php
					$db = mysqli_connect("localhost", "root", "", "omms");
					$query = $db->query("SELECT * FROM products WHERE category='".$row['category']."' ORDER BY id DESC LIMIT 3");
					if($query->num_rows > 0){ 
					while($row = $query->fetch_assoc()){  
					?>
					<li class="span3">
					  <div class="thumbnail">
					    <a href="product_details.php?id=<?php echo $row['id'];?>"> <?php	echo "<img src='images/uploads/".$row['image1']."' style='width:160px; height:160px;'>"; ?></a>
					    <div class="caption">
				     	 <?php echo "<h5>".$row['title']."</h5>"; ?>
					      <h4 style="text-align:center"> <a class="btn" href="cart/cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Add to <em class="icon-shopping-cart"></em></a>&nbsp;<a class="btn btn-primary" href="#"><?php echo "<h7>₹ ".$row['price']."</h7>" ; ?> </a></h4>
					      </div>
					    </div>
					  </li>
					  <?php } } ?>
				  </ul>
			<hr class="soft"/>
			</div>
		</div>
				<br class="clr">
			  </div>
		</div>
          </div>

	</div>
	<?php } } ?>
</div>
</div> </div>
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