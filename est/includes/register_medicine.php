<?php
include '../../includes/conn.php';
session_start();
    if (isset($_POST['submit'])) {
        $medicine = $_POST['medicine'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $expiration_date = $_POST['expiration_date'];
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
        } else {
            echo "medicine_photo not set.";
        }
        
            // insert in users table
            $sql = "INSERT INTO stocks (medicine, price, quantity, expiration_date, medicine_photo) VALUES ('$medicine', '$price', '$quantity', '$expiration_date','$ffilename')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo  '<script>
                    window.location.href = "../medicine_add.php";
                    alert("Tinig Kalinga item uploaded successfully!")
                </script>';
                }
            }
header('location: ../medicine_add.php');

    ?>