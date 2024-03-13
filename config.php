<?php 
    // Create a PDO instance to connect to the database
    $dbHost = "localhost";
    $dbName = "chatbot";
    $dbUser = "root";
    $dbPass = "";
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

?>