<?php
include 'conn.php';
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $hashedPassword = sha1($password);

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $address = $_POST['address'];
    $contact_no = $_POST['contact'];
    $gender = $_POST['gender'];
    $registration_type = $_POST['reg_type'];
    $birth_date = $_POST['birthdate'];
    $age = $_POST['age'];
    $control_number = $_POST['control_number'];

    // Session for authorized
    $_SESSION['email'] = $email;
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['contact_no'] = $contact_no;
    $_SESSION['registration_type'] = $registration_type;
    $_SESSION['control_number'] = $control_number;

    // Regular expression for password validation
    $passwordPattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{6,}$/";

    // Validate password format
    if (!preg_match($passwordPattern, $password)) {
        echo '<script>
                alert("Password must be at least 6 characters and include at least one uppercase letter, one lowercase letter, one symbol, and one number.");
                window.location.href = "../registry_senior_pwd.php";
             </script>';
        exit;
    }

    // Check if passwords match
    if ($password !== $cpassword) {
        echo '<script>
                alert("Passwords did not match");
                window.location.href = "../registry_senior_pwd.php";
              </script>';
        exit;
    }

    // File upload handling for fphoto
    if (isset($_FILES['fphoto'])) {
        if ($_FILES['fphoto']['error'] === UPLOAD_ERR_OK) {
            $ffilename = $_FILES['fphoto']['name'];
            $fimg_upload_path = 'images/' . basename($ffilename);
            move_uploaded_file($_FILES['fphoto']['tmp_name'], $fimg_upload_path);
        } else {
            echo "Error uploading fphoto: " . $_FILES['fphoto']['error'];
        }
    }

    // File upload handling for bphoto
    if (isset($_FILES['bphoto'])) {
        if ($_FILES['bphoto']['error'] === UPLOAD_ERR_OK) {
            $bfilename = $_FILES['bphoto']['name'];
            $bimg_upload_path = 'images/' . basename($bfilename);
            move_uploaded_file($_FILES['bphoto']['tmp_name'], $bimg_upload_path);
        } else {
            echo "Error uploading bphoto: " . $_FILES['bphoto']['error'];
        }
    }

    // Check if email is already registered
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $count_email = mysqli_num_rows($result);

    if ($count_email == 0) {
        // Insert new user into the database
        $sql = "INSERT INTO users (email, password, first_name, last_name, middle_name, province, city, barangay, address, contact_no, gender, registration_type, birth_date, age, control_number, fphoto, bphoto)
                VALUES ('$email', '$hashedPassword', '$first_name', '$last_name', '$middle_name', '$province', '$city', '$barangay', '$address', '$contact_no', '$gender', '$registration_type', '$birth_date', '$age', '$control_number', '$ffilename', '$bfilename')";
        
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            // Store user_id in the session and redirect with success message
            $_SESSION['user_id'] = mysqli_insert_id($conn);
            echo '<script>
                    alert("Registered Successfully");
                    window.location.href = "../registry_authorized.php";
                  </script>';
        } else {
            echo '<script>alert("Error registering user.");</script>';
        }
    } else {
        echo '<script>
                alert("Email Already Registered!");
                window.location.href = "../registry_senior_pwd.php";
              </script>';
    }
}
?>
