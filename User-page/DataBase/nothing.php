<?php
include("user-config.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

echo "hellow1";
function generateVerificationCode() {
    // Generate a random verification code (you can customize the code length)
    return mt_rand(100000, 999999);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $client_name = $_POST['name'];
        $client_phno = $_POST['phno'];
        $client_email = $_POST['email'];
        $client_password = $_POST['confirm_password'];
        $client_photo = $_POST['license_photo'];
        echo "hellow";
        // Check if the email already exists
        $email_checking = "SELECT `client_email` FROM `client_collection` WHERE `client_email`= '$client_email' ";
        $result = mysqli_query($con, $email_checking);

        if (mysqli_num_rows($result) > 0) {
            echo '<script> console.log(" hello word");</script>';
            throw new Exception("You already signed up. Please go to the home page and try to login.");
        } else {
            echo "blah";
            // Generate a verification code
            $verificationCode = generateVerificationCode();

            $insertVerificationCode = "INSERT INTO `client_collection` (`client_email`, `verification_code`) VALUES ('$client_email', '$verificationCode')";
            
            mysqli_query($con, $insertVerificationCode);
            echo '<script> console.log(" hello word");</script>';
            echo "blah";

            // Send verification email
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Your SMTP server details
            $mail->SMTPAuth = true;
            $mail->Username = 'maxpbav@gmail.com'; // Your SMTP username
            $mail->Password = 'zxkx qjxp xpap lfhq'; // Your SMTP password
            $mail->SMTPSecure = 'tls'; // Encryption (ssl or tls)
            $mail->Port = 587; // Port number
            $mail->setFrom('maxpbav@gmail.com', 'CarZo');
            $mail->addAddress($client_email);
            $mail->isHTML(true);
            $mail->Subject = 'Email Verification Code';
            $mail->Body = 'Your verification code is: ' . $verificationCode;
            // Configure PHPMailer...

            // Rest of your email sending code...

            if ($mail->send()) {
                echo 'Verification email sent successfully.';
                header('location: ../index.php');
            } else {
                throw new Exception('Email could not be sent. Please try again later. Error: ' . $mail->ErrorInfo);
            }
        }
    } catch (Exception $e) {
        echo "hellow2";
        echo "<script>alert('" . $e->getMessage() . "'); window.location = '../index.php#login-form'</script>";
    }
}
?>
