<?php
session_start();
include '../includes/conn.php';
if (isset($_SESSION['establishment_id']) && isset($_SESSION['email'])) {
    ?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tinig Kalinga Refund</title>
      <link rel="icon" type="image/x-icon" href="../includes/images/favicon.ico">

      <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- font awesome cdn link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

      <!-- custom css file link  -->
      <link rel="stylesheet" href="../includes/css/style.css">
<style type="text/css">
.refund-box p {
    margin: 5px 0;
}
.refund-box{
    border: 2px #058789 solid;
    margin: 2%;
    padding: 20px;
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

      <div class="container blurb" style="margin-top: 1%;"><center>
         <h1 style="font-size: 6vh;"><b>Refunds</b></h1></center>
         <!-- Content -->
             <input type="text" class="form-control" id="searchInput" placeholder="Search by name, email, or contact..." onkeyup="searchRefunds()">
          <div class="container-fluid">
             
             <?php
$sql = "SELECT * FROM receipt_refund";
$query = $conn->query($sql);

while ($row = $query->fetch_assoc()) {
    echo "
    <div class='refund-box'>
        <p><b>Email</b>: {$row['email']}</p>
        <p><b>Contact</b>: {$row['contact_no']}</p>
        <p><b>Payment Method:</b>: {$row['method']}</p>
        <p><b>Name:</b> {$row['name']} refunded the item/product below:<br>{$row['total_products']} x ₱{$row['total_price']}</p>
    </div>
    ";
}
?>

     </div>
  </div>
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
<script src="jquery-3.7.1.min.js"></script>
<script src="includes/js/search"></script>
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
   function searchRefunds() {
    // Get the search input value and convert to lowercase
    let input = document.getElementById('searchInput').value.toLowerCase();
    // Get all refund box elements
    let boxes = document.getElementsByClassName('refund-box');

    // Loop through all refund boxes
    for (let i = 0; i < boxes.length; i++) {
        // Get the text content of each box
        let boxText = boxes[i].textContent.toLowerCase();

        // Check if the search term is in the box text
        if (boxText.includes(input)) {
            boxes[i].style.display = ""; // Show the box if it matches
        } else {
            boxes[i].style.display = "none"; // Hide the box if it doesn't match
        }
    }
}

</script>
<?php
}else{
 header("Location: login.php");
 exit();
}
?>














