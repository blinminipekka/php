<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'moduli11';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to $dbname at $host successfully.";
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}
                                                 
?>