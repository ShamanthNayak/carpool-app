<?php

session_start();
$username = $_SESSION['username'];

$db = mysqli_connect('localhost','root','','carpool');

$origin = $_POST['origin'];
$destination = $_POST['destination'];
$vehicle_name = $_POST['vehicle-name'];
$vehicle_type = $_POST['vehicle-type'];
$vehicle_no = $_POST['vehicle-no'];
$phone_no = $_POST['phone-no'];
$seats = $_POST['seats'];
$departure_time = $_POST['departure-time'];

$id_query = "select id from user where username='$username'";
$id_result = mysqli_query($db, $id_query);
$id_array = mysqli_fetch_assoc($id_result);
$id = $id_array['id'];

$check_query = "select count(ad_id) from ad_details where id='$id' and open_for_booking='y'";
$check_result = mysqli_query($db, $check_query);
$check_array = mysqli_fetch_assoc($check_result);

if($check_array['count(ad_id)'] == '0') {
    $ad_query = "Insert into ad_details(id, phno) values ('$id','$phone_no')";
    mysqli_query($db, $ad_query);
    $ad_id_query = "select ad_id from ad_details where id='$id' and open_for_booking='y'";
    $ad_id_result = mysqli_query($db, $ad_id_query);
    $ad_id_array = mysqli_fetch_assoc($ad_id_result);
    $ad_id = $ad_id_array['ad_id'];

    $route_query = "Insert into route_details(ad_id,origin,destination,departure_time) values ('$ad_id','$origin','$destination','$departure_time')";
    mysqli_query($db, $route_query);

    $vehicle_query = "Insert into vehicle_details(ad_id,vehicle_name,vehicle_no,vehicle_type,seats) values ('$ad_id','$vehicle_name','$vehicle_no','$vehicle_type','$seats')";
    mysqli_query($db, $vehicle_query);
}

header('location: index.php');

?>