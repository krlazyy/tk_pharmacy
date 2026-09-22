<?php
session_start();
@include '../includes/conn.php';

if (isset($_SESSION['establishment_id'])) {
    $establishment_id = $_SESSION['establishment_id'];

    if (isset($_POST['change_password'])) {
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

        // Check if the new password meets minimum requirements
        if (strlen($password) < 6) {
            $message = "Password must be at least 6 characters long.";
        } elseif (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
            $message = "Password must include at least one uppercase letter, lowercase letter, number, and special character.";
        } elseif ($password === $cpassword) {
            // Hash the new password
            $hashed_password = sha1($password);

            // Update the password in the database
            $update_query = mysqli_query($conn, "UPDATE `establishment` SET password = '$hashed_password' WHERE establishment_id = '$establishment_id'");

            if ($update_query) {
                echo '<script>
                alert("Password updated successfully, you will be directed to Tinig Kalinga Establishment")
                window.location.href = "index_establishment.php";
          </script>';
            } else {
                $message = "Error updating password.";
            }
        } else {
            $message = "New password and confirm password do not match.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tinig Kalinga Change Password</title>
    <link rel="icon" type="image/x-icon" href="../includes/images/favicon.ico">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="images/favicon.ico">
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
<body>
</head>
<body>
    <center><img src="../includes/images/logo-big.png" width="350"></center>
    <div class="container" style="margin-top: 2%;">
        <h3>Change Password</h3>

        <?php if (isset($message)) echo "<p>$message</p>"; ?>





        <form action="" method="post">
            <label for="password" class="form-label">Password <span class="required">*</span></label>

        <div style="position: relative;">
            <input type="password" class="form-control" id="password" name="password" oninput="checkPassword()" required>
            <span id="showPassword" class="eye-icon" onclick="togglePasswordVisibility()" style="font-size: 20px; position: absolute; right: 10px; top: 50%; transform: translateY(-190%); cursor: pointer; color: black;">
                <i class="fa fa-eye"></i>
            </span>
            <div id="passwordRequirements" class="password-requirements">
                <div class="p-content">
                    <p style="margin-bottom: -5px; margin-left: 10px;">
                        <i id="lengthRequirementCircle" class="fa fa-circle" style="color: grey; margin-right: 5px;"></i>Must be 6 characters and above
                    </p>
                    <p style="margin-left: 10px;">
                        <i id="characterRequirementCircle" class="fa fa-circle" style="color: grey; margin-right: 5px;"></i>Include at least one of the following:
                    </p>
                    <p style="margin-left: 40px; margin-top: -15px;">◌ an upper case <span id="upperCaseRequirementCircle" class="requirement-circle"></span></p>
                    <p style="margin-left: 40px; margin-top: -20px;">◌ a lower case <span id="lowerCaseRequirementCircle" class="requirement-circle"></span></p>
                    <p style="margin-left: 40px; margin-top: -20px;">◌ a symbol <span id="symbolRequirementCircle" class="requirement-circle"></span></p>
                    <p style="margin-left: 40px; margin-top: -20px;">◌ a number <span id="numberRequirementCircle" class="requirement-circle"></span></p>
                </div>
            </div>
        </div>

        <label for="cpassword" class="form-label">Confirm Password <span class="required">*</span></label>
        <div style="position: relative;">
            <input type="password" class="form-control" id="cpassword" name="cpassword" oninput="checkPassword()" required>
            <span id="showConfirmPassword" class="eye-icon" onclick="toggleConfirmPasswordVisibility()" style="font-size: 20px; position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; color: black;">
                <i class="fa fa-eye"></i>
            </span>
        </div>
        <div id="passwordMatch" class="password-match"></div>
        <span id="cpassword_circle" class="requirement-circle"></span>
            <div id="passwordMatch" class="password-match"></div>
            <input type="submit" class="btn btn-info" name="change_password" value="Change Password">
        </form>
        <a href="login.php" class="btn btn-danger">Back to Login</a>
    </div>
</body>
<!-- password security -->
<script>
    function checkPassword() {
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('cpassword');
        const passwordMatchIndicator = document.getElementById('passwordMatch');
        
        // Validation criteria
        const lengthRequirement = passwordInput.value.length >= 6;
        const upperCaseRequirement = /[A-Z]/.test(passwordInput.value);
        const lowerCaseRequirement = /[a-z]/.test(passwordInput.value);
        const symbolRequirement = /[!@#$%^&*(),.?":{}|<>]/.test(passwordInput.value);
        const numberRequirement = /\d/.test(passwordInput.value);

        // Update requirement circles
        updateCircleColor('lengthRequirementCircle', lengthRequirement);
        const characterRequirement = upperCaseRequirement && lowerCaseRequirement && symbolRequirement && numberRequirement;
        updateCircleColor('characterRequirementCircle', characterRequirement);
        updateCircleColor('upperCaseRequirementCircle', upperCaseRequirement);
        updateCircleColor('lowerCaseRequirementCircle', lowerCaseRequirement);
        updateCircleColor('symbolRequirementCircle', symbolRequirement);
        updateCircleColor('numberRequirementCircle', numberRequirement);

        // Check if passwords match
        const passwordsMatch = passwordInput.value === confirmPasswordInput.value;
        passwordMatchIndicator.innerText = passwordsMatch ? "Passwords match" : "Passwords do not match";
        passwordMatchIndicator.style.color = passwordsMatch ? "green" : "red";
    }

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
} else {
    header("Location: login.php");
    exit();
}
?>
