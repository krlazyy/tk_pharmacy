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
   <title>Tinig Kalinga Prescriptions</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../includes/images/favicon.ico">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../includes/css/style.css">
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
td, th {
    word-break: break-word;
    white-space: normal;
}

.btn:hover{
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

        <div class="container blurb" style="margin-top: 1%;">
            <div class="row">
                <div class="col-md-auto">
    <h1><b>Prescription</b></h1>
    <input type="text" class="form-control" id="search" name="search" placeholder="Search" style="float: left; margin-bottom: 1%;">
        <table class="table" id="myTable">
                <thead>
                  <th class="hidden"></th>
                  <th class="hidden">User ID</th>
                  <th class="hidden">Prescription ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Middle Name</th>
                  <th>Email</th>
                  <th>Contact No</th>
                  <th>Prescriptions</th>
                  <th>Settlement</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM prescription ORDER BY prescription_id DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                    $modelphoto = "../includes/images/".$row['medicine_photo'];
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td class='hidden'>".$row['user_id']."</td>
                          <td class='hidden'>".$row['prescription_id']."</td>
                          <td>".$row['first_name']."</td>
                          <td>".$row['last_name']."</td>
                          <td>".$row['middle_name']."</td>
                          <td>".$row['email']."</td>
                          <td>".$row['contact_no']."</td>
                          <td><img src='$modelphoto' width=150></td>
                          <td class='hidden'>includes/images/".$row['medicine_photo']."</td>
                          <td>".$row['approval']."</td>
                          <td>
                            <a class='btn btn-info' href='prescription_update.php?edit=".$row['prescription_id']."'>Approve</a>
                            <a class='btn btn-info' href='prescription_delete.php?delete=".$row['prescription_id']."'>Deny</a>
                          </td>
                        </tr>
                      ";
                    }
                  ?>
                  
                </tbody>
              </table>
                </div>
            </div>
        </div>
                

        <!-- jquery cdn -->
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <!-- owl carousel -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- custom js -->
        <script src = "../includes/js/script.js"></script>

    </body>
</html>
</body>

        <!-- jquery cdn -->
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <!-- owl carousel -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- custom js -->
        <script src = "../includes/js/script.js"></script>
    </body>
</html>
</body>
<script src="../includes/bootstrap/jquery-3.7.1.min.js"></script>
<script src="../includes/js/search"></script>
<script type="text/javascript">
    $(document).ready(function(){
    $('#search').keyup(function(){
        search_table($(this).val());
        });

        function search_table(value){
            $('#myTable tr').each(function(){
                var found = 'false';
                $(this).each(function(){
                    if($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0){
                        found='true';
                    }
                });
                if (found=='true') {
                    $(this).show();
                }
                else{
                    $(this).hide();
                }
        });
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