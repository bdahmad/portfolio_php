<!-- load function page and config page  -->
<?php
require_once('../functions/admin/adminFunction.php');

// header area start
get_admin_header();

// header area end

// MENU SIDEBAR
get_admin_sidebar();
// END MENU SIDEBAR

?>
<!-- MAIN CONTENT-->

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">  

            <!-- Table Start  -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-8 p-2" >
                                All Testimonial Details
                            </div>
                            <div class="col-4 p-2">
                                <a href="add_testimonial.php" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Add New</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">This Testimonial Info Will Use In Frontend Skills Section</h5>

                            <table class=" table table-borderless table-striped table-earning table-responsive">

                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Attestant Name</th>
                                        <th>Testimonial</th>
                                        <th>Attestant Image</th>
                                        <th>Designation</th>
                                        <th>Link</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <!-- find all testimonials data here  -->
                                <?php

                                $select_query = "SELECT * FROM `testimonial`";
                                $all_tml = mysqli_query($con, $select_query);

                                ?>

                                <tbody>

                                    <?php
                                    foreach ($all_tml as $key => $tmls) {
                                    ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= substr($tmls['tml_name'], 0, 10) ?>..</td>
                                            <td><?= substr($tmls['tml_text'], 0, 10) ?>..</td>
                                            <td>
                                                <?php
                                                if($tmls['tml_img']!=""){
                                                ?>
                                                    <img style="height: 100px; width: auto; " class="img200" src="../assets/admin/upload_testimonial/<?=$tmls['tml_img']; ?> " alt="pic">
                                                <?php }else{ ?>
                                                    <img style="height: 100px; width: auto; " class="img200" src="../assets/admin/upload_testimonial/avatar.jpg" alt="pic">

                                                <?php } ?>
                                            </td>                       
                                            <td><?= $tmls['tml_designation'];  ?>..</td>
                                            <td><?= substr($tmls['tml_ref_link'], 0, 10)  ?>..</td>
                                            <td>                                       
                                                <a href="edit_testimonial.php?q=<?= $tmls['tml_id']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="delete_testimonial.php?q=<?= $tmls['tml_id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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