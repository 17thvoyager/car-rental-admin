<?php
include("user-config.php");  

if(isset($_POST['submit'])) {
    $client_name = $_POST['name'];
    $client_phno = $_POST['phno'];
    $client_email = $_POST['email'];
    $client_password = $_POST['confirm_password'];
    $client_photo = $_POST['license_photo'];

    $sql = "INSERT INTO `client_collection`(`client_name`, `client_phno`, `client_email`, `client_password`, `clinet_license`) 
    VALUES ('$client_name','$client_phno','$client_email','$client_password','$client_photo')";

    if( mysqli_query($con, $sql)) {
        header ("location:../fleet.php");
    }
    else{
        echo "failed";
    }

}
?>