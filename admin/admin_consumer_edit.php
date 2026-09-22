<?php
    session_start();
    include '../includes/conn.php';
    $user_id=$_GET['edit'];
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
    $fphoto = "../includes/images/".$row['fphoto'];
    $bphoto = "../includes/images/".$row['bphoto'];
    $control_number=$row['control_number'];

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../includes/images/favicon.ico">
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
    <title>Tinig Kalinga Consumer Edit</title>
</head>
<body>
<div class="container blurb" style="margin-top:2%">
<p style="font-size:1.5vh">Kindly fill out the required information before each item below completely and correctly. Your honest response will be helpful to the organization in developing a good information system for senior citizens in the country as the basis for designing its programs and activities that will help strengthen the lives of Filipino older people.</p>
<br>
<h3>ACCOUNT REGISTRATION INFORMATION</h3>
<br>
    <form action="admin_consumer_update.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
        <input type="number" class="form-control" id="user_id" name="user_id" value="<?php echo $user_id ?>" hidden>
        <label for="email" class="form-label">Email Address <span class="required">*</span></label>
        <input type="email" class="form-control" id="email" value="<?php echo $email ?>" name="email" required>
        <span id="email_circle" class="requirement-circle"></span>



        
        <label for="first_name" class="form-label">First Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $first_name ?>" required>
        <label for="last_name" class="form-label">Last Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name ?>" required>
        <label for="middle_name" class="form-label">Middle Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo $middle_name ?>">
        <p style="font-style: italic; font-size: 12px;">Optional</p>
        <div class="mb-4">
        <label for="province" class="form-label">Province <span class="required">*</span></label><br>
        <input type="text" class="form-control" name="province" id="province" value="Laguna" value="<?php echo $province ?>" readonly>
                    </div>

                    <div class="mb-4">
                        <label for="city" class="form-label">City <span class="required">*</span></label>
                        <input type="text" class="form-control" id="city" name="city" value="San Pedro" readonly required>
                    </div>
                    <div class="mb-3">
                        <label for="barangay" class="form-label">Barangay</label>
                        <div class="input-group">
                            <select class="form-select" name="barangay" id="barangay" aria-label="Select Barangay" required>
                                <option><?php echo "$barangay"; ?></option>
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
                        <label for="address" class="form-label">Address </span></label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $address ?>">
                    </div>
    </div> 

    <div class="col-md-6">
                    <div class="mb-3">
                    <label for="contact" class="form-label">Contact No <span class="required">*</span></label>
                    <input type="tel" class="form-control" id="contact" name="contact" placeholder="+639123456789" value="<?php echo $contact_no ?>" required>
                    <p style="font-style: italic; font-size: 12px;">Format: +639123456789 (Enter 9 digits after +639)</p>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <div class="input-group">
                            <select class="form-select" name="gender" id="gender" aria-label="Select Gender" required>
                                <option><?php echo $gender ?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Prefer not to">Prefer not to say</option>
                            </select> 
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="reg_type" class="form-label">Registration type</label><br>
                        <select class="form-select" name="reg_type" id="reg_type" aria-label="Select registration type" required>
                            <option><?php echo $registration_type ?></option>
                            <option value="Senior Citizen">Senior Citizen</option>
                            <option value="PWD">PWD</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="birthdate" class="form-label">Date of Birth <span class="required">*</span></label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo $birth_date ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" class="form-control" id="age" name="age" value="<?php echo $age ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="control_number" class="form-label">Control #</label>
                        <input type="text" class="form-control" id="control_number" name="control_number" value="<?php echo $control_number ?>" readonly>
                         <p style="font-style: italic; font-size: 12px;">Format: OSCA ID #/PWD control #</p>
                    </div>
                </div>
        </div>

   <div class="row">
    <div class="col-md-6">
        <label for="fphoto" style="margin-top:5px;">Upload Senior/PWD ID *</label>
        <img id="sampleImg1" src="<?php echo $fphoto ?>" width="200px" alt="Senior ID Sample">
    </div>
    <div class="col-md-6">
        <label for="bphoto" style="margin-top:5px;">Upload a selfie with Senior/PWD ID *</label>
        <img id="sampleImg2" src="<?php echo $bphoto ?>" width="200px" alt="Selfie with ID Sample">
    </div>
</div>
        
        <br>
        <input type="submit" name="submit" class="btn btn-info" value="Update">
        <a href="admin_consumer.php" class="btn btn-danger">Back</a>
    </form>
    </div>
</body>
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
