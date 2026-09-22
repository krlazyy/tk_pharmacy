<?php
@include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_quantity') {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];

    // Validate and sanitize inputs
    $id = mysqli_real_escape_string($conn, $id);
    $quantity = max(1, min(1000, (int)$quantity)); // Ensure quantity is between 1 and 1000

    // Update the quantity in the database
    $update_query = "UPDATE `cart` SET quantity = $quantity WHERE id = $id";
    if (mysqli_query($conn, $update_query)) {
        // Calculate the subtotal and grand total
        $cart_item_query = mysqli_query($conn, "SELECT price, quantity FROM `cart` WHERE id = $id");
        $cart_item = mysqli_fetch_assoc($cart_item_query);
        $sub_total = $cart_item['price'] * $cart_item['quantity'];

        $grand_total_query = mysqli_query($conn, "SELECT SUM(price * quantity) AS grand_total FROM `cart`");
        $grand_total = mysqli_fetch_assoc($grand_total_query)['grand_total'];

        echo json_encode(['status' => 'success', 'sub_total' => $sub_total, 'grand_total' => $grand_total]);
    } else {
        echo json_encode(['status' => 'error']);
    }
    exit;
}
?>
