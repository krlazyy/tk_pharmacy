<?php
session_start();
@include 'config.php';
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
if(isset($_POST['order_btn'])){
   $user_id = $_POST['user_id'];
   $name = $_POST['name'];
   $contact_no = $_POST['contact_no'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];
   $control_number = $_POST['control_number'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         $discount = 0;
         $discount_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         //deduct quantity from inventory
        $product_id = $product_item['product_id']; // Assuming you have a product_id column
        $product_quantity = $product_item['quantity'];

        // Deduct the quantity from the inventory
        $update_quantity_query = mysqli_query($conn, "UPDATE `products` SET `quantity` = `quantity` - $product_quantity WHERE `id` = '$product_id'") or die('Failed to update inventory');

         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = $product_item['price'] * $product_item['quantity'];
         $total_price = $product_price;
         $grand_total =  $total += $total_price - $discount;
         $discount = $total_price * 0.20;
         $product_price = $grand_total-$discount;

      };
   };


$_SESSION['order'] = [
    'user_id' => $_POST['user_id'],
    'name' => $_POST['name'],
    'contact_no' => $_POST['contact_no'],
    'email' => $_POST['email'],
    'method' => $_POST['method'],
    'flat' => $_POST['flat'],
    'street' => $_POST['street'],
    'city' => $_POST['city'],
    'state' => $_POST['state'],
    'country' => $_POST['country'],
    'pin_code' => $_POST['pin_code'],
    'control_number' => $_POST['control_number']
];

   if ($method == "Digital (Gcash)") {
      //insert into order
   $tracking_code=rand(11111,99999);
   $total_product = implode(', ',$product_name);
   $order_date = date("Y-m-d H:i:s"); // Current timestamp
   $detail_query = mysqli_query($conn, "INSERT INTO `order` (user_id, name, contact_no, email, method, flat, street, city, state, country, pin_code, total_products, total_price, track_code, order_date, control_number) VALUES ('$user_id', '$name', '$contact_no', '$email', '$method', '$flat', '$street', '$city', '$state', '$country', '$pin_code', '$total_product', '$product_price', '$tracking_code', '$order_date', '$control_number')") or die('query failed');
   
    $_SESSION['contact_no'] = $contact_no;
    $_SESSION['total_price'] = $grand_total;
    // Get the last inserted ID
if ($detail_query) {
    $id = mysqli_insert_id($conn); // Get the auto-incremented order ID
    $_SESSION['id'] = $id; // Store the order ID in a session variable
    //Add later delete item
    mysqli_query($conn, "DELETE FROM `cart`");
    // Redirect or proceed with additional operations
    echo "Order placed successfully. Order ID: " . $_SESSION['id'];
    header("Location: gcash_payment.php");
    exit();
} else {
    die("Failed to place order.");
}
    

    
} 




else {
   //insert into order
   $tracking_code=rand(11111,99999);
   $total_product = implode(', ',$product_name);
   $order_date = date("Y-m-d H:i:s"); // Current timestamp
   $gcash_photo = "";
   $detail_query = mysqli_query($conn, "INSERT INTO `order` (user_id, name, contact_no, email, method, flat, street, city, state, country, pin_code, total_products, total_price, track_code, order_date, control_number, gcash_photo) VALUES ('$user_id', '$name', '$contact_no', '$email', '$method', '$flat', '$street', '$city', '$state', '$country', '$pin_code', '$total_product', '$product_price', '$tracking_code', '$order_date', '$control_number', '$gcash_photo')") or die('query failed');




    // Show the confirmation message for Cash payment or other methods
    echo "
    <div class='order-message-container'>
    <div class='message-container'>
    <center><span><img src='includes/images/logo-big.png' width='200'></span></center>
        <h3>Thank you for shopping!</h3>
        <div class='order-detail'>
           <span>Item (Qty): ".$total_product."</span><br>
           <span class='total'><b> Total : ₱".$product_price." </b></span>
        </div>
        <div class='customer-details'>
        <h3>Invoice to:</h3>
           <p> Name : <span>".$name."</span> </p>
           <p> Contacts : <span>".$contact_no."</span> </p>
           <p> Email : <span>".$email."</span> </p>
           <p> Information : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country.", ".$pin_code."</span> </p>
           <p> payment mode : <span>".$method."</span> </p>
           <p>Control#: <span>".$control_number."</span></p>
           <p><b>Reference No.: <span>".$tracking_code."</span></b></p>
        </div>
        <center>
        <a href='products.php' class='btn' style='padding:20px; font-size:1.20vh;'><center>Kindly screenshot this invoice and go nearest store</center></a>
        </center>
    </div>
    </div>
    ";


    // delete item
         mysqli_query($conn, "DELETE FROM `cart`");
}

      


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tinig Kaliniga Checkout</title>
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="icon" type="image/x-icon" href="includes/images/favicon.ico">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="includes/css/style.css">
   <style type="text/css">
      .header .flex {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.header .navbar {
    display: flex;
    align-items: center;
    gap: 2px;
}

.header .navbar a {
    color: white;
    text-decoration: none;
    transition: color 0.3s ease;
}

.header .navbar a:hover {
    color: #d1d1d1;
}

.header .cart {
    display: flex;
    align-items: center;
}

.header .navbar-brand {
    display: flex;
    align-items: center;
    margin-right: auto;
}

.header .cart span {
    border-radius: 50%;
    font-size: 1.15rem;
    margin-left: 5px;
}
.customer-details{
text-align: left;
 }  

.btn {
    display: flex;
    align-items: center; /* Align items vertically */
    background-color: #4CAF50; /* Default button background */
    color: white; /* Default text color */
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    text-transform: uppercase;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s; /* Smooth transition for hover */
}

.btn:hover{
   background-color: #058789;
   color: whitesmoke;
}




   </style>


</head>
<body>

<?php 
include 'header.php';
?>

<!-- Link Bootstrap JS (Dropdown needs JS to function) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="container blurb" style="margin-top: 1%;">

<section class="checkout-form">

   <h1 style="font-size: 6vh; margin-bottom:3%;"><b>Complete Order<b></h1>

   <form action="" method="post">

   <div class="display-order">
  <h1 class="heading"><b>Item (Qty x Price):</b></h1>
  <?php
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
    $total = 0;
    $grand_total = 0;
    $discount = 0;
    $discount_total = 0;
    $display_price = 0;
    
    if(mysqli_num_rows($select_cart) > 0) {
      while($fetch_cart = mysqli_fetch_assoc($select_cart)) {
        // Calculate total price for current item (quantity * unit price)
        $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
        
        // Accumulate total price before discount
        $display_price += $total_price;
        
        // Calculate discount for current item
        $discount = $total_price * 0.20;
        
        // Accumulate grand total with discount applied
        $grand_total += $total_price - $discount;
        
        // Calculate total discount for all items
        $discount_total += $discount;
  ?>
      <!-- Display item name, quantity, unit price, and total for that item -->
      <span><?= $fetch_cart['name']; ?> (<?= $fetch_cart['quantity']; ?> x ₱<?= number_format($fetch_cart['price'], 2); ?>) = ₱<?= number_format($total_price, 2); ?></span><br>
  <?php
      }
    } else {
      echo "<div class='display-order'><span>Your cart is empty!</span></div>";
    }
  ?>

  <!-- Display total price, discount, and grand total -->
  <span class="total" style="border: solid 2px green;">Subtotal: <b>₱<?= number_format($display_price, 2); ?></b></span><br>
  <span class="discount" style="border: solid 2px red;">Discount (20%): <b>₱<?= number_format($display_price, 2); ?> - ₱<?= number_format($discount_total, 2); ?></b></span><br>
  <span class="grand-total"><b>Total: ₱<?= number_format($grand_total, 2); ?></b></span>
</div>

   <?php 
// session
   $user_id=$_SESSION['user_id'];
   $sql="SELECT * from users where user_id=$user_id";
   $result=mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($result);
   $uemail=$row['email'];
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
   $control_number=$row['control_number'];
   $fphoto = "includes/images/".$row['fphoto'];
   $bphoto = "includes/images/".$row['bphoto'];
   $oldfphoto = "C:/xampp/htdocs/capstone_new/includes/images".$row['fphoto'];
   $oldbphoto = "C:/xampp/htdocs/capstone_new/includes/images".$row['bphoto']; ?>
      <div class="flex">
            <input type="text" name="user_id" value="<?php echo "$user_id"; ?>" hidden required readonly>
         <div class="inputBox">
            <span>Name</span>
            <input type="text" name="name" value="<?php echo "$first_name"; ?>" required readonly>
         </div>
         <div class="inputBox">
            <span>Contact no</span>
            <input type="text" name="contact_no" value="<?php echo "$contact_no"; ?>" required readonly>
         </div>
         <div class="inputBox">
            <span>Email</span>
            <input type="email" name="email" value="<?php echo "$uemail"; ?>" required readonly>
         </div>
         <div class="inputBox">
            <span>Control #</span>
            <input type="text" name="control_number" value="<?php echo "$control_number"; ?>" required readonly>
         </div>
         
         <div class="inputBox">
            <span>Province</span>
            <input type="text" name="flat" value="<?php echo "$province"; ?>" required readonly>
         </div>
         <div class="inputBox">
            <span>Barangay</span>
            <input type="text" name="street" value="<?php echo "$barangay"; ?>" required readonly>
         </div>
         <div class="inputBox">
            <span>City</span>
            <input type="text" name="city"  value="<?php echo "$city"; ?>"required readonly>
         </div>
         <div class="inputBox">
            <span>Registration Type</span>
            <input type="text" name="state" value="<?php echo "$registration_type"; ?>"required readonly>
         </div>
         <div class="inputBox">
            <span>Gender</span>
            <input type="text" name="country" value="<?php echo "$gender"; ?>" required readonly>
         </div>
         <div class="inputBox">
            <span>Age</span>
            <input type="text" name="pin_code" value="<?php echo "$age"; ?>" required readonly>
         </div>
         <div class="inputBox">
            <span>Payment method</span>
            <select name="method">
               <option value="Cash" selected>Cash</option>
               <option value="Digital (Gcash)">Digital (Gcash)</option>
            </select>
         </div>
      </div>
      <input type="submit" value="Proceed to Payment" name="order_btn" class="btn"><br>
      <span style="font-size:1.25vh;"><center>FDA Advisory No.2022-0277</span><br>
    <p style="font-size:1vh;"><i>The shelf-life of our products can range from 9.8 to 23 months. The packaging material can affect how long the tablets will last, with PVC/PVDC/Al foil and polycoated paper offering better protection than viscose film</i></p></center>
   </form>
   
   
    
</section>

</div>

<!-- custom js file link  -->
<script src="../include/bootstrap/js/script.js"></script>
<script>
   document.querySelector("form").onsubmit = function(e) {
      // Display the confirmation dialog
      var confirmation = confirm("Are you sure you want to checkout this item?");
      
      // If user cancels the action, prevent form submission
      if (!confirmation) {
         e.preventDefault();
      }
   };
</script>
<script>
   document.querySelector("form").onsubmit = function(e) {
      var confirmation = confirm("Are you sure you want to checkout this item?");
      if (!confirmation) {
         e.preventDefault();
      }
   };
</script>
</body>
   
</body>
</html>
<?php
}else{
     header("Location: logout.php");
     exit();
}
?>