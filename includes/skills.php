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




<section class="section" id="service">
        <div class="container text-center">
            <p class="section-subtitle">My Skills </p>
            <h6 class="section-title mb-6">Skills</h6>
            <!-- row -->
            <div class="row">

                <div class="col-md-6 col-lg-6">
                    <div class="service-card">
                        <div class="body">

                             <!-- find all skills data here  -->
                             <?php

                                $select_query = "SELECT * FROM skills ORDER BY id ASC LIMIT 4";
                                $all_skills = mysqli_query($con, $select_query);
                            ?>
                            <?php
                                foreach ($all_skills as $key => $skill) {
                                
                                ?>
                                    <!-- skills item here  -->
                                    <div class="skill_item m-3 py-3">
                                        <div class="skills-title-block d-flex justify-content-between item-center text-center">
                                            <span class="skill_title" ><?= $skill['skill_name']?></span>
                                            <span class="skill_percentage"><?= $skill['skill_parcentage']?></span>
                                        </div>
                                        <div class="progress" style="height: 5px;" role="progressbar" aria-label="Example with label" aria-valuenow="<?= $skill['skill_parcentage']?>" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: <?= $skill['skill_parcentage']?>%"></div>
                                        </div>
                                    </div>
                                    <!-- end skills item here  -->
                                <?php
                                }
                            ?>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="service-card">
                        <div class="body">

                           <!-- find all skills data here  -->
                           <?php

                            $select_query = "SELECT * FROM skills ORDER BY id DESC LIMIT 4";
                            $all_skills = mysqli_query($con, $select_query);
                            ?>
                            <?php
                            foreach ($all_skills as $key => $skill) {

                            ?>
                                <!-- skills item here  -->
                                <div class="skill_item m-3 py-3">
                                    <div class="skills-title-block d-flex justify-content-between item-center text-center">
                                        <span class="skill_title" ><?= $skill['skill_name']?></span>
                                        <span class="skill_percentage"><?= $skill['skill_parcentage']?></span>
                                    </div>
                                    <div class="progress" style="height: 5px;" role="progressbar" aria-label="Example with label" aria-valuenow="<?= $skill['skill_parcentage']?>" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: <?= $skill['skill_parcentage']?>%"></div>
                                    </div>
                                </div>
                                <!-- end skills item here  -->
                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>

            </div><!-- end of row -->
        </div>
    </section>