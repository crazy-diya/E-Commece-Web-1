<?php include('db.php'); ?>

<div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Catagories</h6>

                <!--  Catagories  -->
                <div class="catagories-menu">
                    <ul>
                       <!--  <li class="active"><a href="shop_electronic.php">Electronic</a></li>
                        <li><a href="shop_vehicles.php">Vehicles</a></li>
                        <li><a href="shop_lands.php">Lands</a></li>
                        <li><a href="shop_wears.php">Wears</a></li>
                        <li><a href="shop_furniture.php">Furnitures</a></li>
                        <li><a href="shop_kidtoys.php">Kids Toys</a></li>
                        <li><a href="shop_others.php">Others</a></li> -->

                        <?php 
                        // $get_cat = "select * from catagories";
                        // $run_cat = mysqli_query($con, $get_cat);

                        // while ($row_cat=mysqli_fetch_array($run_cat)) {
                        //     $cat_id = $row_cat['cat_id'];
                        //     $cat_title = $row_cat['cat_title'];

                        //     echo "<li><a href='shop_others.php?cat=$cat_id'>$cat_title</a></li>";
                        // }
                        getcat();
                         ?>

                    </ul>
                </div>
            </div>

            
            
        </div>