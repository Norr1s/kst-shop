<?php
session_start();
include 'config.php';

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);

if(!empty($username) && !empty($password) && !empty($fullname)) {
    $query = mysqli_query($conn, "INSERT INTO users (username, password, fullname) 
    VALUES ('{$username}', '{$password}', '{$fullname}')") or die ('query failed!');
    
    if($query) {
        $_SESSION['message'] = 'Register Complete';
        header("location:/login.php");
    } else {
        $_SESSION['message'] = 'Register could not be saved';
        header("location:/register.php");
    }
} else {
    $_SESSION['message'] = 'Input is required';
    header("location:/register.php");
}