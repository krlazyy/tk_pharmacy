<?php
session_start();
include '../includes/conn.php';
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="../includes/images/favicon.ico">
	<!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/includes/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/includes/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- custom css -->
  <link rel = "stylesheet" href = "../includes/css/main.css" />
  <link rel = "stylesheet" href = "../includes/css/utilities.css" />
  <!-- normalize.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel = "stylesheet" href = "../includes/css/style.css" />
  <title>Admin Dashboard</title>
</head>
<body style="background-color: #458ff6;">
  <div class="page-wrapper">
    <!-- header -->
    <header class = "header">
      <nav class = "navbar">
        <div class="container">
          <div class="navbar-content d-flex justify-content-between align-items-center">
            <div class = "brand-and-toggler d-flex align-items-center justify-content-between">
              <a href = "admin.php" class = "navbar-brand d-flex align-items-center">
                <span><img src="../includes/images/logo.png"></span>
              </a>
              <button type = "button" class = "d-none navbar-show-btn">
                <i class = "fas fa-bars"></i>
              </button>
            </div>

            <div class = "navbar-box">
              <button type = "button" class = "navbar-hide-btn">
                <i class = "fas fa-times"></i>
              </button>

              <ul class = "navbar-nav d-flex align-items-center">
                <li class = "nav-item">
                  <a href = "admin.php" class = "nav-link text-white nav-active text-nowrap">Home</a>
                </li>
                <li class = "nav-item">
                  <a href = "admin_consumer.php" class = "nav-link text-white text-nowrap">Consumers</a>
                </li>
                <li class = "nav-item">
                  <a href = "admin_establishment.php" class = "nav-link text-white text-nowrap">Establishments</a>
                </li>
                <li class = "nav-item">
                  <a href = "logout_admin.php" class = "nav-link text-white text-nowrap">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <!-- Home Section -->
        <div class="element-one">
                    <img src = "includes/images/element-img-1.png" alt = "">
                </div>

                <div class="banner">
                    <div class="container">
                        <div class="banner-content">
                            <div class="banner-left">
                                <div class="content-wrapper">
                                    <h1 class="banner-title">Virtual healthcare <br> for Admin</h1>
                                    <p class="text text-white">Tinig Kalinga provides progressive, and affordable healthcare, accessible on mobile and onnline for everyone</p>
                                    <a href = "registry_establishment.php" class="btn btn-secondary">Create Establishment</a>
                                </div>
                            </div>

                            <div class = "banner-right d-flex align-items-center justify-content-end">
                                <img src = "../includes/images/banner-image.png" alt = "">
                            </div>
                        </div>
                    </div>
                </div>
            </header>

    </body>
    </html>
    <?php
}else{
     header("Location: login_admin.php");
     exit();
}
?>