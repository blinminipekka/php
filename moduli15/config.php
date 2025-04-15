<?php
    session_start();

    $user = "root";
    $password = "";
    $db = "db";
    $localhost = "localhost";
    
    
    
    try{
        $conn = new PDO("mysql:host=$localhost;dbname=$db", $user, $password);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: ";
    }
    


?>