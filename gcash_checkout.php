<?php 
session_start();
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tinig Kalinga Proof Payment</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="includes/images/favicon.ico">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="includes/css/style.css">
    
    <style>
        body {
            background-color: #058789; /* Body background color */
            font-family: Arial, sans-serif;
        }
        
        .container {
            margin-top: 5%;
            background: rgba(255, 255, 255, 0.1); /* Transparent white background */
            border-radius: 15px; /* Rounded corners */
            padding: 20px;
            backdrop-filter: blur(10px); /* Glass effect with blur */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Shadow effect */
            color: white; /* Text color */
        }

        .container h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .container label {
            font-size: 16px;
        }

        .container .form-control {
            background-color: transparent;
            border: 1px solid #ddd;
            color: white;
        }

        .container .form-control:focus {
            border-color: #058789;
            box-shadow: none;
        }

        #preview {
            max-width: 300px;
            max-height: 300px;
            margin-top: 20px;
            display: none;
            border: 1px solid #ddd;
        }

        .btn-info {
            background-color: #058789;
            border-color: #058789;
        }

        .btn-info:hover {
            background-color: #045f63;
            border-color: #045f63;
        }

        /* For better responsiveness */
        @media (max-width: 576px) {
            .container {
                margin-top: 10%;
                padding: 15px;
            }

            .container h2 {
                font-size: 20px;
            }

            .container label,
            .container .form-control {
                font-size: 14px;
            }
        }
    </style>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <div class="container" style="background-color: whitesmoke; color: #058789;">
        <center><img src="includes/images/logo-big.png">
        <h2><b>Tinig Kalinga Gcash Receipt</b></h2>
                            <p style="font-size: 1.35vh;">
    To complete your transaction, please upload a clear photo or screenshot of your GCash payment receipt. This helps us verify your payment quickly and accurately, thanks for your consideration.
</p></center>

        <?php if (isset($_GET['error'])): ?>
            <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>
        
        <form action="upload_preview_handler.php" method="POST" enctype="multipart/form-data">
            <input type="number" name="id" hidden value="<?php echo "$id"; ?>">
            <label class="form-label">Upload Receipt (Gcash):</label>
            
            <input class="form-control" type="file" name="gcash_photo" id="gcash_photo" style="color:#058789" onchange="previewImage(event)" required><br><br>
            
            <center>
            <img id="preview" alt="Image Preview"><br><br>
            </center>

            <button class="btn btn-info" type="submit">Submit</button>
        </form>


    </div>
</body>
</html>
