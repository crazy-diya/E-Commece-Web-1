
<?php include('header.php');?>


<?php 
	
	if (!isset($_SESSION['user_id'])) {
		include('login.php');
	}else{
		include('payment.php');
	}

	
 ?>



</div>
<?php include('footer.php'); ?>