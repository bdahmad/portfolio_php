<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "portfolio_php";
 
    $con = mysqli_connect($host,$username,$password,$database);
   $select = "SELECT * FROM tbl_user";
   $query = mysqli_query($con, $select);
   $data = mysqli_fetch_assoc($query);
?>

<section class="section pt-0" id="about">
        <!-- container -->
        <div class="container text-center">
            <!-- about wrapper -->
            <div class="about">
                <div class="about-img-holder">
                    <img src="admin/uploads/img/<?= $data['user_image'];?>" class="about-img"
                        alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                </div>
                <div class="about-caption">
                    <p class="section-subtitle">Who Am I ?</p>
                    <h2 class="section-title mb-3">About Me</h2>
                    <p>
                    <?= $data['user_description'];?>
                    </p>
                    <a href="admin/uploads/cv/<?= $data['user_cv'];?>" class="btn-rounded btn btn-outline-primary mt-4">Download CV</a>
                </div>
            </div><!-- end of about wrapper -->
        </div><!-- end of container -->
    </section> 