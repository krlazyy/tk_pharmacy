<?php
include '../includes/conn.php';
session_start();

if (isset($_GET['edit'])) {
    $prescription_id = $_GET['edit'];
    $_SESSION['prescription_id'] = $prescription_id;
    
    // Fetch prescription details from the 'prescription' table
    $sql = "SELECT * FROM prescription WHERE prescription_id = $prescription_id";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
        $prescription_id = $row['prescription_id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $middle_name = $row['middle_name'];
        $email = $row['email'];
        $contact_no = $row['contact_no'];
        $approval = "○ Your request for prescriptions has been <b>Approved</b>,<i> please bring your prescriptions</i> and visit our store!";
        $medicine_photo = $row['medicine_photo'];

        // Insert into the 'notification' table
        $sql_insert = "INSERT INTO notification (user_id, prescription_id, first_name, last_name, middle_name, email, contact_no, approval, medicine_photo)
               VALUES ('$user_id','$prescription_id', '$first_name', '$last_name', '$middle_name', '$email','$contact_no', '$approval', '$medicine_photo')";
        
        if (mysqli_query($conn, $sql_insert)) {
            // If insert is successful, delete the prescriptions
            $sql_delete = "DELETE FROM prescription WHERE prescription_id = $prescription_id";
            if (mysqli_query($conn, $sql_delete)) {
                echo '<script>
                        alert("Prescriptions approved and notified consumer successfully!");
                        window.location.href = "prescriptions.php";
                      </script>';
            } else {
                $_SESSION['error'] = "Error deleting prescriptions: " . $conn->error;
            }
        } else {
            $_SESSION['error'] = "Error inserting into prescriptions: " . $conn->error;
        }
    } else {
        $_SESSION['error'] = "prescriptions not found!";
    }
} 

else {
    $_SESSION['error'] = "No prescriptions ID provided!";
}

// Close the connection (optional but good practice)
mysqli_close($conn);
?>
