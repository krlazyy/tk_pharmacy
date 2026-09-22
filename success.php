<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="includes/images/favicon.ico">
    <title>Payment Successful</title>
    
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            padding: 30px;
            width: 90%;
            max-width: 400px;
        }
        h1 {
            color: #058789;
            font-size: 2em;
            margin: 0 0 20px;
        }
        p {
            font-size: 1.1em;
            color: #333333;
            margin: 10px 0;
        }
        .success-icon {
            font-size: 4em;
            color: #058789;
            margin: 20px 0;
        }
        .btn-home {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1em;
            color: #ffffff;
            background-color: #058789;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-home:hover {
            background-color: #046b66;
        }
        h3{
            color: #058789;
            font-size:2vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">✔</div>
        <h1>Payment Successful</h1>
        <p>Thank you for your payment!</p>
        <p>Your transaction has been completed successfully.</p>
        <h3>Note:</h3>
        <p>Your order is currently pending approval. Please wait for confirmation before proceeding. If additional information is needed, we will contact you shortly.<br><br>
        Important: Please screenshot or download the GCash receipt and present it to our store as proof of payment..</p>
        <a href="index.php" class="btn-home">Go to Home</a>
    </div>
</body>
</html>
