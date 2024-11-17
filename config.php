<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'shoppingcart';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('connection failed');

define('WP', 'mylogin');