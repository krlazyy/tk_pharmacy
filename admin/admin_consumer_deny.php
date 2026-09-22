<?php
include '../includes/conn.php';

if (isset($_GET['deny'])) {
    $user_validity_id = $_GET['deny'];

    // Delete the user from `user_validity` table
    $sql = "DELETE FROM user_validity WHERE user_validity_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_validity_id);

    if ($stmt->execute()) {
        echo '<script>
                alert("User has been denied and removed successfully.");
                window.location.href = "admin_consumer.php";
              </script>';
    } else {
        echo "Error deleting user: " . $stmt->error;
    }
}
?>
