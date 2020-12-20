
<?php include('header.php');?>

<div class="col-12 col-lg-9 cart_area">
<div class="cart_container">
	<div class="shopping_cart" align="right" style="padding: 15px">
		<?php 

		if (isset($_SESSION['customer_email'])) {
			echo "<b> Your Email :</b>" . $_SESSION['customer_email'];
		}else{
			echo "";
		}

		 ?>
		 <b style="color: navy"> Your Cart - </b> Total Items: <?php totalCartItem(); ?> Total Price: <?php total_price(); ?>
	</div>

	<form action="" method="POST" enctype="multipart/form-data">
	<table align="center" width="100%">
		<tr align="center">
			<th>Remove</th>
			<th>Product</th>
			<th>Quentity</th>
			<th>Price</th>
		</tr>

		<?php 

	$total = 0;

    $ip = getUserIpAddr();

    $run_cart = mysqli_query($con,"select * from cart where ip_address='$ip' ");

    while ($fetch_cart = mysqli_fetch_array($run_cart)) {
        $product_id = $fetch_cart['product_id'];

        $result_product = mysqli_query($con, "select * from insert_product where product_id = '$product_id' ");

        while ($fetch_product = mysqli_fetch_array($result_product)) {
            
            $product_price = array($fetch_product['product_price']);

            $product_title = $fetch_product['product_name'];

            $product_image = $fetch_product['product_img'];

            $sing_price = $fetch_product['product_price'];

            $values = array_sum($product_price);

            //Getting quentity of the product

            $run_qut = mysqli_query($con, "select * from cart where product_id = '$product_id'");

            $row_qty = mysqli_fetch_array($run_qut);

            $qty = $row_qty['quentity'];

            $values_qty = $values * $qty;

            $total += $values_qty;


       
		 ?>

		<tr align="center">
			<td><input type="checkbox" name="remove[]" value="<?php
			echo $product_id
			?>" /> </td>
			<td>
				<?php echo $product_title; ?>
				<br />
				<img src="imgup/<?php echo $product_image; ?>">	

				</td>
			<td><input type="text" size="4" name="qty" value=" <?php echo $qty; ?> " /></td>
			<td><?php echo "Rs " . $sing_price . ".00"; ?></td>
		</tr>

	<?php }} //end while ?>

		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td align="center"><b>Sub Total:</b><?php echo total_price(); ?></td>
			
		</tr>
	
		<tr align="center" >
		
			<td colspan="2"><input type="submit" name="update_cart" value="Update Cart" /></td>
			<td><input type="submit" name="continue" value="Continue Shoping" /></td>
			<td><button><a href="checkout.php">Checkout</a></button></td>
			
		</tr>
	
		
	</table>
	</form>

	<?php 
	if (isset($_POST['remove'])) {
		foreach($_POST['remove'] as $remove_id){
			$run_delete = mysqli_query($con,"delete from cart where product_id='$remove_id' AND ip_address ='$ip' ");
		
			if ($run_delete) {
				echo "<script>window.open('cart.php','_self')</script>";
			}
		}
	}

	if (isset($_POST['continue'])) {
		echo "<script>window.open('shop.php','_self')</script>";
	}

	 ?>

</div>
</div>
</div>
<?php include('footer.php'); ?>