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

<!-- find skils data here  -->
<?php

$id = $_GET['q'];

$select_query = "SELECT * FROM `skills` WHERE id = $id";
$skills_all_data = mysqli_query($con, $select_query);
$skill_data = mysqli_fetch_assoc($skills_all_data);


?>

<!-- skills update operation here  -->

<?php

if (!empty($_POST)) {

    $skill_name = $_POST['skill_name'];
    $skill_percentage = $_POST['skill_parcentage_view'];
    $skill_slug = str_replace(' ', '-', $skill_name);
    

    $update_query = "UPDATE `skills` SET `skill_name`='$skill_name',`skill_parcentage`='$skill_percentage' WHERE id = $id";

    if (!empty($skill_name)) {
        if (!empty($skill_percentage)) {

            // skills Update here 
            if (mysqli_query($con, $update_query)) {

                $skills_all_data = mysqli_query($con, $select_query);
                $skill_data = mysqli_fetch_assoc($skills_all_data);$skills_all_data = mysqli_query($con, $select_query);
                $skill_data = mysqli_fetch_assoc($skills_all_data);

            } else {
                echo "something is worng";
            }
        } else {
            echo "Skills Percentage Required";
        }
    } else {
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
                            <span>Add Skills</span>
                            <a href="manage_skills.php" class= "btn btn-info btn-sm">All Skills</a>

                        </div>
                        <div class="card-body">



                            <form action="" method="post">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="skill_name" class=" form-control-label">Skill Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="skill_name" name="skill_name" class="form-control" value="<?= $skill_data['skill_name'] ?>" required>
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
                                        <input type="text" id="skill_parcentage_view" name="skill_parcentage_view" class="form-control skill_parcentage_view" value="<?= $skill_data['skill_parcentage'] ?>" style="border: none;" required>
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm submit-skill" id="submit-skill">
                                        <i class="fa fa-dot-circle-o"></i> Update
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

        </div>
    </div>
</div>

<!-- END MAIN CONTENT-->

<!-- footer area star  -->


<?php

get_admin_footer();
?>