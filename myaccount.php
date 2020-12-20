<?php include('header.php'); ?>

	<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 ">
                        
                        <?php if(isset($_SESSION['user_id'])){ ?>
		
						<div id="user_content">
						
						
						<?php
							
							if(isset($_GET['action'])){
								$action = $_GET['action'];
							}else{
								$action = '';
							}
							
							switch($action){
									case "edit_account";
									include('edit_account.php');
									break;

									case "insert_product";
									include('insert_product.php');
									break;
									
									case "edit_profile";
									include('edit_profile.php');
									break;

									case "user_profile_picture";
									include('user_profile_picture.php');
									break;

									case "change_password";
									include('change_password.php');
									break;
									
									case "delete_account";
									include('delete_account.php');
									break;
								
									default;
									echo "Do Something";
									break;
							}
							
//							if($_GET['action'] == 'edit_account'){
//								echo $action;
//							}
								
							?>
						
						
							
						</div>

					
						<div id="user_sidebar">
						
						<?php
							
							$run_image = mysqli_query($con, " select * from users where user_id='$_SESSION[user_id] '");
							
							$row_image = mysqli_fetch_array($run_image);
							
							if($row_image['image'] !=''){
							?>
							
								<div id="user_image" align="center">
									<img src="customer_image/<?php echo $row_image['image']; ?>" alt="">
								</div>
							
							<?php }else{ ?>
						
								<div id="user_image" align="center">
									<img src="img/core-img/usericon.png" alt="">
								</div>
						
							<?php } ?>
						
						
							<ul >
								<li>
									<a href="myaccount.php?action=my_order">My Order</a>
								</li>
								<li>
									<a href="myaccount.php?action=insert_product">Insert Product</a>
								</li>
								<li>
									<a href="myaccount.php?action=edit_account">Edit Account</a>
								</li>
								<li>
									<a href="myaccount.php?action=edit_profile">Edit Profile</a>
								</li>
								<li>
									<a href="myaccount.php?action=user_profile_picture">User Profile Picture</a>
								</li>
								<li>
									<a href="myaccount.php?action=change_password">Change Password</a>
								</li>
								<li>
									<a href="myaccount.php?action=delete_account">Delete Account</a>
								</li>
								<li>
									<a href="logout.php">Logout</a>
								</li>
							</ul>

						</div>

						<?php }else{ ?>
					
					<h1>Account Setting Page</h1>
					
					<h5><a href="checkout.php?action=login"> Login </a> to Your Account ! </h5>
					
					<?php } ?>
					</div>
				</div>

			</div>
	</div>

</div>
    <!-- ##### Main Content Wrapper End ##### -->
    <?php include('footer.php'); ?>