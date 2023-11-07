<?php 
include("config.php");

if(isset($_GET['car_id'])){
$id = $_GET['car_id'];

$sql = "DELETE FROM `car_collection` WHERE `car_id` = '$id' ";

    if(mysqli_query($con, $sql)) {
        header ("location: ../arrived-cars-list.php");
    }
    else{
        // header ("location: ../error-403.html");
        echo '<script>window.location="../error-403.html"</script>';
    }
}
?>


