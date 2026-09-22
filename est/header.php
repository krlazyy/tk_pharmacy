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
   color: #d1d1d1;
   text-decoration: none;
   transition: background-color 0.3s ease;
}

.dropdown-menu a:hover {
   background-color: #034d49;
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
      <a href="index_establishment.php">Home</a>
      <a href="inventory.php">Inventory</a>

      <!-- Shop Dropdown -->
      <div class="dropdown">
         <a class="dropdown-toggle" href="#" role="button">Transaction <span class="arrow-down"></span></a>
         <ul class="dropdown-menu">
            <li><a class="dropdown-item" style="color: #058789;" href="transaction.php">Transaction</a></li>
            <li><a class="dropdown-item" style="color: #058789;" href="prescriptions.php">Prescription</a></li>
            <li><a class="dropdown-item" style="color: #058789;" href="order_refund.php">Refund</a></li>
            
         </ul>
      </div>

      <!-- Account Dropdown -->
      <div class="dropdown">
         <a class="dropdown-toggle" href="#" role="button">Account <span class="arrow-down"></span></a>
         <ul class="dropdown-menu">
            <li><a class="dropdown-item" style="color: #058789;" href="account_establishment.php">Settings</a></li>
            <li><a class="dropdown-item" style="color: #058789;" href="logout_establishment.php">Logout</a></li>
         </ul>
      </div>
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
