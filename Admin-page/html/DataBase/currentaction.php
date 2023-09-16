<?php
include("config.php");

if(isset($_POST['submit'])) {
    $car_id = $_POST['car-id'];
    $client_id = $_POST['client-id'];
    $driver_id = $_POST['driver-id'];
    $client_phno = $_POST['client-phno'];
    $km = $_POST['km'];
    $rented_date = $_POST['rented-date'];
    $car_details = $_POST['car-details'];


$sql = "INSERT INTO `tbl_runig-cars`(`car_id`, `client_id`, `driver_id`, `client_no`, `kilometer`, `rented_date`, `details`) 
        VALUES ('$car_id','$client_id','$driver_id','$client_phno','$km','$rented_date','$car_details')";

$res = mysqli_query($con, $sql);
    if($res) {
        header ("location:../index.php");
        // echo "succes details saved";
    }

    else{
        echo "failed";
    }
}
    ?>  