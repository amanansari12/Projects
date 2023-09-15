<?php
require "../_DBConnect.php";
$fav_id = $_GET['fav_id'];
$delete_query = "DELETE FROM `favourite` WHERE `favourite`.`fav_id` = '$fav_id' ";
$del_result = mysqli_query($conn, $delete_query);

if ($del_result) {
    // $redirect = $_GET['redirect'];
    header("Location: ../../favourite.php");
}
