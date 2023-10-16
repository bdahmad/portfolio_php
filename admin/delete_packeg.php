<?php

require_once('../functions/admin/adminFunction.php');


    $id = $_GET['q'];

    $delete_query = "DELETE FROM `pricing` WHERE id = '$id'";

    if(mysqli_query($con, $delete_query)){

        header('Location: manage_price.php');
        echo 'Packeg Delete Successfully';
    }else{
        echo 'something is wrong';
    }

?>