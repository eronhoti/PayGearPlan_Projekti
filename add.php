<?php
include 'lidhjaDatabazes.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form fields are set and not empty
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) &&
        !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {

        // Sanitize inputs to prevent SQL injection
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        // Check if the email is already in the database
        $check_query = "SELECT * FROM users WHERE email='$email'";
        $check_result = mysqli_query($conn, $check_query);
        if (mysqli_num_rows($check_result) > 0) {
            echo "Error: Email already exists.";
        } else {
            // Insert new user into the database
            $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
            if ($conn->query($sql) === TRUE) {
                header("Location: dashboard.php");
                exit; // Stop execution after redirection
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "Error: One or more fields are empty.";
    }
}
?>
