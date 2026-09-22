<?php
session_start();
include 'includes/conn.php';
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
$user_id=$_SESSION['user_id'];
$sql="SELECT * from users where user_id=$user_id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$user_id=$row['user_id'];
$first_name=$row['first_name'];
$last_name=$row['last_name'];
$middle_name=$row['middle_name'];
$email=$row['email'];
$contact_no=$row['contact_no'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tinig Kalinga Prescriptions</title>
    <link rel="icon" type="image/x-icon" href="includes/images/favicon.ico">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="includes/css/style.css">
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

   <style type="text/css">
      td{
         color: whitesmoke;
      }
             nav ul {
    padding: 0;
    margin: 0;
    list-style-type: none;
}

nav ul li {
    display: inline-block;
    padding: 10px 15px; /* Adjust the padding as necessary */
}
nav {
    display: flex;
    justify-content: space-between; /* Align items evenly */
    align-items: center; /* Vertical centering */
    transform: translateY(20%);
}

nav ul {
    display: flex;
    justify-content: space-around; /* Space between items */
}
.btn{
    background-color: #029d9b;
    color: whitesmoke;
}
.btn:hover{
    background-color: #058789;
}

   </style>
</head>
<body>

<?php 
include 'header.php';
?>

<!-- Link Bootstrap JS (Dropdown needs JS to function) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<center>
<div class="container blurb" style="margin-top:2%; margin-bottom:1%;">
<p style="font-size:1.5vh; color: black;">Kindly fill out the required information before each item below completely and correctly. Your honest response will be helpful to the organization in developing a good information system for senior citizens in the country as the basis for designing its programs and activities that will help strengthen the lives of Filipino older people.</p>
<br><center>
<br>
<form action="includes/register_prescription.php" method="post" enctype="multipart/form-data">
        <label for="photo" style="margin-top:5px; margin-bottom:5px; font-size: 3.5vh; color:#058789;">Upload Prescription <span style="color:red;">*</span> </label>
        <input type="file" name="medicine_photo" id="medicine_photo" required onchange="previewImage()"><br>
  <input type="text" class="form-control hidden" id="approval" name="approval" value="Pending" readonly required>
  <img src="includes/images/prescription.png" id="preview" alt="Image Preview" width="350" height="500"><br>

        <!-- hidden -->
        <input type="number" class="form-control hidden" id="user_id" name="user_id" value="<?php echo "$user_id"; ?>"  readonly required>
        <input type="text" class="form-control hidden" id="first_name" name="first_name" value="<?php echo "$first_name"; ?>"  readonly required>
        <input type="text" class="form-control hidden" id="last_name" name="last_name" value="<?php echo "$last_name"; ?>"  readonly required>
        <input type="text" class="form-control hidden" id="middle_name" name="middle_name" value="<?php echo "$middle_name"; ?>"  readonly required>
        <input type="email" class="form-control hidden" id="email" name="email" value="<?php echo "$email"; ?>"  readonly required>
        <input type="number" class="form-control hidden" id="contact_no" name="contact_no" value="<?php echo "$contact_no"; ?>"  readonly required>
        
        <br>
        <p style="text-align: center; color: red;">For any inquiries regarding prescribed medicines, please contact our pharmacy at <b>(0998) 310 2918</b> or email us at <b>sanomedpharma@gmail.com</b> for verification and assistance</p>
        
        <br>

        <input type="submit" name="submit" class="btn btn-info" style="padding: 17px;padding-left: 100px; padding-right: 100px;" value="Submit">
		<a href="index.php" class="btn btn-info" style="padding: 20px;padding-left: 100px; padding-right: 100px; text-decoration: none;">Back to Home</a></center>
	</form>
	</div>
</body>
 <script>
        function validateImage() {
            const fileInput = document.getElementById('medicine_photo');
            const filePath = fileInput.value;
            const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

            if (!allowedExtensions.exec(filePath)) {
                alert('Only .jpg, .jpeg, and .png images are allowed.');
                fileInput.value = '';
                return false;
            }
            return true;
        }

        function previewImage() {
            const file = document.getElementById('medicine_photo').files[0];
            const preview = document.getElementById('preview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        }
    </script>
</html>
                  <?php
}else{
     header("Location: login.php");
     exit();
}
?>