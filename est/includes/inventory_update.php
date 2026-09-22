<?php
include '../../includes/conn.php';
if(isset($_POST['submit'])){
    $stocks_id=$_POST['stocks_id'];
	$medicine=$_POST['medicine'];
	$price=$_POST['price'];
	$quantity=$_POST['quantity'];
	$expiration_date=$_POST['expiration_date'];
	// Handle the upload for the first file
        if (isset($_FILES['medicine_photo'])) {
            if ($_FILES['medicine_photo']['error'] === UPLOAD_ERR_OK) {
                $ffilename = $_FILES['medicine_photo']['name'];
                $fimg_upload_path = 'images/' . basename($ffilename);
                if (move_uploaded_file($_FILES['medicine_photo']['tmp_name'], $fimg_upload_path)) {
                } else {
                    echo "Failed to upload file: " . $ffilename;
                }
            } else {
                echo "Error uploading medicine_photo: " . $_FILES['medicine_photo']['error'];
            }
}
    // Query to update
        $sql = "UPDATE stocks set stocks_id = '$stocks_id', medicine = '$medicine', price = '$price', quantity = '$quantity', expiration_date = '$expiration_date', medicine_photo = '$ffilename' WHERE stocks_id = '$stocks_id'";
	    $result = mysqli_query($conn, $sql);
            if ($result) {
            	echo  '<script>
                    window.location.href = "../inventory.php";
                    alert("Tinig Kalinga inventory updated Successfully!");
                </script>';
                }
                else{
                    die(mysqli_error($conn));
                }
}
