<!-- load function page and config page  -->
<?php
    require_once('../functions/admin/adminFunction.php');
?>

<?php

    $id = $_GET['q'];

    $delete_query = "DELETE FROM `messages` WHERE id = $id ";
    if(mysqli_query($con, $delete_query)){
        
        header("Location: all_messages.php");
        echo "Message Deleted Successfully";

    }else{
        "Something Is Wrong";
    }

?>