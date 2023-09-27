<!-- load function page and config page  -->
<?php
ob_start();
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
        
<!-- find old data here  -->
<?php
                                        
    $id = $_GET['q'];

    $select_query = "SELECT * FROM Pricing WHERE id = '$id' ";
    $datas = mysqli_query($con, $select_query);
    $data = mysqli_fetch_assoc($datas);
    
?>



<!-- Pricing insert operation here  -->

<?php

   if(!empty($_POST)){
   

    // find add data 
        $packeg_title = $_POST['packeg_title'];
        $packeg_type = $_POST['packeg_type'];
        $packeg_price = $_POST['packeg_price'];
        $packeg_descriptions = $_POST['packeg_descriptions'];
        $packeg_icon = $_FILES['packeg_icon'];

        // Update query here 
        $update_query = "UPDATE `pricing` SET `packeg_title`='$packeg_title',`packeg_type`='$packeg_type',`packeg_price`='$packeg_price',`packeg_descriptions`='$packeg_descriptions' WHERE `id` = '$id' ";

        if(!empty($packeg_title)){
            if(!empty($packeg_type)){
                if(!empty($packeg_price)){
                    if(!empty($packeg_descriptions)){

                        // check image is update 
                        if(!empty($packeg_icon['name'])){

                              // process packeg icon img 
                              $packeg_icon_custome_name = rand().".".pathinfo($packeg_icon['name'],PATHINFO_EXTENSION);

                              // update in database 
                              $img_update_query = "UPDATE `pricing` SET `packeg_icon`='$packeg_icon_custome_name' WHERE id = '$id' ";

                              mysqli_query($con, $img_update_query);

                              // img file move in folder 
                              move_uploaded_file($packeg_icon['tmp_name'],'uploads/packeg/'.$packeg_icon_custome_name);

                              echo "Packeg Updated Successfully";
                              header('Location: manage_price.php');
                        }else{

                            mysqli_query($con, $update_query);
                            echo "Packeg Updated Successfully";
                            header('Location: manage_price.php');
                        }     
                      
                    }else{
                        echo "Packeg Description Required";
                    }
                }else{
                    echo "Packeg price Required";
                }
            }else{
                echo "Packeg Type Required";
            }
        }else{
            echo "Packeg Name Required";
            
        }
   }

?>




    <!-- MAIN CONTENT-->

    <div class="main-content">
       
        <div class="section__content section__content--p30">
            <div class="container-fluid">

            
            <div class="row">
                <div class="col-md-10 ">
                    <div class="card">
                        <div class="card-header">
                            Add Packeg
                            <a class="btn btn-info" type="button" href="manage_price.php">All Package</a>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="packeg_title" class=" form-control-label">Packeg Title</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="packeg_title" name="packeg_title" class="form-control" value="<?= $data['packeg_title']?>" required>
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="packeg_type" class=" form-control-label">Packeg Type</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="packeg_type" name="packeg_type" class="form-control" value="<?= $data['packeg_type']?>" required>
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="packeg_price" class=" form-control-label">Packeg Price</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="packeg_price" name="packeg_price" class="form-control" value="<?= $data['packeg_price']?>" required>
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="packeg_descriptions" class=" form-control-label">Packeg Descriptions</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <!-- <input type="text" id="packeg_descriptions" name="packeg_descriptions" class="form-control" required> -->
                                        <textarea name="packeg_descriptions" id="packeg_descriptions" cols="30" rows="10"><?= $data['packeg_descriptions']?>

                                        </textarea>
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="packeg_icon" class=" form-control-label">Packeg Icon</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="packeg_icon" name="packeg_icon" class="form-control" >
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="packeg_icon" class=" form-control-label"></label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <img src="uploads/packeg/<?= $data['packeg_icon']?>" style="width: 100px;" alt="">
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                </div>
                            

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm submit-packeg" id="submit-packeg">
                                        <i class="fa fa-dot-circle-o"></i> Update
                                    </button>

                                    <button type="reset reset-packeg" class="btn btn-danger btn-sm" id="reset-packeg">
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