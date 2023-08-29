<?php

    //Start
    session_start();
    //Connect to database
    include "db_conn.php";

    //Get Data
    $username = $_POST['user'];
    $password = $_POST['password'];
    
    // Query the database to check credentials
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    // Check if the user exists
    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if($row['password'] === $password){
            $_SESSION['user'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            //If correct send to form site
            header("Location: ../FrontEnd/form.php");
            exit();
        }
        else{
            header("Location: ../FrontEnd/index.php?error=Incorrect password");
            exit();
        }
    }
    else{
        header("Location: ../FrontEnd/index.php?error=Incorrect Username");
        exit();
    }
?>