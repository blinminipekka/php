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
        
        $sql = "SELECT * FROM users";
        $getUsers = $conn->prepare($sql);
        $getUsers->execute();
        $users = $getUsers->fetchAll(PDO::FETCH_ASSOC);


        ?>
        <table>
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Actions</th>
            </thead>
            <tbody>

            <?php
            foreach ($users as $user) {
                ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['lastname'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['age'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $user['id'] ?>">Edit</a>
                        <a href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <a href="index.php">Add User</a>
</body>
</html>