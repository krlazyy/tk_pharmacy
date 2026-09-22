<?php
include '../includes/conn.php';
if(isset($_POST['submit'])){
    $establishment_id=$_POST['establishment_id'];
    $establishment_no=$_POST['establishment_no'];
	$email=$_POST['email'];
	$admin_contact=$_POST['admin_contact'];
    $admin_email=$_POST['admin_email'];
    $establishment_name=$_POST['establishment_name'];
	$tag_line=$_POST['tag_line'];
	$location=$_POST['location'];
    $category=$_POST['category'];
    $establishment_contact=$_POST['establishment_contact'];
    $website_link=$_POST['website_link'];
    $bio=$_POST['bio'];

    // Query to update
        $sql = "UPDATE establishment set establishment_id = '$establishment_id',establishment_no = '$establishment_no', email = '$email', admin_contact = '$admin_contact', admin_email = '$admin_email', establishment_name = '$establishment_name', tag_line = '$tag_line', location = '$location', category = '$category', establishment_contact = '$establishment_contact', website_link = '$website_link', bio = '$bio' WHERE establishment_id = '$establishment_id'";
	    $result = mysqli_query($conn, $sql);
            if ($result) {
      	echo  '<script>
                    window.location.href = "admin_establishment.php";
                    alert("Updated Successfully");
                </script>';
                }
                else{
                    die(mysqli_error($conn));
                }

}