<!-- <?php
include("config.php");

// Get the car_id from the query string
$id = $_GET['car_id'];

// Prepare the SQL statement with a placeholder for the ID
$sql = "DELETE FROM `car_collection` WHERE id = ?";

// Create a prepared statement
$stmt = mysqli_prepare($con, $sql);

// Bind the ID parameter to the prepared statement
mysqli_stmt_bind_param($stmt, "i", $id);

// Execute the prepared statement
if(mysqli_stmt_execute($stmt)) {
    header("location: ../running-cars-list.php");
} else {
    header("location: ../error-403.html");
}

// Close the statement and the database connection
mysqli_stmt_close($stmt);
mysqli_close($con);


?> -->



<?php
 include("config.php");

 $id = $_GET['car_id'];

 $sql = "DELETE FROM `car_collection` WHERE `car_id` = '$id' ";

     if(mysqli_query($con, $sql)) {
         header ("location:../running-cars-list.php");
     }
     else{
         header ("location: ../error-403.html");
     }

 ?> 