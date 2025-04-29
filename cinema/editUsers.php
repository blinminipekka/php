<?php
session_start();

// Include the database connection file
include_once('config.php');

// Check if the user is logged in (this can be adjusted depending on your authentication system)
if (empty($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'];  // Get the user ID from the URL
$sql = "SELECT * FROM users WHERE id = :id";

// Use the $db variable from config.php to prepare the query
$selectUser = $db->prepare($sql);
$selectUser->bindParam(':id', $id);
$selectUser->execute();

// Fetch user data
$user_data = $selectUser->fetch();
if (!$user_data) {
    echo "User not found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="navbar navbar-dark bg-dark p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">
        <?php echo "Welcome to dashboard " . $_SESSION['username']; ?>
    </a>
    <div class="navbar-nav">
        <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
</header>

<div class="container mt-5">
    <h2>Edit User Details</h2>

    <form action="updateUsers.php" method="post">
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingInput" placeholder="Id" name="id" value="<?php echo $user_data['id']; ?>" readonly>
            <label for="floatingInput">Id</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Emri" name="emri" value="<?php echo $user_data['emri']; ?>">
            <label for="floatingInput">Emri</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" value="<?php echo $user_data['username']; ?>">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email" value="<?php echo $user_data['email']; ?>">
            <label for="floatingInput">Email</label>
        </div>
        <button class="btn btn-primary w-100" type="submit" name="submit">Update User</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
