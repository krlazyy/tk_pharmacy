<?php
include 'conn.php'; // Database connection
include('../phpqrcode/qrlib.php'); // Include PHP QR Code library

session_start();

if (isset($_POST['submit'])) {
    // Retrieve and sanitize user inputs
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
    $email_auth = mysqli_real_escape_string($conn, $_POST['email_auth']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $relationship = mysqli_real_escape_string($conn, $_POST['relationship']);
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

    // Check if the email already exists in the database
    $check_email_sql = "SELECT * FROM authorization WHERE email='$email'";
    $email_result = mysqli_query($conn, $check_email_sql);

    if (mysqli_num_rows($email_result) == 0) {
        // Directory for QR codes
        $PNG_TEMP_DIR = 'temp/';
        if (!file_exists($PNG_TEMP_DIR)) {
            mkdir($PNG_TEMP_DIR, 0777, true);
        }

        // Generate QR code content
        $codeString = "$user_id\n$first_name\n$last_name\n$contact_no\n$email_auth\n$relationship";
        
        // Generate QR code filename
        $filename = $PNG_TEMP_DIR . 'qr_' . md5($codeString) . '.png';
        
        // Generate the QR code image
        QRcode::png($codeString, $filename);

        // Set the filename to the variable for database insertion
        $qrcode = $filename;

        // Insert user data into authorization table, including the QR code path
        $insert_sql = "INSERT INTO authorization (user_id, first_name, last_name, middle_name, contact_no, email_auth, email, relationship, qrcode) 
                       VALUES ('$user_id', '$first_name', '$last_name', '$middle_name', '$contact_no', '$email_auth', '$email', '$relationship', '$qrcode')";

        if (mysqli_query($conn, $insert_sql)) {
            echo '<script>
                alert("Registered Successfully and QR code generated.");
                window.location.href = "otp.php";
            </script>';
        } else {
            echo '<script>
                alert("Failed to register. Please try again.");
                window.location.href = "../registry_authorized.php";
            </script>';
        }
    } else {
        // If email is already registered
        echo '<script>
            alert("Email Already Registered!");
            window.location.href = "../registry_authorized.php";
        </script>';
    }
}
?>
