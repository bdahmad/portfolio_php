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


<!-- all portfolio insert operation here  -->


<div class="row" style="margin-top:5rem;">
  <div class="col-md-12">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8 card_title_part ">
            <i class="fab fa-gg-circle"></i>All User Information
          </div>
          <div class="col-md-4 card_button_part">
            <a href="manage_add_portfolio.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add
              User</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped table-hover custom_table">
          <thead class="table-dark">
            <tr>

              <th>Name</th>
              <th>WorkDescription</th>
              <th>LiveReview</th>
              <th>GitLink</th>
              <th>Photo</th>
              <th>Manage</th>

            </tr>
          </thead>
          <tbody>

            <?php


            $sel = "SELECT * FROM portfolio   ORDER BY  port_id DESC";
            $Q = mysqli_query($con, $sel);
            while ($data = mysqli_fetch_assoc($Q)) {


              ?>
              <tr>

                <td>
                  <?= $data['port_name']; ?>
                </td>
                <td>
                  <?= $data['port_work_description']; ?>
                </td>
                <td>
                  <?= $data['port_live_review']; ?>
                </td>
                <td>
                  <?= $data['port_git_link']; ?>
                </td>

                <td>
                  <?php if ($data['port_image'] != '') { ?>
                    <img style="width: auto; height:100px;" class="img200" src="uploads/<?= $data['port_image']; ?>" alt="user" />
                  <?php } else { ?>

                    <img " style="width: auto; height:100px;" src="images/avatar.jpg" alt="avatar" />
                  <?php } ?>
                </td>
                <td>
                  <div class="btn-group btn_group_manage" role="group">
                    <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-toggle="dropdown"
                      aria-expanded="false">Manage</button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="manage_view_portfolio.php?v=<?=$data['port_id'];?>">View</a></li>
                      <li><a class="dropdown-item" href="manage_edit_portfolio.php?e=<?=$data['port_id'];?>">Edit</a></li>
                      <li><a class="dropdown-item" href="manage_delete_portfolio.php?d=<?=$data['port_id'];?>">Delete</a></li>
                    </ul>
                  </div>
                </td>
              </tr>

            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
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