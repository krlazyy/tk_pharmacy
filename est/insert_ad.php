<?php
session_start();
include '../includes/conn.php';
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $tagline = $_POST["tagline"];
    $bio = $_POST["bio"];

    // Handle image upload
    $image = $_FILES["image"]["name"];
    $target_dir = "../uploaded_img/";
    $target_file = $target_dir . basename($image);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO advertisement (name, image, address, tagline, bio) VALUES ('$name', '$image', '$address', '$tagline', '$bio')";

        if ($conn->query($sql) === TRUE) {
            echo  '<script>
                    window.location.href = "index_establishment.php";
                    alert("New advertisement added successfully.")
                </script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload image.";
    }
}

$conn->close();
?>