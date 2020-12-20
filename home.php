
<?php include('header.php');  ?>

        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">

                <!-- Single Catagory -->
               
                
                    <?php
					global $con;
					$get_pro = " select * from insert_product order by RAND()";
					
					$run_pro = mysqli_query($con, $get_pro);
					
					while($row_pro = mysqli_fetch_array($run_pro)){
						$pro_id = $row_pro['product_id'];
						$pro_tit = $row_pro['product_name'];
						$pro_pri = $row_pro['product_price'];
						$pro_cat = $row_pro['product_categorie'];
						$pro_img = $row_pro['product_img'];
						
        
                    
						echo "
							
							<div class='single-products-catagory clearfix''>
							<a href='product_detail.php?pro_id=$pro_id'>
                        		<img src='imgup/$pro_img' alt='$pro_tit'>
                        		
                        		<div class='hover-content'>
                            	<div class='line'></div>
                            	$pro_pri
                            	<h4>$pro_tit</h4>
                       			</div>
                    		</a>
							</div>
						";
						
					}
					?>
                    
                

                <!-- Single Catagory -->
                <!-- <div class="single-products-catagory clearfix">
                    <a href="">
                        <img src="img/product-img/ring.jpg" alt="ring">
                        
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Rs 11000.00</p>
                            <h4>Couple Ring</h4>
                        </div>
                    </a>
                </div> -->

                <!-- Single Catagory -->
                <!-- <div class="single-products-catagory clearfix">
                    <a href="">
                        <img src="img/product-img/guitar.jpg" alt="guitar">
                        
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Rs 24500.00</p>
                            <h4>Electric Gutar</h4>
                        </div>
                    </a>
                </div> -->

                <!-- Single Catagory -->
                <!-- <div class="single-products-catagory clearfix">
                    <a href="">
                        <img src="img/product-img/samsung phoe.jpg" alt="samsung phone">
                        
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>RS 14500.00</p>
                            <h4>Samsung Phone</h4>
                        </div>
                    </a>
                </div> -->

                <!-- Single Catagory -->
                <!-- <div class="single-products-catagory clearfix">
                    <a href="">
                        <img src="img/product-img/macbook.jpg" alt="laptop">
                        
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Rs 165000.00</p>
                            <h4>iMac</h4>
                        </div>
                    </a>
                </div> -->

                <!-- Single Catagory -->
                <!-- <div class="single-products-catagory clearfix">
                    <a href="">
                        <img src="img/product-img/shoes.jpeg" alt="shoes">
                        
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Rs 7000</p>
                            <h4>Shoes</h4>
                        </div>
                    </a>
                </div> -->

                <!-- Single Catagory -->
                <!-- <div class="single-products-catagory clearfix">
                    <a href="">
                        <img src="img/product-img/apple-earpod.jpg" alt="earpod">
                        
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Rs 3000</p>
                            <h4>Earpod</h4>
                        </div>
                    </a>
                </div> -->

                <!-- Single Catagory -->
                <!-- <div class="single-products-catagory clearfix">
                    <a href="">
                        <img src="img/product-img/cap.jpg" alt="cap">
                        
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Rs 750</p>
                            <h4>Cap</h4>
                        </div>
                    </a>
                </div> -->

                <!-- Single Catagory -->
                <!-- <div class="single-products-catagory clearfix">
                    <a href="">
                        <img src="img/product-img/camera.jpg" alt="camera">
                        
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Rs 41000.00</p>
                            <h4>Camera</h4>
                        </div>
                    </a>
                </div> -->
            <!-- </div> -->
        </div>
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
</div>
    <?php include('footer.php'); ?>