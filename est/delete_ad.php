<?php
include '../includes/conn.php';

if (isset($_GET['ads_id'])) {
    $ads_id = $_GET['ads_id'];
    
    // Delete ad
    $sql = "DELETE FROM advertisement WHERE ads_id = $ads_id";
    if ($conn->query($sql) === TRUE) {
        echo "Advertisement deleted successfully.";
    } else {
        echo "Error deleting advertisement: " . $conn->error;
    }
    header("Location: index_establishment.php");
    exit;
}

$conn->close();
?>