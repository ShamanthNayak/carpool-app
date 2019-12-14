<?php

session_start();
include('details-server.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new Ad</title>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link type="text/css" rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/itemDetails.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
        integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md">
        <a class="banner" href="index.php">Dsatm CarPool</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="user-history.php">Welcome <?php echo $_SESSION['username']; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main-container">
        <div class="ad-container">
            <div class="route display-4">
                <span><?php echo $route_array['origin'] ?></span>
                <i class="fas fa-arrow-circle-right"></i>
                <span><?php echo $route_array['destination'] ?><span>
            </div>
            <div class="ad-details">
                <span class="row name">
                    <?php echo $name_array['name'] ?>
                </span>
                <span class="name row">
                    <?php echo $ad_array['phno'] ?>
                </span>
                <span class="vehicle-details row">
                    Vehicle name: <?php echo $vehicle_array['vehicle_name'] ?>
                </span>
                <span class="vehicle-details row">
                    Vehicle type: <?php echo $vehicle_array['vehicle_type'] ?>
                </span>
                <span class="vehicle-details row">
                    Vehicle no: <?php echo $vehicle_array['vehicle_no'] ?>
                </span>
                <span class="vehicle-details row">
                    Seats available: <?php echo $vehicle_array['seats'] ?>
                </span>
                <span class="vehicle-details row">
                    Departure time: <?php echo $route_array['departure_time'] ?>
                </span>
                <span class="time-details row">
                    Posted on: <?php echo $ad_array['post_time'] ?>
                </span>
                <form method="POST" action="book-server.php">
                    <button type="submit" class="book-btn">Book Now</button>
                </form>
            </div>

        </div>
    </div>


</body>

</html>