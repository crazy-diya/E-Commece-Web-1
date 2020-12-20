<?php include '../db.php'; ?>


<?php 

    $edit_product = mysqli_query($con, " select * from insert_product where product_id='$_GET[product_id]' ");
    $fetch_edit = mysqli_fetch_array($edit_product);

 ?>
<div class="form-box">    
          <form action="" method="POST" enctype="multipart/form-data">

                            	<table align="center" width="100%" >
                            		
                            		<tr>
                            			<td colspan="7">
                            				<h2>Edit Product</h2>
                            				<div class="border-bottom"></div>
                            			</td>
                            		</tr>

                            		<tr>
                            			<td><b>Product Name</b></td>
                            			<td><input type="text" name="producttitle" value=" <?php echo $fetch_edit['product_name']; ?> " placeholder="Product Name" size="60" required=""></td>
                            		</tr>

                            		<tr>
                            			<td><b>Product Category</b></td>
                            			<td>
                            				<select id="selectctagary" name="productcatagorie">
                                        <option>Select Categorie</option>
                                        
                                        <?php 
                                            $get_cat = "select * from catagories";
                                            $run_cat = mysqli_query($con, $get_cat);

                                            while ($row_cat=mysqli_fetch_array($run_cat)) {
                                                $cat_id = $row_cat['cat_id'];
                                                $cat_title = $row_cat['cat_title'];

                                                if ($fetch_edit['product_categorie'] == $cat_id) {
                                                    echo "<option value='$fetch_edit[product_categorie]' selected >$cat_title</option>";
                                                }else{
                                                    echo "<option value='$cat_id'>$cat_title</option>";    
                                                }
                                                
                                            }
                                         ?>
                                        </select>
                            			</td>
                            		</tr>

                            		<tr>
                            			<td  valign="top"><b>Product Image: </b></td>
                            			<td> <input type="file" id="file"  name="productimg">
                                            <div class="edit-image">
                                                <img src="../imgup/<?php echo $fetch_edit['product_img']; ?> " width="100" height="70">
                                            </div>
                                        </td>
                            		</tr>

                            		<tr>
                            			<td><b>Product Price: </b></td>
                            			<td><input type="text" id="product_price" value=" <?php echo $fetch_edit['product_price']; ?> " placeholder="Price" name="productprice" required></td>
                            		</tr>

                            		<tr>
                            			<td align="top"><b>Product Description:</b></td>
                            			<td><textarea name="productcomment" id="comment" rows="10"> <?php echo $fetch_edit['product_comment']; ?></textarea></td>
                            		</tr>

                            		<tr>
                            			<td colspan="7"><input type="submit" value="Save" name="edit_product" ></td>
                            		</tr>

                            	</table>
                            	</div>
              
</form>
        
    <?php 
        global $con;
        if (isset($_POST['edit_product'])) {
            $product_title = trim(mysqli_real_escape_string($con,$_POST['producttitle']));
            //echo "<script>alert('$producttitle') </script>";
            $product_price = $_POST['productprice'];
            $product_catagorie = $_POST['productcatagorie'];
            $product_comment = $_POST['productcomment'] ;

            $product_img = $_FILES['productimg']['name'];
            $product_img_temp = $_FILES['productimg']['tmp_name'];
            $date = date("F d, Y"); 

            //echo "<script>alert('$product_comment') </script>";

            if (!empty($_FILES['productimg']['name'])) {

                if (move_uploaded_file($product_img_temp,"../imgup/$product_img")) {
                    
                    $update_product = mysqli_query($con,"update insert_product set product_categorie='$product_catagorie' , product_name='$product_title' , product_price='$product_price ',product_comment='$product_comment',product_img='$product_img',date='$date' where product_id='$_GET[product_id]' ");
                }
            }else{

                $update_product = mysqli_query($con,"update insert_product set product_categorie='$product_catagorie' , product_name='$product_title' , product_price='$product_price ',product_comment='$product_comment',product_img='$product_img',date='$date' where product_id='$_GET[product_id]' ");

            }

            if ($update_product) {
                echo "<script>alert('Product was Updated Successfully!') </script>";
                echo "<script>window.open(window.location.href,'_self')</script>";
            }

            

            // $sql = "insert into insert_product (product_name,product_price,product_categorie,product_comment,product_img) 
            // VALUES ('$product_title','$product_price','$product_catagorie','$product_comment','$product_img')";

            // if (mysqli_query($con, $sql)) {
            //     echo "<script>alert('New record create Succecfully...') </script>";
            //     echo "<script>window.open('index.php?action=add_pro','_self')</script>";
            // }else{
            //     echo "Error : " . $sql . "<br>" . mysqli_error($con);
            //  }
            }
            
        
     ?>     

   