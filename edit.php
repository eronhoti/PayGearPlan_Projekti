<?php
include 'lidhjaDatabazes.php';

// Check if the form is submitted and the user ID is received via POST method
if (isset($_POST['id'])) {
    // Retrieve the user ID from the form data
    $id = $_POST['id'];

    // Retrieve other user details from the form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Prepare and execute the SQL query to update the user by ID
    $sql = "UPDATE users SET username='$username', password='$password', email='$email' WHERE user_id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully."; 
        header('Location: dashboard.php'); // Redirect to the dashboard after updating
        exit; // Terminate script execution after redirect
    } else {
        echo "Error updating user: " . $conn->error;
    }
} else {
    echo "User ID is missing or form is not submitted.";
}
?>
