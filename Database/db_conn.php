<?php
    $sname = "localhost";
    $usname = "root";
    $dbpass = "root1234";
    $dbname = "test1";

    $conn = mysqli_connect($sname, $usname, $dbpass, $dbname);

    if(!$conn){

        echo "Connection failed!";
    }
?>