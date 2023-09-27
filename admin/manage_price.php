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

$select_query =  "SELECT * FROM Pricing";

$all_data = mysqli_query($con, $select_query);
$number_of_package = $all_data->num_rows;

?>

<!-- skills insert operation here  -->

<?php

if (!empty($_POST)) {


    // find add data 
    $packeg_title = $_POST['packeg_title'];
    $packeg_type = $_POST['packeg_type'];
    $packeg_price = $_POST['packeg_price'];
    $packeg_descriptions = $_POST['packeg_descriptions'];
    $packeg_icon = $_FILES['packeg_icon'];



    // process packeg icon img 
    $packeg_icon_custome_name = rand() . "." . pathinfo($packeg_icon['name'], PATHINFO_EXTENSION);


    // insert query here 
    $insert_query = "INSERT INTO `pricing`(`packeg_title`, `packeg_type`, `packeg_price`,`packeg_descriptions`,`packeg_icon`) VALUES ('$packeg_title','$packeg_type','$packeg_price','$packeg_descriptions','$packeg_icon_custome_name')";

    if (!empty($packeg_title)) {
        if (!empty($packeg_type)) {
            if (!empty($packeg_price)) {
                if (!empty($packeg_descriptions)) {
                    if (!empty($packeg_icon)) {

                        // packeg insrt here     
                        if (mysqli_query($con, $insert_query)) {

                            // img file move in folder 

                            move_uploaded_file($packeg_icon['tmp_name'], 'uploads/packeg/' . $packeg_icon_custome_name);

                            echo "Packeg Added Successfully";
                        } else {
                            echo "something is worng";
                        }
                    } else {
                        echo "Packeg Icon Required";
                    }
                } else {
                    echo "Packeg Description Required";
                }
            } else {
                echo "Packeg price Required";
            }
        } else {
            echo "Packeg Type Required";
        }
    } else {
        echo "Packeg Name Required";
    }
}

?>




<!-- MAIN CONTENT-->

<div class="main-content">

    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <!-- packeg input here  -->

            <div class="row">
                <div class="col-md-10 ">
                    <div class="card">
                        <div class="card-header">

                            <input type="hidden" name="number_of_package" id="number_of_package" value="<?= $number_of_package?>">
                           
                            Add Packeg
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="packeg_title" class=" form-control-label">Packeg Title</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="packeg_title" name="packeg_title" class="form-control" required>
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="packeg_type" class=" form-control-label">Packeg Type</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="packeg_type" name="packeg_type" class="form-control" required>
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="packeg_price" class=" form-control-label">Packeg Price</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="packeg_price" name="packeg_price" class="form-control" required>
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="packeg_descriptions" class=" form-control-label">Packeg Descriptions</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <!-- <input type="text" id="packeg_descriptions" name="packeg_descriptions" class="form-control" required> -->
                                        <textarea name="packeg_descriptions" id="packeg_descriptions" cols="30" rows="10">

                                        </textarea>
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="packeg_icon" class=" form-control-label">Packeg Icon</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="packeg_icon" name="packeg_icon" class="form-control" required>
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm submit-packeg" id="submit-packeg" >
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <button type="reset reset-packeg" class="btn btn-danger btn-sm" id="reset-packeg" >
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- all packeg here  -->


            <!-- Table Start  -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            All Package Info
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">This Package Info Will Use In Frontend Package Section</h5>
                            <table class="table table-borderless table-striped table-earning table-responsive">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Package Title</th>
                                        <th>Packeg Type</th>
                                        <th>Packeg Price</th>
                                        <!-- <th>Packeg Descriptions</th> -->
                                        <th>Packeg Icon</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>

                                   
                                    <?php

                                    foreach ($all_data as $key => $data) {
                                    ?>

                                        <tr>
                                            <td><?= $key + 1  ?></td>
                                            <td><?= $data['packeg_title'] ?></td>
                                            <td><?= $data['packeg_type'] ?></td>
                                            <td><?= $data['packeg_price'] ?></td>

                                            <td><img src="uploads/packeg/<?= $data['packeg_icon'] ?>" alt="" style="width: 100px;"></td>

                                            <td>
                                                <a href="edit_packeg.php?q=<?= $data['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                <a href="edit_packeg.php?q=<?= $data['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="delete_packeg.php?q=<?= $data['id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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