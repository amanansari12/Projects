<?php
$fetch_sql = "SELECT * FROM rooms WHERE room_id ='$room_id'";
$fetch_room_result = mysqli_query($conn, $fetch_sql);
$row_Count = mysqli_num_rows($fetch_room_result);
