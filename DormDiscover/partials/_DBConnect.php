<?php

$server = 'localhost';
$username = 'root';
$password = '';
// $database = 'findaccomodation';
$database = 'dormdiscover';

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("DB Connection failed");
} 

// else {
//     echo "Connected to DB";
// }
