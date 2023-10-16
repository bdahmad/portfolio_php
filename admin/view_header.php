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

$select = "SELECT * FROM tbl_user";
$query = mysqli_query($con, $select);


?>

<div class="main-content">
   <div class="section__content section__content--p30">
      <div class="container-fluid">

         <div class="row">
            <div class="col-md-12">
               <!-- DATA TABLE -->
               <h3 class="title-5 m-b-35">User Information</h3>
               <div class="table-data__tool">
                  <div class="table-data__tool-left">
                  </div>
                  <div class="table-data__tool-right">
                     <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="add_header.php">
                        <i class="zmdi zmdi-plus"></i>add user</a>

                  </div>
               </div>
               <div class="table-responsive table-responsive-data2">
                  <table class="table table-data2">
                     <thead>
                        <tr>

                           <th>name</th>
                           <th>email</th>
                           <th>description</th>
                           <th>logo name</th>
                           <th>image</th>
                           <th>cv</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                           <tr class="tr-shadow">

                              <td><?= $data['user_name']; ?></td>
                              <td>
                                 <?= $data['user_email']; ?>
                              </td>
                              <td><?= $data['user_description']; ?></td>
                              <td> <?= $data['logo_name']; ?></td>
                              <td><img height="40px" width="30px" src="uploads/img/<?= $data['user_image']; ?>" alt=""></td>
                              <td><?= $data['user_name']; ?></td>
                              <td>
                                 <div class="table-data-feature">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                       <i class="zmdi zmdi-mail-send"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                       <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                       <i class="zmdi zmdi-delete"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                       <i class="zmdi zmdi-more"></i>
                                    </button>
                                 </div>
                              </td>
                           </tr>
                        <?php
                        }
                        ?>



                     </tbody>
                  </table>
               </div>
               <!-- END DATA TABLE -->
            </div>
         </div>
      </div>
   </div>
</div>




<?php
get_admin_footer();
?>