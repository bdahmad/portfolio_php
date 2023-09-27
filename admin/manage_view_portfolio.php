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
  <?php

$id = $_GET['v'];
$sel="SELECT * FROM portfolio WHERE port_id = $id";
$Q =mysqli_query($con , $sel);
$data=mysqli_fetch_assoc($Q);

?>
<!-- END MENU SIDEBAR-->


<!-- all portfolio insert operation here  -->
<div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                              <div class="card-header">
                                <div class="row">
                                    <div class="col-md-8 card_title_part">
                                        <i class="fab fa-gg-circle"></i>View portfolio Information
                                    </div>  
                                    <div class="col-md-4 card_button_part">
                                        <a href="all-user.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All portfolio</a>
                                    </div>  
                                </div>
                              </div>
                              <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <table class="table table-bordered table-striped table-hover custom_view_table">
                                          <tr>
                                            <td>Name</td>  
                                            <td>:</td>  
                                            <td><?= $data['port_name'];?></td>  
                                          </tr>
                                          <tr>
                                            <td>WorkDescription</td>  
                                            <td>:</td>  
                                            <td><?= $data['port_work_description'];?></td>  
                                          </tr>
                                          <tr>
                                            <td>LiveReview</td>  
                                            <td>:</td>  
                                            <td><?= $data['port_live_review'];?></td>  
                                          </tr>
                                          <tr>
                                            <td>GitLink</td>  
                                            <td>:</td>  
                                            <td><?= $data['port_git_link'];?></td>  
                                          </tr>
                                          
                                          <tr>
                                            <td>Photo</td>  
                                            <td>:</td>  
                                            <td>
                                            <?php
                                             if ($data['port_image'] != '') { ?>
                                                <img height="40" class="img200" src="uploads/<?= $data['port_image']; ?>" alt="user" />
                                              <?php } else { ?>
                            
                                                <img height="40" src="images/avatar.jpg" alt="avatar" />
                                              <?php } ?>
                                            </td>  
                                          </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="btn-group" role="group" aria-label="Button group">
                                  <button type="button" class="btn btn-sm btn-dark">Print</button>
                                  <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                                  <button type="button" class="btn btn-sm btn-dark">Excel</button>
                                </div>
                              </div>  
























<!-- footer area start-->
<?php

get_admin_footer();
?>
<!-- footer area end-->