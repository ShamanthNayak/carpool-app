<?php

session_start();

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
    <link type="text/css" rel="stylesheet" href="css/create-ad.css">
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
                    <a class="nav-link" href="">Welcome <?php echo $_SESSION['username']; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="form-container">
        <form action="addItem-server.php" method="POST">
            <h1 class="form-title display-4">Create a new Ad</h1>
            <div class="row">
                <input type="text" placeholder="Origin" class="text-input" name="origin">
                <input type="text" placeholder="Destination" class="text-input" name="destination">
            </div>
            <div class="row">
                <input type="text" placeholder="Vehicle Name" class="text-input" name="vehicle-name">
                <input type="text" placeholder="Vehicle no" class="text-input" name="vehicle-no">
            </div>
            <div class="row">
                <input type="number" placeholder="Seats available" class="text-input" name="seats">
                <input type="text" placeholder="Type of vehicle" class="text-input" name="vehicle-type">
            </div>
            <div class="row">
                <input type="text" placeholder="Phone no" class="text-input" name="phone-no">
                <input type="datetime-local" placeholder="Departure time" class="text-input" name="departure-time">
            </div>
            <div class="row">
                <button type="submit" class="submit-ad">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>