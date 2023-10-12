
<?php
session_start();
include("user-config.php");
$client_email=$_POST['login_email'];
$client_password=$_POST['login_password'];
if($client_email && $client_password !=""){
    $sql1="SELECT * FROM `client_collection` WHERE `client_email`='$client_email' AND `client_password`='$client_password'";
    $res1=mysqli_query($con,$sql1);
    $row = mysqli_fetch_array($res1);
    $_SESSION['user_id'] = $row['client_id'];
    $_SESSION['user_name'] = $row['client_name'];
    $count1=mysqli_num_rows($res1);
    echo '<script> console.log("admin portion");</script>';
    if($count1 > 0){
        header("location:../fleet.php");
    }else{
    // header("location:../index.php#login-form");
    echo "<script>alert('invalide password or username');window.location = '../index.php#login-form'</script>";

}
}
else {echo '<script> console.log("failed");</script>';}

?>
