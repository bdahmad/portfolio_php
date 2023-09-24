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
get_admin_sidebar();

if (!empty($_POST)) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $logo = $_POST['logo'];

    $insert = "INSERT INTO `tbl_hero`(`user_name`, `user_designation`, `main_logo`) VALUES ('$name','$designation','$logo')";
    if(!empty($name)){
        if(!empty($designation)){
            if(mysqli_query($con,$insert)){
                echo "add information successfully";
            }
            else{
                echo "Opps! Failed";
            }
        }else{
            echo "enter your designation";
        }
    }
    else{
        echo "enter your name";
    }
}
?>
<!-- END MENU SIDEBAR-->

<!-- MAIN CONTENT-->

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Edit Header Information
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="name" placeholder="Enter your Name" class="form-control">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="email-input" class=" form-control-label">Designation</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="email-input" name="designation" placeholder="Enter your Designation" class="form-control">

                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-input" class=" form-control-label">Logo</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-input" name="logo" class="form-control">
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
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