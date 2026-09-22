<?php
session_start();
include 'includes/conn.php';
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
include 'includes/conn.php';
$user_id=$_SESSION['user_id'];
$sql="SELECT * from users where user_id=$user_id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$email=$row['email'];
$first_name=$row['first_name'];
$last_name=$row['last_name'];
$contact_no=$row['contact_no'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tinig Kalinga Contact Us</title>
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


   </style>
</head>
<body>
   


<?php 
include 'header.php';
?><br>
<!-- Link Bootstrap JS (Dropdown needs JS to function) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

				<div class="container" style="margin-top:1%">
					<div class="row">
					<center><img src="includes/images/logo.png"></center>
					<h1 style="font-size: 6vh; margin-bottom:3%; color: #058789;"><b>Contact Us</b></h1>
					<br/>
					<div class="row">
						<p style="font-size: 17px;">If you have a problem about our system, you may email or message us for your concern. One of our team member will get back to you within 24 hours. Thank you for your patience.</p>
					</div>
					<br/>
					<div class="row">
						<p style="font-style: italic;">Email: <a href="mailto:tinigkalinga23@gmail.com">tinigkalinga23@gmail.com</a></p><br>
						<form action="includes/contact_form.php" method="POST">
							<div class="form-group row">
								<label for="name" class="col-sm-4 col-form-label">Name :</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="name" name="name" value="<?php echo "$first_name"; ?> <?php echo "$last_name"; ?>" required readonly>
								</div>
							</div>
							<br/>
							<div class="form-group row">
								<label for="email" class="col-sm-4 col-form-label">Email Address :</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="email" name="email" value="<?php echo "$email"; ?>" required readonly>
								</div>
							</div>
							<br/>
							<div class="form-group row">
								<label for="contact_no" class="col-sm-4 col-form-label">Contact number :</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="contact_no" name="contact_no" value="<?php echo "$contact_no"; ?>" required readonly>
								</div>
							</div>
							<br/>
							<div class="form-group row">
								<label for="message" class="col-sm-4 col-form-label">Comment/Suggestion/Concern :</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="message" name="message" style="padding-top: 30px; padding-bottom:30px">
								</div>
							</div>
							<br/>
							<div class="form-group submit-form-group"><center>
								<button type="submit" class="btn-lg btn-primary" style="padding: 15px; padding-left: 30px; padding-right: 30px;">Submit</button>
								</form>
								<div class="msg" style="margin-top: 2%;">
												<?php
if (isset($_GET['msg'])) {
    echo "<p style='color: green; font-weight: bold;'>" . htmlspecialchars($_GET['msg']) . "</p>";
}
?></div>

							</div></center>
						</form>
					</div>
				</div>
				</div>



			</header>
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
		</html>
      <?php
}else{
     header("Location: login.php");
     exit();
}
?>





