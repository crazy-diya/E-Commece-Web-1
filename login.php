


       <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Login</h2>
                            </div>

                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        Don't have a account? <a href="register.php" style="font-size: 20px;color: red;"> Register Here </a>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <input type="email" name="email" class="form-control" id="email" value="" placeholder="E-mail" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <input type="password" name="password" class="form-control" id="password" value="" placeholder="Password" required>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <a href="checkout.php?forgot_pass" style="font-size: 15px;">
                                           <u style="color: blue;">Forgot Password</u> 
                                        </a>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        
                                    </div>
                                    <div>
                                        
                                    </div>
									 
										<input type="submit" name="login" value="Login" class="amado-btn" style="margin-left: 2%">
									
                                   
                                
                                    
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <?php 

        if (isset($_POST['login'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $password = md5($password);

            $run_login = mysqli_query($con, "select * from users where password='$password' AND email='$email' ");

            $check_login = mysqli_num_rows($run_login);

            $row_login = mysqli_fetch_array($run_login);

            if ($check_login == 0) {
                echo "<script>alert('Password or email is incorrect, please try again!')</script>";
                exit();
            }

            $ip = getUserIpAddr();

            $run_cart = mysqli_query($con, "select * from cart where ip_address='$ip' ");

            $check_cart = mysqli_num_rows($run_cart);

            if ($check_login > 0 AND $check_cart==0) { 
                
                $_SESSION['user_id'] = $row_login['user_id'];

                $_SESSION['role'] = $row_login['role'];

                $_SESSION['email'] = $email;
                echo "<script>alert('You  has logged in Successfully !')</script>";

                echo "<script>window.open('myaccount.php','_self')</script>";
            
            }else{
                $_SESSION['user_id'] = $row_login['user_id'];

                $_SESSION['role'] = $row_login['role'];

                $_SESSION['email'] = $email;
                echo "<script>alert('You  has logged in Successfully !')</script>";

                echo "<script>window.open('checkout.php','_self')</script>";
            
            }

        }

         ?>


    