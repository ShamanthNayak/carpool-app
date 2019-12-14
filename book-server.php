<?php

session_start();

$username = $_SESSION['username'];

$db = mysqli_connect('localhost','root','','carpool');

$ad_id = $_SESSION['ad_id'];

$id_query = "select id from user where username='$username'";
$id_result = mysqli_query($db, $id_query);
$id_array = mysqli_fetch_assoc($id_result);
$id = $id_array['id'];

$driver_id_query = "select id from ad_details where ad_id='$ad_id'";
$driver_id_result = mysqli_query($db, $driver_id_query);
$driver_id_array = mysqli_fetch_assoc($driver_id_result);
$driver_id = $driver_id_array['id'];

if($id!=$driver_id) {
    $passenger_query = "Insert into passenger_details(ad_id,id) values('$ad_id','$id')";
    mysqli_query($db, $passenger_query);

    $driver_name_query = "select name from user where id ='$driver_id'";
    $driver_name_result = mysqli_query($db, $driver_name_query);
    $driver_name_array = mysqli_fetch_assoc($driver_name_result);
    $driver_name = $driver_name_array['name'];

    $route_query = "select origin, destination from route_details where ad_id='$ad_id'";
    $route_result = mysqli_query($db, $route_query);
    $route_array = mysqli_fetch_assoc($route_result);

    $vehicle_query = "select vehicle_name, vehicle_no from vehicle_details where ad_id='$ad_id'";
    $vehicle_result = mysqli_query($db, $vehicle_query);
    $vehicle_array = mysqli_fetch_assoc($vehicle_result);

    $book_time_query = "select book_time from passenger_details where ad_id='$ad_id'";
    $book_time_result = mysqli_query($db, $book_time_query);
    $book_time_array = mysqli_fetch_assoc($book_time_result);

    $history_query = "Insert into booking_history values('$ad_id','$driver_id','$driver_name','$id','$route_array[origin]','$route_array[destination]','$vehicle_array[vehicle_no]','$vehicle_array[vehicle_name]','$book_time_array[book_time]')";
    mysqli_query($db, $history_query);

    header('location: index.php');
} else {
    echo "You cannot book your own ad!";
}

?>