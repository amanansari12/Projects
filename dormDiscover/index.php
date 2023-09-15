<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="partials/css/main.css">
    <script src="partials/js/script.js"></script>
    <script src="partials/js/scrollPositionScript.js"></script>
    <title>Home</title>

    <style>

    </style>

</head>

<body>
    <?php require "partials/_navbar.php"; ?>
    <?php include "partials/_DBConnect.php"; ?>



    <!-- Craousal -->


    <div id="carouselExampleIndicators" class="carousel slide overflow-hidden">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active c-item">
                <img src="img/img-1.jpg" class="d-block w-100 c-img" alt="Image">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center top-0">
                    <p class="fs-2 fw-bold font-monospace">Find Your Perfect Space</p>
                    <p class="fs-5 font-monospace">Discover a wide range of comfortable and affordable rooms to call your home away from home</p>
                </div>
            </div>
            <div class=" carousel-item c-item">
                <img src="img/img-2.jpg" class="d-block w-100 c-img" alt="Image">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center top-0">
                    <p class="fs-2 fw-bold font-monospace">Find Your Perfect Space</p>
                    <p class="fs-5 font-monospace">Discover a wide range of comfortable and affordable rooms to call your home away from home</p>
                </div>
            </div>
            <div class="carousel-item c-item">
                <img src="img/img-3.jpg" class="d-block w-100 c-img" alt="Image">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center top-0">
                    <p class="fs-2 fw-bold font-monospace">Find Your Perfect Space</p>
                    <p class="fs-5 font-monospace">Discover a wide range of comfortable and affordable rooms to call your home away from home</p>
                </div>
            </div>
            <div class="carousel-item c-item">
                <img src="img/img-4.jpg" class="d-block w-100 c-img" alt="Image">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center top-0">
                    <p class="fs-2 fw-bold font-monospace">Find Your Perfect Space</p>
                    <p class="fs-5 font-monospace">Discover a wide range of comfortable and affordable rooms to call your home away from home</p>
                </div>
            </div>
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

    <!-- Accomodation Areas -->

    <div class="container-fluid ">

        <p class="text-center text-decoration-underline fs-2 fw-bold font-monospace mt-3 text-secondary">BROWSE ACCOMODATION</p>

        <div class="row " id="card_row">

            <?php
            $sql = 'SELECT * FROM arearnc';
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $areaName = $row['area_name'];
                $areaId = $row['areaId'];

                echo '<div class="card card-content col-lg-4 col-sm-4 col-xs-4 my-3 p-0" >
                            <img src="img/rooms_img/demo.jpg" class="card-img-top c-img w-100" alt="img/rooms_img/demo.jpg">
                            <div class="card-body">
                                <h5 class="card-title">' . $areaName . '</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                                <a href="rooms.php?area_id=' . urlencode($areaId) . '" class="btn btn-primary btnClr scroolPos">Rooms in ' . $areaName . '</a>
                            </div>
                        </div>';
            }

            ?>

        </div>
        <!-- <a href="rooms.php?areaId="></a> -->
    </div>
    <!-- <img src="https://source.unsplash.com/random" alt=""> -->

    <?php include "partials/footer.php"; ?>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            btnColor = document.getElementsByClassName('btnClr');


            Array.from(btnColor).forEach((element) => {
                element.addEventListener('mouseover', () => {

                    element.classList.add('btn-warning');
                    element.classList.remove('btn-primary');
                })



            })

            Array.from(btnColor).forEach((element) => {
                element.addEventListener('mouseout', () => {

                    element.classList.add('btn-primary');
                    element.classList.remove('btn-warning');
                })



            })

        });
    </script>


</body>

</html>