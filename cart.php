<?php
session_start();
@include 'config.php';
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {

   if (isset($_POST['update_update_btn'])) {
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];

   // Server-side validation: limit quantity to 1000
   if ($update_value > 1000) {
      $update_value = 1000;
      echo "<script>alert('Quantity limited to a maximum of 1,000.');</script>";
   }

   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if ($update_quantity_query) {
      header('location:cart.php');
   }
}

   if(isset($_GET['remove'])){
      $remove_id = $_GET['remove'];
      mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
      header('location:cart.php');
   };

   if(isset($_GET['delete_all'])){
      mysqli_query($conn, "DELETE FROM `cart`");
      header('location:cart.php');
   }

   ?>

   <!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tinig Kalinga Shopping Cart</title>
      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link rel="icon" type="image/x-icon" href="includes/images/favicon.ico">


      <!-- font awesome cdn link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

      <!-- custom css file link  -->
      <link rel="stylesheet" href="includes/css/style.css">
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
        /* Style the number input to make the spinner arrows larger */
  .btn:hover{
         background-color: whitesmoke;
         color: #058789;
        }
      .btn-hov:hover{
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

<div class="container" style="text-align: center;">
   <section class="shopping-cart">
      <h1 style="color: #058789; margin-bottom:3%;"><b>Shopping Cart</b></h1>
      <table class="table blurb">
         <thead>
            <th>Products</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Action</th>
         </thead>
         <tbody>
            <?php 
               // Get all items in the cart
               $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
               $grand_total = 0;
               $can_checkout = true; // To track if checkout can proceed
               
               if(mysqli_num_rows($select_cart) > 0){
                  while($fetch_cart = mysqli_fetch_assoc($select_cart)){

                     // Fetch the available quantity from the products table
                     $product_id = $fetch_cart['product_id']; // Ensure this is the correct field for product ID in the cart table
                     $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE `id` = '$product_id' LIMIT 1");

                     if (mysqli_num_rows($select_product) > 0) {
                       $product_data = mysqli_fetch_assoc($select_product);
                       $available_quantity = $product_data['quantity'];
                    } else {
                       $available_quantity = 0; // Set to 0 if the product is not found
                    }

                    

                     // Compare cart quantity with available quantity
                     $cart_quantity = $fetch_cart['quantity'];
                     if ($cart_quantity > $available_quantity) {
                         $can_checkout = false; // Disable checkout if quantity exceeds stock
                         echo "<p style='color: red;'>Not enough stock for {$fetch_cart['name']}. Only $available_quantity available.</p>";
                     }
                     ?>
                     <tr>
                        <td><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                        <td><?php echo $fetch_cart['name']; ?></td>
                        <td>₱<?php echo $fetch_cart['price']; ?>/each</td>
                        <td>

                           <form action="" method="post" class="quantity-form">
                              <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                              <div style="display: flex; align-items: center;">
                                 
                                 <input type="number" style="padding: 1px;"
                                 name="update_quantity" 
                                 min="1" 
                                 max="<?php echo min($available_quantity, 1000); ?>" 
                                 value="<?php echo $cart_quantity; ?>" 
                                 style="width: 60px; text-align: center; font-size: 18px;" 
                                 oninput="if(this.value > 1000) this.value = 1000;">
                                 <button type="button" class="btn-minus btn-sm btn-danger" style="font-size: 18px; padding: 8px; cursor: pointer; margin-left: 5px; margin-right: 3px;">-</button>
                                 <button type="button" class="btn-plus btn-sm btn-info" style="font-size: 18px; padding: 8px; cursor: pointer;">+</button>
                              </div>
                           </form>



                        </td>
                        <td>₱<?php echo $sub_total = $fetch_cart['price'] * $cart_quantity; ?></td>
                        <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="btn btn-info"> <i class="fas fa-trash"></i> Remove</a></td>
                     </tr>
                     <?php
                     $grand_total += $sub_total; 
                  }
               } else {
                  echo "<tr><td colspan='6'>Your cart is empty.</td></tr>";
               }
               ?>
               <tr class="table-bottom">
                  <td><a href="products.php" style="margin-top: 0; text-decoration: none;" class="btn btn-info">Check Products</a></td>
                  <td colspan="3">Grand Total</td>
                  <td>₱<?php echo $grand_total; ?></td>
                  <td><a href="cart.php?delete_all" style="text-decoration: none;" onclick="return confirm('are you sure you want to delete all?');" class="btn btn-info"> <i class="fas fa-trash"></i> Delete all </a></td>
               </tr>

            </tbody>
         </table>
         <div class="checkout-btn">
            <!-- Disable the "Buy Now" button if stock is insufficient -->
            <a href="checkout.php" class="btn btn-hov btn-info <?= ($grand_total > 1 && $can_checkout)?'':'disabled'; ?>">Proceed to Checkout</a>
      </div>
   </section>
</div><br>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Handle quantity update
    $('input[name="update_quantity"]').on('change', function() {
        let update_id = $(this).closest('form').find('input[name="update_quantity_id"]').val();
        let new_quantity = $(this).val();

        // Send AJAX request to update quantity
        $.ajax({
            url: 'update_cart.php',
            type: 'POST',
            data: {
                action: 'update_quantity',
                id: update_id,
                quantity: new_quantity
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Update subtotal and grand total
                    $(`form input[name="update_quantity_id"][value="${update_id}"]`)
                        .closest('tr').find('td:nth-child(5)').text(`₱${response.sub_total}`);

                    $('.table-bottom td:nth-child(3)').text(`₱${response.grand_total}`);
                } else {
                    alert('Failed to update cart. Please try again.');
                }
            }
        });
    });
});
</script>

<script>
$(document).ready(function () {
    // Handle the "+" button click
    $('.btn-plus').click(function () {
        let input = $(this).siblings('input[name="update_quantity"]');
        let currentValue = parseInt(input.val());
        let maxValue = parseInt(input.attr('max'));

        if (currentValue < maxValue) {
            input.val(currentValue + 1).trigger('input'); // Trigger input event to update cart
        }
    });

    // Handle the "-" button click
    $('.btn-minus').click(function () {
        let input = $(this).siblings('input[name="update_quantity"]');
        let currentValue = parseInt(input.val());
        let minValue = parseInt(input.attr('min'));

        if (currentValue > minValue) {
            input.val(currentValue - 1).trigger('input'); // Trigger input event to update cart
        }
    });

    // Automatically send the update request when input value changes manually
    $('input[name="update_quantity"]').on('input', function () {
        let input = $(this);
        let update_id = input.closest('form').find('input[name="update_quantity_id"]').val();
        let new_quantity = parseInt(input.val());
        let maxValue = parseInt(input.attr('max'));
        let minValue = parseInt(input.attr('min'));

        // Validate the input (ensure it stays within min and max)
        if (new_quantity > maxValue) {
            new_quantity = maxValue;
            input.val(maxValue);
        } else if (new_quantity < minValue || isNaN(new_quantity)) {
            new_quantity = minValue;
            input.val(minValue);
        }

        // Send AJAX request to update quantity
        $.ajax({
            url: 'update_cart.php',
            type: 'POST',
            data: {
                action: 'update_quantity',
                id: update_id,
                quantity: new_quantity
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    // Update subtotal for the specific item
                    $(`form input[name="update_quantity_id"][value="${update_id}"]`)
                        .closest('tr').find('td:nth-child(5)').text(`₱${response.sub_total}`);

                    // Update grand total
                    $('.table-bottom td:nth-child(3)').text(`₱${response.grand_total}`);
                } else {
                    alert('Failed to update cart. Please try again.');
                }
            }
        });
    });
});
</script>

</body>
</html>
<?php
}else{
 header("Location: login.php");
 exit();
}
?>


