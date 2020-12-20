
<?php 
$con = mysqli_connect("localhost","root","","sale_site");
if (mysqli_connect_errno()) {
	echo "This connection was not esstablish" . mysqli_connect_errno();
}

function total_price(){
    global $con;

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


        }
    }

    echo "Rs " .$total.".00";
}

function totalCartItem(){
    global $con;
    $ip = getUserIpAddr();

    $run_items = mysqli_query($con,"select * from cart where ip_address='$ip' ");

    echo $count_items = mysqli_num_rows($run_items);
}

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function getcat(){
			global $con;
			$get_cat = "select * from catagories";
            $run_cat = mysqli_query($con, $get_cat);

            while ($row_cat=mysqli_fetch_array($run_cat)) {
                $cat_id = $row_cat['cat_id'];
                $cat_tit = $row_cat['cat_title'];

                echo "<li><a href='shop.php?cat=$cat_id'>$cat_tit</a></li>";
            }
 	}

 function getproduct(){
 				global $con;
                    if (!isset($_GET['cat'])) {
                        
                    
                    $get_pro = " select * from insert_product order by RAND() LIMIT 0,6";
                    
                    $run_pro = mysqli_query($con, $get_pro);
                    
                    while($row_pro = mysqli_fetch_array($run_pro)){
                        $pro_id = $row_pro['product_id'];
                        $pro_tit = $row_pro['product_name'];
                        $pro_pri = $row_pro['product_price'];
                        $pro_cat = $row_pro['product_categorie'];
                        $pro_img = $row_pro['product_img'];
                        
        
                    
                        echo "
                            
                    <div class='col-12 col-sm-6 col-md-12 col-xl-6'>
                        <div class='single-product-wrapper'>
                            <!-- Product Image -->
                            <div class='product-img'>
                                <img src='imgup/$pro_img' alt=''>
                                <!-- Hover Thumb -->
                                <img class='hover-img' src='imgup/$pro_img' alt=''>
                            </div>

                            <!-- Product Description -->
                            <div class='product-description d-flex align-items-center justify-content-between'>
                                <!-- Product Meta Data -->
                                <div class='product-meta-data'>
                                    <div class='line'></div>
                                    <p class='product-price'>$pro_pri</p>
                                    <a href='product_detail.php?pro_id=$pro_id'>
                                        <h6>$pro_tit</h6>
                                    </a>
                                </div>
                                <!-- Ratings & Cart -->
                                <div class='ratings-cart text-right'>
                                    <div class='ratings'>
                                        <i class='fa fa-star' aria-hidden='true'></i>
                                        <i class='fa fa-star' aria-hidden='true'></i>
                                        <i class='fa fa-star' aria-hidden='true'></i>
                                        <i class='fa fa-star' aria-hidden='true'></i>
                                        <i class='fa fa-star' aria-hidden='true'></i>
                                    </div>
                                    <div class='cart'>
                                        <a href='shop.php?add_cart=$pro_id' data-toggle='tooltip' data-placement='left' title='Add to Cart'><img src='img/core-img/cart.png' alt=''></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        ";
                        
                    }
                    }
 }

 function getProductCategorieId(){
 							global $con;
 							if (isset($_GET['cat'])) {
                                $cat_id = $_GET['cat'];
                                
                                $get_cat_pro = "select * from insert_product where product_categorie='$cat_id' ";
                                $run_cat_pro = mysqli_query($con, $get_cat_pro);
                                $count_cat = mysqli_num_rows($run_cat_pro);
                                if ($count_cat == 0) {
                                    echo " <h6 style='padding:20px;'>No product where found in this category!!</h6>";
                                }

                                while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
                                    $pro_id = $row_cat_pro['product_id'];
                                    $pro_tit = $row_cat_pro['product_name'];
                                    $pro_pri = $row_cat_pro['product_price'];
                                    $pro_cat = $row_cat_pro['product_categorie'];
                                    $pro_img = $row_cat_pro['product_img'];

                                    echo "

                                    <div class='col-12 col-sm-6 col-md-12 col-xl-6'>
                        <div class='single-product-wrapper'>
                            <!-- Product Image -->
                            <a href='product_detail.php?pro_id=$pro_id'>
                            <div class='product-img'>
                                <img src='imgup/$pro_img' alt=''>
                                <!-- Hover Thumb -->
                                <img class='hover-img' src='imgup/$pro_img' alt=''>
                            </div>
                            </a>
                            <!-- Product Description -->
                            <div class='product-description d-flex align-items-center justify-content-between'>
                                <!-- Product Meta Data -->
                                <div class='product-meta-data'>
                                    <div class='line'></div>
                                    <p class='product-price'>$pro_pri</p>
                                    <a href='product_detail.php?pro_id=$pro_id'>
                                        <h6>$pro_tit</h6>
                                    </a>
                                </div>
                                <!-- Ratings & Cart -->
                                <div class='ratings-cart text-right'>
                                    <div class='ratings'>
                                        <i class='fa fa-star' aria-hidden='true'></i>
                                        <i class='fa fa-star' aria-hidden='true'></i>
                                        <i class='fa fa-star' aria-hidden='true'></i>
                                        <i class='fa fa-star' aria-hidden='true'></i>
                                        <i class='fa fa-star' aria-hidden='true'></i>
                                    </div>
                                    <div class='cart'>
                                        <a href='shop.php?add_cart=$pro_id' data-toggle='tooltip' data-placement='left' title='Add to Cart'><img src='img/core-img/cart.png' alt=''></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                                    ";
                                }
                            }
 }

 function getcatname(){
                        
                        global $con;
                            if (isset($_GET['cat'])) {
                                $cat_id = $_GET['cat'];
                                
                                $get_cat_tit = "select cat_title from catagories where cat_id='$cat_id'";
                                $run_cat_tit = mysqli_query($con, $get_cat_tit);
                                

                                while ($row_cat_tit = mysqli_fetch_array($run_cat_tit)) {
                                    
                                    
                                    $pro_cat = $row_cat_tit['cat_title'];
                                    
                                    echo "
                                    <div class='col-12'>
                                    <div class='product-topbar d-xl-flex align-items-end justify-content-between'>
                                    <!-- Total Products -->
                                    <div class='total-products'>
                                    <h1>$pro_cat</h1>
                                    </div>
                                    </div>
                                    </div>
                                    ";
                                 }
                            }
 }


 function getproductDetail(){
                            global $con;
                            if (isset($_GET['pro_id'])) {
                                $pro_id = $_GET['pro_id'];
                                
                                $get_pro_det = "select * from insert_product where product_id='$pro_id' ";
                                $run_pro_det = mysqli_query($con, $get_pro_det);
                                // $count_cat = mysqli_num_rows($run_cat_pro);
                                // if ($count_cat == 0) {
                                //     echo " <h6 style='padding:20px;'>No product where found in this category!!</h6>";
                                // }

                                while ($row_pro_det = mysqli_fetch_array($run_pro_det)) {
                                    $pro_id = $row_pro_det['product_id'];
                                    $pro_tit = $row_pro_det['product_name'];
                                    $pro_pri = $row_pro_det['product_price'];
                                    $pro_cat = $row_pro_det['product_categorie'];
                                    $pro_img = $row_pro_det['product_img'];
                                    $pro_com = $row_pro_det['product_comment'];

                                    echo "
                    <div class='col-12 col-lg-7'>
                        <div class='single_product_thumb'>
                            <div id='product_details_slider' class='carousel slide' data-ride='carousel'>
                                
                                <div class='carousel-inner'>
                                    <div class='carousel-item active'>
                                        <a class='gallery_img' href='imgup/$pro_img'>
                                            <img class='d-block w-100' src='imgup/$pro_img' alt='$pro_tit'>
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-lg-5'>
                        <div class='single_product_desc'>
                            <!-- Product Meta Data -->
                            <div class='product-meta-data'>
                                <div class='line'></div>
                                <p class='product-price'>$pro_tit</p>
                                
                                    <h6>$pro_pri</h6>
                               
                               
                                <!-- Avaiable -->
                                <p class='avaibility'><i class='fa fa-circle'></i> In Stock</p>
                            </div>

                            <div class='short_overview my-5'>
                                <p>$pro_com</p>
                            </div>
                            <!-- Add to Cart Form -->
                                <a href='product_detail.php?add_cart=$pro_id'>
                                    <button type='submit' name='addtocart' value='5' class='btn amado-btn'>Add to cart</button>
                                </a>
                            

                        </div>
                    </div>
                                    ";
                                }
                            }
 }



 function searcharesult(){

                    global $con;
                            if (isset($_GET['search'])) {

                                $search_query = $_GET['user_query'];
                                
                                
                                $get_pro_det = "select * from insert_product where product_name like '%$search_query%' ";
                                $run_pro_det = mysqli_query($con, $get_pro_det);
                                

                                while ($row_pro_det = mysqli_fetch_array($run_pro_det)) {
                                    $pro_id = $row_pro_det['product_id'];
                                    $pro_tit = $row_pro_det['product_name'];
                                    $pro_pri = $row_pro_det['product_price'];
                                    // $pro_cat = $row_pro_det['product_categorie'];
                                    $pro_img = $row_pro_det['product_img'];
                                    // $pro_com = $row_pro_det['product_comment'];
        
                    
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
                 }   
 }

 function cartdetail(){
                        global $con;
                        if (isset($_GET['add_cart'])) {
                        
                        $product_id = $_GET['add_cart'];

                        $ip = getUserIpAddr();

                        $run_check_pro = mysqli_query($con, "select * from cart where product_id='$product_id'");

                        if (mysqli_num_rows($run_check_pro) > 0) {
                            echo "";
                        }else{

                            $fetch_pro = mysqli_query($con, "select * from insert_product where product_id='$product_id'");

                            $fetch_pro = mysqli_fetch_array($fetch_pro);

                            $pro_title = $fetch_pro['product_name'];

                            $run_insert_pro = mysqli_query($con, "insert into cart (product_id,product_name,ip_address) values ('$product_id','$pro_title','$ip')");
                        
                    
                            echo "<script>window.open('shop.php','_self')</script>";

                        }
                    }
 }
 ?>
