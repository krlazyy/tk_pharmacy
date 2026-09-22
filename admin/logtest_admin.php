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
		header("Location: login_admin.php?error=User Name is required");
	    exit();
	}else if(empty($password)){
        header("Location: login_admin.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM admin WHERE email='$email' AND password ='$hashedPassword'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $hashedPassword) {
            	$_SESSION['id'] = $row['id'];
            	$_SESSION['email'] = $row['email'];
            	header("Location: admin.php");
		        exit();
            }
            else{
				header("Location: login_admin.php?error=Incorect Username or password");
		        exit();
			}
		}else{
			header("Location: login_admin.php?error=Incorect Username or password");
	        exit();
		}
	}
	
}else{
	header("Location: login_admin.php");
	exit();
}

?>