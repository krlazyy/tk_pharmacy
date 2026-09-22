<?php
session_start();
include 'includes/conn.php';
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
$user_id=$_SESSION['user_id'];
$sql="SELECT * from users where user_id=$user_id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$email=$row['email'];
$first_name=$row['first_name'];
$last_name=$row['last_name'];
$middle_name=$row['middle_name'];
$province=$row['province'];
$city=$row['city'];
$barangay=$row['barangay'];
$address=$row['address'];
$contact_no=$row['contact_no'];
$gender=$row['gender'];
$registration_type=$row['registration_type'];
$birth_date=$row['birth_date'];
$age=$row['age'];
$fphoto = "includes/images/".$row['fphoto'];
$bphoto = "includes/images/".$row['bphoto'];

//for testing only can patch to domain
$sample_id = "$user_id" - 1;

$sql_query = "SELECT * FROM authorization WHERE user_id = $sample_id";
$result = mysqli_query($conn, $sql_query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $qrcode = "includes/" . $row['qrcode'];
    
} else {
    // Error handling if no result found
    // echo "No record found for user_id: " . htmlspecialchars($user_id);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Tinig Kalinga Home</title>
        <meta name="description" content="">
        <link rel="icon" type="image/x-icon" href="includes/images/favicon.ico">

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- owl carousel -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/includes/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/includes/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- custom css -->
        <link rel = "stylesheet" href = "includes/css/main.css" />
        <link rel = "stylesheet" href = "includes/css/utilities.css" />
        <!-- normalize.css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel = "stylesheet" href = "includes/css/style.css" />
        <style type="text/css">
    nav {
  display: flex;
  justify-content: center; /* Center the entire navbar */
  background-color: #058789;
  padding: 13px;
  gap: 5px; /* Adjust spacing between items */
}

nav a, .dropbtn {
  text-decoration: none;
  color: #f5f5f5; /* White Smoke */
  font-size: 15px;
  text-align: center;
  padding: 8px 15px; /* Reduce padding for narrower gaps */
  display: block;
  cursor: pointer;
  border-radius: 4px; /* Optional: add a slight roundness */
}

nav a:hover, .dropbtn:hover {
  text-decoration: none;
  color: #d1d1d1; /* Slightly darker hover color */
  background-color: #034d49; /* Hover background color */
}

.dropdown {
  position: relative;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #058789;
  min-width: 140px; /* Slightly narrower dropdown */
  box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
  z-index: 1;
}

.dropdown-content a {
  display: block;
  padding: 8px 15px; /* Match navbar padding */
  color: whitesmoke;
  text-decoration: none;
  transition: background-color 0.3s ease;
}

.dropdown-content a:hover {
  background-color: #034d49;
}

.dropdown:hover .dropdown-content {
  display: block; /* Show dropdown on hover */
}

/* Responsive styling */
@media screen and (max-width: 600px) {
  nav {
    flex-direction: column;
    align-items: center; /* Center items in mobile view */
  }
  nav a, .dropdown {
    width: 100%;
    text-align: center; /* Adjust alignment for mobile */
  }
  .dropdown-content {
    position: relative;
  }
}

        </style>
    </head>
    <body>
          <nav>
    <a href="index.php">Home</a>
    <a href="about.php">About Us</a>
    <a href="contact.php">Contact</a>

    <div class="dropdown">
      <button class="dropbtn" style="margin-top:4px;">Shop</button>
      <div class="dropdown-content">
        <a href="products.php">Product</a>
        <a href="transactionlog.php">Transaction</a>
        <a href="order_cancel.php">Refund</a>
      </div>
    </div>

    <div class="dropdown">
      <button class="dropbtn" style="margin-top:4px;">Prescription</button>
      <div class="dropdown-content">
        <a href="prescription_add.php">Prescription</a>
        <a href="notification.php">Notification</a>
      </div>
    </div>

    <div class="dropdown">
      <button class="dropbtn" style="margin-top:4px;">Account</button>
      <div class="dropdown-content">
        <a href="account.php">Settings</a>
        <a href="logout.php">Logout</a>
      </div>
    </div>
<!-- Cart -->
<?php
            $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);
         ?>
      <a href="cart.php" class="cart" style="margin-top:2px;">
         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" /></svg>
      </a>
  </nav><br>
        <!-- Home Section -->
        <div class="element-one">
            <img src = "includes/images/element-img-1.png" alt = "">
        </div>
        <div class="container">
            <div class="row">
                <div class="container blurb" style="padding-bottom: 80px; margin-right:1%; margin-bottom: 1%; border: solid white 1px; border-radius: 5px;">
                    <div class="value" style="font-size: 3vh;">Hello, <?= $last_name ?>, <?= $first_name ?> <?= $middle_name ?>. </div>
                    <label for="photo" style="margin-top:5px; margin-bottom:5px;">QR Code (Authorized Personnel): </label><br>
                    <img id="myImage" src="<?= $qrcode ?>" alt="QR Code" width="200" class="hidden"><br>

                    <!-- Buttons for showing and hiding QR Code -->
                    <button class="btn-lg btn-info" id="showBtn" onclick="showImage()">Show Image</button>
                    <button class="btn-lg btn-info hidden" id="hideBtn" onclick="hideImage()">Hide Image</button>

                    <h2>Order Notification</h2>
                    <div class="container-fluid">

                        <?php
                        $sql = "SELECT * FROM reciept WHERE user_id='$user_id'";
                        $query = $conn->query($sql);

    // Check if there are any rows in the result
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            echo "
            <p style='border: 2px solid white; padding: 20px; font-size:1.35vh;'>
                Hello " . $row['name'] . "! Kindly proceed to our store and pick up your order. <br><br>
                Your Reference no. is " . $row['track_code'] . "<br>
                Payment Method: " . $row['method'] . "<br><br>
                <i>Important: You only have 24 hours to pick up your order. Please get in touch with the store to make alternative arrangements if you cannot pick up within this time frame. Email: tinigkalinga23@gmail.com<br><br>
Thank you!</i></p>
            ";
        }
    } else {
        // Message when no notifications are found
        echo "
        <p style='border: 2px solid white; padding: 20px; font-size:1.35vh; text-align:center;'>
            No notification
        </p>
        ";
    }
?>

</div>
            </div>
            </div>
            <div class="row">
            <div class="container blurb" style="border: solid white 1px; border-radius: 5px; margin-bottom: 1%;">
                <div id="ad-results">
                    <?php

include 'includes/conn.php';

// Fetch and display records
$sql = "SELECT ads_id, name, image, address, tagline, bio FROM advertisement";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Advertisements</h2>";
    echo "<div class='ads-list'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='ad-item'>";
        echo "<h3>" . $row["name"] . "</h3>";
        echo "<center><img src='uploaded_img/" . $row["image"] . "' alt='" . $row["name"] . "' style='width:100px;height:auto;'></center>";
        echo "<p>" . $row["address"] . "</p>";
        echo "<p>" . $row["tagline"] . "</p>";
        echo "<p>" . $row["bio"] . "</p>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<div class='container'>No advertisements found.</div>";
}

$conn->close();
?>
<style>
    /* Container styling for grid layout */
    .ads-list {
        display: flex;
        flex-wrap: wrap; /* Allows items to wrap to the next line */
        gap: 20px; /* Space between items */
        padding: 20px;
        justify-content: space-evenly; /* Distribute items evenly */
    }

    /* Individual ad item styling */
    .ad-item {
        text-align: center;
        background-color: #fff; /* White background */
        width: calc(33% - 40px); /* Each item takes up about 1/3 of the width with some spacing */
        min-width: 250px; /* Minimum width for smaller screens */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow for depth effect */
        padding: 20px;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Hover effect */
    .ad-item:hover {
        transform: translateY(-5px); /* Slight pop-up effect */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); /* Darker shadow on hover */
    }

    /* Image styling */
    .ad-image {
        width: 100%; /* Image takes up full width of the container */
        height: auto;
        border-radius: 5px; /* Rounded corners for the image */
        margin-bottom: 10px;
    }

    /* Headings and text styling */
    .ad-item h3 {
        color: black;
        font-size: 1.5em;
        margin: 0 0 10px;
    }
    
    .ad-item p {
        color: black;
        font-size: 1em;
        margin: 5px 0;
    }
</style>
                </div>
                <div class="container-fluid" style="padding-top: 100px; text-decoration: none;">
                    <button class="btn btn-info" style=""><a href="products.php">Check out now!</a></button>
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
<script>
    function showImage() {
        document.getElementById("myImage").classList.remove("hidden");
        document.getElementById("showBtn").classList.add("hidden");
        document.getElementById("hideBtn").classList.remove("hidden");
    }

    function hideImage() {
        document.getElementById("myImage").classList.add("hidden");
        document.getElementById("showBtn").classList.remove("hidden");
        document.getElementById("hideBtn").classList.add("hidden");
    }
</script>
</html>
      <?php
}else{
     header("Location: login.php");
     exit();
}
?>
