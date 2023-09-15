<?php
require "partials/_DBConnect.php";
require "partials/_navbar.php";

// $delete_query = "DELETE FROM `favourite` WHERE `favourite`.`fav_id` = 8"
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="partials/css/navbar.css">
    <link rel="stylesheet" href="partials/css/rooms.css">
    <!-- <link rel="stylesheet" href="partials/css/responsive.css"> -->
    <script src="partials/js/nav.js"></script>
    <script src="partials/js/scrollPositionScript.js"></script>
    <title>Favourite</title>

    <style>
        .card-content {
            margin-left: 60px;
            width: 370px;
            height: 100%;
        }


        .c-img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            filter: brightness(0.6);

        }
    </style>
</head>

<body>

    <div class="container-fluid ">


        <div class="row " id="card_row" style="margin-top: 70px;">

            <p class="text-center text-decoration-underline text-secondary mt-2 fs-4 fw-bold">Favourite</p>

            <?php

            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

                $user_id = $_SESSION['user_id'];
                $sql = "SELECT * FROM favourite WHERE user_id = '$user_id' ORDER BY fav_id DESC";
                $fav_result = mysqli_query($conn, $sql);
                $fav_row_Count = mysqli_num_rows($fav_result);


                if ($fav_row_Count > 0) {
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($fav_result)) {
                        $room_id = $row['room_id'];
                        $fav_id = $row['fav_id'];

                        include "partials/models/fetch_rooms.php";


                        $room_row = mysqli_fetch_assoc($fetch_room_result);
                        $address = $room_row['address'];
                        $price = $room_row['price'];
                        $room_id = $room_row['room_id'];
                        $area_id = $room_row['areaId'];
                        $imageDirectory = "img/roomImage/$room_id/";

                        include "partials/models/fetch_area.php";

                        echo '<div class="col-lg-4 col-md-4 col-sm-6 mt-4  col-xxl-3"  >
                                <div class="card c-item">
                                    <!-- <img src="img/rooms_img/demo.jpg" class="card-img-top c-img" alt="..."> -->
                                    <div id="carouselExampleIndicators-' . $count . '" class="carousel slide carousel-fade">
                                        <div class="carousel-indicators"> ';

                        $imageFiles = scandir($imageDirectory);
                        $imageCount = count($imageFiles) - 2; // Subtracting . and ..
                        for ($i = 0; $i < $imageCount; $i++) {
                            echo '<button type="button" data-bs-target="#carouselExampleIndicators-' . $count . '" data-bs-slide-to="' . $i . '" ' . ($i === 0 ? 'class="active" aria-current="true"' : '') . ' aria-label="Slide ' . ($i + 1) . '"></button>';
                        }

                        echo '</div>
                                        <div class="carousel-inner">';
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
                        echo ' </div>
                                        
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators-' . $count . '" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators-' . $count . '" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    <div class="card-body" id="content-wrapper">
                                        <h6 class="card-subtitle mt-2 mb-2 text-body-dark"><strong>' . $address . ', ' . $areaname . '</strong></h6>
                                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        <h6 class="card-title text-bold">&#x20B9; ' . $price . '/- Per Month</h6>
                                        <div class="d-lg-flex">
                                        <a href="room_desc.php?room_id=' . $room_id . '" class="btn btn-primary scroolPos">Show Details </a>
        
                                    <a href="partials/models/delete_fav.php?fav_id=' . $fav_id . '" class="btn btn-danger ms-2 scroolPos">Remove</a>
                                    
                                </div>
                                </div>
                                </div>
                            </div>';
                    }
                    $count++;
                } else {
                    echo '<div class="d-flex justify-content-center">
                    <div class="card text-center mt-4 mb-5 w-50">
                            <div class="card-body mx-auto">
                                <h5 class="card-title">No Favourite</h5>
                                <h6 class="card-text">Currently You have no favorite</h6>
                                
                            </div>
                        </div>;
                        </div>';
                }
            } else {
                echo '<div class="d-flex justify-content-center">
                    <div class="card text-center mt-4 mb-5 w-50">
                            <div class="card-body mx-auto">
                                <h5 class="card-title">No Favourite</h5>
                                <h6 class="card-text">Login In to See the Your Favourite</h6>
                                <button type="submit" class="btn btn-success me-2" id="btnLogin" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                            </div>
                        </div>;
                        </div>';
            }

            ?>
        </div>
    </div>

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>