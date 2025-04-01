<?php

include_once('config.php');

if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $temppass=$_POST['password'];

    if(empty($username) || empty($password)){
        echo "Please fill in all fields";
        header("refresh: 2; url=login.php");
    }else{
        $sql="SELECT * FROM users WHERE username=:username";
        $insertSQL=$conn->prepare($sql);
        $insertSQL->bindParam(':username', $username);

        $insertSQL->execute();

        if($insertSQL->rowCount() > 0){
            $data = $insertSql->fetch();

            if(password_verify($temppass, $password)){
                
                $_SESSION['username']=$data['username'];
                header("Location: login....php");
            }else{
                echo "Wrong password";
                header("refresh: 2; url=login.php");
            }
        }else{
            echo "User not found";
        }
}
}
?>