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
        


    <!-- MAIN CONTENT-->

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                    <!-- Table Start  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                All Messages
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">This messages Info Will Use In Frontend messages Section</h5>
                                <table class="table table-borderless table-striped table-earning table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <!-- <th>Messages</th> -->
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>

                                        <!-- find all messages data here  -->
                                        <?php

                                            $select_query = "SELECT * FROM messages  ORDER BY id DESC";
                                            $all_messages = mysqli_query($con, $select_query);

                                        ?>

                                    <tbody>   
                                        
                                        <?php 
                                        
                                            foreach ($all_messages as $key => $messages) {
                                        ?>

                                            <tr>
                                                <td><?= $key+1 ?></td>
                                                <td><?= $messages['name']?></td>
                                                <td><?= $messages['email']?></td>
                                                <!-- <td></td> -->
                                                <td><a href="show_messages.php?q=<?= $messages['id'] ?>" class="btn btn-info btn-sm">

                                                <?php
                                                    if($messages['status'] == 1){
                                                        echo "Unread";
                                                    }elseif($messages['status'] == 2){
                                                        echo "Read";
                                                    }else{
                                                        echo "Replayed";
                                                    }
                                                ?>
                                                </td>
                                                
                                                <td>
                                                    <a href="show_messages.php?q=<?= $messages['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                    <a href="delete_messages.php?q=<?= $messages['id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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