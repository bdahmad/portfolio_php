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

    $id = $_GET['q'];

    $select_query = "SELECT * FROM `messages` WHERE id ='$id'";
    $all_data = mysqli_query($con, $select_query);
    $message = mysqli_fetch_assoc($all_data);

    // update status here 

    $update_query = "UPDATE `messages` SET `status`='2' WHERE id = '$id' ";

    mysqli_query($con, $update_query);
?>

        
 <!-- find  messages data here  -->


    <!-- MAIN CONTENT-->

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                    <!-- Table Start  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-header">

                                Message Info 
                                <a href="all_messages.php" class="btn btn-info btn-sm">All Messages</a>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="name" class=" form-control-label"> Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <label for="name" class=" form-control-label"><?= $message['name']?></label>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email" class=" form-control-label"> Email</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <label for="email" class=" form-control-label"><?= $message['email']?></label>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="message" class=" form-control-label"> Message</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <label for="message" class=" form-control-label"><?= $message['message']?></label>
                                        </div>
                                    </div>
                                    

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm submit-" id="submit-">
                                            <i class="fa fa-dot-circle-o"></i> Replay
                                        </button>
                                         <a href="delete_messages.php?q=<?= $message['id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Delete</a>
                                            
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