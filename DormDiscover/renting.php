<?php
require "partials/_DBConnect.php";
require "partials/_navbar.php";

// session_start();
$isLogin = false;
// $showAlert = false;
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $isLogin = true;
}

$sql_area = "SELECT * FROM arearnc";
$result2 = mysqli_query($conn, $sql_area);

$items = array();
while ($area_row = mysqli_fetch_assoc($result2)) {
    $items[] = $area_row;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <script src="partials/js/nav.js"></script>
    <title>Document</title>

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


    <div class="container" style="margin-top: 80px;">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                include "partials/_showError.php";

                if ($isLogin) {
                    // echo '<form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
                    echo '<form action="partials/handlers/_addRoomHandler.php" method="post" enctype="multipart/form-data">
                    <p class="fs-5 text-center fw-bold text-secondary">Rent the Room</p>
                    <!-- Select the Area under ranchi -->
                    <div class="area">
                        <select class="form-select" aria-label="Default select example" id="itemList" name="selectedItem" require>
                        <option  selected>Select Area</option>';
                    foreach ($items as $key => $value) {
                        echo '<option value="' . $value['areaId'] . '">' . $value['area_name'] . '</option>';
                        // echo '<br>';
                    }

                    echo '</select>
                                <input type="hidden" class="form-control mt-2" value="" id="areanameId" name="areanameId" require>
                            </div>

                            <!-- Address of the room -->
                            <div class="addressInput ">
                                <p class="fw-bold mt-2 mb-0">Address: </p>
                                <input type="text" class="form-control mt-1" value="" id="address" name="address" require>
                            </div>

                            <!-- Room Price -->
                            <div class="row">
                                <div class="col-md-4 d-flex">
                                    <p class=" fw-bold mt-3">Price: </p>
                                    <input type="number" class="form-control mt-2 ms-2" value="" id="price" name="price" require>

                                </div>

                                <!-- check Attched Bathroom or not -->
                                <div class="col-md-8 mt-4 ">
                                    <p class="d-inline fw-bold">Attched Bathroom: </p>
                                    <div class="form-check form-check-inline ms-2">
                                        <input class="form-check-input" type="radio" name="attachBathroom" id="attachBathroom1" value="true">
                                        <label class="form-check-label" for="attachBathroom1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="attachBathroom" id="attachBathroom2" checked value="false">
                                        <label class="form-check-label" for="attachBathroom2">
                                            No
                                        </label>
                                    </div>
                                </div>

                                <!-- Check Single Room or Double -->
                                <div class="col-md-8 mt-4 ">
                                    <p class="d-inline fw-bold">Rooms: </p>
                                    <div class="form-check form-check-inline ms-2">
                                        <input class="form-check-input" type="radio" name="singleRooms" id="singleRooms1" checked value="true">
                                        <label class="form-check-label" for="singleRooms1">
                                            Single
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="singleRooms" id="singleRooms2" value="false">
                                        <label class="form-check-label" for="singleRooms2">
                                            Double
                                        </label>
                                    </div>
                                </div>

                                <!-- Insert Image: -->
                                <div class="mb-3">
                                    <label for="roomImages" class="form-label my-2 mb-0 fw-bold">Select Images of the Room:</label><br>
                                    <label for="roomImages" class="form-label my-2">Maximun of 4 Images (Only <strong>.jpg, .jpeg, .png</strong>)</label>  
                                    <input class="form-control" type="file" id="roomImages" accept="image/*" name="roomImages[]" multiple >
                                </div>

                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>';
                } else {
                    // When user is Not Logged In
                    echo '<div class="card text-center mt-4 mb-5 ">
                            <div class="card-body">
                                <h5 class="card-title">You Cannot Add Room</h5>
                                <h6 class="card-text">Loggin to Further Actions</h6>
                                <button type="submit" class="btn btn-success me-2" id="btnLogin" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                            </div>
                            
                        </div>';
                }


                ?>

            </div>

        </div>


    </div>
    <?php include "partials/footer.php"; ?>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const itemList = document.getElementById("itemList");
            const areanameIdInput = document.getElementById("areanameId");

            itemList.addEventListener("change", () => {
                const selectedIndex = itemList.selectedIndex;
                if (selectedIndex >= 0) {
                    const selectedValue = itemList.options[selectedIndex].value;
                    console.log("Selected item ID: " + selectedValue);
                    // Set the selected item ID as the value of the hidden input
                    areanameIdInput.value = selectedValue;
                } else {
                    console.log("No item selected.");
                    // Handle the case when no item is selected
                }
            });
        });
    </script>
</body>

</html>