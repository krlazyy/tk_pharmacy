<?php
include 'conn.php'; // Database connection
include('../phpqrcode/qrlib.php'); // Include PHP QR Code library

session_start();

if (isset($_POST['submit'])) {
    // Retrieve and sanitize user inputs
    $auth_name = trim($_POST['auth_name']);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $contact_no = trim($_POST['contact_no']);
    $email_auth = trim($_POST['email_auth']);
    $email = trim($_POST['email']);
    $relationship = trim($_POST['relationship']);
    $control_number = trim($_POST['control_number']);
    $user_id = trim($_POST['user_id']);

    // Ensure all required fields are filled
    if (empty($auth_name) || empty($first_name) || empty($last_name) || empty($contact_no) || empty($email_auth) || empty($email) || empty($relationship) || empty($control_number) || empty($user_id)) {
        echo '<script>
            alert("Please fill in all fields.");
            window.history.back();
        </script>';
        exit;
    }

    // Set directory for temporary QR code storage
    $PNG_TEMP_DIR = __DIR__ . '/temp/';
if (!file_exists($PNG_TEMP_DIR)) {
    mkdir($PNG_TEMP_DIR, 0777, true);
    if (!file_exists($PNG_TEMP_DIR)) {
        die("Failed to create temp directory at $PNG_TEMP_DIR");
    }
}


    // Generate QR code content
    $codeString = "user_id: $user_id\n"
        . "auth_name: $auth_name\n"
        . "Authorized for:\n"
        . "first_name: $first_name\n"
        . "last_name: $last_name\n"
        . "contact_no: $contact_no\n"
        . "email_auth: $email_auth\n"
        . "relationship: $relationship\n"
        . "control_number: $control_number";

    // Generate QR code filename
    $filename = $PNG_TEMP_DIR . 'qr_' . md5($codeString) . '.png';

    // Generate the QR code image
    QRcode::png($codeString, $filename);

    // Verify QR code generation
    if (!file_exists($filename)) {
        echo '<script>
            alert("Failed to generate QR code. Please try again.");
            window.history.back();
        </script>';
        exit;
    }

    // Store QR code path relative to the project directory
    $qrcodePath = 'temp/' . basename($filename);

    // Insert data into the database using prepared statements
    $insert_sql = "INSERT INTO authorization (user_id, auth_name, first_name, last_name, contact_no, email_auth, email, relationship, qrcode) 
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $insert_sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sssssssss', $user_id, $auth_name, $first_name, $last_name, $contact_no, $email_auth, $email, $relationship, $qrcodePath);

        if (mysqli_stmt_execute($stmt)) {
            echo '<script>
                alert("Registered Successfully and QR code generated.");
                window.location.href = "otp.php";
            </script>';
        } else {
            echo '<script>
                alert("Failed to register. Database error: ' . mysqli_error($conn) . '");
                window.history.back();
            </script>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo '<script>
            alert("Database preparation error: ' . mysqli_error($conn) . '");
            window.history.back();
        </script>';
    }
}
?>
