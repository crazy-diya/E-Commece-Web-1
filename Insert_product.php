<?php include('db.php'); ?>
           
                
                    
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Product Details</h2>
                            </div>

                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="product_title" name="producttitle"  placeholder="Product Name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="product_price" value="" placeholder="Price" name="productprice" required>
                                    </div>
                                    <div class="col-12 mb-3" style="margin-bottom: 2%;">
                                        <select class="w-100" id="selectctagary" style="display: none;" name="productcatagorie">
                                        <option>Select Categorie</option>
                                        
                                        <?php 
                                            $get_cat = "select * from catagories";
                                            $run_cat = mysqli_query($con, $get_cat);

                                            while ($row_cat=mysqli_fetch_array($run_cat)) {
                                                $cat_id = $row_cat['cat_id'];
                                                $cat_title = $row_cat['cat_title'];

                                                echo "<option value='$cat_id'>$cat_title</option>";
                                            }
                                         ?>
                                        </select>
                                    </div>
                                    
                                    <div style="margin-left: 17px;">
                                        <input type="file" id="file"  name="productimg"> <br>
                                        
                                    </div>
                                   
                                    <div class="col-12 mb-3 mt-3">
                                        <textarea name="productcomment" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Leave a comment about your order"></textarea>
                                    </div>
                                        <input type="submit" value="Upload" name="upload" class="amado-btn" style="margin-left: 2%">                  
                                </div>
                            </form>
                        </div>
    
    <!-- ##### Main Content Wrapper End ##### -->  
    <?php 
        global $con;
        if (isset($_POST['upload'])) {
            $product_title = $_POST['producttitle'];
            //echo "<script>alert('$producttitle') </script>";
            $product_price = $_POST['productprice'];
            $product_catagorie = $_POST['productcatagorie'];
            $product_comment = $_POST['productcomment'] ;

            $product_img = $_FILES['productimg']['name'];
            $product_img_temp = $_FILES['productimg']['tmp_name'];

            //echo "<script>alert('$product_comment') </script>";

            move_uploaded_file($product_img_temp,"imgup/$product_img");

            

            $sql = "insert into insert_product (product_name,product_price,product_categorie,product_comment,product_img) 
                 VALUES ('$product_title','$product_price','$product_catagorie','$product_comment','$product_img')";

            if (mysqli_query($con, $sql)) {
                echo "<script>alert('New record create Succecfully...') </script>";
                echo "<script>window.open('myaccount.php?action=insert_product','_self')</script>";
            }else{
                echo "Error : " . $sql . "<br>" . mysqli_error($con);
             }
            }
            
        
     ?>     
