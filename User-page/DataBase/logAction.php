<?php
ob_start();
session_start();
include("user-config.php");

function verifyClient($client_email, $client_password, $con) {
    $stmt = $con->prepare("SELECT * FROM `client_collection` WHERE `client_email`='$client_email' AND `client_password`='$client_password'");
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $_SESSION['user_id'] = $row['client_id'];
        $_SESSION['user_name'] = $row['client_name'];
        header("location:../fleet.php");
        exit(); // Add exit to stop execution after redirect
    } else {
        return false;
    }
}

function verifyAdmin($client_email, $client_password, $con) {
    $stmt = $con->prepare("SELECT * FROM `admin_collection` WHERE `admin_email`='$client_email' AND `admin_password`='$client_password'");
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['admin_name'] = $row['admin_name'];
        header("location:../../Admin-page/html/index.php");
        exit(); // Add exit to stop execution after redirect
    } else {
        return false;
    }
}

if (isset($_POST['submit'])) {
    $client_email = $_POST['login_email'];
    $client_password = $_POST['login_password'];

    if (!empty($client_email) && !empty($client_password)) {
        if (verifyClient($client_email, $client_password, $con)) {
        } else {
            if (verifyAdmin($client_email, $client_password, $con)) {
                echo '<script> console.log("Admin: ' . $_SESSION['admin_name'] . '");</script>';
            } else {
                echo '<script> console.log("Invalid login");</script>';
                echo "<script>alert('Invalid password or username');window.location = '../index.php#login-form'</script>";
                exit(); // Add exit to stop execution after redirect
            }
        }
    } else {
        echo '<script> console.log("Empty fields");</script>';
        echo "<script>alert('Email and password are required');window.location = '../index.php#login-form'</script>";
        exit(); // Add exit to stop execution after redirect
    }
}
?>
