<?php
    $sname = "localhost";
    $usname = "root";
    $dbpass = "";
    $dbname = "test1";

    $conn = mysqli_connect($sname, $usname, $dbpass, $dbname);

    if(!$conn){

        echo "Connection failed!";
    }
?>