<?php
session_start();
include("../includes/conn.php");

$email = $_SESSION['email'];
$otp_pass = $_POST['otp_pass'];
$_SESSION['otp_pass'] = $otp_pass;

$sql = "SELECT * FROM establishment WHERE email='$email' AND otp_pass='$otp_pass'";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($rs) > 0) {
    // Fetch the user details, including user_id
    $row = mysqli_fetch_assoc($rs);
    $establishment_id = $row['establishment_id'];  // Assuming the column is named user_id in the users table
    $_SESSION['establishment_id'] = $establishment_id;  // Set user_id as a session variable

    // Reset otp_pass to 0 after successful verification
    $sql = "UPDATE establishment SET otp_pass='0' WHERE email='$email'";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
   

    echo '<script>
                window.location.href = "forgetpass.php";
                alert("OTP Success. User ID ' . $email . ' can now change password!")
          </script>';
} else {
    header("location:verify_forget.php?msg=" . urlencode("OTP is invalid, please try again"));
    exit();
}
?>
