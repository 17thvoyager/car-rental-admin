<?php 
include("config.php");

$id = $_GET['car_id'];

$sql = "DELETE FROM `car_collection` WHERE id = $id ";

    if(mysqli_query($con, $sql)) {
        header ("location: ../running-cars-list.php");
    }
    else{
        header ("location: ../error-403.html");
    }

?>