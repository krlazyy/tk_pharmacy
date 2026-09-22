<?php
session_start();
include '../includes/conn.php';
if (isset($_SESSION['establishment_id']) && isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Tinig Kalinga Establishment Dashboard</title>
    <link rel="icon" type="image/x-icon" href="../includes/images/favicon.ico">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- owl carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/includes/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/includes/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css -->
    <link rel="stylesheet" href="../includes/css/main.css" />
    <link rel="stylesheet" href="../includes/css/utilities.css" />
    
    <!-- normalize.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../includes/css/style.css" />
    
    <style>
        .form-control {
            color: black;
            background-color: white;
        }
        
        nav {
            display: flex;
            justify-content: center;
            background-color: #058789;
            padding: 13px;
            gap: 5px;
        }

        nav a, .dropbtn {
            text-decoration: none;
            color: #f5f5f5;
            font-size: 15px;
            text-align: center;
            padding: 8px 15px;
            display: block;
            cursor: pointer;
            border-radius: 4px;
        }

        nav a:hover, .dropbtn:hover {
            text-decoration: none;
            color: #d1d1d1;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #058789;
            min-width: 140px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            background-color: whitesmoke;
            display: block;
            padding: 8px 15px;
            color: #058789;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .dropdown-content a:hover {
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        @media screen and (max-width: 600px) {
            nav {
                flex-direction: column;
                align-items: center;
            }
            nav a, .dropdown {
                width: 100%;
                text-align: center;
            }
            .dropdown-content {
                position: relative;
            }
        }
    </style>
</head>
<body>
    <nav>
        <a href="index_establishment.php">Home</a>
        <a href="inventory.php">Inventory</a>

        <div class="dropdown">
            <button class="dropbtn" style="margin-top: 3px;">Transaction</button>
            <div class="dropdown-content" style="background-color: whitesmoke;">
                <a href="transaction.php">Transaction</a>
                <a href="prescriptions.php">Prescription</a>
                <a href="order_refund.php">Refund</a>
            </div>
        </div>

        </div>

        <div class="dropdown">
            <button class="dropbtn" style="margin-top: 3px;">Account</button>
            <div class="dropdown-content" style="background-color: whitesmoke;">
                <a href="account_establishment.php">Settings</a>
                <a href="logout_establishment.php">Logout</a>
            </div>
        </div>

        <div class="element-one">
            <img src="../includes/images/element-img-1.png" alt="">
        </div>
    </nav>

    <div class="banner blurb">
        <center><h1><b>Add Advertisement</b></h1></center>
        <div class="container">
            <div class="banner-content">
                <center><img src="../includes/images/logo-big.png" alt="Logo"></center>
                <form action="insert_ad.php" method="POST" enctype="multipart/form-data">
                    <label for="name" class="form-data">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required><br>

                    <label for="image" class="form-data">Image:</label>
                    <input type="file" id="image" name="image" accept="image/*" required onchange="previewImage(event)"><br>

                    <img id="preview" src="" alt="Image Preview" style="display: none; max-width: 200px; margin-top: 10px;"><br>

                    <label for="address" class="form-data">Address:</label>
                    <input type="text" id="address" name="address" class="form-control" required><br>

                    <label for="tagline" class="form-data">Tagline:</label>
                    <input type="text" id="tagline" name="tagline" class="form-control" required><br>

                    <label for="bio" class="form-data">Bio:</label>
                    <textarea id="bio" name="bio" class="form-control" required></textarea><br>

                    <button type="submit" class="btn-lg btn-info">Submit</button><br>
                </form>
            </div>
        </div>
    </div>

    <div class="container blurb" style="margin-bottom: 2%;">
        <div id="ad-results">
            <?php include 'display_ads.php'; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../includes/js/script.js"></script>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');
            const reader = new FileReader();
            
            reader.onload = function() {
                preview.src = reader.result;
                preview.style.display = 'block';
            }
            
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>
<?php
}else{
    header("Location: login_establishment.php");
    exit();
}
?>
