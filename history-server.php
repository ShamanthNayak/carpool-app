<?php

$username = $_SESSION['username'];

$db = mysqli_connect('localhost','root','','carpool');

$query = "CALL booking_history('$username')";
$result = mysqli_query($db, $query);

?>