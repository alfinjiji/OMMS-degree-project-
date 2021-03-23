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
	<div class="span6"> </div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="admin.php"><img src="themes/images/logo.png" alt="OMMS"/></a>
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
	 <li class=""></li>
	 
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
<div class="hero-unit">
<section id="vendor">
<center>
    <h3>Registered Vendors</h3>
    <p>Vendor details.</p>
	<?php
		$link=mysqli_connect("localhost","root","");
		 mysqli_select_db($link,"omms");
		?>
		<form action="admin.php#vendor" method="post">	
		<div>
		<button class="btn btn-primary btn-large" type="submit" name="ven" value="find">Find</button>
		</div>
				     	     </form>
				     	     </section>
				             <?php
				              if (isset($_POST["ven"]))
				                {
				               $res= mysqli_query($link,"select * from vendor_reg order by id");
							   echo "<center>";
							   echo "<table border=.5>";
				                 {
							   ?>
							   	<div class="span6">
								<table class="table table-striped">
								<thead>
								<tr>
								<th>#</th>
								<th>Name</th>
								<th>E-Mail</th>
								<th>Address</th>
								<th>Mobile</th>
								</tr>
								</thead>
								<tbody>
								<?php 
								}
								  while($row=mysqli_fetch_array($res))
								  {
								    echo "<tr>";
									echo "<td>"; echo $row["id"]; echo "</td>";
								    echo "<td>"; echo $row["fname"]; echo " "; echo $row["lname"]; echo "</td>";
								    echo "<td>"; echo $row["email"]; echo "</td>";
									echo "<td>"; echo $row["address"]; echo "</td>";
									echo "<td>"; echo $row["mobile"]; echo "</td>";
								    echo "</tr>";
								  }
								  echo " </tbody>";
								  echo "</table>"; 
								  echo "</center>";
								}
				             ?>	
							</div>
							</center>
							</div>
 							
				<div class="hero-unit">
				<section id="customer">
				<center>
					<h3>Registered Customers</h3>
						<p>Customer details.</p>
						 <?php
			                 $link=mysqli_connect("localhost","root","");
			                 mysqli_select_db($link,"omms");
			                 ?>
				             <form action="admin.php#customer" method="post">	
				     	      <div>
							  <button class="btn btn-primary btn-large" type="submit" name="log" value="find">Find</button>
				     	     </div>
				     	     </form>
				     	     </section>
				             <?php
				              if (isset($_POST["log"]))
				                {
				               $res= mysqli_query($link,"select * from customers order by id");
							   echo "<center>";
							   echo "<table border=.5>";
				                 {
							   ?>
							   	<div class="span6">
								<table class="table table-striped">
								<thead>
								<tr>
								<th>#</th>
								<th>Name</th>
								<th>E-Mail</th>
								<th>Address</th>
								<th>Mobile</th>
								    
								</tr>
								</thead>
								<tbody>
								<?php 
								}
								  while($row=mysqli_fetch_array($res))
								  {
								    echo "<tr>";
									echo "<td>"; echo $row["id"]; echo "</td>";
								    echo "<td>"; echo $row["fname"]; echo " "; echo $row["lname"]; echo "</td>";
								    echo "<td>"; echo $row["email"]; echo "</td>";
									echo "<td>"; echo $row["address"]; echo "</td>";
									echo "<td>"; echo $row["mobile"]; echo "</td>";
									
									echo "</tr>";
								  }
								  echo " </tbody>";
								  echo "</table>"; 
								  echo "</center>";
								}
				             ?>	
							</div>
							</center>
		                     </div>
						
						<div class="hero-unit">
						                 <section id="feedback">
										<center>
										<h3>Feedback</h3>
										<p>Users feadback.</p>
										<p><b>Note : </b> Type 1 customer and Type 2 vendor.</p>
										<?php
						                 $link=mysqli_connect("localhost","root","");
						                 mysqli_select_db($link,"omms");
						                 ?>
						                 	
							             <form action="admin.php#feedback" method="post">
							     	     <div>
										 <button class="btn btn-primary btn-large" type="submit" name="go" value="find">Find</button>
							     	     </div>
							     	     </form>
							     	     </section>
						             
								        <?php
								              if (isset($_POST["go"]))
								                {
								               $res= mysqli_query($link,"select * from feedback order by id");
								               echo "<center>";
								               echo "<table border=.5>";
								                 {
											?>
								<div class="span6">
								<table class="table table-striped">
								<thead>
								<tr>
								<th>id</th>
								<th>Type</th>
								<th>Name</th>
								<th>E-Mail</th>
								<th>Subject</th>
								<th>Feedback</th>
								</tr>
								</thead>
								<tbody>
								             <?php
								                 }
												  while($row=mysqli_fetch_array($res))
												  {
												    echo "<tr>";
												    echo "<td>"; echo $row["id"]; echo "</td>";
													echo "<td>"; echo $row["type"]; echo "</td>";
												    echo "<td>"; echo $row["name"]; echo "</td>";
												    echo "<td>"; echo $row["email"]; echo "</td>";
												    echo "<td>"; echo $row["subject"]; echo "</td>";
												    echo "<td>"; echo $row["feedback"]; echo "</td>";
												    echo "</tr>";
												  }
												   echo " </tbody>";
												  echo "</table>"; 
												  echo "</center>";
												}
								         ?>
								</div>
								</center>
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
				<a href="contact.php">FEEDBACK</a> 
				</a>
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