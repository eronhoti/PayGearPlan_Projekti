<?php

$email = $username = $password =  "";

$canContinue = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (array_key_exists("email",$_POST)) {
    if (empty($_POST["email"])) {
      echo "<br> <p>Email is required </p>";
      $canContinue = false;
    } else {
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<br> <p>Invalid email format </p>";
        $canContinue = false;
      }
    }
  }

  if (empty($_POST["username"])) {
    echo "<br> <p>Name is required </p>";
    $canContinue = false;
  } else {
    $username = test_input($_POST["username"]);
  }

  if (empty($_POST["password"])) {
    echo "<br> <p>Password is required </p>";
    $canContinue = false;
  } else {
    $password = test_input($_POST["password"]);
  }

  if (array_key_exists("email",$_POST) & $canContinue) {
    registerUser($email , $username , $password);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


function registerUser($email , $username , $password){
  require "lidhjaDatabazes.php";

 

  $stmt = $conn->prepare("INSERT INTO users (email, username, password , last_login_date) VALUES ( ? , ? , ? , CURRENT_TIMESTAMP)");

  $stmt->bind_param("sss", $email , $username ,$password);

  if ($stmt->execute() === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    header("Location: produktet.html");
    exit();
  } else {
    echo "Error: ". $stmt->error;
    header("Location: signup.php");
    exit();
  }

  $stmt->close();
  $conn->close();
}


?>