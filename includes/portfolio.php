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


<section class="section" id="portfolio">
        <div class="container text-center">
            <p class="section-subtitle">What I Did ?</p>
            <h6 class="section-title mb-6">Portfolio</h6>
            <!-- row -->
            <div class="row">


                <?php
                
                    $select_query = "SELECT * FROM portfolio";

                    $add_data = mysqli_query($con, $select_query);

                
                ?>


                <?php 

                    foreach ($add_data as $key => $data) {
                    
                 ?>

                        <!-- start item  -->
                <div class="col-md-4">
                    <a href="<?= $data['port_live_review']?>" class="portfolio-card">
                        <img style="width: auto; height:300px;" src="admin/uploads/<?= $data['port_image']?>" class="portfolio-card-img "
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        <span class="portfolio-card-overlay">
                            <span class="portfolio-card-caption">
                                <h4><?= $data['port_name'] ?></h5>
                                    <p class="font-weight-normal"><?= $data['port_work_description']?></p>
                            </span>
                        </span>
                        <div class="btn-group " role="group" aria-label="Basic">

                       <a href="#"><button class=" btn btn-outline-primary mt-4">GitHub Link</button></a>
                       <a href="#"><button class=" btn btn-outline-primary mt-4">Live Link Link</button></a>
                          
                        </div>
                    </a>
                </div>
                <!-- end item  -->

                <?php

                    }
                
                
                ?>

            
                


            </div><!-- end of row -->
        </div><!-- end of container -->
    </section> 