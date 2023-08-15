<?php
include("config.php");

if(isset($_POST['submit'])) {
    $car_id = $_POST['car-id'];
    $arr_date = $_POST['arrived-date'];
    $service_date = $_POST['service-date'];
    $driver_id = $_POST['driver-id'];
    $km = $_POST['km'];
    $contact_no = $_POST['contact-number'];
    $contact_email = $_POST['contact-email'];
    $car_details = $_POST['car-details'];
    $invigilator = $_POST['invigilator'];


$sql = "INSERT INTO `tbl_arr-car`(`car_id`,`arr_date`,`last_service_date`,`driver_id`,`kilometer`,`contact_no`,`contact_email`,`details`,`invigilator_name`) VALUES 
('$car_id','$arr_date','$service_date','$driver_id','$km','$contact_no','$contact_email','$car_details','$invigilator')";


    if( mysqli_query($con, $sql)) {
        header ("location:../index.php");
        // echo "succes details saved";
    }

    else{
        echo "failed";
    }
}
    ?>  