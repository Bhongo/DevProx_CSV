<?php
/**
 * Developer: Bhongolethu Sinxo
 * Date Created: 2022-09-09
 * Last Modified: 2022-09-09
 * Project: DevProx CSV Challenge
 * Description: Upload CSV
 * 
 **/ 
?>
<?php

    $host = "localhost";
    $database = "devprox";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
   //echo "Connected successfully";
   // mysqli_close($conn);

?>