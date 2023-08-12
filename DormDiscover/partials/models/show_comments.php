<?php
$fetch_Comment = "SELECT * FROM comment WHERE room_id = '$room_id' ORDER BY time_stamp DESC";
$Comment_result = mysqli_query($conn, $fetch_Comment);
$comment_count = mysqli_num_rows($Comment_result);
