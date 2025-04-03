<!-- <?php

// include_once("config.php");


// $id = $_GET['id'];

// $sql = "SELECT * FROM users WHERE id = :id";
 
// $prep = $conn->prepare($sql);

// $prep->bindParam(':id', $id);

// $prep->execute();



?>


<!DOCTYPE html>
<html>
    <body>


    <style>
        form>input {
            margin-bottom: 10px;
            font-size: 20px;
            padding: 5px;
        }
        button {
            background: none;
            border: none;
            border: 1px solid black;
            cursor: pointer;
            font-size: 20px;
            padding: 10px 40px;
        }
    </style>
        

        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
            <input type="text" name="name" value="<?php echo $data['name'] ?>">
            <input type="text" name="lastname" value="<?php echo $data['lastname'] ?>">
            <input type="email" name="email" value="<?php echo $data['email'] ?>">
            <input type="number" name="age" value="<?php echo $data['age'] ?>">

            <br><br>


            <button type="submit" name="update">Update</button>


        </form>
        <a href="dashboard.php">Dashboard</a>
    </body>
</html> -->

