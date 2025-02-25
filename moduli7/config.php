<?php
$host = 'localhost';
$user = 'root';
$password = '';

try {
    // Sample user data
    $username = "John";
    $pass = password_hash("1234", PASSWORD_DEFAULT);

    // Establish a connection to MySQL server
    $conn = new PDO("mysql:host=$host", $user, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the database if it doesn't exist
    $sql = "CREATE DATABASE IF NOT EXISTS project12";
    $conn->exec($sql);
    echo "Database created (or already exists).<br>";

    // Now select the database
    $conn->exec("USE project12");

    // Create the table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS user1 (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(255) NOT NULL
    )";
    $conn->exec($sql);

    // Add the 'email' column to the user1 table if it doesn't exist
    $sql = "ALTER TABLE user1 ADD COLUMN email VARCHAR(255)";
    $conn->exec($sql);
    echo "Email column added successfully.<br>";

    // Check if the 'email' column exists
    $stmt = $conn->query("SHOW COLUMNS FROM user1 LIKE 'email'");
    $columnExists = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($columnExists) {
        // If the 'email' column exists, drop it
        $sql = "ALTER TABLE user1 DROP COLUMN email";
        $conn->exec($sql);
        echo "Email column dropped successfully.<br>";
    } else {
        echo "Email column does not exist.<br>";
    }

    // Prepare the SQL statement to insert data
    $sql = "INSERT INTO user1 (username, password) VALUES (:username, :password)";
    $stmt = $conn->prepare($sql);

    // Bind the parameters to the query
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $pass);

    // Execute the insert query
    $stmt->execute();

    echo "New record created successfully.";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
