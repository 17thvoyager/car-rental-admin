<?php 
include("config.php");

$id = $_GET['car_id'];

$sql = "DELETE FROM `car_collection` WHERE car_id = $id ";
// echo "<script>console.log('hello' );</script>";

    if(mysqli_query($con, $sql)) {
        header ("location: ../arrived-cars-list.php");
    }
    else{
        header ("location: ../error-403.html");
    }

?>



<!--  comment starts here ................


<?php 
include("config.php");

// Get the car_id parameter from the URL
$id = $_GET['car_id'];

// Prepare the SQL query with a parameter
$sql = "DELETE FROM car_collection WHERE car_id = ?";
$stmt = mysqli_prepare($con, $sql);

if ($stmt) {
    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        header("location: ../arrived-cars-list.php");
    } else {
        header("location: ../error-403.html");
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Handle the case where the prepared statement could not be created
    header("location: ../error-403.html");
}

// Close the database connection
mysqli_close($con);
?> 


-->
