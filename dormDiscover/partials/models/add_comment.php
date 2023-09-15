<?php
// session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // require "../_DBConnect.php";
    $room_id = $_GET['room_id'];
    $comment_desc = $_POST['comment_desc'];
    $comment_desc = str_replace("<", "&lt;", $comment_desc);
    $comment_desc = str_replace(">", "&gt;", $comment_desc);


    if (empty($comment_desc)) {
        echo "Please fill in all the required fields.";
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Fill the Comment Before Posting.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    } else {
        $add_Comment = "INSERT INTO `comment` (`comment_desc`, `user_id`, `room_id` , `time_stamp`) VALUES ('$comment_desc', '$userId', '$room_id', current_timestamp()) ";
        $Comment_result = mysqli_query($conn, $add_Comment);
        if ($Comment_result) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> The Comment has been Posted.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Some Error has Occurred.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }

    // header("Location: " . $_SERVER['REQUEST_URI'] . '&comment=posted');
}
