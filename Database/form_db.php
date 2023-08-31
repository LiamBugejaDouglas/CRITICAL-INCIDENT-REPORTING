<?php

    // Start session first
    session_start();

    // Get username
    $username = $_SESSION['username'];
    
    //Get value names from from.php
    $date = $_POST['date'];
    $fullName = $_POST['fullName'];
    $jobPosition = $_POST['jobPosition'];
    $dimension = $_POST['dimension'];
    $natureOfIncident = $_POST['natureOfIncident'];
    $situationDescription = $_POST['situationDescription'];
    $employeesBehavior = $_POST['employeesBehavior'];
    $impactOnStakeholders = $_POST['impactOnStakeholders'];
    $appraisersComments = $_POST['appraisersComments'];
    $trainingRecommendations = $_POST['trainingRecommendations'];

    //Connect to databse
    include "db_conn.php";

    //Prepare  to insert in databse (insert into ["name of databse"], value names + values(?))
    $stmt = $conn->prepare("insert into test(date,fullName,jobPosition,natureOfIncident,dimension,situationDescription,employeesBehavior,impactOnStakeholders,
    appraisersComments,trainingRecommendations,username) values(?,?,?,?,?,?,?,?,?,?,?)");
    //Error in SQL connection
    if (!$stmt) {
        die('Error in SQL Query: ' . $conn->error);
    }
        //Bind param ("value types" + values)
        $stmt->bind_param("sssssssssss", $date, $fullName, $jobPosition, $natureOfIncident, $dimension, $situationDescription, $employeesBehavior, 
        $impactOnStakeholders, $appraisersComments, $trainingRecommendations, $username);
    if (!$stmt->execute()) {
        if ($stmt->errno === 1062) { // MySQL error code for duplicate entry
            // Inform the user about the duplicate entry
            echo "<script>openErrorPopup();</script>";
        }else{
            die('Error in Execution: ' . $stmt->error);
        }
    }
    //close
    echo "done";
    $stmt->close();
    $conn->close();
?>