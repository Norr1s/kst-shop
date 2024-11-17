<?php
session_start();
include 'config.php';

if(!empty($_GET['id'])) {
    unset($_SESSION['cart'][$_GET['id']]);
    $_SESSION['message'] = 'Cart delete sucess';
}

header('location: ' . '/cart.php');