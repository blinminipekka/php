<?php
include_once('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]);

    header("Location: dashboard.php");
    exit;
} else {
    echo "Invalid request!";
}
?>