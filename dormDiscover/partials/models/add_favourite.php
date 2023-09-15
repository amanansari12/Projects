<?php
session_start();
require "../_DBConnect.php";
$room_id = $_GET['room_id'];
$user_id = $_SESSION['user_id'];

$add_Comment = "INSERT INTO `favourite` (`user_id`, `room_id`) VALUES ('$user_id', '$room_id');";
$Comment_result = mysqli_query($conn, $add_Comment);

if ($Comment_result) {
    $redirect = $_GET['redirect'];
    header("Location: " . $redirect);
}
