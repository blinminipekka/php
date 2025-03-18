<?php
include_once('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "User not found!";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $sql = "UPDATE users SET name = :name, lastname = :lastname, email = :email, age = :age WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['name' => $name, 'lastname' => $lastname, 'email' => $email, 'age' => $age, 'id' => $id]);

    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= $user['name'] ?>" required>
        <br>
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" value="<?= $user['lastname'] ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= $user['email'] ?>" required>
        <br>
        <label for="age">Age:</label>
        <input type="number" name="age" value="<?= $user['age'] ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>