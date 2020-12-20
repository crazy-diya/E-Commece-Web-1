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
                                <h2>Change Password</h2>
                            </div>

                            <form action="#" method="post" enctype="multipart/form-data">
                                <div class="row">
                                   
                                   
                                    <div class="col-12 mb-3">
                                        <input type="password" name="current_password" class="form-control" placeholder="Current Password" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="password" name="new_password" class="form-control" id="password_confirm1" placeholder="New Password" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="password" name="confirm_new_password" class="form-control" id="password_confirm2" placeholder="Re-Type Password" required>
                                        <p id="status_for_confirm_password"></p><!-- showing the validate password here-->
                                    </div>                                    
                                    <div class="col-md-6 mb-3">
                                    <input type="submit" name="change_password" value="Save" class="amado-btn" style="margin-left: 2%">

                                    </div>
									
                                </div>
                            </form>

                    
  

    <?php 

        if (isset($_POST['change_password'])) {
                
                $current_password = trim($_POST['current_password']);
                $hash_current_password = md5($current_password);

           
                $new_password = trim($_POST['new_password']);
                $hash_new_password = md5($new_password);
                $confirm_new_password = trim($_POST['confirm_new_password']);

                $select_password = mysqli_query($con, "select * from users where password='$hash_current_password' and user_id = '$_SESSION[user_id]' ");

                //check if current password not empty
                if (mysqli_num_rows($select_password) == 0) {
                    echo "<script>alert('Your Current Password is Wrong!')</script>";
                }elseif ($new_password != $confirm_new_password) {
                    echo "<script>alert('Password do Not Match!')</script>";
                }else{
                    $update = mysqli_query($con, "update users set password='$hash_new_password' where user_id= '$_SESSION[user_id]' ");

                    if ($update) {
                        echo "<script>alert('Your Password was update Successfully!')</script>";
                        echo "<script>window.open(window.location.href,'_self')</script>";
                    }else{
                        echo "<script>alert('Database query failed: mysqli_error($con) !')</script>";
                    }
                }

        }

     ?>
