<?php
session_start(); 
include '../includes/conn.php';

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$password = validate($_POST['password']);
	$hashedPassword = sha1($password);

	if (empty($email)) {
		header("Location: login_establishment.php?error=User Name is required");
	    exit();
	}else if(empty($password)){
        header("Location: login_establishment.php?error=Password is required");
	    exit();
	}

	else{
		$sql = "SELECT * FROM establishment WHERE email='$email' AND password ='$hashedPassword'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
             if ($row['email'] === $email && $row['password'] === $hashedPassword) {
            	$_SESSION['establishment_id'] = $row['establishment_id'];
            	$_SESSION['establishment_no'] = $row['establishment_no'];
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['admin_name'] = $row['admin_name'];
            	$_SESSION['admin_contact'] = $row['admin_contact'];
            	$_SESSION['admin_email'] = $row['admin_email'];
				$_SESSION['establishment_name'] = $row['establishment_name'];
				$_SESSION['tag_line'] = $row['tag_line'];
				$_SESSION['location'] = $row['location'];
				$_SESSION['category'] = $row['category'];
				$_SESSION['establishment_contact'] = $row['establishment_contact'];
				$_SESSION['website_link'] = $row['website_link'];
				$_SESSION['bio'] = $row['bio'];
            	header("Location: index_establishment.php");
		        exit();
            }
            else{
				header("Location: login_establishment.php?error=Incorect Username or password");
		        exit();
			}
		}else{
			header("Location: login_establishment.php?error=Incorect Username or password");
	        exit();
		}
	}
	
}else{
	header("Location: login_establishment.php");
	exit();
}

?>