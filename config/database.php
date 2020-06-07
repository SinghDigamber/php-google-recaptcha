<?php

    $hostname = "localhost";
    $username = "root";
    $password = "";

    try {
        $connection = new PDO("mysql:host=$hostname;dbname=dbrh2ey2zpufzv", $username, $password);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Database connected successfully";
    } catch(PDOException $e) {
        echo "Database connection failed: " . $e->getMessage();
    }

?>