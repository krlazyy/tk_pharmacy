<?php
    session_start();
    include '../includes/conn.php';
    $establishment_id=$_GET['edit'];
    $sql="SELECT * from establishment where establishment_id=$establishment_id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $establishment_no=$row['establishment_no'];
    $email=$row['email'];
    $admin_contact=$row['admin_contact'];
    $admin_name=$row['admin_name'];
    $admin_email=$row['admin_email'];
    $establishment_name=$row['establishment_name'];
    $tag_line=$row['tag_line'];
    $location=$row['location'];
    $category=$row['category'];
    $establishment_contact=$row['establishment_contact'];
    $website_link=$row['website_link'];
    $bio=$row['bio'];
    if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
    <title>Tinig Kalinga Admin Establishment Edit</title>
</head>
<body>
<div class="container" style="margin-top:2%">
<p style="font-size:1.5vh">Kindly fill out the required information before each item below completely and correctly. Your honest response will be helpful to the organization in developing a good information system for senior citizens in the country as the basis for designing its programs and activities that will help strengthen the lives of Filipino older people.</p>
<br>
<h3 class="">UPDATE ESTABLISHMENT</h3>
<br>
<form action="admin_establishment_update.php" method="post" enctype="multipart/form-data">
    <label for="establishment_id" class="form-label">Establishment ID</label>
        <input type="text" class="form-control" id="establishment_id" name="establishment_id" value="<?php echo $establishment_id?>" readonly>
        <label for="establishment_no" class="form-label">Tinig Kalinga ID number</label>
        <input type="number" class="form-control" id="establishment_no" name="establishment_no" value="<?php echo $establishment_no?>" readonly>
        <label for="email" class="form-label">Email Address <span class="required">*</span></label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email?>" required>
        <br>

        <h5 class="">ADMINISTRATOR INFORMATION</h5>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="admin_name" class="form-label">Name<span class="required">*</span></label>
                    <input type="text" class="form-control" id="admin_name" name="admin_name" value="<?php echo $admin_name?>" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="admin_contact" class="form-label">Phone No.<span class="required">*</span></label>
                    <input type="number" class="form-control" id="admin_contact" name="admin_contact" value="<?php echo $admin_contact?>" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="admin_email" class="form-label">Email Address<span class="required">*</span></label>
                    <input type="email" class="form-control" id="admin_email" name="admin_email"value="<?php echo $admin_email?>" required>
                </div>
            </div>
        </div>

        <h5 class="">Establishment Information</h5>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="establishment_name" class="form-label">Establishment Name<span class="required">*</span></label>
                    <input type="text" class="form-control" id="establishment_name" name="establishment_name" value="<?php echo $establishment_name?>" required>
                </div>
                <div class="mb-3">
                    <label for="tag_line" class="form-label">Tagline<span class="required">*</span></label>
                    <input type="text" class="form-control" id="tag_line" name="tag_line" value="<?php echo $tag_line?>" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="location" class="form-label">Location<span class="required">*</span></label>
                    <input type="text" class="form-control" id="location" name="location" value="<?php echo $location?>" required>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category<span class="required">*</span></label>
                    <input type="text" class="form-control" id="category" name="category" value="<?php echo $category?>" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="establishment_contact" class="form-label">Contact No.<span class="required">*</span></label>
                    <input type="number" class="form-control" id="establishment_contact" name="establishment_contact" value="<?php echo $establishment_contact?>" required>
                </div>
                <div class="mb-3">
                    <label for="website_link" class="form-label">Website Link<span class="required">*</span></label>
                    <input type="text" class="form-control" id="website_link" name="website_link" value="<?php echo $website_link?>" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio<span class="required">*</span></label>
                    <input type="text" class="form-control" id="bio" name="bio" required value="<?php echo $bio?>">
                </div>
            </div>
        </div>
        
        <br>
        <input type="submit" name="submit" class="btn btn-info" value="Submit">
        <a href="admin_establishment.php" class="btn btn-danger">Back</a>
    </form>
    </div>

        

    </div>
</body>
</html>
<?php
}else{
     header("Location: login_admin.php");
     exit();
}
?>