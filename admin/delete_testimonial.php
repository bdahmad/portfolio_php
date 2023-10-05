<?php
require_once('../functions/admin/adminFunction.php');

?>

<?php

$id=$_GET['q'];

$delete_query= "DELETE FROM `testimonial` WHERE tml_id = $id";
if(mysqli_query($con, $delete_query)){
    header("Location: manage_testimonial.php");
    // echo "Testimonial Deleted Successfully";
}else{
    echo "Delete Failed";
}
?>