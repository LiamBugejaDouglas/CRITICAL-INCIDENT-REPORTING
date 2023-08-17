<?php

    //Start
    session_start();
    //Connect to database
    include "db_conn.php";

    //Get Data
    $username = $_POST['user'];
    $password = $_POST['password'];
    
    //Error username or password required
	if (empty($username)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($password)){
        header("Location: index.php?error=Password is required");
	    exit();
    }
    else{
        // Query the database to check credentials
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);

        //Check if username + password exists
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['username'] === $username && $row['password'] === $password){
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                //If correct send to form site
                header("Location: form.php");
                exit();
            }
            else{
                handleFailedLogin($username);
                header("Location: index.php?error=Incorrect password");
                exit();
            }
        }
        else{
            handleFailedLogin($username);
            header("Location: index.php?error=Incorrect Username or password");
            exit();
        }
    }

    // Function to handle failed login attempts
    function handleFailedLogin($username) {
        $failedAttempts = getFailedAttempts($username);

        // Increment failed attempts and update timestamp in the database
        incrementFailedAttempts($username);

        // Check and send email notification if necessary
        if ($failedAttempts + 1 >= 4) {
            sendFailedLoginEmail($username);
        }
    }

    // Function to increment failed attempts
    function incrementFailedAttempts($username) {
        // Increment failed attempts count and update timestamp in the database
    }

    // Function to reset failed attempts
    function resetFailedAttempts($username) {
        // Reset failed attempts count in the database
    }

    // Function to get failed attempts count
    function getFailedAttempts($username) {
        // Retrieve failed attempts count from the database
        return 0; // Replace with the actual value
    }

    // Function to send email notification for failed login attempts
    function sendFailedLoginEmail($username) {
        // Compose and send email notification
        $to = '$username'; // Replace with the actual recipient's email
        $subject = 'Failed Login Attempts';
        $message = "Dear user,\n\nYour account has experienced multiple failed login attempts.If this in not you please secure your account and speak to the IT team.\n\nSincerely,\nIT team";

        // Send email using mail() or a third-party library like PHPMailer
        mail($to, $subject, $message);

}
?>