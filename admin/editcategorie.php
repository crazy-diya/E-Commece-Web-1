<?php include '../db.php'; ?>

<?php 

    $edit_cat = mysqli_query($con,"select * from catagories where cat_id='$_GET[cat_id]' ");

    $fetch_cat = mysqli_fetch_array($edit_cat);
 ?>

<div class="form-box">    
          <form action="" method="POST" enctype="multipart/form-data">

                            	<table align="center" width="100%" >
                            		
                            		<tr>
                            			<td colspan="7">
                            				<h2>Edit Category</h2>
                            				<div class="border-bottom"></div>
                            			</td>
                            		</tr>

                            		<tr>
                            			<td><b>Edit Category</b></td>
                            			<td><input type="text" name="productcatagorie" value=" <?php echo $fetch_cat['cat_title']; ?> " placeholder="Product Name" size="60" required></td>
                            		</tr>
                            		
                            		<tr>
                            			<td colspan="7"><input type="submit" value="Save" name="edit_cat" ></td>
                            		</tr>

                            	</table>
                            	</div>
              
</form>
        
    <?php 
        global $con;
        if (isset($_POST['edit_cat'])) {
            $cat_title = mysqli_real_escape_string($con,$_POST['productcatagorie']);

            $edit_cat = mysqli_query($con,"update catagories set cat_title='$cat_title' where cat_id='$_GET[cat_id]' ");



            if ($edit_cat) {
                echo "<script>alert('Product category was Update successfully!')</script>";
                echo "<script>window.open(window.location.href,'_self')</script>";
            }
        }
        
     ?>     

   