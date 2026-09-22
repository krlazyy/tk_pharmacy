<?php
session_start();
include("conn.php");
include("email.php");

$email = $_POST["email"];
$otp = rand(111111, 999999);

// Query to check if email exists in the database
$sql = "SELECT * from users where email='$email'";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($rs) > 0) {
    // If the email exists, save email and contact number to the session
    $_SESSION['email'] = $email;

    // Sending OTP to email
    send_otp($email, "Tinig Kalinga Account Registration OTP:", $otp);

    // Update the OTP in the database for the specific user
    $sql = "UPDATE users SET user_otp='$otp' WHERE email='$email'";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));


    // Redirect user to verify.php with success message
    header("location:verify.php?msg=Check your email for OTP and verify");
} else {
    // If the email doesn't exist, redirect back to the registration page with an error message
    header("location:otp_email.php?msg=Email is invalid, please try again");
}