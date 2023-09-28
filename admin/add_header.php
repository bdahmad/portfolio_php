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
                            Add Header Information
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
                                        <label for="text-input" class=" form-control-label">Email</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="email" id="text-input" name="email" placeholder="Enter your Email" class="form-control">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Password</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="password" id="text-input" name="password" placeholder="Enter your Password" class="form-control">

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
                                        <label for="logo-input" class=" form-control-label">Logo Text</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="logo-input" name="logo" placeholder="Enter your Logo Text" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="discrip-input" class=" form-control-label">Description</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="discrip-input" name="discription" placeholder="Enter your Description" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="img-input" class=" form-control-label">Image</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="img-input" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="cv-input" class=" form-control-label">CV</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="cv-input" name="cv" class="form-control">
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
if (!empty($_POST)) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $logo = $_POST['logo'];
    $discription = $_POST['discription'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_FILES['image'];
    $cv = $_FILES['cv'];

    $imageName = '';
    $cvName = '';

    if ($image['name'] != '') {
        $imageName = "user_img_" . time() . "_" . rand(10000, 1000000) . "." . pathinfo($image['name'], PATHINFO_EXTENSION);
    }
    if ($cv['name'] != '') {
        $cvName = "user_cv_" . time() . "_" . rand(10000, 1000000) . "." . pathinfo($cv['name'], PATHINFO_EXTENSION);
    }

    $insert = "INSERT INTO `tbl_user`(`user_name`,`user_email`,`password`,`logo_name`, `user_designation`, `user_cv`, `user_image`, `user_description`) 
    VALUES ('$name','$email','$password','$logo','$designation','$cvName','$imageName','$discription')";
    if (!empty($name)) {
        if (!empty($email)) {
            if (!empty($password)) {
                if (!empty($designation)) {
                    if (!empty($logo)) {
                        if (!empty($discription)) {
                            if (mysqli_query($con, $insert)) {
                                move_uploaded_file($image['tmp_name'], 'uploads/img/' . $imageName);
                                move_uploaded_file($cv['tmp_name'], 'uploads/cv/' . $cvName);
                                echo "registration successful.";
                            } else {
                                echo "Opps! Insert failed.";
                            }
                        } else {
                            echo "please enter your description.";
                        }
                    } else {
                        echo "please enter your logo text.";
                    }
                } else {
                    echo "please enter your designation.";
                }
            } else {
                echo "please enter your password.";
            }
        } else {
            echo "please enter your email address.";
        }
    } else {
        echo "please enter your name.";
    }
}
get_admin_footer();
?>