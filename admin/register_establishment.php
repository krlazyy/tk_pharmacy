<?php
include '../includes/conn.php';
session_start();

if (isset($_POST['submit'])) {
    $establishment_no = $_POST['establishment_no'];
    $email = $_POST['email'];
    $_SESSION['email'] = $email;
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $admin_name = $_POST['admin_name'];
    $admin_contact = $_POST['admin_contact'];
    $admin_email = $_POST['admin_email'];
    $establishment_name = $_POST['establishment_name'];
    $tag_line = $_POST['tag_line'];
    $location = $_POST['location'];
    $category = $_POST['category'];
    $establishment_contact = $_POST['establishment_contact'];
    $website_link = $_POST['website_link'];
    $bio = $_POST['bio'];

    // Check password length
    if (strlen($password) < 6 || strlen($password) > 24) {
        echo '<script>
            window.location.href = "../registry_establishment.php";
            alert("Password must be between 6 to 24 characters")
        </script>';
        exit();
    }

    // Hash the password if length is valid
    $hashedPassword = sha1($password);

    // Check for email duplication
    $sql = "SELECT * FROM establishment WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $count_email = mysqli_num_rows($result);

    if ($count_email == 0) {
        if ($password == $cpassword) {
            // Insert into establishment table
            $sql = "INSERT INTO establishment (establishment_no, email, password, admin_name, admin_contact, admin_email, establishment_name, tag_line, location, category, establishment_contact, website_link, bio) 
                    VALUES ('$establishment_no', '$email', '$hashedPassword', '$admin_name', '$admin_contact', '$admin_email', '$establishment_name', '$tag_line', '$location', '$category', '$establishment_contact', '$website_link', '$bio')";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>
                    window.location.href = "admin_establishment.php";
                    alert("Tinig Kalinga registered successfully")
                </script>';
            } else {
                echo '<script>
                    window.location.href = "registry_establishment.php";
                    alert("Database Error, Try again later")
                </script>';
            }
        } else {
            echo '<script>
                window.location.href = "registry_establishment.php";
                alert("Passwords did not match")
            </script>';
        }
    }
}
?>
