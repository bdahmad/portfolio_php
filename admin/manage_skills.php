<!-- load function page and config page  -->
<?php
    require_once('../functions/admin/adminFunction.php');
?>

<!-- header area start-->
<?php
    get_admin_header();

?>  
<!-- header area end-->


<!-- MENU SIDEBAR-->
<?php    
    get_admin_sidebar()
?>
<!-- END MENU SIDEBAR-->
        

<!-- skills insert operation here  -->

<?php

   if(!empty($_POST)){

        $skill_name = $_POST['skill_name'];
        $skill_percentage = $_POST['skill_parcentage_view'];
   


        $insert_query = "INSERT INTO `skills`(`skill_name`, `skill_parcentage`) VALUES ('$skill_name','$skill_percentage')";

        if(!empty($skill_name)){
            if(!empty($skill_percentage)){

                // skills insert here 
                if( mysqli_query($con, $insert_query) ){
                    echo "skills Added Successfully";
                }else{
                    echo "something is worng";
                }

            }else{
                echo "Skills Percentage Required";
            }
        }else{
            echo "Skills Name Required";
            
        }
   }

?>




    <!-- MAIN CONTENT-->

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <!-- skill input here  -->
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="card">
                            <div class="card-header">
                                Add Skills
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="skill_name" class=" form-control-label">Skill Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="skill_name" name="skill_name" class="form-control" required>
                                            <!-- <small class="form-text text-muted">This is a help text</small> -->
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="skill_parcentage" class=" form-control-label">Skill Parcentage</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                        <input type="range" class="form-range skill_parcentage w-100" min="0" max="100" id="skill_parcentage" name="skill_parcentage" required>
                                            <!-- <small class="form-text text-muted">This is a help text</small> -->
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="skill_parcentage_view" class=" form-control-label"> </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                        <input type="text" id="skill_parcentage_view" name="skill_parcentage_view" class="form-control skill_parcentage_view" value="50" style="border: none;" required>
                                            <!-- <small class="form-text text-muted">This is a help text</small> -->
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm submit-skill" id="submit-skill">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset reset-skill" class="btn btn-danger btn-sm" id="reset-skill">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                

                <!-- all skills here  -->


                    <!-- Table Start  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                All Skills Info
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">This Skills Info Will Use In Frontend Skills Section</h5>
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Skills Name</th>
                                            <th>Skills Percentage</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>

                                        <!-- find all skills data here  -->
                                        <?php

                                            $select_query = "SELECT * FROM skills";
                                            $all_skills = mysqli_query($con, $select_query);

                                        ?>

                                    <tbody>   
                                        
                                        <?php 
                                        
                                            foreach ($all_skills as $key => $skills) {
                                        ?>

                                            <tr>
                                                <td><?= $key+1 ?></td>
                                                <td><?= $skills['skill_name']?></td>
                                                <td><?= $skills['skill_parcentage']?></td>
                                                
                                                <td>
                                                    <a href="edit_skill.php?q=<?= $skills['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a href="delete_skill.php?q=<?= $skills['id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- END MAIN CONTENT-->

<!-- footer area star  -->


<?php

   get_admin_footer();
?>