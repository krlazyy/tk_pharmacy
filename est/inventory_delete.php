<?php
	include '../includes/conn.php';

	if(isset($_GET['delete'])){
		$stocks_id = $_GET['delete'];

		$sql = "DELETE FROM stocks WHERE stocks_id = '$stocks_id'";
		if($conn->query($sql)){
		echo  '<script>
                    window.location.href = "inventory.php";
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