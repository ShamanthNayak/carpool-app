<?php

$username = $_SESSION['username'];

$db = mysqli_connect('localhost','root','','carpool');
$ad_id  = $_GET['ad_id'];

$_SESSION['ad_id'] = $ad_id;

$ad_query = "Select post_time, phno, open_for_booking from ad_details where ad_id='$ad_id'";
$ad_result = mysqli_query($db, $ad_query);
$ad_array = mysqli_fetch_assoc($ad_result);

$route_query = "Select origin, destination, departure_time from route_details where ad_id='$ad_id'";
$route_result = mysqli_query($db, $route_query);
$route_array = mysqli_fetch_assoc($route_result);

$name_query = "Select a.name from user a, ad_details b where b.id=a.id and b.ad_id='$ad_id'";
$name_result = mysqli_query($db, $name_query);
$name_array = mysqli_fetch_assoc($name_result);

$vehicle_query = "Select vehicle_type, vehicle_name, vehicle_no, seats from vehicle_details where ad_id='$ad_id'";
$vehicle_result = mysqli_query($db, $vehicle_query);
$vehicle_array = mysqli_fetch_assoc($vehicle_result);

?>