<!-- load function page and config page  -->
<?php
    require_once('../functions/admin/adminFunction.php');
?>

<?php

    $id = $_GET['q'];

    $delete_query = "DELETE FROM `skills` WHERE id = $id ";
    if(mysqli_query($con, $delete_query)){
        
        header("Location: manage_skills.php");
        echo "Skills Deleted Successfully";

    }else{
        "Something Is Wrong";
    }

?>