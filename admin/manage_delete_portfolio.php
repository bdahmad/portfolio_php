<!-- load function page and config page  -->
<?php
require_once('../functions/admin/adminFunction.php');


$id=$_GET['d'];
$del="DELETE FROM portfolio WHERE port_id='$id'";
if(mysqli_query($con,$del)){
    header('location: manage_all_portfolio.php');
}
else{
    echo "failed.";
}

?>
