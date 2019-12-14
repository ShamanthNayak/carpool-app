<?php

include('index-server.php');
session_start();

if(!isset($_SESSION['username'])) {
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CarPool</title>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link type="text/css" rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
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
                    <a href="create-ad.php">
                        <button class="btn btn-info"><i class="fas fa-plus-circle"></i> Post Ad</button>
                    </a>
                </li>
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

    <!-- search bar and add button -->

    <div class="search-bar">
        <form method="POST" action="search-result.php">
            <input type="text" name="search-origin" placeholder="Origin" class="search" id="search-origin">
            <input type="text" name="destination-origin" placeholder="Destination" class="search" id="search-destination">
            <button type="submit" class="btn btn-info search-btn"><i class="fas fa-search"></i></button>
        </form>
    </div>

    <!-- ad list -->

    <div class="container">
        <div class="list">
            <?php
                while($ads=mysqli_fetch_assoc($results))
                {
            ?>
            <a class="item-link" href="ad-details.php?ad_id=<?=$ads['ad_id'] ?>">
                <div class="item">

                    <p class="route"><?php echo $ads['origin']; ?> <i class="fas fa-arrow-circle-right"></i>
                        <?php echo $ads['destination']; ?></p>
                    <p class="ad-name"><?php echo $ads['name']; ?></p>
                    <div class="vehicle-row">
                        <i class="fas vehicle-icon"></i><span
                            class="vehicle-type"><?php echo $ads['vehicle_type']; ?></span><span
                            class="vehicle-name"><?php echo $ads['vehicle_name']; ?></span>
                    </div>

                    <p class="ad-time">Departure time: <?php echo $ads['departure_time']; ?></p>

                </div>
            </a>
            <?php
                }
            ?>
        </div>
    </div>
    <script type="text/javascript" src="js/index.js"></script>
</body>

</html>