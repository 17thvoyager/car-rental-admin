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


    $sql = "INSERT INTO `car_collection`(`car_id`, `last_service_date`, `arrived_date`, `car_model`, `lease_price`, `client_id`, `driver_id`, `rented_date`, `kilometer`, `client_phno`, `client_email`, `car_details`, `invigilator_name`, `car_image`) 
    VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]','[value-14]')";

    if( mysqli_query($con, $sql)) {
        header ("location:../index.php");
        // echo "succes details saved";
    }

    else{
        echo "failed";
    }
}
    ?>  