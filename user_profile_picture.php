

                            <?php 
                                $select_user = mysqli_query($con, "select * from users where user_id = '$_SESSION[user_id]' ");

                                $fetch_user = mysqli_fetch_array($select_user); 
                            ?>

                            <div class="register_title">
                                <h2>User Profile Picture</h2>
                            </div>

                            <form action="#" method="post" enctype="multipart/form-data">
                                <div class="row">
                                   
                                    
                                    <div class="col-md-6 mb-3">
                                        <input type="file" name="image" required>
                                        <div>
                                            <img src="customer_image/<?php echo $fetch_user['image']; ?>" width="100" height="70">
                                        </div>
                                    </div>

                                    
                                    
                                    <div class="col-md-6 mb-3">
                                    <input type="submit" name="user_profile_picture" value="Save " class="amado-btn" style="margin-left: 2%">

                                    </div>
									
                                </div>
                            </form>

                    
  

    <?php 

        if (isset($_POST['user_profile_picture'])) {
            

            //chec if file not empty
          if (!empty($_POST['user_profile_picture'])) {
              
              $image = $_FILES['image']['name'];
              $image_tmp = $_FILES['image']['tmp_name'];
              $target_file = "customer_image/" . $image;
              $uploadok = 1;
              $message = '';

              // end if the file size more than 9mb
              if ($_FILES["image"]["size"] < 9098888) {
          
          


              //check file already exist
              if (file_exists($target_file)) {
                  $uploadok = 0;
                  $message .=" Sorry, file already exists.";
              }if ($uploadok == 0) { // check if uploadok isset to 0 by an error
                  $message .= "Sorry, your file was not uploaded";

              }else{
                if (move_uploaded_file($image_tmp, $target_file)) {
                    $update_image = mysqli_query($con, "update users set image='$image' where user_id='$_SESSION[user_id]' ");
                    $message .= "The file" . basename($image) . " has been uploaded. ";

                }else{
                    $message .= "Sorry, there was an error uploading your file.";

                }
              }
          } // end if the file size more than 9mb
          else{
            $message .= "File size max 9 MB.";
          }
          }

                

                
        }

     ?>
<p style="color: green;margin-left: 15px;">
    
    <?php
        if (isset($message)) {
            echo $message;
        }
     ?>

</p>