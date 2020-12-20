<?php include '../db.php'; ?>
<div class="form-box">    
          <form action="" method="POST" enctype="multipart/form-data">

                            	<table align="center" width="100%" >
                            		
                            		<tr>
                            			<td colspan="7">
                            				<h2>Add Category</h2>
                            				<div class="border-bottom"></div>
                            			</td>
                            		</tr>

                            		<tr>
                            			<td><b>Add New Category</b></td>
                            			<td><input type="text" name="productcatagorie" placeholder="Product Name" size="60" required></td>
                            		</tr>
                            		
                            		<tr>
                            			<td colspan="7"><input type="submit" value="Add Category" name="insert_cat" ></td>
                            		</tr>

                            	</table>
                            	</div>
              
</form>
        
    <?php 
        global $con;
        if (isset($_POST['insert_cat'])) {
            $product_cat = mysqli_real_escape_string($con,$_POST['productcatagorie']);

            $insert_cat = mysqli_query($con,"insert into catagories (cat_title) values ('$product_cat') ");



            if ($insert_cat) {
                echo "<script>alert('Product category has been inserted successfully!')</script>";
                echo "<script>window.open(window.location.href,'_self')</script>";
            }
        }
        
     ?>     

   