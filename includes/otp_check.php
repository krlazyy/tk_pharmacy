<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    
    <title>OTP Email/Mobile Verification</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> 
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<style type="text/css">
  body {
      min-height: 100vh;
      background-color: #198754;
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
      background-color: #058789;
    }
    .container {
    width: 500px;
    height: 500px;
    background-color: rgba(0, 0, 0, 0.2); /* Black with 20% opacity */
    border-radius: 10px; /* Rounded corners for a glass effect */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow effect */
    backdrop-filter: blur(10px); /* Blur effect (for modern browsers) */
  }
</style>
</head>
<body>
    <div class="container blurb" style="margin-top: 2%;">  
  <h1 style="text-align: center; margin-top: 60px; color: whitesmoke;">OTP Verification</h1>

    <p style="text-align: center; color:whitesmoke; font-size: 1vh; padding-top: 1%; padding-bottom: 1%;">Tinig Kalinga requires otp verification for security purposes</p>

     <div role="alert" style="text-align: center; color:whitesmoke; font-size: 1vh; margin-top: 5%; padding-top: 2%; padding-bottom: 2%; border: #058789 2px solid; border-radius:10px; color: black; background-color: whitesmoke; margin-bottom: 2%;">
      <?php
      if(isset($_REQUEST['msg']))
        echo $_REQUEST['msg'];
      ?>

    </div>

    <div class="mb-3">
     <a href="otp_email.php" style="text-decoration: none;" class="btn btn-info">Verify OTP Email</a>
     <a href="otp_mobile.php" style="text-decoration: none;" class="btn btn-info">Verify OTP Mobile #</a>

  </div>
    
</body>
</html>

