
<div class="view-product-box">
<h2>View Users</h2>
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
				<th>Frist Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Image</th>
				<th>Address</th>
				<th>Phone Number</th>
			</tr>
		</thead>


<?php 

	$all_users = mysqli_query($con, "select * from users order by user_id DESC ");

	$i =1;

	while ($row=mysqli_fetch_array($all_users)) {
		
	
 ?>

		<tbody>
			<tr>
				<td>
					<input type="checkbox" name="deleteAll[]" value="<?php echo $row['user_id'];  ?>" />
				</td>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['fristname']; ?></td>
				<td><?php echo $row['lastname']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td>
					<?php if ($row['image'] != ''){ ?>
					<img src="../customer_image/<?php echo $row['image'];  ?> " width="70" height="50">
				<?php }else{ ?>
					<img src="../img/core-img/usericon.png" width="70" height="50">
				<?php } ?>
				</td>
				<td><?php echo $row['user_address']; ?></td>
				<td><?php echo $row['phone_number']; ?></td>
				<td>
					<?php 
						if ($row['visible'] == 1) {
							echo "Approved";
						}else{
							echo "Pending";
						}
					 ?>
				</td> 
				<td><a href="index.php?action=view_users&delete_user=<?php echo $row['user_id']; ?> ">Delete</a></td>
				
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

//Delete User Acccount

if (isset($_GET['delete_user'])) {
	$delete_user = mysqli_query($con,"delete from users where user_id='$_GET[delete_user]' ");

	if ($delete_user) {
		echo "<script>alert('User Acccount has been deleted Successfully! ')</script>";

		echo "<script>window.open('index.php?action=view_users','_self')</script>";
	}
}
// Remove items selected using foreach loop
if (isset($_POST['deleteAll'])) {
	$remove = $_POST['deleteAll'];

	foreach ($remove as $key ) {
		$run_remove = mysqli_query($con, "delete from users where user_id='$key' ");

		if ($run_remove) {
		
		echo "<script>alert('Selected User Accounts have been removed Successfully! ')</script>";

		echo "<script>window.open('index.php?action=view_users','_self')</script>";
	}else{
		echo "<script>alert('Mysqli Failed : mysqli_error($con)!')</script>";

	}
	}
}

 ?>