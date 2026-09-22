<?php
session_start();
@include 'includes/conn.php';
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
   $user_id=$_SESSION['user_id'];
   $sql="SELECT * from users where user_id=$user_id";
   $result=mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($result);
   $email=$row['email'];
   $first_name=$row['first_name'];
   $last_name=$row['last_name'];
   $middle_name=$row['middle_name'];
   $contact_no=$row['contact_no'];

   ?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tinig Kalinga Notification</title>
      <link rel="icon" type="image/x-icon" href="includes/images/favicon.ico">

      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- font awesome cdn link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

      <!-- custom css file link  -->
      <link rel="stylesheet" href="includes/css/style.css">
      <style type="text/css">
       input[type=text] {
          color: black;
       }
       input[type=number] {
          color: black;
       }
       input[type=date]{
          color: black;
       }
       select{
         background-color: lightblue;
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

   <div class="container blurb" style="margin-top: 1%; margin-bottom: 1%; width: 100%; height: 100%; padding: 20px;">
    <h1 style="font-size: 6vh; margin-bottom:3%;"><b>Prescription Notifications</b></h1>
     <input type="text" class="form-control" id="search" name="search" placeholder="Search" style="float: left; margin-bottom: 1%;">
             <table class="table" id="myTable">
       <thead>
        <th class="hidden"></th>
        <th class="hidden">Prescription ID</th>
        <th>Prescriptions</th>
        <th>Settlement</th>
     </thead>
     <tbody>
        <?php
        $sql = "SELECT * FROM `notification` WHERE user_id=$user_id ORDER BY notification_id DESC";

        $query = $conn->query($sql);
        while($row = $query->fetch_assoc()){
         $zimagePath = "includes/images/" .$row['medicine_photo'];
         echo "
         <tr>
         <td class='hidden'></td>
         <td class='hidden'>".$row['notification_id']."</td>
         <td><img src='$zimagePath' width=150></td>
         <td>".$row['approval']."</td>
         </tr>
         ";
      }
      ?>

   </tbody>
</table>
</div>
</body>
<!-- jquery cdn -->
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<!-- owl carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- custom js -->
<script src = "includes/js/script.js"></script>
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
