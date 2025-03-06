<?php 

require('config.php');

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];




    $sql = "INSERT INTO users (username, name, email) VALUES (:username, :name, :email)";

    $sqlquery = $conn->prepare($sql);

    $sqlquery->bindParam(':username', $username);
    $sqlquery->bindParam(':name', $name);
    $sqlquery->bindParam(':email', $email);

    $sqlquery->execute();
}
?>