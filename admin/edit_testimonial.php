<!-- load function page and config page  -->
<?php
require_once('../functions/admin/adminFunction.php');

// header area start
get_admin_header();
// header area end

// MENU SIDEBAR
get_admin_sidebar();
// END MENU SIDEBAR
$id = $_GET['q'];
$sele = "SELECT * FROM testimonial WHERE tml_id='$id'";
$Q = mysqli_query($con, $sele);
$data = mysqli_fetch_assoc($Q);
?>
<br>
<br>
<hr>

<?php
// Testimonial Update operation                                                                                                                                                                                                                                          n here 
if (!empty($_POST)) {

    $tml_name = $_POST['tml_name'];
    $tml_text = $_POST['tml_text'];
    $tml_img = $_FILES['tml_img'];
    $tml_designation = $_POST['tml_designation'];
    $tml_ref_link = $_POST['tml_ref_link'];

    // if($tml_img['name']!=""){
    //     $testName='tml_'.time().'_'.rand(1000,10000000).'.'.pathinfo($tml_img['name'],PATHINFO_EXTENSION);
    // }

    $update_query = "UPDATE `testimonial` SET tml_name='$tml_name', tml_text='$tml_text',tml_designation='$tml_designation',tml_ref_link='$tml_ref_link' WHERE tml_id='$id'";
                



    if (!empty($tml_name)) {
        if (!empty($tml_text)) {
            if (!empty($tml_designation)) {
                // testimonial insert here 
                if (mysqli_query($con, $update_query)) {
                    // move_uploaded_file($tml_img['tmp_name'],'../assets/admin/upload_testimonial/'.$testName);
                    // echo "Testimonial updated Successfully";
                
                } else {
                    echo "Opps!! Testimonial add Faild";
                }
            }else{
                echo "Testimonial Designation Required";
            }
        } else {
            echo "Testimonial Text Required";
        }
    } else {
        echo "Testimonial Name Required";
    }
}
?>


<!-- MAIN CONTENT-->

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            View Testimonial Information
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Attestant Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="tml_name" placeholder="Enter Name" class="form-control" value="<?= $data['tml_name'] ?>">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Testimonial Text</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="tml_text" placeholder="Enter text here" class="form-control" value="<?= $data['tml_text'] ?>">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Link</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="tml_ref_link" placeholder="Enter Link" class="form-control" value="<?= $data['tml_ref_link'] ?>">

                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="email-input" class=" form-control-label">Designation</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="designation-input" name="tml_designation" placeholder="Enter Designation" class="form-control" >

                                    </div>
                                    
                                </div>
                     


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-input" class=" form-control-label">Image</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-input" name="tml_img" class="form-control" value="<?= $data['tml_img'] ?>">
                                    </div>
                                    <div class="col-md-5 offset-5 m-2">
                                    <?php
                                                if($data['tml_img']!=""){
                                                ?>
                                                    <img height="40"  src="../assets/admin/upload_testimonial/<?=$data['tml_img']; ?> " alt="pic">
                                                <?php }else{ ?>
                                                    <img height="40"  src="../assets/admin/upload_testimonial/avatar.jpg" alt="pic">

                                                <?php } ?>
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