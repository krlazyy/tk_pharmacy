<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    
    <title>Tinig Kalinga Email/Mobile Verification</title>
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
    height: 350px;
    background-color: rgba(0, 0, 0, 0.2); /* Black with 20% opacity */
    border-radius: 10px; /* Rounded corners for a glass effect */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow effect */
    backdrop-filter: blur(10px); /* Blur effect (for modern browsers) */
  }
    .progress-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 800px;
      margin: 20px auto;
    }

    .progress-container .line {
      flex: 1;
      height: 2px;
      background-color: #90C3C0;
    }

    .progress-step {
      width: 50px;
      height: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 2px solid #90C3C0;
      border-radius: 50%;
      background-color: white;
      color: #90C3C0;
      font-weight: bold;
    }

    .progress-step.completed {
      background-color: #058789; /* Green background */
      color: white; /* White text */
      border-color: whitesmoke; /* Green border */
    }
    span{
        color: red;
    }
    .btn:hover{
         background-color: #058789;
         color: whitesmoke;
        }
  </style>
</head>
<body>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 <h1 style="text-align: center; padding-top: 5%; color: whitesmoke;"><b>OTP Verification</b></h1>
  <div class="progress-container" style="margin-top: 2%; padding-top: 1%; padding-bottom:3%;">
  <div class="progress-step">1</div>
  <div class="line"></div>
  <div class="progress-step">2</div>
  <div class="line"></div>
  <div class="progress-step completed">3</div>
</div>
  <div class="container blurb" style="margin-top: 2%; ">  
  
   

    <p style="text-align: center; color:whitesmoke; font-size: 1.5vh; padding-top: 1%; padding-bottom: 1%;">Tinig Kalinga requires otp verification for security purposes</p>

    
    <div class="mb-3">
     <a href="otp_email.php" style="text-decoration: none;" class="btn btn-info">Verify OTP Email</a>
     <a href="otp_mobile.php" style="text-decoration: none;" class="btn btn-info">Verify OTP Mobile #</a>
     <a href="../logout.php" style="text-decoration: none;" class="btn btn-danger">Back</a>

  </div>
</body>
</html>