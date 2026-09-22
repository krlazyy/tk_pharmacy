<?php
session_start();
include 'includes/conn.php';
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tinig Kalinga About Us</title>
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="icon" type="image/x-icon" href="includes/images/favicon.ico">

   <!-- font awesome cdn link  -->  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="includes/css/style.css">
   <style type="text/css">
      h2{
         font-size: 5vh;
      }
      p{
         font-size: 1.5vh;
         font-weight: 0vh;
      }


   </style>
   
</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>


<?php 
include 'header.php';
?>
<!-- Link Bootstrap JS (Dropdown needs JS to function) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            
            <div class="container" style="margin-top: 1%;">
                <center><img src="includes/images/logo-big.png" width="200px" style="margin-bottom: 0%;"></center>
               <h1 style="font-size: 6vh;"><b>About Us</b></h1>
               <div class="container-fluid">
               <h2>Mission</h2><br>
               <p>Our mission is to provide an accessible and secure ordering system that allows senior citizens and people with disabilities (PWD) to easily get the products and services that they need while also guaranteeing that authorized representatives can serve them in a safe and efficient way. We are dedicated to improving their quality of life by delivering a user-friendly, accessible, and trustworthy platform that is tailored to their specific requirements and preferences.</p>
                    <br>
                    <br>
               <h2>Vision</h2><br>
               <p>Our vision is to become the most trusted provider of a safe ordering system for senior citizens and PWD, with authorized representatives, by using cutting-edge technology and a deep dedication to inclusiveness and security. We foresee a future in which people in these places may place orders with confidence and independence, knowing that their information is secure and that help is quickly available when required.</p>
                    <br>
                    <br>
               <h2>System</h2><br>
               <p>The proposed system is "Tinig Kalinga: A Secured Ordering System for Senior Citizen and Pesons With Disabilities with Authorized Representative". This system was created by Karylle Nicole A. Abante, Raver Lauren T. Bhambhani, Chery Mariz C. Diaz and Rixxa Geleine Florendo in the year 2023-2024. The Tinig Kalinga came from "Tinig" means "voice," and "Kalinga" means "care" or "protection." This means that we will stand as a voice for senior citizens and people with disabilities in order to provide them with simpler access to the medications they need. This system is made using the programming language PHP and the database is MySql.</p>
            </div>
            </div>

            <!-- jquery cdn -->
            <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
            <!-- owl carousel -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <!-- custom js -->
            <script src = "includes/js/script.js"></script>
         </body>
         </html>
      </body>
      </html>
      <?php
}else{
     header("Location: login.php");
     exit();
}
?>















