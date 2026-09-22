<?php
session_start();
include 'includes/conn.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    mysqli_query($conn, "DELETE FROM `cart`");

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $hashedPassword = sha1($password);

    if (empty($email)) {
        header("Location: login.php?error=User Name is required");
        exit();
    } else if (empty($password)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        // Check if email and password match
        $sql = "SELECT * FROM user_validity WHERE email='$email' AND password='$hashedPassword'";
        $validate = mysqli_query($conn, $sql);
         if (mysqli_num_rows($validate) === 1) {
         header("Location: login.php?error=Account still pending wait for approval");
         }
         else{

        // Check if email and password match
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$hashedPassword'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            // Check if OTP is 0
            if ($row['user_otp'] == 0) {
                // Set session variables
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['contact_no'] = $row['contact_no'];

                // Redirect to index if OTP is 0
                header("Location: index.php");
                exit();
            } else {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['contact_no'] = $row['contact_no'];

                // Redirect to OTP page with error if OTP is not 0
                $_SESSION['error'] = 'OTP verification required';
                header("Location: includes/otp_check.php?email=" . urlencode($email));
                exit();
            }
        } else {
            header("Location: login.php?error=Incorrect email or password");
            exit();
        }
        }
    }
} else {
    header("Location: login.php");
    exit();
}
