<?php
include 'conn.php';
session_start();
    if (isset($_POST['submit'])) {
        $user_id = $_POST['user_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $middle_name = $_POST['middle_name'];
        $email = $_POST['email'];
        $contact_no = $_POST['contact_no'];
        $approval = $_POST['approval'];
        
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
            $sql = "INSERT INTO prescription (user_id, first_name, last_name, middle_name, email, contact_no,  approval, medicine_photo) VALUES ('$user_id','$first_name', '$last_name', '$middle_name', '$email', '$contact_no', '$approval', '$ffilename')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo  '<script>
                    window.location.href = "../prescription_add.php";
                    alert("Prescriptions uploaded successfully, please wait for your notification to be approved.")
                </script>';
                }
            }
echo  '<script>
                    window.location.href = "../prescription_add.php";
                    alert("Prescriptions uploaded successfully, please wait for your notification to be approved.")
                </script>';

    ?>