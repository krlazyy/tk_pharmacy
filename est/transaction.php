<?php
session_start();
include '../includes/conn.php';
if (isset($_SESSION['establishment_id']) && isset($_SESSION['email'])) {
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tinig Kalinga Transaction</title>
    <link rel="icon" type="image/x-icon" href="../includes/images/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../includes/css/style.css">

    <style>
        /* General Styling */
        body {
            background-color: #f7f9fc;
            font-family: Arial, sans-serif;
        }
        
        

        /* Table Styling */
        .table-container {
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f1f1f1;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Button Styling */
        .btn {
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .btn:hover {
            opacity: 0.9;
        }
        input[type=text] {
        color: black;
    }
    input[type=number] {
        color: black;
    }
    input[type=date]{
        color: black;
    }
    select{
      background-color: lightblue;
  }
  
</style>
</head>
<body>

<?php
include 'header.php';
?>

<div class="modal-overlay" id="image-modal">
    <div class="modal-content">
        <span class="modal-close" id="modal-close">&times;</span>
        <img id="modal-image" src="" alt="Enlarged view">
    </div>
</div>

<!-- Link Bootstrap JS (Dropdown needs JS to function) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
    /* Table Styling */
.table-container {
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

th, td {
    padding: 7px; /* Add 7px padding for consistent spacing */
    text-align: center;
    border: 1px solid #ddd;
}

th {
    background-color: #f1f1f1;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}


    .btn-success, .btn-danger {
        color: white;
        padding: 6px 12px;
        border-radius: 5px;
        font-size: 14px;
    }

    .btn-success {
        background-color: #28a745;
    }

    .btn-danger {
        background-color: #dc3545;
    }

    .btn:hover {
        opacity: 0.9;
    }

    /* Responsive Design */
    @media (max-width: 1028px) {
        .tables-container {
            flex-direction: column; /* Stack tables vertically */
            gap: 20px;
        }

        .table-container {
            width: 100%; /* Full width on small screens */
        }
    }
    td, th {
    word-break: break-word;
    white-space: normal;
}
.gcash-photo {
    width: 100px;
    height: auto;
    border-radius: 5px; /* Optional styling */
}

/* Modal styling */
.modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    z-index: 1000;
    justify-content: center;
    align-items: center;
}

.modal-overlay.active {
    display: flex;
}

.modal-content {
    position: relative;
    max-width: 50%;
    max-height: 50%;
    background: white;
    padding: 10px;
    border-radius: 8px;
    text-align: center;
}

.modal-content img {
    max-width: 100%;
    max-height: 100%;
}

.modal-close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 1.5rem;
    color: black;
    cursor: pointer;
}
.btn-success{
            background-color: #2980b9;
         color: whitesmoke;
         }
         .btn-danger{
            background-color: #2980b9;
         color: whitesmoke;
         }
.btn:hover{
         background-color: #058789;
         color: whitesmoke;
        }
</style>

    <!-- Unpaid Transactions Table -->
    <div class="table-container">
        <h1 style="font-size: 4vh; margin-top: 1%; margin-bottom: 1%;"><b>Transactions</b></h1>
        <input type="text" class="form-control mb-3" id="unpaidSearch" placeholder="Search...">
<table class="table" id="unpaidTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Method</th>
                    <th>Total Products</th>
                    <th>Price</th>
                    <th>Control #</th>
                    <th>Tracking #</th>
                    <th>Gcash</th>
                    <th>Actions</th>
                </tr>
            </thead>
<tbody>
    <?php
    $sql = "SELECT * FROM `order` ORDER BY id DESC";
    $query = $conn->query($sql);
    while ($row = $query->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['method']); ?></td>
            <td><?php echo htmlspecialchars($row['total_products']); ?></td>
            <td>₱<?php echo htmlspecialchars($row['total_price']); ?></td>
            <td><?php echo htmlspecialchars($row['control_number']); ?></td>
            <td><?php echo htmlspecialchars($row['track_code']); ?></td>
            <td>
                <?php if (empty($row['gcash_photo'])): ?>
                    <img src='../includes/images/cash.jpg' style='width: 100px; height: auto; cursor: pointer;' onclick='openModal(this.src)' alt='Cash Payment'>
                <?php else: ?>
                    <img src='../<?php echo htmlspecialchars($row['gcash_photo']); ?>' style='width: 100px; height: auto; cursor: pointer;' onclick='openModal(this.src)'>
                <?php endif; ?>
            </td>
            <td>
                <a class='btn btn-success' href='transaction_update.php?edit=<?php echo $row['id']; ?>'>Paid</a>
                <a class='btn btn-danger' href='transaction_delete.php?delete=<?php echo $row['id']; ?>'>Deny</a>
            </td>
        </tr>
        <?php
    }
    ?>
</tbody>



        </table>
    </div>

    <!-- Paid Transactions Table -->
<div class="table-container">
        <h1 style="font-size: 4vh; margin-top: 1%; margin-bottom: 1%;"><b>Transaction History</b></h1>
        <input type="text" class="form-control mb-3" id="paidSearch" placeholder="Search...">
        <table class="table" id="paidTable">
            <thead>
                <tr>
                    <th class="hidden"></th>
                    <th class="hidden">Receipt ID</th>
                    <th class="hidden">ID</th>
                    <th>Name</th>
                    <th>Method</th>                  
                    <th>Total Products</th>
                    <th>Price</th>
                    <th>Tracking #</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM reciept ORDER BY transaction_date DESC";
                $query = $conn->query($sql);
                while ($row = $query->fetch_assoc()) {
                    echo "
                    <tr>
                        <td class='hidden'></td>
                        <td class='hidden'>".$row['reciept_id']."</td>
                        <td class='hidden'>".$row['user_id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['method']."</td>
                        <td>".$row['total_products']."</td>
                        <td>₱".$row['total_price']."</td>
                        <td>".$row['track_code']."</td>
                        <td>".$row['transaction_date']."</td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<script>
function openModal(imageSrc) {
    const modal = document.getElementById('image-modal');
    const modalImage = document.getElementById('modal-image');
    modalImage.src = imageSrc;
    modal.classList.add('active');
}

// Close modal on clicking the close button
document.getElementById('modal-close').addEventListener('click', () => {
    document.getElementById('image-modal').classList.remove('active');
});

// Close modal on clicking outside the content
document.getElementById('image-modal').addEventListener('click', (e) => {
    if (e.target === e.currentTarget) {
        e.currentTarget.classList.remove('active');
    }
});
</script>



<script>
function openModal(imageSrc) {
    const modal = document.getElementById('image-modal');
    const modalImage = document.getElementById('modal-image');
    modalImage.src = imageSrc;
    modal.classList.add('active');
}

// Close modal logic
document.getElementById('modal-close').addEventListener('click', () => {
    document.getElementById('image-modal').classList.remove('active');
});

document.getElementById('image-modal').addEventListener('click', (e) => {
    if (e.target === e.currentTarget) {
        e.currentTarget.classList.remove('active');
    }
});
</script>


</body>
</html>

<?php
}else{
   header("Location: login_establishment.php");
   exit();
}
?>