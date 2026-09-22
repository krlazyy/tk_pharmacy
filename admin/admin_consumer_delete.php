<?php
	include '../includes/conn.php';

	if(isset($_GET['delete'])){
		$user_id = $_GET['delete'];

		$sql = "DELETE FROM users WHERE user_id = '$user_id'";
		if($conn->query($sql)){
		echo  '<script>
                    window.location.href = "admin_consumer.php";
                    alert("Deleted Successfully")
                </script>';

		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}


	
?>