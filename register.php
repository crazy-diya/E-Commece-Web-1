
<?php include('header.php'); ?>

       <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="register_area mt-50 clearfix">

                            <script>
                                $(document).ready(function(){
                                    $("#password_confirm2").on('keyup',function(){
                                        //alert('testing jquery');

                                        var password_confirm1 = $("#password_confirm1").val();
                                        var password_confirm2 = $("#password_confirm2").val();

                                        //alert(password_confirm2);

                                        if (password_confirm1 == password_confirm2) {
                                            $("#status_for_confirm_password").html('<strong style="color:rgba(255, 183, 16,1);">Password match</strong>');
                                        }else{
                                            $("#status_for_confirm_password").html('<strong style="color:red;">Password do not match</strong>');
                                        }
                                    });
                                });
                            </script>

                            <div class="register_title">
                                <h2>Create Account</h2>
                            </div>

                            <form action="#" method="post" enctype="multipart/form-data">
                                <div class="row">
                                   
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="fname" class="form-control" id="first_name" value="" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="lname" class="form-control" id="last_name" value="" placeholder="Last Name" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="password" name="password" class="form-control" id="password_confirm1" placeholder="Password" value="" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="password" name="confirm_password" class="form-control" id="password_confirm2" placeholder="Confirm Password" value="" required>
                                        <p id="status_for_confirm_password"></p><!-- showing the validate password here-->
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        
                                        <select class="w-100" id="country" name="country">
                                        <option value=""> Country</option>
                                        <option value="slk">Sri Lanka</option>
                                        <option value="usa">United States</option>
                                        <option value="uk">United Kingdom</option>
                                        <option value="ger">Germany</option>
                                        <option value="fra">France</option>
                                        <option value="ind">India</option>
                                        <option value="aus">Australia</option>
                                        <option value="bra">Brazil</option>
                                        <option value="cana">Canada</option>
                                    </select> 
                                    </div>

                                    <div class="col-12 mb-3">
                                        <input type="text" name="address" class="form-control mb-3" id="street_address" placeholder="Address"  required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" name="city" class="form-control" id="city" placeholder="City" value="" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="zip" class="form-control" id="zipCode" placeholder="Zip Code" value="" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="number" name="phonenumber" class="form-control" id="phone_number" min="0" placeholder="Phone No" required >
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Leave a comment about your order" required></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="file" name="image" required>
                                    </div>
                                    <!-- <div class="col-md-6 mb-3">
                                        <a href="checkout.php?forgot_pass" style="font-size: 15px;">
                                            <u style="color: blue;">Forgot Password</u></a>
                                        
                                    </div> -->
                                    <div class="col-md-6 mb-3">
                                    <input type="submit" name="register" value="Create" class="amado-btn" style="margin-left: 2%">

                                    </div>
									<!-- <div class="cart-btn mt-30 ml-30">
                                		<a href="#" class="btn amado-btn w-100">Create</a>
                            		</div> -->
                                    
                                </div>
                            </form>

                        </div>
                    </div>
                   
               
                        </div>
                    </div>
               					
                </div>
            </div>
        </div>
    </div>

    <?php 

        if (isset($_POST['register'])) {
            
            if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['fname']) && !empty($_POST['lname'])) {
                $ip = getUserIpAddr();
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $password = trim($_POST['password']);
                $hash_password = md5($password);
                $confirm_password = trim($_POST['confirm_password']);

                $image = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];

                $country = $_POST['country'];
                $city = $_POST['city'];
                $address = $_POST['address']; 
                $zip = $_POST['zip'];
                $phonenumber = $_POST['phonenumber'];
                $comment = $_POST['comment'];

                $check_exist = mysqli_query($con,"select * from users where email = '$email' ");

                $email_count = mysqli_num_rows($check_exist);

                $row_register = mysqli_fetch_array($check_exist);

                if ($email_count > 0) {
                    echo "<script>alert('Sorry, your email $email address allready exist in our database !')</script>"; 
                }elseif ($row_register['email'] !=$email && $password == $confirm_password) {
                    
                    move_uploaded_file($image_tmp, "customer_image/$image");

                    $run_insert = mysqli_query($con, "insert into users (ip_address,fristname,lastname,email,country,user_address,city,zip_code,phone_number,comment,password,image) values ('$ip','$fname','$lname','$email','$country','$address','$city','$zip','$phonenumber','$comment','$hash_password','$image') ");

                    if ($run_insert) {
                         $sel_user = mysqli_query($con,"select * from users where email='$email' ");
                         $row_user = mysqli_fetch_array($sel_user);

                         $_SESSION['user_id'] = $row_user['user_id'];
                          $_SESSION['role'] = $row_user['role'];
                    }

                    $run_cart = mysqli_query($con, "select * from cart where ip_address='$ip' ");

                    $check_cart = mysqli_num_rows($run_cart);

                    if ($check_cart == 0) {
                        $_SESSION['email'] = $email;
                        echo "<script>alert('Account has been created successfully!')</script>";
                        echo "<script>window.open('myaccount.php','_self')</script>";
                    }else{
                        $_SESSION['email'] = $email;
                        echo "<script>alert('Account has been created successfully!')</script>";
                        echo "<script>window.open('checkout.php','_self')</script>";
                    }
                }
            }
        }

     ?>
    <!-- ##### Main Content Wrapper End ##### -->

    <?php include('footer.php'); ?>