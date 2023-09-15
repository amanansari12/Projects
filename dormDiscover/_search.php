<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="partials/css/navbar.css">
    <link rel="stylesheet" href="partials/css/rooms.css">
    <script src="partials/js/nav.js"></script>
    <title>Search</title>

    <style>

    </style>
</head>

<body>
    <div class="container-fluid ">
        <div class="row" id="card_row">
            <?php
            include "partials/_navbar.php";
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                include "partials/_DBConnect.php";
                $search = $_GET['search'];

                $search_query = "SELECT rooms.*, arearnc.area_name FROM rooms
                                JOIN arearnc ON rooms.areaId = arearnc.areaId
                                WHERE MATCH(arearnc.area_name) AGAINST('$search') OR MATCH(rooms.address) AGAINST('$search')";

                $result_query = mysqli_query($conn, $search_query);

                if ($result_query) {
                    $rows_count = mysqli_num_rows($result_query);

                    if ($rows_count > 0) {
                        $count = 1;
                        while ($row = mysqli_fetch_assoc($result_query)) {
                            $room_id = $row['room_id'];
                            $address = $row['address'];
                            $price = $row['price'];
                            $price = $row['price'];
                            $areaname = $row['area_name'];
                            $imageDirectory = "img/roomImage/$room_id/";
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
                       
                                
                        echo'</div>

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
                                <h6 class="card-title">&#x20B9; ' . $price . '/- Per Month</h6>
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
                            <h6 class="card-text">Failed Search</h6>
                            <a href="index.php" class="btn btn-outline-primary">Go Home</a>
                        </div>

                    </div>';
                    }
                } else {
                    echo '<div class="card text-center mt-4">

                    <div class="card-body">
                        <h5 class="card-title">No Result Found</h5>
                        <h6 class="card-text">Failed Search</h6>
                        <a href="index.php" class="btn btn-outline-primary">Go Home</a>
                    </div>

                </div>';
                }
            }

            ?>
        </div>
    </div>

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            btnColor = document.getElementsByClassName('btnClr');


            Array.from(btnColor).forEach((element) => {
                element.addEventListener('mouseover', () => {

                    element.classList.add('btn-warning');
                    // element.classList.add('fw-bold');
                    element.classList.remove('btn-primary');
                })



            })

            Array.from(btnColor).forEach((element) => {
                element.addEventListener('mouseout', () => {

                    element.classList.add('btn-primary');
                    element.classList.remove('btn-warning');
                    // element.classList.remove('fw-bold');
                })



            })

        });
    </script>

</body>

</html>