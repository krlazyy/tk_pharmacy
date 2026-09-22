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
$control_number=$row['control_number'];
$oldfphoto = "C:/xampp/htdocs/capstone_new/includes/images".$row['fphoto'];
$oldbphoto = "C:/xampp/htdocs/capstone_new/includes/images".$row['bphoto'];

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
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tinig Kalinga Account</title>
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="icon" type="image/x-icon" href="includes/images/favicon.ico">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="includes/css/style.css">
   <style type="text/css">
      .blurred {
    filter: blur(10px);
    transition: filter 0.3s;
  }
  .hidden {
    display: none;
  }
  .btn:hover{
         background-color: #058789;
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

<?php 
include 'header.php';
?><br>

<!-- Link Bootstrap JS (Dropdown needs JS to function) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<div class="container blurb" style="margin-top: 1%;">
    <div class="row">
        <h1 style="font-size: 6vh; margin-bottom:3%;"><b>Account Information</b></h1>
        <br>
        <div class="col-lg-4">
            

            <label for="photo" style="margin-top:5px; margin-bottom:10px;">Uploaded ID: </label><br>
            
            <center>
              <img id="myImage1" src='<?php echo "$fphoto"; ?>' width='300' class="blurred" readonly>
              <br><br>
              <img id="myImage2" src='<?php echo "$bphoto"; ?>' width='300' class="blurred" readonly>
              <br><br>
              <img id="myImage3" src='<?php echo "$qrcode"; ?>' alt="QR Code" width="300" class="blurred" readonly>
              <br><br>
              <!-- Button to show the images -->
              <button class="btn-lg btn-info" id="showBtn" onclick="showImage()">Show Image</button>

              <!-- Button to hide the images -->
              <button class="btn-lg btn-info hidden" id="hideBtn" onclick="hideImage()">Hide Image</button>
          </center>


          <center>
            
          </div></center>
          
          <form action="includes/consumer_update.php" method="post" enctype="multipart/form-data">
            <div class="col-lg-8" >
                                <label for="user_id" class="form-label">User ID</label>
                                <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id'];  ?>" readonly required>

                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo "$email"; ?>" required>

                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo "$first_name"; ?>" required>

                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo "$last_name"; ?>" required>

                                <label for="middle_name" class="form-label">Middle Name <i style="font-size:.8vh">(Optional)</i></label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo "$middle_name"; ?>">

                                <label for="province" class="form-label">Province</label>
                                <input type="text" class="form-control" id="province" name="province" value="<?php echo "$province"; ?>" readonly required>

                    <div class="mb-4">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo "$city"; ?>" readonly required>
                    </div>
                    <div class="mb-3">
                        <label for="barangay" class="form-label">Barangay</label>
                        <div class="input-group">
                            <select class="form-select form-control" name="barangay" id="barangay" aria-label="Select Barangay">
                                <option hidden><?php echo "$barangay"; ?></option>
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
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo "$address"; ?>" placeholder="Home number" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact_no" class="form-label">Contact No</label>
                        <input type="tel" class="form-control" id="contact_no" name="contact_no"  value="<?php echo "$contact_no"; ?>"required>
                        <p style="font-style: italic; font-size: 12px;">Format: +639123456789</p>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <div class="input-group">
                            <select class="form-select form-control" name="gender" id="gender" aria-label="Select Gender">
                                <option hidden><?php echo "$gender"; ?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Prefer not to">Prefer not to say</option>
                            </select> 
                        </div>
                        <div class="mb-3">
                        <label for="reg_type" class="form-label">Registration type</label><br>
                        <select class="form-select form-control" name="reg_type" id="reg_type" aria-label="Select registration type">
                            <option hidden><?php echo "$registration_type"; ?></option>
                            <option value="Senior Citizen">Senior Citizen</option>
                            <option value="PWD">PWD</option>
                        </select>
                    </div>
                     <div class="mb-3">
                        <label for="birthdate" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo "$birth_date"; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" class="form-control" id="age" name="age" value="<?php echo "$age"; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="control_number" class="form-label">Control# </label>
                        <input type="text" class="form-control" id="control_number" name="control_number" value="<?php echo "$control_number"; ?>" readonly>
                    </div>
                                <input type="submit" name="submit" class="btn btn-info" value="Update">
                                <a href="account.php" class="btn btn-info">Reset</a>
                            </div>
                        </div>   
                    </div>
                </form>
            </div>

                    <br>

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
<!-- image script -->
<script>
  // Function to remove the 'blurred' class and show the images clearly
  function showImage() {
    document.getElementById("myImage1").classList.remove("blurred");
    document.getElementById("myImage2").classList.remove("blurred");
    document.getElementById("myImage3").classList.remove("blurred");
    document.getElementById("showBtn").classList.add("hidden");
    document.getElementById("hideBtn").classList.remove("hidden");
  }

  // Function to add the 'blurred' class and blur the images
  function hideImage() {
    document.getElementById("myImage1").classList.add("blurred");
    document.getElementById("myImage2").classList.add("blurred");
    document.getElementById("myImage3").classList.add("blurred");
    document.getElementById("showBtn").classList.remove("hidden");
    document.getElementById("hideBtn").classList.add("hidden");
  }
</script>
  <!-- Contact limit -->
<script>
    document.getElementById('contact_no').addEventListener('input', function (e) {
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
}else{
     header("Location: logout.php");
     exit();
}
?>
