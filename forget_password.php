<?php 
    session_start();
    include 'includes/conn.php';

    // Check if form data is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        $cpassword = $conn->real_escape_string($_POST['cpassword']);

        // Check if password length is between 6 to 18 characters
        if (strlen($password) < 6 || strlen($password) > 18) {
            echo "Password must be between 6 and 18 characters!";
        }
        // Check if passwords match
        elseif ($password !== $cpassword) {
            echo "Passwords do not match!";
        } else {
            // Hash the new password using SHA1
            $hashed_password = sha1($password);

            // Update the password in the database
            $sql = "UPDATE users SET password = '$hashed_password' WHERE email = '$email'";

            if ($conn->query($sql) === TRUE) {
                session_unset();
                session_destroy();
                echo '<script>
                        alert("Password reset successfully!");
                        window.location.href = "login.php";
                      </script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Close the connection
        $conn->close();
    }
?>
