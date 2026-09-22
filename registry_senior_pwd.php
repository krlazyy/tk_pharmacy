<?php
include 'includes/conn.php';
session_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
header("Location: index.php");
     exit();
}
else{
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Tinig Kalinga Registry Senior/PWD</title>
    <!-- font awesome -->
    <link rel="icon" type="image/x-icon" href="includes/images/favicon.ico">

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
            <style>
    .progress-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 800px;
      margin: 20px auto;
    }

    .progress-container .line {
      flex: 1;
      height: 2px;
      background-color: #90C3C0;
    }

    .progress-step {
      width: 50px;
      height: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 2px solid #90C3C0;
      border-radius: 50%;
      background-color: white;
      color: #90C3C0;
      font-weight: bold;
    }

    .progress-step.completed {
      background-color: #058789; /* Green background */
      color: white; /* White text */
      border-color: #058789; /* Green border */
    }
    span{
        color: red;
    }
    .btn:hover{
         background-color: #058789;
         color: whitesmoke;
        }
  </style>
</head>
<body>
<div class="container blurb" style="margin-top:2%; margin-bottom:2%;">
<p style="font-size:1.5vh; color:black;">Kindly fill out the required information before each item below completely and correctly. Your honest response will be helpful to the organization in developing a good information system for senior citizens in the country as the basis for designing its programs and activities that will help strengthen the lives of Filipino older people.</p>
<div class="progress-container">
  <div class="progress-step completed">1</div>
  <div class="line"></div>
  <div class="progress-step">2</div>
  <div class="line"></div>
  <div class="progress-step">3</div>
</div>
<h3 style="margin-top:3%; color:black;">Account Information</h3>
<hr>
    <form action="includes/register_customer.php" method="post" enctype="multipart/form-data">
        <div class="row">
        <input type="number" class="form-control" id="user_id" name="user_id" hidden>
        <label for="email" class="form-label">Email Address <span class="required">*</span></label>
        <input type="email" class="form-control" id="email" name="email" required>
        <span id="email_circle" class="requirement-circle"></span>



        <label for="password" class="form-label">Password <span class="required">*</span></label>

        <div style="position: relative;">
            <input type="password" class="form-control" id="password" name="password" oninput="checkPassword()" required>
            <span id="showPassword" class="eye-icon" onclick="togglePasswordVisibility()" style="font-size: 20px; position: absolute; right: 10px; transform: translateY(-100%); cursor: pointer; color: black;">
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

        <label for="cpassword" class="form-label">Confirm Password <span class="required">*</span></label>
        <div style="position: relative;">
            <input type="password" class="form-control" id="cpassword" name="cpassword" oninput="checkPassword()" required>
            <span id="showConfirmPassword" class="eye-icon" onclick="toggleConfirmPasswordVisibility()" style="font-size: 20px; position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; color: black;">
                <i class="fa fa-eye"></i>
            </span>
        </div>
        <div id="passwordMatch" class="password-match"></div>
        <span id="cpassword_circle" class="requirement-circle"></span>

        <hr>
        <h3 style="color:black;">Personal Information</h3>
        
        <label for="first_name" class="form-label">First Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="first_name" name="first_name" required>
        <label for="last_name" class="form-label">Last Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="last_name" name="last_name" required>
        <label for="middle_name" class="form-label">Middle Name <i style="font-size:.8vh">(Optional)</i></label>
        <input type="text" class="form-control" id="middle_name" name="middle_name">
        <div class="mb-4">
        <label for="province" class="form-label">Province <span class="required">*</span></label><br>
        <input type="text" class="form-control" name="province" id="province" value="Laguna" readonly>
                    </div>
    </div> 
</div>
    <div class="row">
                    <div class="mb-4">
                        <label for="city" class="form-label">City <span class="required">*</span></label>
                        <input type="text" class="form-control" id="city" name="city" value="San Pedro" readonly required>
                    </div>
                    <div class="mb-3">
                        <label for="barangay" class="form-label">Barangay<span class="required"> *</span></label>
                        <div class="input-group">
                            <select class="form-select form-control" name="barangay" id="barangay" aria-label="Select Barangay" required>
                                <option value="" disabled selected hidden>Select Barangay</option>
                                <option value="Bagong Silang">Bagong Silang</option>
                                <option value="Calendola">Calendola</option>
                                <option value="Chrysanthemum">Chrysanthemum</option>
                                <option value="Cuyab">Cuyab</option>
                                <option value="Estrella">Estrella</option>
                                <option value="Fatima">Fatima</option>
                                <option value="GSIS">GSIS</option>
                                <option value="Landayan">Landayan</option>
                                <option value="Langgam">Langgam</option>
                                <option value="Laram">Laram</option>
                                <option value="Magsaysay">Magsaysay</option>
                                <option value="Maharlika">Maharlika</option>
                                <option value="Narra">Narra</option>
                                <option value="Nueva">Nueva</option>
                                <option value="Pacita 1">Pacita 1</option>
                                <option value="Pacita 2">Pacita 2</option>
                                <option value="Riverside">Riverside</option>
                                <option value="Rosario">Rosario</option>
                                <option value="Sampaguita">Sampaguita</option>
                                <option value="San Antonio">San Antonio</option>
                                <option value="San Lorenzo Ruiz">San Lorenzo Ruiz</option>
                                <option value="San Roque">San Roque</option>
                                <option value="San Vicente">San Vicente</option>
                                <option value="Santo Niño">Santo Niño</option>
                                <option value="United Bayanihan">United Bayanihan</option>
                                <option value="United Better Living">United Better Living</option>
                            </select> 
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address<span class="required"> *</span></label></label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="mb-3">
                    <label for="contact" class="form-label">Contact No <span class="required">*</span></label>
                    <input type="tel" class="form-control" id="contact" name="contact" placeholder="+639123456789" required>
                    <p style="font-style: italic; font-size: 12px;">Format: +639123456789 (Enter 9 digits after +639)</p>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender<span class="required"> *</span></label></label>
                        <div class="input-group">
                            <select class="form-select form-control" name="gender" id="gender" aria-label="Select Gender" required>
                                <option value="" disabled selected hidden>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Prefer not to">Prefer not to say</option>
                            </select> 
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="reg_type" class="form-label">Registration type</label><br>
                        <select class="form-select form-control" name="reg_type" id="reg_type" aria-label="Select registration type" required>
                            <option value="" disabled selected hidden>Select type</option>
                            <option value="Senior Citizen">Senior Citizen</option>
                            <option value="PWD">PWD</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="birthdate" class="form-label">Date of Birth <span class="required">*</span></label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" name="age" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="control_number" class="form-label">Control #<span class="required"> *</span></label></label>
                        <input type="number" class="form-control" id="control_number" name="control_number" required>
                         <p style="font-style: italic; font-size: 12px;">Format: OSCA ID #/PWD control #</p>
                    </div>
                </div>
                   <div class="row">
    <div class="col-md-6">
        <label for="fphoto" style="margin-top:5px;">Upload Senior/PWD ID <span class="required"> *</span></label></label>
        <img id="sampleImg1" src="includes/images/senior id sample.png" width="200px" alt="Senior ID Sample"><br>
        <input type="file" id="fphoto" name="fphoto" accept="image/*" required onchange="previewImage(event, 'sampleImg1')">
    </div>
    <div class="col-md-6">
        <label for="bphoto" style="margin-top:5px;">Upload a selfie with Senior/PWD ID <span class="required"> *</span></label></label>
        <img id="sampleImg2" src="includes/images/holding id sample.png" width="200px" alt="Selfie with ID Sample"><br>
        <input type="file" id="bphoto" name="bphoto" accept="image/*" required onchange="previewImage(event, 'sampleImg2')">
    </div>
</div>
        
        <br>
        <input type="submit" name="submit" class="btn btn-info" value="Register">
        <a href="terms_condition.php" class="btn btn-danger">Back</a>
    </form>
        </div>


    </div>
</body>
<!-- to upload image preview -->
<script>
    function previewImage(event, imgId) {
        const input = event.target;
        const img = document.getElementById(imgId);
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                img.src = e.target.result;
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

 <script>
        ['age', 'contact_no'].forEach(function(id) {
            document.getElementById(id).addEventListener('input', function(evt) {
                this.value = this.value.replace(/[^0-9]/g, ''); // Replace any character that is not a number with an empty string
            });
        });

        function checkRequiredFields() {
            const requiredFields = document.querySelectorAll('required');
            let allFilled = true;

            requiredFields.forEach(field => {
                const inputField = document.getElementById(field.dataset.field);
                if (inputField.value.trim() === '') {
                    allFilled = false;
                }
            });

            if (!allFilled) {
                alert('Please fill in all required fields before proceeding.');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            fetchProvinces(); // Initial call to populate provinces
        });

        function fetchProvinces() {
            fetch('https://psgc.vercel.app/api/province')
            .then(response => response.json())
            .then(data => {
                const provinceSelect = document.getElementById('province');
                provinceSelect.removeAttribute('disabled');
                data.forEach(province => {
                    let option = new Option(province.name, province.id);
                    provinceSelect.add(option);
                });
            }).catch(error => console.error('Error fetching provinces:', error));
        }

        document.getElementById('province').addEventListener('change', function() {
            fetchCities(this.value);
            // document.getElementById('city').setAttribute('disabled', true);
            // document.getElementById('barangay').setAttribute('disabled', true);
        });

        function fetchCities(provinceId) {
            fetch(`https://psgc.vercel.app/api/city/${provinceId}`)
            .then(response => response.json())
            .then(data => {
                const citySelect = document.getElementById('city');
                citySelect.innerHTML = '<option value="" disabled selected hidden>Select City</option>';
                citySelect.removeAttribute('disabled');
                data.forEach(city => {
                    let option = new Option(city.name, city.id);
                    citySelect.add(option);
                });
            }).catch(error => console.error('Error fetching cities:', error));
        }

        document.getElementById('city').addEventListener('change', function() {
            fetchBarangays(this.value);
        });

        function fetchBarangays(cityId) {
            fetch(`https://psgc.vercel.app/api/barangay/${cityId}`)
            .then(response => response.json())
            .then(data => {
                const barangaySelect = document.getElementById('barangay');
                barangaySelect.innerHTML = '<option value="" disabled selected hidden>Select Barangay</option>';
                barangaySelect.removeAttribute('disabled');
                data.forEach(barangay => {
                    let option = new Option(barangay.name, barangay.id);
                    barangaySelect.add(option);
                });
            }).catch(error => console.error('Error fetching barangays:', error));
        }
    </script>
<!-- Register type pwd/senior cancel 60yrs above and 4yrs old below -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var regTypeSelect = document.getElementById('reg_type');
        var birthdateInput = document.getElementById('birthdate');
        var ageInput = document.getElementById('age');

        regTypeSelect.addEventListener('change', function() {
            var selectedValue = regTypeSelect.value;

            if (selectedValue === 'Senior Citizen' || selectedValue === 'PWD') {
                ageInput.removeAttribute('readonly');
                birthdateInput.value = ''; 
                ageInput.value = '';
            } else {
                birthdateInput.value = ''; 
                ageInput.value = '';
                ageInput.setAttribute('readonly', true);
                alert('Senior Citizen ages must be 60 and above.');
            }
        });

        birthdateInput.addEventListener('change', function() {
            var selectedValue = regTypeSelect.value;
            var birthdate = new Date(this.value);
            var age = calculateAge(birthdate);

            if (selectedValue === 'Senior Citizen' && age < 60) {
                birthdateInput.value = '';
                ageInput.value = '';
                alert('Senior Citizen ages must be 60 and above.');
            } else {
                ageInput.value = age;
            }
        });

        function calculateAge(birthdate) {
            var today = new Date();
            var age = today.getFullYear() - birthdate.getFullYear();
            var m = today.getMonth() - birthdate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthdate.getDate())) {
                age--;
            }
            return age;
        }
    });
</script>

<!-- age validation -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var regTypeSelect = document.getElementById('reg_type');
        var birthdateInput = document.getElementById('birthdate');
        var ageInput = document.getElementById('age');

        regTypeSelect.addEventListener('change', function() {
            var selectedValue = regTypeSelect.value;

            if (selectedValue === 'Senior Citizen' || selectedValue === 'PWD') {
                ageInput.removeAttribute('readonly');
                birthdateInput.value = ''; 
                ageInput.value = '';
            } else {
                birthdateInput.value = ''; 
                ageInput.value = '';
                ageInput.setAttribute('readonly', true);
                alert('Please ensure the age is appropriate for the selected registration type.');
            }
        });

        birthdateInput.addEventListener('change', function() {
            var selectedValue = regTypeSelect.value;
            var birthdate = new Date(this.value);
            var age = calculateAge(birthdate);

            if (age < 5) {
                birthdateInput.value = '';
                ageInput.value = '';
                alert('Registrant must be at least 5 years old.');
            } else if (selectedValue === 'Senior Citizen' && age < 60) {
                birthdateInput.value = '';
                ageInput.value = '';
                alert('Senior Citizen ages must be 60 and above.');
            } else {
                ageInput.value = age;
            }
        });

        function calculateAge(birthdate) {
            var today = new Date();
            var age = today.getFullYear() - birthdate.getFullYear();
            var m = today.getMonth() - birthdate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthdate.getDate())) {
                age--;
            }
            return age;
        }
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

<!-- Contact limit -->
<script>
    document.getElementById('contact').addEventListener('input', function (e) {
        // Ensure the value starts with +639 and contains only 13 characters (+63 plus 9 digits)
        let value = e.target.value;

        // If the value exceeds 13 characters (including +63), trim it
        if (value.length > 13) {
            e.target.value = value.slice(0, 13);
        }

        // Ensure the value starts with +639
        if (!value.startsWith('+63')) {
            e.target.value = '+63';
        }
    });
</script>
</html>
<?php
}
?>
