<?php

include 'config.php';

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $surname=$_POST['surname'];
    $username=$_POST['username'];
    $temppass=$_POST['password'];
    $password=password_hash($temppass, PASSWORD_DEFAULT);

    if(empty($name) || empty($email) || empty($surname) || empty($username) || empty($temppass)){
        echo "Please fill in all fields.";
    } else {
        $tempSQL=$conn->prepare($sql);
        $tempSQL->bindParam(':username', $username);
        $tempSQL->execute();

        if($tempSQL->rowCount()>0){
            echo "Username already exists.";
            header("refresh: 2; url=register.php");
        }else{
            $sql="INSERT INTO users (name, surname, email, username, password) VALUES (:name, :surname, :email, :username, :password)";
            $insertSql=$conn->prepare($sql);

            $insertSql->bindParam(':name', $name);
            $insertSql->bindParam(':surname', $surname);
            $insertSql->bindParam(':email', $email);
            $insertSql->bindParam(':username', $username);
            $insertSql->bindParam(':password', $password);
            $insertSql->execute();
            echo "Registration successful!";
            header("refresh: 2; url=login.php");
        }
    }


}

?>