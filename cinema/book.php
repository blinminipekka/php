<?php
session_start();
include_once('config.php');

$user_id=$_SESSION['id'];
$movie_id=$_SESSION['id'];

$nr_tickets = $_POST['nr_tickets'];
$data=$_POST['date'];
$time=$_POST['time'];

$sql="INSERT INTO bookings (user_id, movie_id, nr_tickets, date, time) VALUES (:user_id, :movie_id, :nr_tickets, :date, :time)";
$insertBookings = $db->prepare($sql);
$insertBookings->bindParam(':user_id', $user_id);
$insertBookings->bindParam(':movie_id', $movie_id);
$insertBookings->bindParam(':nr_tickets', $nr_tickets);
$insertBookings->bindParam(':date', $data);
$insertBookings->bindParam(':time', $time);
$insertBookings->execute();

header('Location: home.php');


?>