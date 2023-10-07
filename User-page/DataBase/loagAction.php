<?php
include("user-config.php");  

if(isset($_POST['submit'])) {

    $client_email = $_POST['email'];
    $client_password = $_POST['confirm_password'];

    $sql = "SELECT * FROM `client_collection`
    WHERE `client_email` = `$client_email` AND `client_password` = `$client_password`";

    if( $res = mysqli_query($con, $sql)) {
        $num = mysqli_num_rows($res);

        if($num > 0)

        {   
            $row = mysqli_fetch_array($res);
            $_SESSION['user_id'] = $row['client_id'];
            $_SESSION['user_name'] = $row['client_name'];
            header ("location:../fleet.php");   
        }
        
        else{
            echo '<script> alert("incoreect email or password");</script>';
            echo '<script> window.locaiton = "../index.php";</script>';
        }
    }
    else{
        echo "failed";
    }

}
?>