<?php

session_start();
header('location: login.php');

// initialising var
global $newUsername;
global $newName;
global $newPassword0;
global $newPassword1;

$errors = array();

// connect to db
$db = mysqli_connect('localhost','root','','carpool') or die ("Could not connect to Database!");

// register user
if(isset($_POST['newUsername']) && isset($_POST['newName']) && isset($_POST['newPassword0']) && isset($_POST['newPassword1'])){
$newUsername = mysqli_real_escape_string($db, $_POST['newUsername']);
$newName = mysqli_real_escape_string($db, $_POST['newName']);
$newPassword0 = mysqli_real_escape_string($db, $_POST['newPassword0']);
$newPassword1 = mysqli_real_escape_string($db, $_POST['newPassword1']);
}

// form validation
if($newPassword0 != $newPassword1) 
array_push($errors, "Passwords do not match");

// check db for existing user for same username
$user_check_query = "SELECT * from user WHERE username = '$newUsername' LIMIT 1";

$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if($user) {
    if($user['username'] == $newUsername) {array_push($errors, "Username already exists");}
}

// register user if no errors
if(count($errors) == 0 ) {
    $query = "INSERT INTO user (username , name, password) values ('$newUsername', '$newName', '$newPassword0')";
    mysqli_query($db, $query);
    $_SESSION['signup_error'] = "";
    }
    else {
        $_SESSION['signup_error'] = "Username already exists!";
        header('location: login.php');
    }
?>