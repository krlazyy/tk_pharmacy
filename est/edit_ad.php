<?php
session_start();
include '../includes/conn.php';

if (isset($_SESSION['establishment_id']) && isset($_SESSION['email'])) {
    if (isset($_GET['ads_id']) && is_numeric($_GET['ads_id'])) {
        $ads_id = intval($_GET['ads_id']);

        // Fetch ad details
        $sql = "SELECT * FROM advertisement WHERE ads_id = $ads_id";
        $result = $conn->query($sql);

        if ($result && $result->num_rows == 1) {
            $ad = $result->fetch_assoc();
        } else {
            echo "Advertisement not found.";
            exit;
        }
    } else {
        echo "Invalid Advertisement ID.";
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ads_id = intval($_POST['ads_id']);
    $name = $conn->real_escape_string($_POST['name']);
    $address = $conn->real_escape_string($_POST['address']);
    $tagline = $conn->real_escape_string($_POST['tagline']);
    $bio = $conn->real_escape_string($_POST['bio']);
    $image = $_FILES['image'];

    // Check if a new image is uploaded
    if ($image['error'] === UPLOAD_ERR_OK) {
        $imageName = time() . "_" . basename($image['name']);
        $targetPath = "../uploaded_img/" . $imageName;

        if (move_uploaded_file($image['tmp_name'], $targetPath)) {
            // Delete the old image file if necessary
            if (!empty($ad['image']) && file_exists("../uploaded_img/" . $ad['image'])) {
                unlink("../uploaded_img/" . $ad['image']);
            }
        } else {
            echo "Failed to upload new image.";
            exit;
        }
    } else {
        // Retain the current image if no new image is uploaded
        $imageName = $ad['image'];
    }

    // Update ad details
    $sql = "UPDATE advertisement SET 
                name='$name', 
                address='$address', 
                tagline='$tagline', 
                bio='$bio', 
                image='$imageName' 
            WHERE ads_id=$ads_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index_establishment.php?update=success");
        exit;
    } else {
        echo "Error updating advertisement: " . $conn->error;
    }
}

} else {
    header("Location: login_establishment.php");
    exit();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Advertisement</title>
    <!-- Include CSS -->
        <link rel="icon" type="image/x-icon" href="../includes/images/favicon.ico">
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- owl carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/includes/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/includes/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css -->
    <link rel="stylesheet" href="../includes/css/main.css" />
    <link rel="stylesheet" href="../includes/css/utilities.css" />
    
    <!-- normalize.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../includes/css/style.css" />
</head>
<body>
    <div class="container">
        <form action="edit_ad.php" method="POST">
            <h1><b>Edit Advertisement</b></h1>
            <input type="hidden" name="ads_id" value="<?php echo $ad['ads_id']; ?>">

            <label class="form-label">Name:</label>
            <input required class="form-control" type="text" name="name" value="<?php echo htmlspecialchars($ad['name']); ?>" required><br>

            <!-- Image Upload -->
            <label>Image:</label><br>
            <div>
                <!-- Display current image -->
                <?php if (!empty($ad['image'])): ?>
                    <img id="previewImage" src="../uploaded_img/<?php echo htmlspecialchars($ad['image']); ?>" alt="Current Image" style="max-width: 200px; margin-bottom: 10px;">
                <?php else: ?>
                    <img id="previewImage" src="" alt="No Image" style="max-width: 200px; margin-bottom: 10px; display: none;">
                <?php endif; ?>
            </div>
            <input type="file" name="image" id="imageInput" accept="image/*"><br>

            <label class="form-label">Address:</label>
            <input required class="form-control"  type="text" name="address" value="<?php echo htmlspecialchars($ad['address']); ?>" required><br>

            <label class="form-label">Tagline:</label>
            <input required class="form-control"  type="text" name="tagline" value="<?php echo htmlspecialchars($ad['tagline']); ?>" required><br>

            <label class="form-label">Bio:</label>
            <textarea required class="form-control"  name="bio" required><?php echo htmlspecialchars($ad['bio']); ?></textarea><br>

            <button class="btn btn-info" type="submit">Update</button>
            <a style="text-decoration: none;" class="btn btn-danger" href="index_establishment.php">Cancel</a>
        </form>
    </div>
</body>
<script>
    const imageInput = document.getElementById('imageInput');
    const previewImage = document.getElementById('previewImage');

    imageInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
</script>

</html>
