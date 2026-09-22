<?php 
session_start();
$id = $_SESSION['id'];

// Ensure total price is set in the session
$total_price = isset($_SESSION['total_price']) ? $_SESSION['total_price'] : 0;

// Fixed GCash number
$gcash_number = isset($_SESSION['contact_no']) ? $_SESSION['contact_no'] : 'Unknown'; // Default to 'Unknown'
$payment_amount = number_format($total_price, 2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tinig Kalinga GCash Payment</title>
    <link rel="icon" type="image/x-icon" href="includes/images/favicon.ico">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- custom css file link  -->
   <link rel="stylesheet" href="includes/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px auto;
        }
        .qr-code {
            margin: 20px 0;
        }
        .loading {
            font-size: 1.2em;
            color: green;
        }
    </style>
    <script>
        function checkPaymentStatus() {
            fetch('gcash_payment.php?confirm=true')
                .then(response => {
                    if (response.ok) {
                        window.location.href = 'success.php';
                    }
                })
                .catch(error => console.error('Error checking payment status:', error));
        }

        // Simulate delay for scanning and confirming
        // setTimeout(checkPaymentStatus, 25000); // Adjust delay as needed
    </script>
</head>
<body style="background-color: #058789;">
    <div class="container blurb" style="color: #058789; background-color: whitesmoke; margin-top: 5%;">
    <h1><b>Pay with GCash</b></h1>
    <p>Order ID: <strong><?php echo $id; ?></strong></p>
    <p>Contact #: <strong><?php echo $gcash_number; ?></strong></p>
    <p>Total Amount: <strong>₱<?php echo $payment_amount; ?></strong></p>
    <p>Scan the QR code below with your GCash app to pay.</p>
    <div class="qr-code">
        <img src="<?php echo 'images/cashg.jpg'; ?>" alt="GCash QR Code" width="300">
    </div>
    <p style="font-size: 14pt;">Kindly Screenshot the payment before clicking proceed.</p><br>
    <a href="gcash_checkout.php" style="text-decoration: none;" class="btn-lg btn-info">Proceed</a>
    </div>
</body>
</html>
