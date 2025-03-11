<?php 

require('config.php');

if (isset($_POST['submit'])) {
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    if (!empty($surname) && !empty($name) && !empty($email)) {
        $sql = "INSERT INTO users (surname, name, email) VALUES (:surname, :name, :email)";
        $sqlquery = $conn->prepare($sql);
        $sqlquery->bindParam(':surname', $surname);
        $sqlquery->bindParam(':name', $name);
        $sqlquery->bindParam(':email', $email);

        if ($sqlquery->execute()) {
            // After successful insertion, redirect to another page or show a success message
            header("Location: dashboard.php"); // Redirect to view users page after successful insertion
            exit;
        } else {
            echo "Error: Could not add user.";
        }
    } else {
        echo "Please fill in all fields.";
    }
}
?>
