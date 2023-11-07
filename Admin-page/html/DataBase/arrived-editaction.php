<?php
include("config.php");
$car_id = $_GET['car-id'];

if(isset($_POST['submit'])){
    $arr_date = $_POST['arrived-date'];
    $service_date = $_POST['service-date'];
    $client_id = $_POST['client-id'];
    $driver_id = $_POST['driver-id'];
    $km = $_POST['km'];
    $contact_no = $_POST['contact-number'];
    $contact_email = $_POST['contact-email'];
    $car_details = $_POST['car-details'];
    $invigilator = $_POST['invigilator'];



    $sql = "UPDATE `car_collection` SET 
    `last_service_date`='$service_date',
    `arrived_date`='$arr_date',
    `client_id`='$client_id',
    `driver_id`='$driver_id',
    `kilometer`='$km',
    `client_phno`='$contact_no',
    `client_email`='$contact_email',
    `car_details`='$car_details',
    `invigilator_name`='$invigilator'
     WHERE `car_id` = '$car_id'";
    // header("location:../arrived-cars-list.php");
     if(mysqli_query($con, $sql)){
        echo "<script>alert('The Arrived cars information has been updated');
        window.location = '../arrived-cars-list.php'</script>";
        
     }
     else{
        header("location:../index.php");
        echo "error".mysqli_error($con, $sql);
        echo "<script>alert('Some ERROR occured');window.location = './arrived-cars-list.php'</script>";
     }

    }
    
?>