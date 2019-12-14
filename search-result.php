<?php

session_start();

$db = mysqli_connect('localhost','root','','carpool');

$origin =strtolower($_POST['search-origin']);
$destination =strtolower($_POST['destination-origin']);

$query = "Select d.ad_id,a.origin, a.destination, a.departure_time, b.vehicle_type, b.vehicle_name, c.name
from route_details a join vehicle_details b join user c join ad_details d
where a.ad_id = b.ad_id and d.id = c.id and b.ad_id = d.ad_id and origin = '$origin' and destination='$destination'";
$result = mysqli_query($db, $query);

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

    <!-- ad list -->
    <div class="container">
        <div class="list">
            <?php
                while($array=mysqli_fetch_assoc($result))
                {
            ?>
            <a class="item-link" href="ad-details.php?ad_id=<?=$array['ad_id'] ?>">
                <div class="item">

                    <p class="route"><?php echo $array['origin']; ?> <i class="fas fa-arrow-circle-right"></i>
                        <?php echo $array['destination']; ?></p>
                    <p class="ad-name"><?php echo $array['name']; ?></p>
                    <div class="vehicle-row">
                        <i class="fas vehicle-icon"></i>
                        <span class="vehicle-type"><?php echo $array['vehicle_type']; ?></span>
                        <span class="vehicle-name"><?php echo $array['vehicle_name']; ?></span>
                    </div>
                    <p class="ad-time">Departure time: <?php echo $array['departure_time']; ?></p>

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