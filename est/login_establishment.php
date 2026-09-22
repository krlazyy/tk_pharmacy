<?php 
    session_start();
    include '../includes/conn.php';
    if (isset($_SESSION['establishment_id']) && isset($_SESSION['email'])) {
header("Location: index_establishment.php");
     exit();
}
else{
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Tinig Kalinga Login</title>
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

        <style type="text/css">
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1%;
}

.blurb-content,
.blurb-login {
    flex: 1;
    box-shadow: 0px 4px 24px 1px rgba(0, 0, 0, 0.28);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    background-repeat: no-repeat;
    background-size: cover;
    padding: 30px; /* Reduced padding */
    min-height: 500px;
    border-radius: 10px;
    box-sizing: border-box;
    overflow-wrap: break-word; /* Ensures long words break and wrap */
    margin-bottom: 1%;
}

.blurb-content {
    background: #058789;
    color: whitesmoke;
    text-align: center;
    font-size: 1.5rem; /* Adjust font size as needed */
}

.blurb-login {
    background: rgba(255, 255, 255, 0.8);
    color: #058789;
    text-align: center;
    font-size: 1.5rem; /* Adjust font size as needed */
}

        </style>
</head>
<body>
<center><img src="../includes/images/logo-big.png" width="350"></center>
<div class="container-fluid">
    <div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="blurb-content">
        <h1>Mission</h1>
            <p>Our mission is to provide an accessible and secure ordering system that allows senior citizens and people with disabilities (PWD) to easily get the products and services that they need while also guaranteeing that authorized representatives can serve them in a safe and efficient way. We are dedicated to improving their quality of life by delivering a user-friendly, accessible, and trustworthy platform that is tailored to their specific requirements and preferences.</p>
            <h1>Vision</h1>
            <p>Our vision is to become the most trusted provider of a safe ordering system for senior citizens and PWD, with authorized representatives, by using cutting-edge technology and a deep dedication to inclusiveness and security. We foresee a future in which people in these places may place orders with confidence and independence, knowing that their information is secure and that help is quickly available when required.</p>
    </div>
</div>
    <div class="col-sm-12 col-md-6">
        <div class="blurb-login">
        <div class="head-meassage">
            <h1>Mabuhay!</h1>
            <p>Establishment for Tinig Kalinga</p>
        </div>
        
<?php
// Check if there is an error message in the URL
$error = isset($_GET['error']) ? $_GET['error'] : '';
?>

<form action="logtest_establishment.php" method="POST">
    <div class="form-group has-feedback">
        <input type="email" class="form-control" id="name" name="email" placeholder="Email" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <div style="position: relative;">
            <input type="password" class="form-control" id="password" name="password" placeholder="password" oninput="checkPassword()" required>
            <span id="showPassword" class="eye-icon" onclick="togglePasswordVisibility()" style="font-size: 20px; position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; color: black;">
                <i class="fa fa-eye"></i>
            </span>
    </div>
    <center style="margin-top: 3%;">
        <input type="submit" name="submit" class="btn btn-info" value="Login"><br><br>
        <a href="forget_password_est.php">Forget Password?</a>
    </center>
</form>

<?php if ($error): ?>
    <!-- Display error message below the form -->
    <div class="alert alert-danger" style="margin-top: 10px; text-align: center;">
        <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>
    </div>
</div>
    <?php
        if(isset($_SESSION['error'])){
            echo "
                <div class='callout callout-danger text-center mt20'>
                    <p>".$_SESSION['error']."</p> 
                </div>
            ";
            unset($_SESSION['error']);
        }
    ?>
</div>
</div>
</div>
</body>
<!-- password security -->
<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById("password");
        const eyeIcon = document.getElementById("showPassword");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.innerHTML = '<i class="fa fa-eye-slash"></i>';
        } else {
            passwordInput.type = "password";
            eyeIcon.innerHTML = '<i class="fa fa-eye"></i>';
        }
    }

    function toggleConfirmPasswordVisibility() {
        const confirmPasswordInput = document.getElementById("cpassword");
        const eyeIcon = document.getElementById("showConfirmPassword");

        if (confirmPasswordInput.type === "password") {
            confirmPasswordInput.type = "text";
            eyeIcon.innerHTML = '<i class="fa fa-eye-slash"></i>';
        } else {
            confirmPasswordInput.type = "password";
            eyeIcon.innerHTML = '<i class="fa fa-eye"></i>';
        }
    }

    function updateCircleColor(circleId, condition) {
        const circle = document.getElementById(circleId);
        circle.style.color = condition ? 'green' : 'grey';
    }
</script>
</html>
<?php
}
  ?>