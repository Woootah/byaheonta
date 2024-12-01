<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "byaheonta";

    $conn = new mysqli($server, $username, $password, $db);

    if($conn->connect_error){
        die("Connection Failed " . $conn->connect_error);
    }

    // echo "Connected Successfully"; 
?>
