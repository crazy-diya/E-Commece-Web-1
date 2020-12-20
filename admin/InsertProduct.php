<?php include '../db.php'; ?>
<div class="form-box">    
          <form action="" method="POST" enctype="multipart/form-data">

                            	<table align="center" width="100%" >
                            		
                            		<tr>
                            			<td colspan="7">
                            				<h2>Add Product</h2>
                            				<div class="border-bottom"></div>
                            			</td>
                            		</tr>

                            		<tr>
                            			<td><b>Product Name</b></td>
                            			<td><input type="text" name="producttitle" placeholder="Product Name" size="60" required=""></td>
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

                                                echo "<option value='$cat_id'>$cat_title</option>";
                                            }
                                         ?>
                                        </select>
                            			</td>
                            		</tr>

                            		<tr>
                            			<td><b>Product Image: </b></td>
                            			<td> <input type="file" id="file"  name="productimg"></td>
                            		</tr>

                            		<tr>
                            			<td><b>Product Price: </b></td>
                            			<td><input type="text" id="product_price" value="" placeholder="Price" name="productprice" required></td>
                            		</tr>

                            		<tr>
                            			<td align="top"><b>Product Description:</b></td>
                            			<td><textarea name="productcomment" id="comment" rows="10" placeholder="Leave a comment about  your order"></textarea></td>
                            		</tr>

                            		<tr>
                            			<td colspan="7"><input type="submit" value="Add Product" name="upload" ></td>
                            		</tr>

                            	</table>
                            	</div>
              
</form>
        
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

            move_uploaded_file($product_img_temp,"../imgup/$product_img");

            

            $sql = "insert into insert_product (product_name,product_price,product_categorie,product_comment,product_img) 
            VALUES ('$product_title','$product_price','$product_catagorie','$product_comment','$product_img')";

            if (mysqli_query($con, $sql)) {
                echo "<script>alert('New record create Succecfully...') </script>";
                echo "<script>window.open('index.php?action=add_pro','_self')</script>";
            }else{
                echo "Error : " . $sql . "<br>" . mysqli_error($con);
             }
            }
            
        
     ?>     

   