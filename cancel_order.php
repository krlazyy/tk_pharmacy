<?php
include 'config.php';
session_start();

// Automatic deletion of orders older than 24 hours
$delete_old_orders_query = mysqli_query($conn, "DELETE FROM `order` WHERE TIMESTAMPDIFF(HOUR, order_date, NOW()) > 24");

// Order cancellation request
if (isset($_SESSION['user_id']) && isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $user_id = $_SESSION['user_id'];

    // Fetch the order details for the specified order
    $order_query = mysqli_query($conn, "SELECT * FROM `order` WHERE id = '$order_id' AND user_id = '$user_id'") or die('Query failed');
    
    if (mysqli_num_rows($order_query) > 0) {
        $order_data = mysqli_fetch_assoc($order_query);
        $order_date = strtotime($order_data['order_date']);
        $current_time = time();
        
        // Calculate the time difference in hours
        $time_difference = ($current_time - $order_date) / 3600;

        if ($time_difference <= 24) {
            // Proceed with the cancellation if within 24 hours
            $cancel_query = mysqli_query($conn, "DELETE FROM `order` WHERE id = '$order_id' AND user_id = '$user_id'") or die('Failed to cancel order');

            // Define each field specifically to avoid potential issues with arrays
            $name = $order_data['name'] ?? '';
            $email = $order_data['email'] ?? '';
            $contact_no = $order_data['contact_no'] ?? '';
            $method = $order_data['method'] ?? '';
            $total_products = $order_data['total_products'] ?? 0;
            $total_price = $order_data['total_price'] ?? 0.00;
            $control_number = $order_data['control_number'];
            $track_code = $order_data['track_code'];

            // Insert refund receipt data into receipt_refund table
            $refund_query = mysqli_query($conn, "INSERT INTO `receipt_refund` 
                (order_id, user_id, name, email, contact_no, method, total_products, total_price, control_number, track_code) 
                VALUES 
                ('$order_id', '$user_id', '$name','$email', '$contact_no', '$method', '$total_products', '$total_price', '$control_number', '$track_code')") 
                or die('Failed to insert refund receipt');

            if ($cancel_query && $refund_query) {
                echo "<script>
                        alert('Your order has been successfully cancelled and a refund receipt has been created.');
                        window.location.href = 'order_cancel.php';
                      </script>";
            }
        } else {
            // Deny cancellation if more than 24 hours
            echo "<script>
                    alert('Cancellation period has expired. Orders can only be cancelled within 24 hours of placement.');
                    window.location.href = 'order_cancel.php';
                  </script>";
        }
    } else {
        echo "<script>alert('Order not found.'); window.location.href = 'order_cancel.php';</script>";
    }
} else {
    echo "<script>alert('You must be logged in to cancel an order.'); window.location.href = 'login.php';</script>";
}
?>
