<?php

session_start();

include('history-server.php');

$username = $_SESSION['username'];

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
    <link type="text/css" rel="stylesheet" href="css/user-history.css">
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

    <div class="container">
        <div class="main-container">
            <div class="title">
                <h1 class="display-4">Booking History</h1>
            </div>
            <table class="history-table">
                <th>AD ID</th>
                <th>Driver ID</th>
                <th>Driver Name</th>
                <th>Passenger ID</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Vehicle No</th>
                <th>Vehicle Name</th>
                <th>Booking Time</th>
                <?php while($row = mysqli_fetch_assoc($result)) 
                { 
                ?>
                <tr>
                    <td><?php echo $row['ad_id']; ?></td>
                    <td><?php echo $row['driver_id']; ?></td>
                    <td><?php echo $row['driver_name']; ?></td>
                    <td><?php echo $row['passenger_id']; ?></td>
                    <td><?php echo $row['origin']; ?></td>
                    <td><?php echo $row['destination']; ?></td>
                    <td><?php echo $row['vehicle_no']; ?></td>
                    <td><?php echo $row['vehicle_name']; ?></td>
                    <td><?php echo $row['book_time']; ?></td>
                </tr>
                <?php
                }
                ?>
            </table>  
        </div>

        <!-- <div class="main-container2">
            <div class="title">
                <h1 class="display-4">Posted Ads</h1>
            </div>
            <table class="history-table">
                <th>AD ID</th>
                <th>Driver ID</th>
                <th>Passenger ID</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Vehicle No</th>
                <th>Vehicle Name</th>
                <th>Booking Time</th>
                <?php while($row = mysqli_fetch_assoc($result)) 
                { 
                ?>
                <tr>
                    <td><?php echo $row['ad_id']; ?></td>
                    <td><?php echo $row['driver_id']; ?></td>
                    <td><?php echo $row['passenger_id']; ?></td>
                    <td><?php echo $row['origin']; ?></td>
                    <td><?php echo $row['destination']; ?></td>
                    <td><?php echo $row['vehicle_no']; ?></td>
                    <td><?php echo $row['vehicle_name']; ?></td>
                    <td><?php echo $row['book_time']; ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <div>  
        </div> -->

    </div>
    <script type="text/javascript" src="js/index.js"></script>
</body>

</html>