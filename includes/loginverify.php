<?php
session_start();
include("conn.php");

$email=$_SESSION['email'];
$user_otp=$_POST['user_otp'];
$_SESSION['user_otp']=$user_otp;
$sql="Select * from users where email='$email' and user_otp='$user_otp'";
$rs=mysqli_query($conn,$sql)or die(mysqli_error($conn));
if(mysqli_num_rows($rs)>0){
    $sql="update users set user_otp='0' where email='$email'";
    $rs=mysqli_query($conn,$sql)or die(mysqli_error($conn));
    echo  '<script>
                    window.location.href = "../logout.php";
                    alert("OTP Success '.$email.' can now Login!")
                </script>';
}
else{
        header("location:verify.php?msg=OTP is invalid please try again");
}
?>