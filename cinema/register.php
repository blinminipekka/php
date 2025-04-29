<?php 
include_once('config.php');  // Make sure this includes the connection

if(isset($_POST['submit'])){
    // Retrieve input data from the form
    $emri = $_POST['emri'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $tempPass = $_POST['password'];
    $password = password_hash($tempPass, PASSWORD_DEFAULT);  // Hash the password

    $tempConfirm = $_POST['confirm_password'];

    // Check if any fields are empty
    if (empty($emri) || empty($username) || empty($email) || empty($password) || empty($tempConfirm)) {
        echo "You have not filled in all the fields.";
    } else {
        // Check if password and confirm password match
        if ($tempPass !== $tempConfirm) {
            echo "Passwords do not match.";
        } else {
            // Prepare the SQL query to insert data into the database
            $sql = "INSERT INTO users (emri, username, email, password) VALUES (:emri, :username, :email, :password)";

            // Prepare the statement using the correct $db variable (from config.php)
            $insertSQL = $db->prepare($sql);

            // Bind the parameters
            $insertSQL->bindParam(':emri', $emri);
            $insertSQL->bindParam(':username', $username);
            $insertSQL->bindParam(':email', $email);
            $insertSQL->bindParam(':password', $password);

            // Execute the statement
            if ($insertSQL->execute()) {
                // Redirect to login page after successful registration
                header('Location: login.php');
                exit();
            } else {
                echo "Error occurred during registration.";
            }
        }
    }
}
?>
