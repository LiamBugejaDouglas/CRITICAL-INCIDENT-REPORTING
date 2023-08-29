<?php

    //Start
    session_start();
    //Connect to database
    include "db_conn.php";

    $username = $_POST["username"];

    $token = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);

    $token_expire = date("Y-m-d H:i:s", time() + (60 * 30) + 60);
    //UPDATE username SET token_hash = ?, token_expire= ? WHERE username = ? 

    $stmt = $conn->prepare("UPDATE users SET token_hash = ?, token_expire = ? WHERE username = ?");
    //Error in SQL connection
    if (!$stmt) {
        die('Error in SQL Query: ' . $conn->error);
    }

    $stmt->bind_param("sss", $token_hash, $token_expire, $username);

    if ($stmt->execute()) {
        echo "Update successful.";
    } else {
        echo "Error in Execution: " . $stmt->error;
    }
?>