<?php

if (array_key_exists("username", $_REQUEST)) {
    if (empty($_REQUEST["username"])) {
        echo "* Username is required";
    } else {
        $username = test_input($_REQUEST["username"]);
        require "devconndb.php";
        $sql = "SELECT dev_id FROM devs WHERE username = '" . $username . "'";
        $result = $conn->query($sql);

        if ($result === false) {
            echo "* Error in SQL query: " . $conn->error;
            $conn->close();
            exit();
        }

        if ($result->num_rows > 0) {
            if (array_key_exists("password", $_REQUEST)) {
                if (empty($_REQUEST["password"])) {
                    echo "* Password is required";
                } else {
                    $password = test_input($_REQUEST["password"]);

                    $sql = "SELECT dev_id FROM devs WHERE username = '" . $username . "' AND password = '" . $password . "'";
                    $result = $conn->query($sql);

                    if ($result === false) {
                        echo "* Error in SQL query: " . $conn->error;
                        $conn->close();
                        exit();
                    }

                    if ($result->num_rows > 0) {
                        echo "Log in successful";
                        header("Location: dashboard.html");
                        exit();
                    } else {
                        echo "* Incorrect password";
                        header("Location: devs.php");
                        exit();
                    }
                }
            } else {
                echo "* Password is required";
            }
        } else {
            echo "* Username does not exist";
            header("Location: devs.php");
            exit();
        }

        $conn->close();
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
