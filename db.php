<?php
$con = mysqli_connect("localhost","root","","sale_site");
if (mysqli_connect_errno()) {
	echo "Faild to connect to MySQL: " . mysqli_connect_errno();
// }else{
// 	echo "<script>alert('Connect') </script>";

	mysqli_query($con, "SET NAMES 'utf8' ");
}

  ?>
 