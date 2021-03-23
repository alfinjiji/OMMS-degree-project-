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
				<input type="text" id="inputEmail" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required />
			  </div>
			  <div class="control-group">
			  <label><b>Password </b><sup>*</sup></label>
				<input type="password" id="inputPassword" name="password" placeholder="Password" pattern="(?=.*\d).{8,}" title="Must contain at least one number and at least 8 or more characters" required />
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
	<hr class="soften">
	<h2>Contact Details</h2>
	<hr class="soften"/>	
	<div class="row">
		<div class="span4">
		<h4><strong>Online Market Management System</strong></h4>
                     <address>
                        <p><strong>Address :</b></strong> NJC Cherupuzha, kannur</p>
                        <p><strong>Country :</strong> India</p>
                        <p><strong>E-mail &nbsp; &nbsp;:</strong> ommscpz@gmail.com</p>
                     </address>
					 <br>
					 <h4>Contact as</h4>
					 <address>
					 <p><b>Alfin Jiji &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:</b> &nbsp; +91 8281693900</p>
					 <p><b>Josfin Mathew &nbsp; :</b> &nbsp; +91 9496583041</p>
					 <p><b>Shawn George &nbsp; :</b> &nbsp; +91 9497098569</p>
					 </address>
		</div>
			
		<div class="span4">
		<h4>Opening Hours</h4>
			<h5> Monday - Friday</h5>
			<p>09:00am - 06:00pm<br/><br/></p>
			<h5>Saturday</h5>
			<p>09:00am - 12:00pm<br/><br/></p>
		</div>
		<div class="span4">
		<h3>Feedback</h3>
		<?php  
                                
                             
                             $db = mysqli_connect('localhost', 'root', '', 'omms');
                              if (isset($_POST["submit"]))
                          {
								$type=mysqli_real_escape_string($db,$_POST['type']);
                                $name=mysqli_real_escape_string($db,$_POST['name']);
                                $email = mysqli_real_escape_string($db, $_POST['email']);
                                $subject = mysqli_real_escape_string($db, $_POST['subject']);
                                $feedback = mysqli_real_escape_string($db, $_POST['feedback']);


                            $query = "INSERT INTO feedback (type, name, email, subject, feedback) 
                             VALUES('$type', '$name', '$email', '$subject','$feedback')";
                             //$query;
                             mysqli_query($db, $query);

                           }
                    
                    
                        ?>
		<section id="submitted">
		<form class="form-horizontal" action="contact.php#submitted" method="post">
        <fieldset>
		<div class="control-group">
			  <label><b><i>Type </i></b><sup>*</sup></label>
              <input type="text" placeholder="Account Type" value="<?php 
			  if(isset($_SESSION['user'])){ 
			  echo $_SESSION['type'];
			  } else { 
			  echo "User"; } ?>" name="type" id="type" readonly class="input-xlarge"/>
           
          </div>
          <div class="control-group">
			  <label><b><i>Name </i></b><sup>*</sup></label>
              <input type="text" placeholder="Name" value="<?php 
			  if(isset($_SESSION['user'])){ 
			  echo $_SESSION['user'];
			  } else { 
			  echo ""; } ?>" name="name" id="name" class="input-xlarge"  pattern="[A-Za-z]{2,}" required />
           
          </div>
		   <div class="control-group">
              <label><b><i>Email </i></b><sup>*</sup></label>
              <input type="text" placeholder="Email" value="<?php 
			  if(isset($_SESSION['user'])){ 
			  echo $_SESSION['email'];
			  } else { 
			  echo ""; } ?>" name="email" id="email" class="input-xlarge" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required />
           
          </div>
		   <div class="control-group">
              <label><b><i>Subject </i></b><sup>*</sup></label>
              <input type="text" placeholder="Subject" name="subject" id="subject" class="input-xlarge"  pattern="[A-Za-z\s]{4,}" required />
          
          </div>
          <div class="control-group">
              <textarea rows="3" id="textarea" name="feedback" id="feedback" class="input-xlarge"  pattern="[A-Za-z\s]{5,}" required></textarea>
           
          </div>

            <button class="btn btn-large" type="submit" name="submit">Submit</button>

        </fieldset>
      </form>
	  </section>
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
				<a ><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a ><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a ><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
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