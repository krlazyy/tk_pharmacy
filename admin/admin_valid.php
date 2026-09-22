<?php
session_start();
include '../includes/conn.php';
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
    <title>Admin Validity</title>
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
</style>
<link rel = "stylesheet" href = "../includes/css/style.css" />
</head>
<body style="background-color: #058789;">
    <div class="page-wrapper">
        <!-- header -->
        <header class = "header">
            <nav class = "navbar">
                <div class="container">
                    <div class="navbar-content d-flex justify-content-between align-items-center">
                        <div class = "brand-and-toggler d-flex align-items-center justify-content-between">
                            <a href = "admin.php" class = "navbar-brand d-flex align-items-center">
                                <span><img src="../includes/images/logo.png"></span>
                            </a>
                            <button type = "button" class = "d-none navbar-show-btn">
                                <i class = "fas fa-bars"></i>
                            </button>
                        </div>

                        <div class = "navbar-box">
                            <button type = "button" class = "navbar-hide-btn">
                                <i class = "fas fa-times"></i>
                            </button>

                            <ul class = "navbar-nav d-flex align-items-center">
                                <li class = "nav-item">
                                    <a href = "admin.php" class = "nav-link text-white  text-nowrap">Home</a>
                                </li>
                                <li class = "nav-item">
                                    <a href = "admin_consumer.php" class = "nav-link  text-white text-nowrap">Consumers</a>
                                </li>
                                <li class = "nav-item">
                                    <a href = "admin_establishment.php" class = "nav-link text-white text-nowrap">Establishments</a>
                                </li>
                                <li class = "nav-item">
                                    <a href = "logout_admin.php" class = "nav-link text-white text-nowrap">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="container-fluid blurb" style="margin-top:2%">
                <div class="row">
                <!-- Consumer/Customer Table -->
                <h1><b>Consumers</b></h1>
                <input type="text" class="form-control" id="search" name="search" placeholder="Search" style="float: left; margin-bottom: 1%;">
                <div class="col-lg-12">
                 <table class="table" id="myTable">
                    <thead>
                      <th class="hidden"></th>
                      <th>Email Address</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Middle Name</th>
                      <th>Province</th>
                      <th>City</th>
                      <th>Barangay</th>
                      <th>Address</th>
                      <th>Contact No</th>
                      <th>Gender</th>
                      <th>Registration Type</th>
                      <th>Birth Date</th>
                      <th>Age</th>
                      <th>Control #</th>
                      <th>ID Selfie</th>
                      <th>Digital Signature</th>
                      <th>Actions</th>
                  </thead>
                  <tbody>
                      <?php
                      $sql = "SELECT * FROM user_validity";
                      $query = $conn->query($sql);
                      while($row = $query->fetch_assoc()){
                          $zimagePath = "../includes/images/" . $row['fphoto'];
                          $ximagePath = "../includes/images/" . $row['bphoto'];
                          echo "
                          <tr>
                          <td class='hidden'>".$row['user_validity_id']."</td>
                          <td>".$row['email']."</td>
                          <td>".$row['first_name']."</td>
                          <td>".$row['last_name']."</td>
                          <td>".$row['middle_name']."</td>
                          <td>".$row['province']."</td>
                          <td>".$row['city']."</td>
                          <td>".$row['barangay']."</td>
                          <td>".$row['address']."</td>
                          <td>".$row['contact_no']."</td>
                          <td>".$row['gender']."</td>
                          <td>".$row['registration_type']."</td>
                          <td>".$row['birth_date']."</td>
                          <td>".$row['age']."</td>
                          <td>".$row['control_number']."</td>
                          <td><img src='$zimagePath' width=150></td>
                          <td><img src='$ximagePath' width=150></td>
                          <td>
                          <a class='btn-sm btn-success' href='admin_consumer_approve.php?approve=".$row['user_validity_id']."'>Approve</a>
                          <a class='btn-sm btn-danger' href='admin_consumer_deny.php?deny=".$row['user_validity_id']."'>Deny</a>
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
<script src="../includes/bootstrap/js/jquery-3.7.1.min.js"></script>
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
     header("Location: login_admin.php");
     exit();
}
?>