<?php
include 'lidhjaDatabazes.php';

// Check if the user ID is received via GET method
if (isset($_GET['id'])) {
    // Retrieve the user ID from the URL parameters
    $id = $_GET['id'];

    // Prepare and execute the SQL query to delete the user by ID
    $sql = "DELETE FROM users WHERE user_id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully.";
        header('dashboard.php');
    } else {
        echo "Error deleting user: " . $conn->error;
    }
} else {
    echo "User ID is missing.";
}
?>
