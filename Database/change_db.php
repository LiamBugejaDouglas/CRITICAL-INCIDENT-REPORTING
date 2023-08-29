<?php

function validatePassword($password) {
    if (strlen($password) < 12) {
        return "Password should be at least 12 characters long.";
    }

    if (!preg_match('/[0-9]/', $password)) {
        return "Password should contain at least one number.";
    }

    if (!preg_match('/[A-Z]/', $password)) {
        return "Password should contain at least one uppercase letter.";
    }

    if (!preg_match('/[a-z]/', $password)) {
        return "Password should contain at least one lowercase letter.";
    }

    if (!preg_match('/[^a-zA-Z0-9]/', $password)) {
        return "Password should contain at least one symbol.";
    }
    return ""; // Return empty string if no validation errors
    }

    //Start
    session_start();
    //Connect to database
    include "db_conn.php";

    //Get Data
    $username = $_POST['user'];
    $currentPass = $_POST['currentPass'];
    $newPass = $_POST['newPass'];
    $comfPass =  $_POST['comfPass'];

    // Query the database to check credentials
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    // Check if the user exists
    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if($row['password'] === $currentPass){
            $_SESSION['username'] = $row['username'];
            $_SESSION['currentPass'] = $row['password'];
            //If correct change password
            $passwordValidationResult = validatePassword($newPass);
            if ($newPass !== $comfPass) {
                $error = "Passwords do not match.";
            } else if (!empty($passwordValidationResult)) {
                $error = $passwordValidationResult;
            } else {
                // Password is valid
                // Prepare and execute the update query
                $updateQuery = "UPDATE users SET password = '$newPass' WHERE username = '$username'";
                $stmt = $conn->prepare($updateQuery);
                if (!$stmt) {
                    die('Error in SQL Query: ' . $conn->error);
                }
                if ($stmt->execute()) {
                    echo "Password updated successfully.";
                    $stmt->close();
                    $conn->close();
                    header("Location: ../FrontEnd/index.php"); // Redirect to the index page
                    exit();
                } else {
                    echo "Error updating password: " . $stmt->error;
                    $stmt->close();
                    $conn->close();
                    exit();
                }
            }
        }
        else{
            header("Location: ../FrontEnd/change.php?error=Incorrect password");
            exit();
        }
    }
    else{
        header("Location: ../FrontEnd/change.php?error=Incorrect Username");
        exit();
    }
?>