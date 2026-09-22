<?php
include 'includes/conn.php';
session_start();

//for test only
$sample_id = "$user_id" + 1;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<title>Tinig Kalinga Registry Authorized</title>
    <link rel="icon" type="image/x-icon" href="includes/images/favicon.ico">

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
<div class="container" style="margin-top:2%">
<h3 style="margin-top:3%; color:black;"><B><center>AUTHORIZED REPRESENTATIVE REGISTRATION</center></B></h3><br>
<p style="font-size:1.5vh; color:black;">Kindly fill out the required information before each item below completely and correctly. Your honest response will be helpful to the organization in developing a good information system for senior citizens in the country as the basis for designing its programs and activities that will help strengthen the lives of Filipino older people.</p>
<br>
<div class="progress-container">
  <div class="progress-step">1</div>
  <div class="line"></div>
  <div class="progress-step completed">2</div>
  <div class="line"></div>
  <div class="progress-step">3</div>
</div>
<br>
	<form action="includes/register_authorized.php" method="post" enctype="multipart/form-data">
        <div class="container blurb" style="margin-bottom: 2%; ">
        <div class="row">
        <h3 style="margin-top:1%; color:black;">Account Information</h3>
        <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $_SESSION['sample_id'];  ?>" readonly hidden>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email'];  ?>" readonly hidden required>

        <label for="first_name" class="form-label">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $_SESSION['first_name'];  ?>" required readonly>

        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $_SESSION['last_name'];  ?>" required readonly>

        <label for="registration_type" class="form-label">Registration Type</label>
        <input type="text" class="form-control" id="registration_type" name="registration_type" value="<?php echo $_SESSION['registration_type'];  ?>"  required readonly>

        <label for="contact_no" class="form-label">Contact</label>
        <input type="tel" class="form-control" id="contact_no" name="contact_no" value="<?php echo $_SESSION['contact_no'];  ?>"  required readonly>

        <label for="control_number" class="form-label">Control #</label>
        <input type="number" class="form-control" id="control_number" name="control_number" value="<?php echo $_SESSION['control_number'];  ?>"  required readonly>
        <hr>
        <h3 style="margin-top:3%; color:black;">Authorized Representative Information</h3>
        <label for="auth_name" class="form-label">Authorized Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="auth_name" name="auth_name" required>
        <div class="mb-3">
                        <label for="relationship" class="form-label">Relationship</label>
                        <div class="input-group">
                            <select class="form-select form-control" name="relationship" id="relationship" aria-label="Select Relationship" required>
                                <option value="" disabled selected hidden>Select Relationship</option>
                                <option value="Guardian">Guardian</option>
                                <option value="Parent">Parent</option>
                                <option value="Sibling">Sibling</option>
                                <option value="Son">Son</option>
                                <option value="Daughter">Daughter</option>
                                <option value="Grandchildren">Grandchildren</option>
                                <option value="Uncle">Uncle</option>
                                <option value="Aunt">Aunt</option>
                                <option value="Nephew">Nephew</option>
                                <option value="Cousin">Cousin</option>
                            </select> 
                        </div>
                    </div>
        <label for="email_auth" class="form-label">Email Address Authorized <span class="required">*</span></label>
        <input type="email" class="form-control" id="email_auth" name="email_auth" value="<?php echo $_SESSION['email'];  ?>" readonly required><br>
        
        <span id="email_circle" class="requirement-circle"></span> 
        
        <input type="submit" name="submit" class="btn-lg btn-info" value="Register">
		<a href="logout.php" style="text-decoration: none;" class="btn-lg btn-danger" style="padding: 13px;">Back</a>
	</form>
    </div>
    </div>
</body>
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