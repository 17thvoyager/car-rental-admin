<?php
ob_start();
session_start();
include("user-config.php");

if(isset($_POST['submit'])) {
    $client_email = $_POST['login_email'];
    $client_password = $_POST['login_password'];

    if(!empty($client_email) && !empty($client_password)) {
        $stmt = $con->prepare("SELECT * FROM `client_collection` WHERE `client_email`='$client_email' AND `client_password`='$client_password'");
        $stmt->execute();
        $res1 = $stmt->get_result();

        if($res1->num_rows > 0) {
            $row = $res1->fetch_assoc();
            $_SESSION['user_id'] = $row['client_id'];
            $_SESSION['user_name'] = $row['client_name'];
            header("location:../fleet.php");
        } else {
            $stmt = $con->prepare("SELECT * FROM `admin_collection` WHERE `admin_email`='$client_email' AND `admin_password`='$client_password'");
            $stmt->execute();
            $res2 = $stmt->get_result();

            if($res2->num_rows > 0) {
                $row = $res2->fetch_assoc();
                $_SESSION['admin_id'] = $row['admin_id'];
                $_SESSION['admin_name'] = $row['admin_name'];
                header("location:../../Admin-page/html/index.php");
            } else {
                echo '<script> console.log("Invalid login");</script>';
                echo "<script>alert('Invalid password or username');window.location = '../index.php#login-form'</script>";
            }
        }
    } else {
        echo '<script> console.log("Empty fields");</script>';
        echo "<script>alert('Email and password are required');window.location = '../index.php#login-form'</script>";
    }
}
?>
