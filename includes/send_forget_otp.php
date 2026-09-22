<?php
session_start();
include("conn.php");
include("email.php");

$email = $_POST["email"];
$sql = "SELECT * FROM users WHERE email='$email'";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($rs) > 0) {
    $_SESSION['email'] = $email;
    $otp = rand(111111, 999999);
    send_otp($email, "Tinig Kalinga Password reset OTP", $otp);

    // Update the otp_pass with the generated OTP
    $sql = "UPDATE users SET otp_pass='$otp' WHERE email='$email'";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    header("location:verify_forget.php?msg=Check your email for OTP and verify");
} else {
    // Reset user_otp to 0 when email is invalid
    $sql = "UPDATE users SET otp_pass='0' WHERE email='$email'";
    mysqli_query($conn, $sql);

    // Redirect with an error message
    header("location:forget_otp.php?msg=" . urlencode("Email is invalid, please try again"));
    exit();
}
?>
