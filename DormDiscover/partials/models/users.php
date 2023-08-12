<?php
$fetch_user = "SELECT * FROM users WHERE user_id = '$user_id' ";
$user_result = mysqli_query($conn, $fetch_user);
$user_count = mysqli_num_rows($user_result);
