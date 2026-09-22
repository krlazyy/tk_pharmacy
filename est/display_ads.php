<?php
// Database connection
include '../includes/conn.php';

// Fetch and display records
$sql = "SELECT ads_id, name, image, address, tagline, bio FROM advertisement";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Advertisement Preview</h2>";
    echo "<div class='ads-list'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='ad-item'>";
        echo "<h3>" . $row["name"] . "</h3>";
        echo "<center><img src='../uploaded_img/" . $row["image"] . "' alt='" . $row["name"] . "' class='ad-image'></center>";
        echo "<p>" . $row["address"] . "</p>";
        echo "<p>" . $row["tagline"] . "</p>";
        echo "<p>" . $row["bio"] . "</p>";
        
        // Edit button
        echo "<a style='text-decoration:none;' href='edit_ad.php?ads_id=" . $row["ads_id"] . "' class='btn-edit'>Edit</a> ";
        
        // Delete button
        echo "<a style='text-decoration:none;' href='delete_ad.php?ads_id=" . $row["ads_id"] . "' class='btn-delete' onclick='return confirm(\"Are you sure you want to delete this ad?\");'>Delete</a>";
        
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No advertisements found.";
}

$conn->close();
?>
<style>
    .btn-edit, .btn-delete {
        display: inline-block;
        padding: 8px 12px;
        margin-top: 10px;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
        color: #fff;
    }
    
    .btn-edit {
        background-color: #4CAF50; /* Green */
    }
    
    .btn-delete {
        background-color: #f44336; /* Red */
    }
</style>
<style>
    /* Container styling for grid layout */
    .ads-list {
        display: flex;
        flex-wrap: wrap; /* Allows items to wrap to the next line */
        gap: 20px; /* Space between items */
        padding: 20px;
        justify-content: space-evenly; /* Distribute items evenly */
    }

    /* Individual ad item styling */
    .ad-item {
        text-align: center;
        background-color: #fff; /* White background */
        width: calc(33% - 40px); /* Each item takes up about 1/3 of the width with some spacing */
        min-width: 250px; /* Minimum width for smaller screens */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow for depth effect */
        padding: 20px;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Hover effect */
    .ad-item:hover {
        transform: translateY(-5px); /* Slight pop-up effect */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); /* Darker shadow on hover */
    }

    /* Image styling */
    .ad-image {
        width: 100%; /* Image takes up full width of the container */
        height: auto;
        border-radius: 5px; /* Rounded corners for the image */
        margin-bottom: 10px;
    }

    /* Headings and text styling */
    .ad-item h3 {
        color: black;
        font-size: 1.5em;
        margin: 0 0 10px;
    }

    .ad-item p {
        color: black;
        font-size: 1em;
        margin: 5px 0;
    }
</style>