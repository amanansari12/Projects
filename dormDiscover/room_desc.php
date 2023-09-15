<?php
require "partials/_DBConnect.php";
require "partials/_navbar.php";
$isLogin = false;


// if the user is not loged in the He will not be able to book or Post the comment

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $isLogin = true;
}

// calculating the time like youtube
function timeAgo($timestamp)
{
    date_default_timezone_set('Asia/Kolkata');
    $current_time = time();
    $timestamp = strtotime($timestamp);
    $time_diff = $current_time - $timestamp;

    if ($time_diff < 60) {
        return $time_diff . " seconds ago";
    } elseif ($time_diff < 3600) {
        $minutes = floor($time_diff / 60);
        return $minutes . " minute" . ($minutes > 1 ? "s" : "") . " ago";
    } elseif ($time_diff < 86400) {
        $hours = floor($time_diff / 3600);
        return $hours . " hour" . ($hours > 1 ? "s" : "") . " ago";
    } else {
        $days = floor($time_diff / 86400);
        return $days . " day" . ($days > 1 ? "s" : "") . " ago";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="partials/css/navbar.css">
    <script src="partials/js/scrollPositionScript.js"></script>
    <title>Details</title>

    <style>
        #logo_size {
            width: 30px;
            height: 100%;
        }

        @media (max-width: 600px) {
            .c-item {
                height: 250px;
                object-fit: cover;
                filter: brightness(0.6);
            }
        }
    </style>

</head>

<body>

    <?php
    $room_id = $_GET['room_id'];
    // echo 'Room id = ' . $room_id;
    $imageDirectory = "img/roomImage/$room_id/";
    ?>
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" style="margin-top: 88px;">
        <div class="carousel-indicators">
            <!-- Generate carousel indicators based on the number of images -->
            <?php
            $imageFiles = scandir($imageDirectory);
            $imageCount = count($imageFiles) - 2; // Subtracting . and ..
            for ($i = 0; $i < $imageCount; $i++) {
                echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $i . '" ' . ($i === 0 ? 'class="active" aria-current="true"' : '') . ' aria-label="Slide ' . ($i + 1) . '"></button>';
            }
            ?>
        </div>
        <div class="carousel-inner">
            <!-- Generate carousel items based on the images -->
            <?php
            $firstImage = true;
            foreach ($imageFiles as $imageFile) {
                // Check if the file is a valid image file
                $imagePath = $imageDirectory . $imageFile;
                $imageExtension = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));
                if (in_array($imageExtension, array('jpg', 'jpeg', 'png', 'gif'))) {
                    echo '<div class="carousel-item ' . ($firstImage ? 'active' : '') . ' c-item">
                        <img src="' . $imagePath . '" class="d-block w-100 c-img" alt="Image">
                    </div>';
                    $firstImage = false;
                }
            }
            ?>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



    <div class="container">
        <!-- fetching the details for Room Description -->
        <?php
        // $room_id = $_GET['room_id'];
        $sql = "SELECT * FROM rooms WHERE room_id = '$room_id'";
        $result = mysqli_query($conn, $sql);
        $row_Count = mysqli_num_rows($result);

        if ($row_Count > 0) {

            $row = mysqli_fetch_assoc($result);

            $address = $row['address'];
            $price = $row['price'];
            $areaId = $row['areaId'];
            // fetching the user id of Host
            $user_id = $row['user_id'];
            $singleRoom = strtolower($row['singleRoom']);
            $attachBathroom = strtolower($row['attach_bathroom']);
            $roomAvaialable = strtolower($row['room_available']);


            // fetching Area from another table
            $sql_area = 'SELECT area_name FROM arearnc WHERE areaId =' . $areaId;
            $result2 = mysqli_query($conn, $sql_area);
            $areaname = mysqli_fetch_assoc($result2);


            // Fetching the Host name and Conatct
            include 'partials/models/users.php';

            $user_row = mysqli_fetch_assoc($user_result);
            $host_name = $user_row['user_name'];
            $host_contact = $user_row['contact'];
            $host_user_id = $user_row['user_id'];


            $roomStatus = $roomAvaialable == 'false' ? 'Not Available' : 'Available';
            echo ' <div class="card mt-3 mb-3">
                                <h5 class="card-header">' . $address . ', ' . $areaname['area_name'] . '</h5>
                                <div class="card-body">
                                    <div class="card-title d-md-flex"><strong class="mt-1">Price: &#x20B9; ' . $price . ' </strong>
                                        <h6 class=" ms-4 btn btn-' . ($roomAvaialable == 'false' ? 'warning' : 'success') . ' btn-sm active">Room ' . $roomStatus . '</h6>
                                        <h6 class="btn btn-secondary btn-sm ms-2 active">' . ($singleRoom == 'false' ? 'Double' : 'Single') . ' Room</h6>
                                        <h6 class="btn btn-secondary btn-sm ms-2 active">' . ($attachBathroom == 'false' ? 'Shared' : 'Attached') . ' Bathroom</h6>
                                    </div>
                                    <p class="card-title text-dark  m-0"><strong class="text-secondary">Host Name: </strong ><small class="fw-bold   fs-6">' . $host_name . '</small></p>
                                    <p class="card-title text-dark m-0"><strong class="text-secondary">Host Contact:</strong> <small class="fw-bold fs-6">' . $host_contact . ' </small></p>
                                    ';
            if ($isLogin) {
                include 'partials/_confirm_page.php';
                // echo '<a href="#" class="btn btn-primary mt-3 ' . ($roomAvaialable == 'false' ? 'disabled' : '') . ' ">Book</a>';
                echo '<button type="submit" class="btn btn-primary mt-3 me-2 ' . ($roomAvaialable == 'false' ? 'disabled' : '') . '" id="confirmPageModal" data-bs-toggle="modal" data-bs-target="#confirmPageModal">Book</button>';
            } else {
                echo '<a href="#" class="btn btn-primary mt-3 disabled ">Book</a>';
            }

            echo ' </div>
                            </div>';
        }
        ?>

        <!-- Add Comment -->
        <?php
        if ($isLogin) {
            $userId =  $_SESSION['user_id'];
            include 'partials/models/add_comment.php';

            echo '<form action="' . $_SERVER['REQUEST_URI'] . '" method="POST">
            <div class="form-group w-75">
            <textarea class="form-control" placeholder="Leave a comment here" id="comment_desc" name="comment_desc"></textarea>
            </div>
            <input type="submit" value="Post" class="btn btn-info mt-3 mb-3 ">
            </form>';
        } else {
            echo '<div class="form-group w-75">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                 </div>
                <input type="submit" value="Post" class="btn btn-info mt-3 mb-3 disabled">';
        }
        ?>

        <div>

            <!-- SHow Comment -->
            <h6>Reviews</h6>

            <?php

            include "partials/models/show_comments.php";

            if ($comment_count > 0) {

                while ($row = mysqli_fetch_assoc($Comment_result)) {
                    $comment_desc = $row['comment_desc'];
                    $time_stamp = $row['time_stamp'];
                    // echo $time_stamp;
                    $user_id = $row['user_id'];

                    include 'partials/models/users.php';

                    $user_row = mysqli_fetch_assoc($user_result);
                    $username = $user_row['username'];
                    $name = $user_row['user_name'];

                    echo '<div class="card w-100 mb-3 mt-2">
                            <div class="card-body d-flex justify-content-between">
                                <div class="d-flex">
                                    <img src="img/user.png" alt="" id="logo_size">
                                    <h5 class="card-title ms-2 fs-5 text-bold">' . $name . '</h5>
                                    <p class="card-title ms-2 my-0">(' . $username . ')</p>
                                    
                                </div>
                                <p class="card-title ms-5 text-end">Posted: ' . timeAgo($time_stamp) . '</p>
                            </div>
                            <p class="card-text ms-3 mb-2">' . $comment_desc . '</p>
                        </div>';
                }
            } else {
                // When their is no Comment
                echo '<div class="card text-center mt-4 mb-5 w-75">
                        
                        <div class="card-body">
                            <h5 class="card-title">No Comments</h5>
                            <h6 class="card-text">Be the First one give your Comment</h6>
                        </div>
                        
                    </div>';
            }



            ?>

            <p></p>
        </div>

    </div>

    <?php include "partials/footer.php"; ?>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="partials/js/nav.js"></script>
</body>

</html>