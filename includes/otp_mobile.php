<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <title>OTP Mobile Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <style type="text/css">
        body {
            min-height: 100vh;
            background-color: #058789;
        }
        .container {
            width: 500px;
            height: 400px;
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            margin: auto;
            padding: 20px;
            margin-top: 100px;
        }
        .btn:hover{
         background-color: #058789;
         color: whitesmoke;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center text-white">OTP Verification</h1>
        <p class="text-center text-white">Check your email after OTP Sent</p>
        <div role="alert" class="text-center text-white border border-white rounded mb-3">
            <?php
            if (isset($_REQUEST['msg'])) {
                echo htmlspecialchars($_REQUEST['msg']);
            }
            ?>
        </div>
        <form action="send_otp_mobile.php" method="post">
            <div class="mb-3">
                <label for="contact_no" class="form-label text-white">Mobile Number</label>
                <input type="text" class="form-control" name="contact_no" id="contact_no" value="<?php echo isset($_SESSION['contact_no']) ? htmlspecialchars($_SESSION['contact_no']) : ''; ?>" readonly required>
            </div>
            <button type="submit" name="submit" class="btn btn-info form-control">Send OTP</button>
        </form>
    </div>
</body>
</html>