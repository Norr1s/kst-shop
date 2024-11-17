<?php
session_start();
include 'config.php';

$username = trim(mysqli_real_escape_string($conn, $_POST['username']));
$password = mysqli_real_escape_string($conn, $_POST['password']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

if (!empty($username) && !empty($password)) {
    $query = mysqli_query($conn, "SELECT * FROM users WHERE LOWER(username) = LOWER('$username')");
    
    if (!$query) {
        die('Query failed: ' . mysqli_error($conn));
    }
    
    $row = mysqli_fetch_assoc($query);
    
    var_dump($row);
    
    if ($row) {
        if (password_verify($password, $hashed_password)) {
            $_SESSION[WP . 'checklogin'] = true;
            $_SESSION[WP . 'id'] = $row['id'];
            $_SESSION[WP . 'fullname'] = $row['fullname'];

            header("location:/index.php");
        } else {
            $_SESSION['message'] = 'Username or Password is invalid!';
            header("location:/login.php");
        }
    } else {
        $_SESSION['message'] = 'Username not found';
        header("location:/login.php");
    }
} else {
    $_SESSION['message'] = 'Username or Password is required';
    header("location:/login.php");
}
