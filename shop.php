<?php include('header.php'); ?>

        <!-- Product Catagories Area Start -->
        <?php include('product.php'); ?>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">

                <div class="row">
                    <?php getcatname(); ?>
                    
                </div>
            </div>

                <div class="row">


                    <?php cartdetail(); ?>




                    <!-- Single Product Area -->

                    <?php if(!isset($_GET['action'])) {?>

                    <?php getproduct(); ?>

                    <?php getProductCategorieId(); ?>

                <?php }else{ ?>
                    <?php include('login.php'); ?>
                <?php } ?>

                </div>

<!--
                <div class="row">
                    <div class="col-12">
                         Pagination 
                        <nav aria-label="navigation">
                            <ul class="pagination justify-content-end mt-50">
                                <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                                <li class="page-item"><a class="page-link" href="#">02.</a></li>
                                <li class="page-item"><a class="page-link" href="#">03.</a></li>
                                <li class="page-item"><a class="page-link" href="#">04.</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
-->
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
 

    <?php include('footer.php'); ?>