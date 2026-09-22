<?php
session_start();
@include '../includes/conn.php';
if (isset($_SESSION['establishment_id']) && isset($_SESSION['email'])) {
   
   // Check for products nearing expiration within 30 days
    $current_date = new DateTime();
    $warning_date = (clone $current_date)->modify('+30 days')->format('Y-m-d');

    // Fetch products that are within 30 days of expiration
    $expiring_soon_query = mysqli_query($conn, "SELECT * FROM `products` WHERE expiration_date <= '$warning_date' AND expiration_date >= NOW()");
    $expiration_warnings = [];

    while ($row = mysqli_fetch_assoc($expiring_soon_query)) {
        $expiration_warnings[] = "Warning: Product '" . $row['name'] . "' is expiring soon on " . $row['expiration_date'] . ".";
    }
   
    if(isset($_POST['add_product'])){
        $p_name = mysqli_real_escape_string($conn, $_POST['p_name']);
        $p_quantity = $_POST['p_quantity'];
        $p_price = $_POST['p_price'];
        $p_expiration_date = $_POST['p_expiration_date'];
        $p_image = $_FILES['p_image']['name'];
        $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
        $p_image_folder = '../uploaded_img/'.$p_image;

        // Check if expiration date is within 8 months
        $current_date = new DateTime();
        $expiration_date = new DateTime($p_expiration_date);
        $cutoff_date = (clone $current_date)->modify('+8 months');

        if ($expiration_date <= $cutoff_date) {
            $message[] = 'Cannot add product. Expiration date is within 8 months.';
        } else {
            // Check for duplicate product name
            $check_duplicate_query = mysqli_query($conn, "SELECT * FROM `products` WHERE name = '$p_name'");
            if(mysqli_num_rows($check_duplicate_query) > 0){
                $message[] = 'Product name already exists. Please use a different name.';
            } else {
                $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, quantity, price, expiration_date, image) VALUES('$p_name','$p_quantity', '$p_price','$p_expiration_date', '$p_image')") or die('query failed');
                if($insert_query){
                    move_uploaded_file($p_image_tmp_name, $p_image_folder);
                    $message[] = 'Product added successfully';
                } else {
                    $message[] = 'Could not add the product';
                }
            }
        }
    }

    if(isset($_POST['update_product'])){
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = mysqli_real_escape_string($conn, $_POST['update_p_name']);
    $update_p_quantity = $_POST['update_p_quantity'];
    $update_p_price = $_POST['update_p_price'];
    $update_p_expiration_date = $_POST['update_p_expiration_date'];

    // Handle image
    $update_p_image = $_FILES['update_p_image']['name'];
    $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
    $update_p_image_folder = '../uploaded_img/' . $update_p_image;

    if (!empty($update_p_image)) {
        // A new image is uploaded
        move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
    } else {
        // No new image uploaded, retain the old one
        $image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$update_p_id'");
        $image_data = mysqli_fetch_assoc($image_query);
        $update_p_image = $image_data['image'];
    }

    // Check expiration date is within 8 months
    $current_date = new DateTime();
    $expiration_date = new DateTime($update_p_expiration_date);
    $cutoff_date = (clone $current_date)->modify('+8 months');

    if ($expiration_date <= $cutoff_date) {
        $message[] = 'Cannot update product. Expiration date is within 8 months.';
    } else {
        // Check for duplicate product name excluding the current product
        $check_duplicate_query = mysqli_query($conn, "SELECT * FROM `products` WHERE name = '$update_p_name' AND id != '$update_p_id'");
        if (mysqli_num_rows($check_duplicate_query) > 0) {
            $message[] = 'Product name already exists. Please use a different name.';
        } else {
            $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', quantity = '$update_p_quantity', price = '$update_p_price', expiration_date = '$update_p_expiration_date', image = '$update_p_image' WHERE id = '$update_p_id'");

            if ($update_query) {
                $message[] = 'Product updated successfully';
                header('location:inventory.php');
                exit();
            } else {
                $message[] = 'Product could not be updated';
                header('location:inventory.php');
                exit();
            }
        }
    }
}


    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id ") or die('query failed');
        if($delete_query){
            header('location:inventory.php');
            $message[] = 'product has been deleted';
        } else {
            header('location:inventory.php');
            $message[] = 'product could not be deleted';
        }
    }
    
?>



   <!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tinig Kalinga Inventory</title>
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
         a.delete-btn{
            background-color: #2980b9;
         color: whitesmoke;
         }
         a.option-btn{
            background-color: #2980b9;
         color: whitesmoke;
         }
         .btn:hover{
         background-color: #058789;
         color: whitesmoke;
        }
        a.delete-btn:hover{
            text-decoration: none;
            background-color: #058789;
         color: whitesmoke;
        }
        a.option-btn:hover{
            text-decoration: none;
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
?>

<!-- Link Bootstrap JS (Dropdown needs JS to function) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php
$expiration_warnings = [];

if ($expiring_soon_query) {
    while ($row = mysqli_fetch_assoc($expiring_soon_query)) {
        $expiration_warnings[] = "Warning: Product '" . $row['name'] . "' is expiring soon on " . $row['expiration_date'] . ".";
    }
} else {
    die('Query failed: ' . mysqli_error($conn));
}

if (!empty($expiration_warnings) && is_array($expiration_warnings)) {
    foreach ($expiration_warnings as $warning) {
        echo '<div class="message"><span>' . $warning . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i></div>';
    }
}

?>
<div class="container blurb" style="margin-top: 1%; margin-bottom: 1%;">

  <section>

   <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
    <h3>add a new product</h3>
    <input type="text" name="p_name" placeholder="Enter the product name" class="box" required>
    <input type="number" name="p_quantity" min="0" placeholder="Enter the product quantity" class="box" required>
    <input type="number" name="p_price" min="0" placeholder="Enter the product price" class="box" required>
    <input type="date" name="p_expiration_date" placeholder="Enter expiration date" class="box" required>
            <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
            <input type="submit" value="Add product" name="add_product" class="btn">
         </form>

      </section>

      <section class="display-product-table">

         <table>

            <thead>
               <th>Image</th>
               <th>Name</th>
               <th>Quantity</th>
               <th>Price</th>
               <th>Expiration Date</th>
               <th>Action</th>
            </thead>

            <tbody>
               <?php
               
               $select_products = mysqli_query($conn, "SELECT * FROM `products`");
               if(mysqli_num_rows($select_products) > 0){
                  while($row = mysqli_fetch_assoc($select_products)){
                     ?>

                     <tr>
                        <td><img src="../uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td>₱<?php echo $row['price']; ?></td>
                        <td><?php echo $row['expiration_date']; ?></td>
                        <td>
                           <a href="inventory.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> Delete </a>
                           <a href="inventory.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> Update </a>
                        </td>
                     </tr>

                     <?php
                  };    
               }else{
                  echo "<div class='empty'>no product added</div>";
               };
               ?>
            </tbody>
         </table>
      </section>
      <section class="edit-form-container">

         <?php         
         if(isset($_GET['edit'])){
            $edit_id = $_GET['edit'];
            $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
            if(mysqli_num_rows($edit_query) > 0){
               while($fetch_edit = mysqli_fetch_assoc($edit_query)){
                  ?>

                  <form action="" method="post" enctype="multipart/form-data">
                     <img src="../uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
                     <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
                     <input type="text" placeholder="Enter the product name" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
                     <input type="number" placeholder="Enter the product quantity" min="0" class="box" required name="update_p_quantity" value="<?php echo $fetch_edit['quantity']; ?>">
                     <input type="number" placeholder="Enter the product price" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
                     <input type="date" class="box" placeholder="Enter expiration date" required name="update_p_expiration_date" value="<?php echo $fetch_edit['expiration_date']; ?>">
                     <input type="file" class="box" name="update_p_image" accept="image/png, image/jpg, image/jpeg">
                     <input type="submit" value="Update" name="update_product" class="btn">
                     <input type="reset" value="Reset" id="close-edit" class="option-btn">
                     <a href="inventory.php" class="option-btn">Back</a>
                  </form>
                  
                  <?php
               };
            };
            echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
         };
         ?>

      </section>

   </div>


   <!-- custom js file link  -->
   <script src="../includes/js/script.js"></script>

</body>
</html>
<?php
}else{
 header("Location: login_establishment.php");
 exit();
}
?>


