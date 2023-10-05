<!-- database connection here   -->
<?php


$host = "localhost";
$username = "root";
$password = "";
$database = "portfolio_php";

$con = mysqli_connect($host, $username, $password, $database);

if (!$con) {
    echo "Database connection failed.";
}

?>

<section class="section" id="testmonial">
    <div class="container text-center">
        <p class="section-subtitle">What Think Client About Me ?</p>
        <h6 class="section-title mb-6">Testmonial</h6>
        <?php
        $select_query = "SELECT * FROM `testimonial`";
        $all_tml = mysqli_query($con, $select_query);

        ?>

        <!-- row -->
        <div class="row">
            <?php
            foreach ($all_tml as $key => $tmls) {
            ?>
                <div class="col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-card-img-holder">
                            <?php if($tmls['tml_img']!=""){?>
                                <img src="./assets/admin/upload_testimonial/<?=$tmls['tml_img']; ?>" class="testimonial-card-img" alt="Image">
                            <?php } else{ ?>
                                <img src="./assets/admin/upload_testimonial/avatar.jpg" class="testimonial-card-img" alt="Image">

                                <?php } ?>
                        </div>
                            <div class="testimonial-card-body">
                                <p class="testimonial-card-subtitle"><?php echo $tmls['tml_text']; ?></p>
                                <h6 class="testimonial-card-title"><?php echo $tmls['tml_name']; ?></h6>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            
            

        </div> <!-- end of container -->
</section>