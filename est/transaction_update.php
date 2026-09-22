<?php
include '../includes/conn.php';
session_start();

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $_SESSION['id'] = $id;
    // Fetch order details from the 'order' table
    $sql = "SELECT * FROM `order` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
        $name = $row['name'];
        $email = $row['email'];
        $contact_no = $row['contact_no'];
        $method = $row['method'];
        $contact_no = $row['contact_no'];
        $total_price = $row['total_price'];
        $total_products = $row['total_products'];
        $track_code = $row['track_code'];
        $approval = "○ Your request for product has been <b>Approved</b>";
        
        // Insert into the 'reciept' table
        $sql_insert = "INSERT INTO reciept (user_id, name, method, total_products, email, contact_no, total_price, track_code, approval)
                       VALUES ('$user_id','$name', '$method', '$total_products', '$email', '$contact_no', '$total_price', '$track_code', '$approval')";
        
        if (mysqli_query($conn, $sql_insert)) {
            // If insert is successful, delete the order
            $sql_delete = "DELETE FROM `order` WHERE id = $id";
            if (mysqli_query($conn, $sql_delete)) {
                echo '<script>
                        alert("Payment confirmed successfully!");
                        window.location.href = "transaction.php";
                      </script>';
            } else {
                $_SESSION['error'] = "Error deleting order: " . $conn->error;
            }
        } else {
            $_SESSION['error'] = "Error inserting into receipt: " . $conn->error;
        }
    } else {
        $_SESSION['error'] = "Order not found!";
    }
} else {
    $_SESSION['error'] = "No order ID provided!";
}

// Close the connection (optional but good practice)
mysqli_close($conn);
?>
