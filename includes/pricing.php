<!-- database connection here   -->
<?php


    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "portfolio_php";
 
    $con = mysqli_connect($host,$username,$password,$database);
 
    if(!$con){
       echo "Database connection failed.";
    }
 
?>



<section class="section" id="pricing">
        <div class="container text-center">
            <p class="section-subtitle">How Much I Charge ?</p>
            <h6 class="section-title mb-6">My Pricing</h6>
            <!-- row -->
            <div class="pricing-wrapper">

            <!-- find all data  -->

                <?php
                
                    $select_query = "SELECT * FROM pricing";

                    $all_data = mysqli_query($con, $select_query);

                ?>

                <?php

                    foreach ($all_data as $key => $data) {
                ?>

                    <!-- start packeg item  -->
                    <div class="pricing-card">
                        <div class="pricing-card-header">
                            <img class="pricing-card-icon" src="admin/uploads/packeg/<?= $data['packeg_icon']?>"
                                alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        </div>
                        <div class="pricing-card-body">
                            <h6 class="pricing-card-title"><?= $data['packeg_title']?></h6>
                            <h4 class=""><?= $data['packeg_type']?></h4>
                            <div class="pricing-card-list">
                                <?= $data['packeg_descriptions']?>
                            </div>
                        </div>
                        <div class="pricing-card-footer">
                            <span>$</span>
                            <span><?= $data['packeg_price']?>/Month</span>
                        </div>
                        <a href="#contact" class="btn btn-primary mt-3 pricing-card-btn">Contact</a>
                    </div>
                    <!-- end package item  -->
                    
                <?php
                    }

                ?>

            </div><!-- end of pricing wrapper -->
        </div> <!-- end of container -->
    </section>