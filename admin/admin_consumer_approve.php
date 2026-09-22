<?php
include '../includes/conn.php';

if (isset($_GET['approve'])) {
    $user_validity_id = $_GET['approve'];

    // Retrieve the user data from `users_validity`
    $sql = "SELECT * FROM user_validity WHERE user_validity_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_validity_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Check if the user already exists in the `users` table based on email
        $email = $row['email'];
        $check_sql = "SELECT * FROM users WHERE email = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows == 0) {
            // User does not exist in `users` table, so insert them
            $insert_sql = "INSERT INTO users (email, password, first_name, last_name, middle_name, province, city, barangay, address, contact_no, gender, registration_type, birth_date, age, control_number, fphoto, bphoto)
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $insert_stmt = $conn->prepare($insert_sql);
            $insert_stmt->bind_param("ssssssssssssisss",
                $row['email'],
                $row['password'],
                $row['first_name'],
                $row['last_name'],
                $row['middle_name'],
                $row['province'],
                $row['city'],
                $row['barangay'],
                $row['address'],
                $row['contact_no'],
                $row['gender'],
                $row['registration_type'],
                $row['birth_date'],
                $row['age'],
                $row['control_number'],
                $row['fphoto'],
                $row['bphoto']
            );

            if ($insert_stmt->execute()) {
                // Deletion of the user from users_validity after successful insertion
                $delete_sql = "DELETE FROM users_validity WHERE user_validity_id = ?";
                $delete_stmt = $conn->prepare($delete_sql);
                $delete_stmt->bind_param("i", $user_validity_id);
                $delete_stmt->execute();

                echo '<script>
                        alert("User approved and added successfully.");
                        window.location.href = "admin_valid.php";
                      </script>';
            } else {
                echo "Error: " . $insert_stmt->error;
            }
        } else {
            echo '<script>
                    alert("User already exists in the database.");
                    window.location.href = "admin_valid.php";
                  </script>';
        }
    } else {
        echo "User not found in users_validity table.";
    }
}
?>