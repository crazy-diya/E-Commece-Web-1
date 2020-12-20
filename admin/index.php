<?php 

session_start();

if (!isset($_SESSION['role']) && $_SESSION['role'] != 'admin') {
	
	echo "<script>window.open('adminlogin.php','_self')</script>";

}else{

 ?>

<?php include ('../db.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Web Developer</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="jquery_3.4.1.js"></script>


</head>
<body>

<div class="container">
	<div class="header">
		<div class="navbar-header">
			<h3><a class="admin-name">Admin Area - <?php echo $_SESSION['fristname']; ?></a></h3>
		</div>
		<div class="navbar-right-header">
			<ul class="dropdown-navbar-right">
				<li>
					<a> <i class="fa fa-user"></i> &nbsp; <i class="fa fa-caret-down"></i> </a>
					<ul class="subnavbar-right">
						<li>
							<a>User Account</a>
						</li>
						<li>
							<a href="adminlogout.php">Logout</a>
						</li>
					</ul>
				</li>
			</ul>
			
			<ul class="dropdown-navbar-right">
				<li>
					<a> <i class="fa fa-bell"></i> &nbsp; <i class="fa fa-caret-down"></i> </a>
					<ul class="subnavbar-right">
						<li>
							<a>Notification</a> 
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="body-container">
		<div class="left-sidebar">
			<div class="left-sidebar-box"> 
			
			 	<ul class="left-sidebar-first-level">
					
				<li><a href="../home.php" target="_blank"><i class="fa fa-dashboard"></i> My Site</a></li>
				
				<li>
					<a href="#"><i class="fa fa-th-large"></i>&nbsp;Products <i class="arrow fa fa-angle-left"></i></a>
					
					<ul class="left-sidebar-second-level">
						<li><a href="index.php?action=add_pro">Add Product</a></li>
						<li><a href="index.php?action=view_pro">View Products</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#"><i class="fa fa-plus"></i>&nbsp;Categories <i class="arrow fa fa-angle-left"></i></a>
					
					<ul class="left-sidebar-second-level">
						<li><a href="index.php?action=add_cat">Add Category</a></li>
						<li><a href="index.php?action=view_cat">View Categories</a></li>
					</ul>
				</li>

				<li>
					<a href="#"><i class="fa fa-gift"></i>&nbsp;Admin <i class="arrow fa fa-angle-left"></i></a>
					
					<ul class="left-sidebar-second-level">
						<li><a href="index.php?action=add_user">Add User</a></li>
						<li><a href="index.php?action=view_users">List Users</a></li>
					</ul>
				</li>
			  </ul>
			    </div> 
		</div>

		<div class="content">
			<div class="content-box">
				<?php
				
				if(isset($_GET['action'])){
					$action = $_GET['action'];
				}else{
					$action = '';
				}
				
				switch($action){
						case 'add_pro';
						include 'insertproduct.php';
						break;

						case 'view_pro';
						include 'viewproduct.php';
						break;

						case 'edit_pro';
						include 'editproduct.php';
						break;

						case 'add_cat';
						include 'insertcategorie.php';
						break;

						case 'view_cat';
						include 'viewcategorie.php';
						break;

						case 'edit_cat';
						include 'editcategorie.php';
						break;

						case 'view_users';
						include 'viewusers.php';
						break;
				}
				
				?>
			</div>
		</div>

	</div>
</div>


</body>
</html>



<script>
	$(document).ready(function(){
		// Drop down menu Right
		$(".dropdown-navbar-right").on('click',function(){
			$(this).find(".subnavbar-right").slideToggle('fast');
		});	
		
		// Collapse Left Sidebar
		$(".left-sidebar-first-level li").on('click',this,function(){
			$(this).find(".left-sidebar-second-level").slideToggle('fast');								 
		});
		
	});
</script>



<?php } //End else ?> 











































