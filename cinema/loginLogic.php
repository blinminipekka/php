<?php 

session_start();

include_once('config.php');  // Make sure this includes the PDO connection

$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username) || empty($password)) {
    echo "You have not filled in all the fields.";
} else {
    // Corrected the variable to $db (from $conn)
    $sql = "SELECT * FROM users WHERE username=:username";
    
    // Use $db here for database interactions
    $selectUser = $db->prepare($sql);  // Changed $conn to $db

    $selectUser->bindParam(':username', $username);
    $selectUser->execute();

    $data = $selectUser->fetch();

    if ($data == false) {
        echo "The user does not exist.";
    } else {
        if (password_verify($password, $data['password'])) {
            // Start the session and store user data
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['emri'] = $data['emri'];
            $_SESSION['is_admin'] = $data['is_admin'];

            // Redirect to dashboard after successful login
            header('Location: dashboard.php');
            exit();
        } else {
            echo "Password is not valid.";
        }
    }
}
?>
