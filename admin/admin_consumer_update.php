<?php
include '../includes/conn.php';
if(isset($_POST['submit'])){
    $user_id=$_POST['user_id'];
    $email=$_POST['email'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $middle_name=$_POST['middle_name'];
    $province=$_POST['province'];
    $city=$_POST['city'];
    $barangay=$_POST['barangay'];
    $address=$_POST['address'];
    $contact_no=$_POST['contact'];
    $gender=$_POST['gender'];
    $registration_type=$_POST['reg_type'];
    $birth_date=$_POST['birthdate'];
    $age=$_POST['age'];
    $control_number=$_POST['control_number'];
    
    // Query to update
        $sql = "UPDATE users set user_id = '$user_id', email = '$email', first_name = '$first_name', last_name = '$last_name', middle_name = '$middle_name', province = '$province', city = '$city',  barangay = '$barangay', address = '$address', contact_no = '$contact_no', gender = '$gender', registration_type = '$registration_type', birth_date = '$birth_date', age = '$age' , control_number = '$control_number' WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
            if ($result) {
            echo  '<script>
                    window.location.href = "admin_consumer.php";
                    alert("Updated Successfully");
                </script>';
                }
                else{
                    die(mysqli_error($conn));
                }

}