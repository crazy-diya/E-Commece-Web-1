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

                            <?php 
                                $select_user = mysqli_query($con, "select * from users where user_id = '$_SESSION[user_id]' ");

                                $fetch_user = mysqli_fetch_array($select_user); 
                            ?>

                            <div class="register_title">
                                <h2>Edit Account</h2>
                            </div>

                            <form action="#" method="post" enctype="multipart/form-data">
                                <div class="row">
                                   
                                   
                                    <div class="col-12 mb-3">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $fetch_user['email']; ?>" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="password" name="current_password" class="form-control" placeholder="Current Password" required>
                                    </div>
                                    
                                    
                                    <div class="col-md-6 mb-3">
                                    <input type="submit" name="edit_account" value="Save" class="amado-btn" style="margin-left: 2%">

                                    </div>
                                    
                                </div>
                            </form>

                    
  

    <?php 

        if (isset($_POST['edit_account'])) {
                
                $email = trim($_POST['email']);
                $current_password = trim($_POST['current_password']);
                $hash_password = md5($current_password);

                $check_exist = mysqli_query($con,"select * from users where email = '$email' ");

                $email_count = mysqli_num_rows($check_exist);

                $row_register = mysqli_fetch_array($check_exist);

                if ($email_count > 0) { 
                    echo "<script>alert('Sorry, your email $email address allready exist in our database !')</script>"; 
                }elseif ($fetch_user['password'] != $hash_password ) {
                    
                    echo"<script>alert('Your Current Password is Wrong!')</script>";

                    
                 }else{

                    $update_email = mysqli_query($con, "update users set email='$email' where user_id='$_SESSION[user_id]' ");

                    if ($update_email) {
                        echo "<script>alert('Your Current Email was Successfully Change!!')</script>";

                        echo "<script>window.open(window.location.href,'_self')</script>";
                    }

                 }
        }

     ?>
