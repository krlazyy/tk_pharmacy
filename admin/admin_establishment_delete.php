<?php
	include '../includes/conn.php';

	if(isset($_GET['delete'])){
		$establishment_id = $_GET['delete'];

		$sql = "DELETE FROM establishment WHERE establishment_id = '$establishment_id'";
		if($conn->query($sql)){
		echo  '<script>
                    window.location.href = "admin_establishment.php";
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