<?php
session_start();
//session_regenerate_id();
$password_bdd = getenv('MYSQL_PASSWORD');
$config = parse_ini_file('C:/laragon/bin/mysql/mysql-8.0.30-winx64/my.ini');
$conn = mysqli_connect('localhost', 'root', $password_bdd, 'auth', '3306', $config['socket']);

if (mysqli_connect_error()) {
    $logMessage = 'MySQL Error: ' . mysqli_connect_error();
    die('Could not connect to the database');
}

?>