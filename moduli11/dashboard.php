<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson 10</title>

    <style>
        table, td, th {
            border: 1px solid black;
            border-collapse: collapse;
        }
        td, th {
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    
    <?php
    include_once('config.php');
    // Select all users from the database
    $sql = "SELECT * FROM users";
    $getUsers = $conn->prepare($sql);
    $getUsers->execute();
    
    // Fetch all the users into an array
    $users = $getUsers->fetchAll(PDO::FETCH_ASSOC);
    ?>
    
    <table>
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
        </thead>
        <tbody>

        <?php
        // Loop through each user and display them in the table
        foreach ($users as $user) {
            ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['surname'] ?></td>
                <td><?= $user['email'] ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <a href="index.php">Add User</a>

</body>
</html>
