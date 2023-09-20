<?php

    //Start
    session_start();
    //Connect to database
    include "db_conn.php";

    // Username of the logged-in user
    $username = $_SESSION['username'];

    $query = "SELECT * FROM test WHERE username = '$username'";
    $result = $conn->query($query);


    // Check if there is data to export
    if ($result->num_rows > 0) {
        // Define a filename with the username
        $filename = 'Form_data.csv';

        // Set the appropriate headers to force a download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        // Create a file handle for output
        $output = fopen('php://output', 'w');

        $columnNames = array(
            'Date',
            'Full Name',
            'Job Position',
            'Nature of Incident',
            'Dimension',
            'Situation Description',
            'Employee Behavior',
            'Impact on Stakeholders',
            'Appraiser\'s Comments',
            'Training Recommendations'
        );
    
        fputcsv($output, $columnNames); // Write column names to the CSV

        // Loop through the data and write it to the output
        while ($row = $result->fetch_assoc()) {
            // Convert each row to an array
            $rowData = array($row['date'], $row['fullName'], $row['jobPosition'], $row['natureOfIncident'], $row['dimension'], 
            $row['situationDescription'], $row['employeesBehavior'], $row['impactOnStakeholders'], $row['appraisersComments'], 
            $row['trainingRecommendations']); // Replace with your column names

            fputcsv($output, $rowData);
        }

        // Close the file handle
        fclose($output);
    } else {
        echo "No data found for this user.";    
    }

    $conn->close();
?>