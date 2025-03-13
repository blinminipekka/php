<?php


require('config.php');

if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $age = $_POST['age'];

        if (!empty($name) && !empty($lastname) && !empty($email) && !empty($age)) {
            $sql = "INSERT INTO users (name, lastname, email, age) VALUES (:name, :lastname, :email, :age)";
            $sqlquery = $conn->prepare($sql);
            $sqlquery->bindParam(':name', $name);
            $sqlquery->bindParam(':lastname', $lastname);
            $sqlquery->bindParam(':email', $email);
            $sqlquery->bindParam(':age', $age);

            if($sqlquery->execute()) {
                header("Location: dashboard.php"); 
                exit; 
            } else {
                echo "Error: Could not add user.";
            } 
        } else {
            echo "Please fill in all fields.";
        }
}
?>