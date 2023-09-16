<?php 
include("config.php");

$id = $_GET['id'];

$sql = "DELETE FROM `tbl_runig-cars` WHERE id = $id ";

    if(mysqli_query($con, $sql)) {
        header ("location: ../running-cars-tables.php");
    }
    else{
        header ("location: ../error-403.html");
    }

?>