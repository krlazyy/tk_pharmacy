<?php
session_start();
include 'includes/conn.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $user_id = $_SESSION['user_id']; // Retrieve user_id from session

    // Retrieve the order ID (e.g., from POST or session)
    if (!isset($_POST['id'])) {
        die("Order ID is required.");
    }
    $id = intval($_POST['id']); // Ensure ID is treated as an integer

    $targetDir = "includes/images/"; // Directory to store uploaded files
    $fileName = basename($_FILES["gcash_photo"]["name"]);
    $targetFilePath = $targetDir . time() . "_" . $fileName; // Add a timestamp to avoid duplicates
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array(strtolower($fileType), $allowedTypes)) {
        // Attempt to move the uploaded file
        if (move_uploaded_file($_FILES["gcash_photo"]["tmp_name"], $targetFilePath)) {
            // Update the existing order with the new image path
            $stmt = $conn->prepare("UPDATE `order` SET `gcash_photo` = ? WHERE `id` = ? AND `user_id` = ?");
            if ($stmt) {
                $stmt->bind_param("sii", $targetFilePath, $id, $user_id); // Bind the image path, order ID, and user ID
                if ($stmt->execute()) {
                    // Successfully updated the database
                    header("Location: success.php");
                    exit();
                } else {
                    // Capture SQL execution errors
                    unlink($targetFilePath); // Remove the uploaded file if database update fails
                    die("Database error: " . $stmt->error);
                }
            } else {
                // Capture SQL preparation errors
                unlink($targetFilePath);
                die("SQL preparation error: " . $conn->error);
            }
        } else {
            header("Location: gcash_checkout.php?error=Failed to upload file");
            exit();
        }
    } else {
        header("Location: gcash_checkout.php?error=Invalid file type");
        exit();
    }
} else {
    header("Location: gcash_checkout.php");
    exit();
}
?>