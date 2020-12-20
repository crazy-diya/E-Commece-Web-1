                          
                            <?php 
                                $select_user = mysqli_query($con, "select * from users where user_id = '$_SESSION[user_id]' ");

                                $fetch_user = mysqli_fetch_array($select_user); 
                            ?>

                            <div class="register_title">
                                <h2>Edit Profile</h2>
                            </div>

                            <form action="#" method="post" enctype="multipart/form-data">
                                <div class="row">
                                   
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="fname" class="form-control" id="first_name" value="<?php echo $fetch_user['fristname']; ?>" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="lname" class="form-control" id="last_name" value="<?php echo $fetch_user['lastname']; ?>" placeholder="Last Name" required>
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
                                        <input type="text" name="address" class="form-control mb-3" id="street_address" value="<?php echo $fetch_user['user_address']; ?>" placeholder="Address"  required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" name="city" class="form-control" id="city" placeholder="City" value="<?php echo $fetch_user['city']; ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="zip" class="form-control" id="zipCode" placeholder="Zip Code" value="<?php echo $fetch_user['zip_code']; ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="number" name="phonenumber" class="form-control" id="phone_number" value="<?php echo $fetch_user['phone_number']; ?>" min="0" placeholder="Phone No" required >
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <textarea name="comment" class="form-control w-100" id="comment"  cols="30" rows="10" placeholder="Leave a comment about your order"  required></textarea>
                                    </div>
                                    
                                    
                                    <div class="col-md-6 mb-3">
                                    <input type="submit" name="edit_profile" value="Save" class="amado-btn" style="margin-left: 2%">

                                    </div>
                                    
                                </div>
                            </form>

                    
  

    <?php 

        if (isset($_POST['edit_profile'])) {
            
            if ($_POST['fname'] != '' && $_POST['lname'] != '' && $_POST['country'] != '' && $_POST['city'] != '' && $_POST['address'] != '' && $_POST['zip'] != '' && $_POST['phonenumber'] != '' && $_POST['comment'] != ''  ) {
                
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                
                

                $country = $_POST['country'];
                $city = $_POST['city'];
                $address = $_POST['address']; 
                $zip = $_POST['zip'];
                $phonenumber = $_POST['phonenumber'];
                $comment = $_POST['comment'];

               

                $update_profile = mysqli_query($con, "update users set fristname = '$fname' , lastname ='$lname' , country = '$country' , user_address = '$address' , city = '$city' , zip_code = '$zip' , phone_number = '$phonenumber' , comment = '$comment' where user_id = '$_SESSION[user_id]' ");

                if ($update_profile) {
                    echo "<script>alert('Your Update was Successfully!')</script>";

                    echo "<script>window.open(window.location.href,'_self')</script>";
                }
                
            }
        }

     ?>
