
<div class="view-product-box">
<h2>View Product</h2>
<div class="border-bottom">
	
</div>

<form action=" " method="post" enctype="multipart/form-data">
	<div class="search-bar">
		<input type="text" id="search" name="" placeholder="Type to search.... ">
	</div>
	<table width="100%">
		<thead>
			<tr>
				<th><input type="checkbox" id="checkAl" name="">Check</th>
				<th>ID</th>
				<th>Title</th>
				<th>Price</th>
				<th>Image</th>
				<th>Views</th>
				<th>Date</th>
				<th>Status</th>
				<th>Delete</th>
				<th>Edit</th>
			</tr>
		</thead>


<?php 

	$all_products = mysqli_query($con, "select * from insert_product order by product_id DESC ");

	$i =1;

	while ($row=mysqli_fetch_array($all_products)) {
		
	
 ?>

		<tbody>
			<tr>
				<td>
					<input type="checkbox" name="deleteAll[]" value="<?php echo $row['product_id'];  ?>" />
				</td>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['product_name']; ?></td>
				<td><?php echo $row['product_price']; ?></td>
				<td><img src="../imgup/<?php echo $row['product_img'];  ?> " width="70" height="50"></td>
				<td><?php echo $row['views']; ?></td>
				<td><?php echo $row['date']; ?></td>
				<td>
					<?php 
						if ($row['visible'] == 1) {
							echo "Approved";
						}else{
							echo "Pending";
						}
					 ?>
				</td> 
				<td><a href="index.php?action=view_pro&delete_product=<?php echo $row['product_id']; ?> ">Delete</a></td>
				<td><a href="index.php?action=edit_pro&product_id=<?php echo $row['product_id']; ?> ">Edit </a></td>
			</tr>
		</tbody>
		<?php $i++;} ?>

		<tr>
			<td>
				<input type="submit" name="deete_all" value="Remove" /> 
			</td>
		</tr>

	</table>
</form>
</div>

<?php 

//Delete product

if (isset($_GET['delete_product'])) {
	$delete_product = mysqli_query($con,"delete from insert_product where product_id='$_GET[delete_product]' ");

	if ($delete_product) {
		echo "<script>alert('Product has been deleted Successfully! ')</script>";

		echo "<script>window.open('index.php?action=view_pro','_self')</script>";
	}
}
// Remove items selected using foreach loop
if (isset($_POST['deleteAll'])) {
	$remove = $_POST['deleteAll'];

	foreach ($remove as $key ) {
		$run_remove = mysqli_query($con, "delete from insert_product where product_id='$key' ");

		if ($run_remove) {
		
		echo "<script>alert('Items Selected have been removed Successfully! ')</script>";

		echo "<script>window.open('index.php?action=view_pro','_self')</script>";
	}else{
		echo "<script>alert('Mysqli Failed : mysqli_error($con)!')</script>";

	}
	}
}

 ?>