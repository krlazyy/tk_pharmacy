<?php
session_start();
include 'includes/conn.php';
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
    $user_id = $_SESSION['user_id'];
   ?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tinig Kalinga Refund</title>
      <link rel="icon" type="image/x-icon" href="includes/images/favicon.ico">

      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- font awesome cdn link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

      <!-- custom css file link  -->
      <link rel="stylesheet" href="includes/css/style.css">
<style type="text/css">
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

<!-- content -->
<div class="container blurb" style="margin-top:1%"><center>
   <h2><b>24 Hour Order Cancellation</h2></b></center>
   <?php

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Fetch orders for the logged-in user
    $order_query = mysqli_query($conn, "SELECT * FROM `order` WHERE user_id = '$user_id'") or die('Query failed');

    if (mysqli_num_rows($order_query) > 0) {
        while ($order = mysqli_fetch_assoc($order_query)) {
            $order_id = $order['id'];
            $order_date = strtotime($order['order_date']);
            $current_time = time();
            $time_difference = ($current_time - $order_date) / 3600; // Calculate difference in hours

            echo "<div class='order'>";
            echo "<p>Order ID: " . $order_id . "</p>";
            echo "<p>Products: " . $order['total_products'] . "</p>";
            echo "<p>Total Price: ₱" . $order['total_price'] . "</p>";
            echo "<p>Order Date: " . date("Y-m-d H:i:s", $order_date) . "</p>";

            // Check if the order is within 24 hours
            if ($time_difference <= 24) {
                echo "<a href='cancel_order.php?order_id=$order_id' class='btn btn-danger'>Cancel Order</a>";
            } else {
                echo "<p style='color: grey;'>Cancellation period expired (24 hours after order).</p>";
            }

            echo "</div><br>";
        }
    } else {
        echo "<p>You have no orders.</p>";
    }
} else {
    echo "<p>Please log in to view your orders.</p>";
}
?>

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.js"></script>

<!-- Search Functionality -->
<script>
  $(document).ready(function(){
     $('#search').on('input', function(){
       search_table($(this).val());
    });

     function search_table(value){
        $('#myTable tbody tr').each(function(){
            var found = false;
            $(this).find('td').each(function(){
                if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0){
                    found = true;
                    return false; // Exit inner loop once a match is found
                }
            });
            $(this).toggle(found);
        });
     }
  });
</script>

<!-- Voice Recognition Script -->
<script>
    const searchInput = document.getElementById('search');
    const voiceSearchBtn = document.getElementById('voiceSearchBtn');

    // Check if the browser supports SpeechRecognition
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

    if (SpeechRecognition) {
        const recognition = new SpeechRecognition();
        recognition.lang = 'en-US';
        recognition.interimResults = false;

        voiceSearchBtn.addEventListener('click', () => {
            recognition.start();
        });

        recognition.addEventListener('result', (event) => {
            const transcript = event.results[0][0].transcript;
            searchInput.value = transcript;
            // Trigger the search on voice input
            $(searchInput).trigger('input');
        });

        recognition.addEventListener('end', () => {
            recognition.stop();
        });
    } else {
        alert('Your browser does not support speech recognition.');
    }
</script>
<?php
}else{
 header("Location: login.php");
 exit();
}
?>


























