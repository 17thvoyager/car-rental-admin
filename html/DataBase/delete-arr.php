<?php 
include("config.php");

$id = $_GET['id'];

$sql = "DELETE FROM `tbl_arr-car` WHERE id = $id ";

    if(mysqli_query($con, $sql)) {
        header ("location: ../tables.php");
    }
    else{
        header ("location: ../error-403.html");
    }

?>