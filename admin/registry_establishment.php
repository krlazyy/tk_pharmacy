<?php
include '../includes/conn.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<title>Tinig Kalinga Registry Establishment</title>
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
</head>
<body>
    <div class="container blurb" style="margin-top: 2%;">

<form action="register_establishment.php" method="post">
            <p>
                Kindly fill out the required information before each item below completely and correctly. Your honest response will be helpful to the organization in developing a good information system for senior citizens in the country as the basis for designing its programs and activities that will help strengthen the lives of Filipino older people.
            </p>
        <br>
        <?php $est_no=rand(111111,999999); ?>
        <input type="number" class="form-control" id="establishment_id" name="establishment_id" hidden readonly>
		<label for="establishment_no" class="form-label">Tinig Kalinga ID number</label>
        <input type="number" class="form-control" id="establishment_no" name="establishment_no" value="<?php echo $est_no ?>" readonly>
        <label for="email" class="form-label">Email Address <span class="required">*</span></label>
        <input type="email" class="form-control" id="email" name="email" required>
        <label for="password" class="form-label">Password <span class="required">*</span></label>

        <div style="position: relative;">
            <input type="password" class="form-control" id="password" name="password" oninput="checkPassword()" required>
            <span id="showPassword" class="eye-icon" onclick="togglePasswordVisibility()" style="font-size: 20px; position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; color: black;">
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
        <br>

        <h5 class="">ADMINISTRATOR INFORMATION</h5>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="admin_name" class="form-label">Name<span class="required">*</span></label>
                    <input type="text" class="form-control" id="admin_name" name="admin_name" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="admin_contact" class="form-label">Phone No.<span class="required">*</span></label>
                    <input type="tel" class="form-control" id="admin_contact" name="admin_contact" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="admin_email" class="form-label">Email Address<span class="required">*</span></label>
                    <input type="email" class="form-control" id="admin_email" name="admin_email" required>
                </div>
            </div>
        </div>

        <h5 class="">Establishment Information</h5>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="establishment_name" class="form-label">Establishment Name<span class="required">*</span></label>
                    <input type="text" class="form-control" id="establishment_name" name="establishment_name" required>
                </div>
                <div class="mb-3">
                    <label for="tag_line" class="form-label">Tagline<span class="required">*</span></label>
                    <input type="text" class="form-control" id="tag_line" name="tag_line" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="location" class="form-label">Location<span class="required">*</span></label>
                    <input type="text" class="form-control" id="location" name="location" value="San Pedro Laguna" readonly required>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category<span class="required">*</span></label>
                    <input type="text" class="form-control" id="category" name="category" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="establishment_contact" class="form-label">Contact No.<span class="required">*</span></label>
                    <input type="tel" class="form-control" id="establishment_contact" name="establishment_contact" required>
                </div>
                <div class="mb-3">
                    <label for="website_link" class="form-label">Website Link<span class="required">*</span></label>
                    <input type="text" class="form-control" id="website_link" name="website_link" placeholder="www.example.com" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio<span class="required">*</span></label>
                    <input type="text" class="form-control" id="bio" name="bio" required>
                </div>
            </div>
        </div>


        <br>
        <input type="submit" name="submit" class="btn btn-info" value="Register">
		<a href="admin_establishment.php" class="btn btn-danger">Cancel</a>
</form>

</div>
</body>
<script>
    function checkPassword() {
        const passwordInput = document.getElementById('password');
        const lengthRequirement = passwordInput.value.length >= 6;
        const upperCaseRequirement = /[A-Z]/.test(passwordInput.value);
        const lowerCaseRequirement = /[a-z]/.test(passwordInput.value);
        const symbolRequirement = /[!@#$%^&*(),.?":{}|<>]/.test(passwordInput.value);
        const numberRequirement = /\d/.test(passwordInput.value);

        updateCircleColor('lengthRequirementCircle', lengthRequirement);
        const characterRequirement = upperCaseRequirement && lowerCaseRequirement && symbolRequirement && numberRequirement;
        updateCircleColor('characterRequirementCircle', characterRequirement);
        updateCircleColor('upperCaseRequirementCircle', upperCaseRequirement);
        updateCircleColor('lowerCaseRequirementCircle', lowerCaseRequirement);
        updateCircleColor('symbolRequirementCircle', symbolRequirement);
        updateCircleColor('numberRequirementCircle', numberRequirement);
    }

    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var eyeIcon = document.getElementById("showPassword");


        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.innerHTML = '<i class="fa fa-eye-slash"></i>';
        } else {
            passwordInput.type = "password";
            eyeIcon.innerHTML = '<i class="fa fa-eye"></i>';
        }
    }

    function toggleConfirmPasswordVisibility() {
        var confirmPasswordInput = document.getElementById("cpassword");
        var eyeIcon = document.getElementById("showConfirmPassword");

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

    function checkRequiredFields() {
        const idNumber = document.getElementById('id_number');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('cpassword');
        const email = document.getElementById('email');

        let allFilled = idNumber.value.trim() !== '' && email.value.trim() !== '';

        const lengthRequirement = password.value.length >= 6;
        const upperCaseRequirement = /[A-Z]/.test(password.value);
        const lowerCaseRequirement = /[a-z]/.test(password.value);
        const symbolRequirement = /[!@#$%^&*(),.?":{}|<>]/.test(password.value);
        const numberRequirement = /\d/.test(password.value);
        const passwordRequirementsMet = lengthRequirement && upperCaseRequirement && lowerCaseRequirement && symbolRequirement && numberRequirement;
        const passwordsMatch = password.value.trim() === confirmPassword.value.trim();

        allFilled = allFilled && passwordRequirementsMet && passwordsMatch;

        if (!allFilled) {
            if (!passwordRequirementsMet) {
                alert('Password does not meet the required conditions.');
            } else if (!passwordsMatch) {
                alert('Password and Confirm Password must match.');
            } else {
                alert('Please fill in all required fields before proceeding.');
            }
            return false;
        }

        return true;
    }

    ['id_number'].forEach(function (id) {
        document.getElementById(id).addEventListener('input', function (evt) {
            this.value = this.value.replace(/[^0-9]/g, ''); // Replace any character that is not a number with an empty string
        });
    });
</script>
<!-- Contact limit -->
<script>
    document.getElementById('establishment_contact').addEventListener('input', function (e) {
        let value = e.target.value;

        // Ensure the value starts with "+63" and remove non-numeric characters except for the initial "+63"
        if (!value.startsWith('+63')) {
            value = '+63' + value.replace(/[^0-9]/g, '');
        } else {
            value = '+63' + value.slice(3).replace(/[^0-9]/g, ''); // Keep only digits after "+63"
        }

        // Limit to 13 characters in total (+63 plus 9 digits)
        if (value.length > 13) {
            value = value.slice(0, 13);
        }

        e.target.value = value;
    });
</script>
<!-- Contact limit -->
<script>
    document.getElementById('admin_contact').addEventListener('input', function (e) {
        let value = e.target.value;

        // Ensure the value starts with "+63" and remove non-numeric characters except for the initial "+63"
        if (!value.startsWith('+63')) {
            value = '+63' + value.replace(/[^0-9]/g, '');
        } else {
            value = '+63' + value.slice(3).replace(/[^0-9]/g, ''); // Keep only digits after "+63"
        }

        // Limit to 13 characters in total (+63 plus 9 digits)
        if (value.length > 13) {
            value = value.slice(0, 13);
        }

        e.target.value = value;
    });
</script>

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
