<?php
session_start();
include_once('config.php');

// Ensure the session is properly set with user id
if (!isset($_SESSION['id'])) {
    die("User not logged in.");
}

$user_id = $_SESSION['id'];

// SQL to fetch booking data
$sql = "SELECT movies.movie_name, users.email, bookings.id, bookings.nr_tickets, bookings.date, bookings.is_approved, bookings.time 
        FROM movies
        INNER JOIN bookings ON movies.id = bookings.movie_id
        INNER JOIN users ON users.id = bookings.user_id";

$selectBookings = $db->prepare($sql);
$selectBookings->execute();

// Fetch all the booking data
$bookings_data = $selectBookings->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?php echo "Welcome to dashboard ".$_SESSION['username']; ?></a>
    <div class="navbar-nav">
      <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </header>
  
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
            <li class="nav-item"><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="list_movies.php">Movies</a></li>
            <li class="nav-item"><a class="nav-link" href="bookings.php">Bookings</a></li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>
        
        <h2>Movie Bookings</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Movie Name</th>
                <th scope="col">User Email</th>
                <th scope="col">Number of Tickets</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Approved</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Loop through all bookings data and display it
              foreach ($bookings_data as $booking_data) {
              ?>
                <tr>
                  <td><?php echo $booking_data['movie_name']; ?></td>
                  <td><?php echo $booking_data['email']; ?></td>
                  <td><?php echo $booking_data['nr_tickets']; ?></td>
                  <td><?php echo $booking_data['date']; ?></td>
                  <td><?php echo $booking_data['time']; ?></td>
                  <td><?php echo $booking_data['is_approved'] ? 'Yes' : 'No'; ?></td>
                  <td>
                    <a href="approve.php?id=<?= $booking_data['id']; ?>">Approve</a> | 
                    <a href="decline.php?id=<?= $booking_data['id']; ?>">Decline</a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
