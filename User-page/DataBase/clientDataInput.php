
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
    return random_int(100000, 999999);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $client_name = $_POST['name'];
        $client_phno = $_POST['phno'];
        $client_email = $_POST['email'];
        $client_password = $_POST['confirm_password'];
        $client_photo = $_POST['license_photo'];
        $subject = "Verification code for the ac in the CarZo";
        
        echo "hellow";
        // Check if the email already exists
        $email_checking = "SELECT `client_email` FROM `client_collection` WHERE `client_email`= '$client_email' ";
        $result = mysqli_query($con, $email_checking);

        if (mysqli_num_rows($result) > 0) {
            echo '<script> console.log(" hello word");</script>';
            throw new Exception("You already signed up. Please go to the home page and try to login.");
        } else {
            echo "blah2";
            // Generate a verification code
            $verificationCode = generateVerificationCode();

            // Send verification email
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Your SMTP server details
            $mail->SMTPAuth = true;
            $mail->Username = 'maxpbav@gmail.com'; // Your SMTP username
            $mail->Password = 'zxkxqjxpxpaplfhq'; // Your SMTP password
            $mail->SMTPSecure = 'tls'; // Encryption (ssl or tls)
            $mail->Port = 587; // Port number
            $mail->setFrom($client_email, $client_name);
            $mail->addAddress($client_email);




            $mail->isHTML(true);
            $mail->Subject = ("$client_email ($subject)");
            $mail->Body = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Verification Email</title>
            </head>
            <body>
                <div class="container">
                    <h2>CarZo Car Rental</h2>
                    <p>Your verification code is: <strong>' . $verificationCode . '</strong></p>
                    <p>Please enter this code to verify your account in the CarZo car rental app.</p>
                    <hr>
                    <p>&copy; ' . date('Y') . ' CarZo Car Rental. All rights reserved.</p>
                </div>
            </body>
            </html>';
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

