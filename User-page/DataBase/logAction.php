<?php
ob_start();
session_start();
include("user-config.php");

if(isset($_POST['submit'])) {
    $client_email = $_POST['login_email'];
    $client_password = $_POST['login_password'];

    if(!empty($client_email) && !empty($client_password)) {
        if(authenticateClient($client_email, $client_password)) {
            header("location:../fleet.php");
        } elseif(authenticateAdmin($client_email, $client_password)) {
            header("location:../../Admin-page/html/index.php");
        } else {
            echo '<script> console.log("User not found");</script>';
            echo "<script>alert('Invalid password or username');window.location = '../index.php#login-form'</script>";
        }
    } else {
        echo '<script> console.log("Empty fields");</script>';
        echo "<script>alert('Email and password are required');window.location = '../index.php#login-form'</script>";
    }
}

function authenticateClient($email, $password, $con) {
    $stmt = $con->prepare("SELECT * FROM `client_collection` WHERE `client_email`='$email'");
    $stmt->execute();
    $res = $stmt->get_result();

    if($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        if(password_verify($password, $row['client_password'])) {
            $_SESSION['user_id'] = $row['client_id'];
            $_SESSION['user_name'] = $row['client_name'];
            return true;
        } else {
            echo '<script> console.log("Invalid password");</script>';
            echo "<script>alert('Invalid password or username');window.location = '../index.php#login-form'</script>";
            return false;
        }
    }
    return false;
}

function authenticateAdmin($email, $password, $con) {
    $stmt = $con->prepare("SELECT * FROM `admin_collection` WHERE `admin_email`='$email'");
    $stmt->execute();
    $res = $stmt->get_result();

    if($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        if(password_verify($password, $row['admin_password'])) {
            $_SESSION['admin_id'] = $row['admin_id'];
            $_SESSION['admin_name'] = $row['admin_email'];
            echo '<script> console.log("' . $_SESSION['admin_name'] . '");</script>';
            return true;
        } else {
            echo '<script> console.log("Invalid password");</script>';
            echo "<script>alert('Invalid password or username');window.location = '../index.php#login-form'</script>";
            return false;
        }
    }
    return false;
}
?>