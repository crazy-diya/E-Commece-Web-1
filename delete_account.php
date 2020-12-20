
<style type="text/css">
	.delete_account_container{
		padding: 10px;
	}
	.delete_account_box{
		width: 50%;
	}

	.delete_account_box input[type=submit]{
		padding: 7px 15px;
		margin: 20px;
		float: right;
		border: none;
	}

	.yes_btn{
		background: rgba(255, 183, 16,0.8);
	}

</style>

<div class="delete_account_container">
	<h3 style="text-align: left;">Confirm Box</h1>
		<hr />
		<div class="delete_account_box">
			<h4>Are you sure you want to delete your account?</h4>

			<form action="" method="post">
				<input type="submit" class="yes_btn" name="yes" value="Yes">
				<input type="submit" name="cancel" value="Cancel ">
			</form>
		</div>
</div>

<?php 

if (isset($_POST['yes'])) {
	$delete_account = mysqli_query($con, "delete from users where user_id = '$_SESSION[user_id]' ");

	session_destroy();

	echo "<script>alert('your account has been deleted! ')</script>";

	echo "<script>window.open('home.php','_self')</script>";
}

if (isset($_POST['cancel'])) {
	echo "<script>window.open(window.location.href,'_self')</script>";
}

 ?>