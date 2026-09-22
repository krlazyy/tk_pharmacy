<?php
    session_start();
    include '../includes/conn.php';
    if (isset($_SESSION['establishment_id']) && isset($_SESSION['email'])) {
    $stocks_id=$_GET['edit'];
    $sql="SELECT * from stocks where stocks_id=$stocks_id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $medicine=$row['medicine'];
    $price=$row['price'];
    $quantity=$row['quantity'];
    $expiration_date=$row['expiration_date'];
    $medicine_photo ="includes/images/".$row['medicine_photo'];

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
    <title>Tinig Kalinga Inventory Edit</title>
</head>
<body style="background-color: #458ff6;">
<div class="container" style="margin-top:2%">
<p style="font-size:1.5vh">Kindly fill out the required information before each item below completely and correctly. Your honest response will be helpful to the organization in developing a good information system for senior citizens in the country as the basis for designing its programs and activities that will help strengthen the lives of Filipino older people.</p>
<br>
<h3 class="">UPDATE INVENTORY</h3>
<br>
<form action="includes/inventory_update.php" method="post" enctype="multipart/form-data">
        <label for="stocks_id" class="form-label">Stock ID <span class="required">*</span></label>
        <input type="text" class="form-control" id="stocks_id" name="stocks_id" value="<?php echo "$stocks_id"; ?>" readonly required>
        <label for="medicine" class="form-label">Medicine Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="medicine" name="medicine" value="<?php echo "$medicine"; ?>" required>

        <label for="price" class="form-label">Price <span class="required">*</span></label>
        <input type="number" class="form-control" id="price" name="price" value="<?php echo "$price"; ?>" required>

        <label for="quantity" class="form-label">Quantity <span class="required">*</span></label>
        <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo "$quantity"; ?>" required>

        <label for="expiration_date" class="form-label">Expiration Date <span class="required">*</span></label>
        <input type="date" class="form-control" id="expiration_date" name="expiration_date" value="<?php echo "$expiration_date"; ?>" required>

        <input type="text" name="approval" value="Pending" hidden>
        <label for="photo" style="margin-top:5px; margin-bottom:5px;">Upload Medicine (Optional)</label>
        <input type="file" name="medicine_photo">
            <img src='<?php echo "$medicine_photo"; ?>' width='200' alt="Current Image">
            <br>

        
        <img src='<?php echo "$medicine_photo";  ?>' width='200';>

        
        <br>
        <input type="submit" name="submit" class="btn btn-info" value="Submit">
        <a href="inventory.php" class="btn">Back</a>
    </form>
    </div>
</body>
</html>
      <?php
}else{
     header("Location: login_establishment.php");
     exit();
}
?>