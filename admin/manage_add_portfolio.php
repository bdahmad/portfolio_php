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


<!-- add portfolio insert operation here  -->
<?php
if (!empty($_POST)) {

  $name = $_POST['name'];
 
  $workDescription = $_POST['workDescription'];
  $liveReview = $_POST['liveReview'];
  $gitLink = $_POST['gitLink'];
  $image = $_FILES['image'];

  $imageName = '';

  if ($image['name'] != '') {
    $imageName = 'portfolio_' . time() . '_' . rand(100000, 1000000) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
    // $imageName = 'portfolio'.'_'.time() . '_' . rand(100000, 1000000) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
  }

  $insert = "INSERT INTO `portfolio`(`port_name`, `port_work_description`, `port_live_review`, `port_git_link`,`port_image`) 
  VALUES ('$name','$workDescription','$liveReview', '$gitLink','$imageName')";
  if (!empty($workDescription)) {
  if (!empty($name)) {

    if (!empty($liveReview)) {
      if (!empty($gitLink)) {
        
        if (mysqli_query($con, $insert)) {
          move_uploaded_file($image['tmp_name'], 'uploads/' . $imageName);
          echo "User registration successfully.";

        } else {
          echo "User registration failed!";
        }


      } else {
        echo "Please enter your gitLink.";
      }

    } else {
      echo "Please write your liveReview.";
    }
    } else {
      echo "Please write your Portfolio Descrioption.";
    }


  } else {
    echo "Please enter your name.";
  }

}


?>



<div class="row" style="margin-top:5rem;">
  <div class="col-md-12">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row ">
          <div class="col-md-8 card_title_part">
            <i class="fab fa-gg-circle"></i>Add User Information
          </div>
          <div class="col-md-4 card_button_part  " style="text-align:right;">
            <a href="manage_all_portfolio.php" class="btn btn-sm btn-dark "><i class="fas fa-plus-circle "></i>All
              Manage portfolio</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="name">
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">WorkDescription:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="workDescription">
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">LiveReview<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="liveReview">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">GitLink<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="gitLink">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label ">Photo:</label>
            <div class="col-sm-4">
              <input type="file" class="form-control form_control" id="" name="image">
            </div>
          </div>
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-sm btn-dark">REGISTRATION</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


























<!-- footer area start-->
<?php

get_admin_footer();
?>
<!-- footer area end-->