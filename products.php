<?php
session_start();
@include 'includes/conn.php';
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
if(isset($_POST['add_to_cart'])){
   $product_id = $_POST['id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;
   $available_quantity = $_POST['product_quantity'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, product_id, price, image, quantity, available_quantity) VALUES('$product_name', '$product_id', '$product_price', '$product_image', '$product_quantity','$available_quantity')");
      $message[] = 'product added to cart succesfully';
   }

}

if (!$select_product) {
    die("Query failed: " . mysqli_error($conn));
}

$fetch_product = mysqli_fetch_assoc($select_product);

if (!$fetch_product) {
    echo "<p>Product not found.</p>";
    return; // Exit or handle the error appropriately
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tinig Kalinga Products</title>
   <link rel="icon" type="image/x-icon" href="includes/images/favicon.ico">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="includes/css/style.css">
   <style type="text/css">
      .form-control {
  display: block;
  width: 100%;
  height: 34px;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555;
  background-color: #fff;
  background-image: none;
  border: 1px solid #ccc;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
       -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
          transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
.btn-info {
  color: #fff;
  background-color: #5bc0de;
  border-color: #46b8da;
}
.btn-info:focus,
.btn-info.focus {
  color: #fff;
  background-color: #31b0d5;
  border-color: #1b6d85;
}
.btn-info:hover {
  color: #fff;
  background-color: #31b0d5;
  border-color: #269abc;
}
.btn-info:active,
.btn-info.active,
.open > .dropdown-toggle.btn-info {
  color: #fff;
  background-color: #31b0d5;
  border-color: #269abc;
}
.btn-info:active:hover,
.btn-info.active:hover,
.open > .dropdown-toggle.btn-info:hover,
.btn-info:active:focus,
.btn-info.active:focus,
.open > .dropdown-toggle.btn-info:focus,
.btn-info:active.focus,
.btn-info.active.focus,
.open > .dropdown-toggle.btn-info.focus {
  color: #fff;
  background-color: #269abc;
  border-color: #1b6d85;
}
.btn-info:active,
.btn-info.active,
.open > .dropdown-toggle.btn-info {
  background-image: none;
}
.btn-info.disabled,
.btn-info[disabled],
fieldset[disabled] .btn-info,
.btn-info.disabled:hover,
.btn-info[disabled]:hover,
fieldset[disabled] .btn-info:hover,
.btn-info.disabled:focus,
.btn-info[disabled]:focus,
fieldset[disabled] .btn-info:focus,
.btn-info.disabled.focus,
.btn-info[disabled].focus,
fieldset[disabled] .btn-info.focus,
.btn-info.disabled:active,
.btn-info[disabled]:active,
fieldset[disabled] .btn-info:active,
.btn-info.disabled.active,
.btn-info[disabled].active,
fieldset[disabled] .btn-info.active {
  background-color: #5bc0de;
  border-color: #46b8da;
}
.btn-info .badge {
  color: #5bc0de;
  background-color: #fff;
}
.btn-sm,
.btn-group-sm > .btn {
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px;
}

.box {
    position: relative; /* Ensures proper positioning context */
    overflow: hidden; /* Clips content outside the box */
    width: 100%; /* Adjust based on your layout */
    height: auto; /* Maintain aspect ratio or set a fixed height */
    max-width: 300px; /* Set max width for responsive design */
    background: #f4f4f4; /* Optional background color */
    padding: 15px; /* Adds padding inside the box */
    border-radius: 10px; /* Optional rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Adds shadow for visual appeal */
    text-align: center; /* Center aligns text inside the box */
    margin: 10px auto; /* Center box in its container */
}

.box img {
    max-width: 100%; /* Ensures image scales within the box */
    height: auto; /* Maintains aspect ratio */
    object-fit: cover; /* Ensures the image fills the box nicely */
    border-radius: 5px; /* Optional: rounds the image corners */
}
.navtest{
color: whitesmoke;
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
<style type="text/css">
/* General Styles */
.navbar {
   display: flex; /* Flex layout for desktop and mobile */
   justify-content: center; /* Center align the navbar */
   align-items: center;
   background-color: #058789;
   padding: 18px 0;
}

.navbar a {
   color: whitesmoke;
   text-decoration: none;
   margin: 0 15px;
   font-size: 16px; /* Uniform font size */
   transition: color 0.3s ease;
}

.navbar a:hover {
   color: #d1d1d1;
}

/* Dropdown Specific */
.dropdown {
   position: relative;
}

.dropdown-menu {
   display: none; /* Hide dropdown by default */
   position: absolute;
   top: 100%;
   left: 0;
   background-color: #058789;
   border-radius: 5px;
   padding: 10px 0;
   z-index: 1000;
   min-width: 150px;
}

.dropdown:hover .dropdown-menu {
   display: block; /* Show dropdown on hover */
}

.dropdown-menu a {
   display: block;
   padding: 10px 20px;
   color: whitesmoke;
   text-decoration: none;
   transition: background-color 0.3s ease;
}

.dropdown-menu a:hover {
    background-color: transparent;
}

/* Responsive Adjustments (No Collapse) */
@media (max-width: 768px) {
   .navbar {
      flex-wrap: wrap; /* Wrap items if space is limited */
   }

   .navbar a {
      font-size: 16px; /* Keep font size consistent */
      margin: 5px 10px;
   }

   .dropdown-menu {
      position: absolute; /* Dropdown remains same for mobile */
   }
}
/* Remove arrow icon from dropdown links */
.dropdown-toggle {
    position: relative; /* Retain positioning for usability */
}

/* Hide any added arrow or pseudo-element */
.dropdown-toggle::after {
    content: none; /* Remove any generated content */
}
.btn:hover{
   background-color: #058789;
}
</style>


<!-- Add Header -->
<header class="header">
   

   <!-- Navbar Links -->
   <nav class="navbar">
      <a href="index.php">Home</a>
      <a href="about.php">About Us</a>
      <a href="contact.php">Contact</a>

      <!-- Shop Dropdown -->
      <div class="dropdown">
         <a class="dropdown-toggle" href="#" role="button">Shop <span class="arrow-down"></span></a>
         <ul class="dropdown-menu">
            <li><a class="dropdown-item" style="color: whitesmoke;" href="products.php">Products</a></li>
            <li><a class="dropdown-item" style="color: whitesmoke;" href="transactionlog.php">Transaction</a></li>
            <li><a class="dropdown-item" style="color: whitesmoke;" href="order_cancel.php">Refund</a></li>
         </ul>
      </div>

      <!-- Prescription Dropdown -->
      <div class="dropdown">
         <a class="dropdown-toggle" href="#" role="button">Prescription <span class="arrow-down"></span></a>
         <ul class="dropdown-menu">
            <li><a class="dropdown-item" style="color: whitesmoke;" href="prescription_add.php">Add Prescription</a></li>
            <li><a class="dropdown-item" style="color: whitesmoke;" href="notification.php">Notification</a></li>
         </ul>
      </div>

      <!-- Account Dropdown -->
      <div class="dropdown">
         <a class="dropdown-toggle" href="#" role="button">Account <span class="arrow-down"></span></a>
         <ul class="dropdown-menu">
            <li><a class="dropdown-item" style="color: whitesmoke;" href="account.php">Settings</a></li>
            <li><a class="dropdown-item" style="color: whitesmoke;" href="logout.php">Logout</a></li>
         </ul>
      </div>

      <!-- Cart -->
      <a href="cart.php" class="cart">
         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
         </svg>
         <?php
            $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);
         ?>
         <span><?php echo $row_count; ?></span>
      </a>
   </nav>

</header>




<!-- JavaScript for Dropdown and Mobile Menu -->
<script>
function toggleMenu() {
   const navbar = document.querySelector(".navbar");
   navbar.classList.toggle("active");
}

function toggleDropdown(element) {
   element.classList.toggle("active");
}
document.getElementById("menu-btn").addEventListener("click", function () {
   const navbar = document.querySelector(".navbar");
   navbar.classList.toggle("active");
});

</script>

<!-- Link Bootstrap JS (Dropdown needs JS to function) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<div class="container blurb" style="margin-top: 2%; margin-bottom: 2%;">


<!-- Products Section -->
<section class="products">
   <h1 style="font-size: 6vh; margin-bottom:3%;"><b>Latest Products</b></h1>
<!-- Search Form -->
<form id="searchForm" action="" method="GET" style="margin-bottom: 2%;">
   <input type="text" class="form-control" id="search_bar" name="search_bar" placeholder="Search" style="float: left; margin-bottom: 1%;" value="<?php echo isset($_GET['search_bar']) ? $_GET['search_bar'] : ''; ?>" onkeydown="if(event.key === 'Enter'){document.getElementById('searchForm').submit(); return false;}">
   <button id="voiceSearchBtn" type="button" class="btn-md btn-info" style="float: left; margin-left: 5px; margin-bottom: 1%; padding: 8px; border-radius: 5px;">
      🎤 Press to Speak
   </button>
   <button type="submit" id="search" name="search" class="btn-md btn-info" style="margin-left: 5px; margin-bottom: 1%; padding: 8px; border-radius: 5px;">
      🔍 Search
   </button>
</form>

<div class="box-container">
   <?php
   // Get search keyword from form
   $search_keyword = '';
   if(isset($_GET['search_bar'])) {
      $search_keyword = $_GET['search_bar'];
   }

   // SQL query to search products
   $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE `name` LIKE '%$search_keyword%'");

   if(mysqli_num_rows($select_products) > 0){
      while($fetch_product = mysqli_fetch_assoc($select_products)){
   ?>

   <form action="" method="post">
      <div class="box">
         <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="products">
         <h3><?php echo $fetch_product['name']; ?></h3>
         <div class="price">₱<?php echo $fetch_product['price']; ?></div>
         <div class="quantity">Quantity: <?php echo $fetch_product['quantity']; ?></div>

         <input type="hidden" name="id" value="<?php echo $fetch_product['id']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
         <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
         <input type="hidden" name="product_quantity" value="<?php echo $fetch_product['quantity']; ?>">

         <?php if($fetch_product['quantity'] > 0) { ?>
            <input type="submit" class="btn btn-info" value="Add To Cart" name="add_to_cart">
         <?php } else { ?>
            <button class="btn" disabled>Out of Stock</button>
         <?php } ?>
      </div>
   </form>

   <?php
      }
   } else {
      echo "<p style='font-size:3vh;'>No item found</p>";
   }
   ?>
</div>


</section>


</div>
<!-- jquery cdn -->
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<!-- owl carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- custom js -->
<script src = "includes/js/script.js"></script>
<!-- custom js file link  -->
<script src="js/script.js"></script>
<!-- search script -->
<!-- <script type="text/javascript">
  $(document).ready(function(){
     $('#search').keyup(function(){
       search_table($(this).val());
    });

     function search_table(value){
      $('#myTable tr').each(function(){
        var found = 'false';
        $(this).each(function(){
          if($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0){
            found='true';
         }
      });
        if (found=='true') {
          $(this).show();
       }
       else{
          $(this).hide();
       }
    });
   }
});
</script> -->

<!-- voice recognition script --> 
<script>
    const searchInput = document.getElementById('search_bar'); // Use search_bar, not search button
    const voiceSearchBtn = document.getElementById('voiceSearchBtn');

    // Check if browser supports SpeechRecognition
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

    if (SpeechRecognition) {
        const recognition = new SpeechRecognition();
        recognition.lang = 'en-US'; // Set the language
        recognition.interimResults = false;

        voiceSearchBtn.addEventListener('click', () => {
            recognition.start();
        });

        recognition.addEventListener('result', (event) => {
            const transcript = event.results[0][0].transcript;
            searchInput.value = transcript; // Set the value to the search input
            document.getElementById('searchForm').submit(); // Submit the form automatically after speech input
        });

        recognition.addEventListener('end', () => {
            recognition.stop();
        });
    } else {
        alert('Your browser does not support speech recognition.');
    }
</script>
</body>
</html>
      <?php
}else{
     header("Location: login.php");
     exit();
}
?>


