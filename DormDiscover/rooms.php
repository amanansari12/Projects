<?php
require "partials/_DBConnect.php";
require "partials/_navbar.php";
$isLogin = false;


// if the user is not loged in the He will not be able to book or Post the comment

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $isLogin = true;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="partials/css/rooms.css">
    <script src="partials/js/scrollPositionScript.js"></script>
    <title>Rooms</title>

    <style>
        .text {

            color: black;
            font-weight: 500;

        }


        .text:hover {

            font-weight: 700;
            color: black;

        }
    </style>

</head>

<body>


    <div class="container-fluid ">
        <div class="row" id="card_row">

            <?php
            $area_id = $_GET['area_id'];
            // $areaname = $_GET['areaname'];
            $sql = 'SELECT * FROM rooms WHERE areaId =' . $area_id;
            $result = mysqli_query($conn, $sql);
            $row_Count = mysqli_num_rows($result);



            // $sql_area = "SELECT area_name FROM arearnc WHERE area_id =' $area_id' ";
            // $result2 = mysqli_query($conn, $sql_area);
            // $area_row = mysqli_fetch_assoc($result2);

            // includes the code for area in ranchi
            include "partials/models/fetch_area.php";

            if ($row_Count > 0) {
                // The Count is Initialized so that it can change the ID name
                $count = 1;

                while ($row = mysqli_fetch_assoc($result)) {
                    $address = $row['address'];
                    $price = $row['price'];
                    $room_id = $row['room_id'];
                    $imageDirectory = "img/roomImage/$room_id/";

                    // echo $area_id;
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
                                <a href="room_desc.php?room_id=' . $room_id . '" class="btn btn-primary scroolPos">Show Details </a>';

                    if ($isLogin) {
                        // $room_id = $_GET['room_id'];
                        $user_id = $_SESSION['user_id'];
                        $check_fav = "SELECT * FROM favourite WHERE user_id = '$user_id' AND room_id = '$room_id'";
                        $fav_result = mysqli_query($conn, $check_fav);
                        $fav_rows = mysqli_num_rows($fav_result);
                        if ($fav_rows > 0) {
                            echo '  <a href="#" class="btn btn-warning ms-2 disabled">Already in Favourite</a>
                                </div>';
                        } else {
                            echo '  <a href="partials/models/add_favourite.php?room_id=' . $room_id . '&redirect=' . $_SERVER['REQUEST_URI'] . '" class="btn btn-outline-warning ms-2 scroolPos" >Add to Favourite</a>
                                </div>';
                        }
                    } else {
                        echo '<a href="#" class="btn btn-warning disabled ms-2">Favourite (Login to Add)</a>
                        </div>';
                    }


                    echo '</div>
                          </div>
                          </div>';

                    $count++;
                }
            } else {
                echo '<div class="card text-center mt-4">
                        
                        <div class="card-body">
                            <h5 class="card-title">No Result Found</h5>
                            <h6 class="card-text">Currently Their are No Rooms Avaibale in <strong> ' . $areaname . '</strong></h6>
                            <a href="index.php" class="btn btn-outline-primary">Go Home</a>
                        </div>
                        
                    </div>';
            }

            ?>
        </div>
    </div>

    <?php include "partials/footer.php"; ?>

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="partials/js/nav.js"></script>

</body>

</html>