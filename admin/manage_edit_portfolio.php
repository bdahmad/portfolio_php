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
<?php

$id = $_GET['e'];
$selupd = "SELECT * FROM `portfolio` WHERE port_id = $id ";
$Q = mysqli_query($con, $selupd);
$data = mysqli_fetch_assoc($Q);

?>


<!-- add portfolio insert operation here  -->
<?php
if (!empty($_POST)) {

  $name = $_POST['name'];
 
  $workDescription = $_POST['workDescription'];
  $liveReview = $_POST['liveReview'];
  $gitLink = $_POST['gitLink'];
  $image = $_FILES['image'];

//   $imageName = '';

//   if ($image['name'] != '') {
//     $imageName = 'user_' . time() . '_' . rand(100000, 1000000) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
//   }
//   $update = "UPDATE portfolio SET port_name=' $name', port_work_description='$workDescription',port_live_review='$liveReview',port_git_link='$gitLink' WHERE port_id='$id'";
  
//   if (!empty($name)) {

//     if (!empty($liveReview)) {
//       if (!empty($gitLink)) {

//         if (mysqli_query($con,$update)) {
//             if ($image['name'] != '') {
//                 $imageName = 'user_' . time() . '_' . rand(100000, 1000000) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
//                 $updimage = "UPDATE portfolio SET port_image='$image' WHERE port_id='$id'";
//                 if (mysqli_query($con, $updimage)) {
//                   move_uploaded_file($image['tmp_name'], 'uploads/' . $imageName);
//                 }
//                   header('Location:manage_view_portfolio.php?v=' . $id);
//                 } else {
//                   "User image update failed";
//                 }
              
//               header('Location:manage_view_portfolio.php?v=' . $id);


//         } else {
//           echo "User registration failed!";
//         }


//       } else {
//         echo "Please enter your gitLink.";
//       }

//     } else {
//       echo "Please write your liveReview.";
//     }


//   } else {
//     echo "Please enter your name.";
//   }



    $update_query = "UPDATE `portfolio` SET `port_name`='$name',`port_work_description`='$workDescription',`port_live_review`='$liveReview ',`port_git_link`='$gitLink' WHERE port_id = '$id'";

    if($image['name'] == ''){
        mysqli_query($con, $update_query);

        header('Location: manage_all.php');
        echo " Portfolio Updated Successfully ";

    }else{
        $imageName = 'portfolio_' . time() . '_' . rand(100000, 1000000) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);

        $update_query = "UPDATE `portfolio` SET `port_name`='$name',`port_work_description`='$workDescription',`port_live_review`='$liveReview ',`port_git_link`='$gitLink' ,`port_image`='$imageName' WHERE port_id = '$id'";

        mysqli_query($con, $update_query);
        move_uploaded_file($image['tmp_name'], 'uploads/' . $imageName);
        header('Location: manage_all_portfolio.php');
        echo " Portfolio Updated Successfully ";
        
    }

}
?>



<div class="row" style="margin-top:5rem;">
  <div class="col-md-12">
    <div class="card mb-3">

      <div class="card-header">
        <form action="" method="POST" enctype="multipart/form-data">
            
        <div class="row ">
          <div class="col-md-8 card_title_part">
            <i class="fab fa-gg-circle"></i>update portfolio informatin
          </div>
          <div class="col-md-4 card_button_part  " style="text-align:right;">
            <a href="manage_all_portfolio.php" class="btn btn-sm btn-dark "><i class="fas fa-plus-circle "></i>ALL PORTFOLIO
              </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row mb-3">
          <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" id="" name="name" value="<?= $data['port_name']?>">
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-3 col-form-label col_form_label">WorkDescription:</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" id="" name="workDescription" value="<?= $data['port_work_description']?>">
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-3 col-form-label col_form_label">LiveReview<span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" id="" name="liveReview" value="<?= $data['port_live_review']?>">
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-3 col-form-label col_form_label">GitLink<span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" id="" name="gitLink" value="<?= $data['port_git_link']?>">
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-3 col-form-label col_form_label ">Photo:</label>
          <div class="col-sm-4">
            <input type="file" class="form-control form_control" id="" name="image" >
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-3 col-form-label col_form_label "></label>
          <div class="col-sm-4">
            <img src="uploads/<?= $data['port_image']?>" style="width: 100px" alt="">
          </div>
        </div>
      </div>
      
    
      <div class="card-footer text-center">
        <button type="submit" class="btn btn-sm btn-dark">UPDATE</button>
      </div>
      </form>
    </div>
  </div>
</div>


























<!-- footer area start-->
<?php

get_admin_footer();
?>
<!-- footer area end-->


















