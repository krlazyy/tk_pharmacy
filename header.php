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
   background-color: #058789;
   
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

      <a href="notification.php">Notification</a>

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
