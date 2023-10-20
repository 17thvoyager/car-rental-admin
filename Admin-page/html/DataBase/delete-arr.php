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

<!-- comment starts here ................ -->


<!-- <?php 
include("config.php");

// Get the car_id parameter from the URL
if(isset($_GET['delete'])){
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
}
?> 


 -->
