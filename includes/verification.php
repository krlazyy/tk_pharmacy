<?php
	session_start();
	include ("conn.php");

	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$password = sha1($_POST['password']);
		
		$sql = "SELECT * FROM users WHERE user_id = '$email'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){

			$_SESSION['error'] = 'Cannot find email with the ID';
		}

			$row = $query->fetch_assoc();
		// OTP Checker			
			$sql = "SELECT * FROM users WHERE user_otp='$user_otp'";
			$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			if ($row['user_otp']>=1){
			//verify password here and login
				if(password_verify($password, $row['password'])){
				$_SESSION['email'] = $row['user_id'];
				$sql = "SELECT * FROM users WHERE email='$email' AND password='password'";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result)) {
					$row = mysqli_fetch_assoc($result);
					if ($row['email']===$email && $row['password']===$password) {
						header('location: ../index.php');
					}
					else{
						header("location:../login.php?error=Incorrect email/Password")
					}
				}
				
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}

			}
			else{
				$_SESSION['error'] = 'OTP INVALID';
				header('location: otp.php');
			}
			}

			

		
	}
	else{
		$_SESSION['error'] = 'Input email credentials first';
	}
	
?>