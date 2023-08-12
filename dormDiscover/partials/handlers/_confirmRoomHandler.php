<?php
session_start();

$tenant_user_id = $_SESSION['user_id'];

if (isset($_GET['room_id'])) {
    $room_id = $_GET['room_id'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require '../_DBConnect.php';
    $tenantName = $_POST['tenantName'];
    $tenantContact = $_POST['tenantContact'];
    $address = $_POST['address'];
    $price = $_POST['price'];
    $host_user_id = $_POST['host_user_id'];

    $insert_query = "INSERT INTO `confirmbooking` ( `tenant_name`, `tenant_contact`, `room_address`, `room_price`, `host_id`, `tenant_user_id`, `room_id`, `timeStamp`) VALUES ( '$tenantName', '$tenantContact', '$address', '$price', '$host_user_id', '$tenant_user_id', '$room_id', current_timestamp())";
    $query_result = mysqli_query($conn, $insert_query);

    if ($query_result) {
        $update_Room_query = "UPDATE `rooms` SET `room_available` = 'false' WHERE `rooms`.`room_id` = '$room_id'";
        mysqli_query($conn, $update_Room_query);
        echo 'Form Submitted Successfully';

        header("Location: ../../booking.php?id=" . $tenant_user_id);
    }
}
