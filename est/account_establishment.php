<?php
session_start();
include '../includes/conn.php';
if (isset($_SESSION['establishment_id']) && isset($_SESSION['email'])) {
    $establishment_id=$_SESSION['establishment_id'];
    $sql="SELECT * from establishment where establishment_id=$establishment_id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $establishment_no=$row['establishment_no'];
    $email=$row['email'];
    $admin_name=$row['admin_name'];
    $admin_email=$row['admin_email'];
    $admin_contact=$row['admin_contact'];
    $establishment_name=$row['establishment_name'];
    $tag_line=$row['tag_line'];
    $location=$row['location'];
    $category=$row['category'];
    $establishment_contact=$row['establishment_contact'];
    $website_link=$row['website_link'];
    $bio=$row['bio'];
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Tinig Kalinga Establishment Account</title>
         <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
         <link rel="icon" type="image/x-icon" href="../includes/images/favicon.ico">

         <!-- font awesome cdn link  -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

         <!-- custom css file link  -->
         <link rel="stylesheet" href="../includes/css/style.css">
         <style type="text/css">
          td{
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
?>

<!-- Link Bootstrap JS (Dropdown needs JS to function) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="container blurb" style="margin-top:5%;">
    <div class="row">

        <h2 class=""><b>ESTABLISHMENT INFORMATION</b></h2>
        <br>
        <form action="includes/establishment_update.php" method="post" enctype="multipart/form-data">
            <div class="col-lg-6">
                <input type="number" class="form-control hidden" id="establishment_id" name="establishment_id" value="<?php echo "$establishment_id"; ?>" readonly required>

                <label for="establishment_no" class="form-label">Establishment No <span class="required">*</span></label>
                <input type="number" class="form-control" id="establishment_no" name="establishment_no" value="<?php echo "$establishment_no"; ?>" required readonly>

                <label for="email" class="form-label">Email <span class="required">*</span></label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo "$email"; ?>" required>

                <label for="admin_name" class="form-label">Admin Name <span class="required">*</span></label>
                <input type="text" class="form-control" id="admin_name" name="admin_name" value="<?php echo "$admin_name"; ?>" required>

                <label for="admin_contact" class="form-label">Admin Contact<span class="required">*</span></label>
                <input type="tel" class="form-control" id="admin_contact" name="admin_contact" value="<?php echo "$admin_contact"; ?>" required>

                <label for="admin_email" class="form-label">Admin Email<span class="required">*</span></label>
                <input type="email" class="form-control" id="admin_email" name="admin_email" value="<?php echo "$admin_email"; ?>" required>

                <label for="establishment_name" class="form-label">Establishment Name <span class="required">*</span></label>
                <input type="text" class="form-control" id="establishment_name" name="establishment_name" value="<?php echo "$establishment_name"; ?>" required>

                <label for="tag_line" class="form-label">Tagline <span class="required">*</span></label>
                <input type="text" class="form-control" id="tag_line" name="tag_line" value="<?php echo "$tag_line"; ?>" required>
            </div>


            <div class="col-lg-6">
                <label for="location" class="form-label">Location <span class="required">*</span></label>
                <input type="text" class="form-control" id="location" name="location" value="<?php echo "$location"; ?>" required>

                <label for="category" class="form-label">Category <span class="required">*</span></label>
                <input type="text" class="form-control" id="category" name="category" value="<?php echo "$category"; ?>"required>

                <label for="establishment_contact" class="form-label">Establishment Contact <span class="required">*</span></label>
                <input type="tel" class="form-control" id="establishment_contact" name="establishment_contact" value="<?php echo "$establishment_contact"; ?>" required>

                <label for="website_link" class="form-label">Website Link <span class="required">*</span></label>
                <input type="text" class="form-control" id="website_link" name="website_link" value="<?php echo "$website_link"; ?>" required>

                <label for="bio" class="form-label">Bio <span class="required">*</span></label>
                <input type="text" class="form-control" id="bio" name="bio" value="<?php echo "$bio"; ?>" required><br>

                <input type="submit" name="submit" class="btn btn-info" value="Update">
                <a href="change_password_establishment.php" class="btn btn-info">Change Password</a>
                
            </div>

        </div>   
        <a href="account_establishment.php" class="btn btn-info" style="margin-top: 2%;">Reset</a>
    </div>
    <br>
    

    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <!-- owl carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- custom js -->
    <script src = "../includes/js/script.js"></script>
</body>
<!-- Contact limit -->
<script>
    document.getElementById('establishment_contact').addEventListener('input', function (e) {
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
<!-- Contact limit -->
<script>
    document.getElementById('admin_contact').addEventListener('input', function (e) {
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
   header("Location: login_establishment.php");
   exit();
}
?>