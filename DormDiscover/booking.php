<?php
include "partials/_DBConnect.php";
require "partials/_navbar.php";


// session_start();
$user_id = $_SESSION['user_id'];

// For deleting the cancel room from confirmBooking Table
if (isset($_GET['cancel']) && isset($_GET['room_id'])) {
    $booking_id = $_POST['booking_id'];
    $delete_query = "DELETE FROM `confirmbooking` WHERE `confirmbooking`.`Booking_id` = '$booking_id'";
    $delete_result = mysqli_query($conn, $delete_query);
    if ($delete_result) {
        $room_id = $_GET['room_id'];
        $update_room = "UPDATE `rooms` SET `room_available` = 'true' WHERE `rooms`.`room_id` = '$room_id' ";
        $update_result = mysqli_query($conn, $update_room);

        // header("Location: booking.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="partials/css/navbar.css">
    <script src="partials/js/nav.js"></script>
    <title>Booking</title>
</head>

<body>

    <div style="margin-top: 88px;">
        <?php
        include "partials/_showError.php";
        ?>
    </div>

    <div class="d-flex justify-content-center" style="margin-top: 88px;">

        <div class="bookRoom">
            <form action="booking.php" method="post">
                <input type="hidden" name="tenant_user_id" value="<?php echo $user_id ?>">
                <button class="btn btn-outline-primary">Booked Rooms</button>
            </form>
        </div>
        <form action="booking.php?host_id=<?php echo $user_id ?>" method="post">
            <input type="hidden" name="host_id" value="<?php echo $user_id ?>">
            <button class="btn btn-outline-warning ms-2">Rented Rooms</button>
        </form>
    </div>


    <div class="fluid-container justify-content-center p-5 pt-0">

        <!-- Shows Which Rooms you have Booked -->
        <?php
        include "partials/models/Show_showRooms.php";
        ?>

        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['tenant_user_id'])) {
                echo '<h5 class="text-center mt-4 fs-2">Booked Rooms</h5>';
                $tenant_user_id = $_POST['tenant_user_id'];
                $show_booked = "SELECT * FROM confirmbooking WHERE tenant_user_id = '$tenant_user_id' ";
                $book_result = mysqli_query($conn, $show_booked);
                $booked_rows_count = mysqli_num_rows($book_result);

                if ($booked_rows_count > 0) {
                    include "partials/models/users.php";

                    echo '<table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr No</th>
                                        <th scope="col">Booking ID</th>
                                        <th scope="col">Tenant Name</th>
                                        <th scope="col">Tenant Contact</th>
                                        <th scope="col">Room Address</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Host Name</th>
                                        <th scope="col">Show Details</th>
                                        <th scope="col">Cancel Booking</th>
                                    </tr>
                                </thead>';
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($book_result)) {
                        $tenant_user_id = $row['tenant_user_id'];
                        $booking_id = $row['Booking_id'];
                        $tenant_name = $row['tenant_name'];
                        $tenant_contact = $row['tenant_contact'];
                        $room_address = $row['room_address'];
                        $room_price = $row['room_price'];
                        $room_id = $row['room_id'];
                        // fetching the details of Host
                        $host_id = $row['host_id'];
                        $fetch_user = "SELECT * FROM users WHERE user_id = '$host_id' ";
                        $user_result = mysqli_query($conn, $fetch_user);
                        $user_count = mysqli_num_rows($user_result);
                        $row = mysqli_fetch_assoc($user_result);
                        echo '      <tr>
                                        <th scope="row">' . $count++ . '</th>
                                        <td>' . $booking_id . '</td>
                                        <td>' . $tenant_name . '</td>
                                        <td>' . $tenant_contact . '</td>
                                        <td>' . $room_address . '</td>
                                        <td>' . $room_price . '</td>
                                        <td>' . $row['user_name'] . '</td>
                                        <td><a href="room_desc.php?room_id=' . $room_id . '" class="showDetails btn btn-primary">Show Detials</a></td>
                                        <td><button class="cancelBooking btn btn-primary" id="' . $booking_id . '"data-bs-toggle="modal" data-bs-target="#cancelBookingModal">Cancel Booking</button></td>
                                    </tr>';
                    }
                    echo '</tbody>
                    </table>';
                } else {
                    echo '<div class="card text-center mt-4 mb-5>
                                <div class="card-body">
                                    <h5 class="card-title">No Rooms Rented</h5>
                                    <h6 class="card-text">Currently You Have Not booked any Rooms</h6>
                                </div>
                            </div>';
                }
            }
        }
        ?>

        <!-- Shows Which Rooms you have given in the rent -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_GET['host_id'])) {
                echo '<h5 class="text-center mt-4 fs-2">Rooms Rented</h5>';
                $host_id = $_GET['host_id'];
                $show_rent = "SELECT * FROM confirmbooking WHERE host_id = '$host_id' ";
                $rent_result = mysqli_query($conn, $show_rent);
                $rent_rows_count = mysqli_num_rows($rent_result);

                if ($rent_rows_count > 0) {

                    echo '<table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr No</th>
                                        <th scope="col">Booking ID</th>
                                        <th scope="col">Tenant Name</th>
                                        <th scope="col">Tenant Contact</th>
                                        <th scope="col">Room Address</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Show Details</th>
                                        <th scope="col">Cancel Booking</th>
                                    </tr>
                                </thead>';
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($rent_result)) {
                        $tenant_user_id = $row['tenant_user_id'];
                        $tenant_name = $row['tenant_name'];
                        $booking_id = $row['Booking_id'];
                        $tenant_contact = $row['tenant_contact'];
                        $room_address = $row['room_address'];
                        $room_price = $row['room_price'];
                        $room_id = $row['room_id'];

                        echo '      <tr>
                                        <th scope="row">' . $count++ . '</th>
                                        <td>' . $booking_id . '</td>
                                        <td>' . $tenant_name . '</td>
                                        <td>' . $tenant_contact . '</td>
                                        <td>' . $room_address . '</td>
                                        <td>' . $room_price . '</td>
                                        <td><a href="room_desc.php?room_id=' . $room_id . '" class="showDetails btn btn-primary">Show Detials</a></td>
                                        <td><button class="cancelBooking btn btn-primary" id="' . $booking_id . '"data-bs-toggle="modal" data-bs-target="#cancelBookingModal">Cancel Booking</button></td>
                                    </tr>';
                    }

                    echo '</tbody>
                    </table>';
                } else {
                    echo '<div class="card text-center  mt-4 mb-5">
                                    <div class="card-body">
                                        <h5 class="card-title">No Rooms Rented</h5>
                                        <h6 class="card-text">No Rooms have Been rented</h6>
                                    </div>
                                </div>';
                }
            }
        }
        ?>

    </div>


    <!-- Cancel Booking Confirmation Modal -->
    <div class="modal fade" id="cancelBookingModal" tabindex="-1" aria-labelledby="cancelBookingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cancelBookingModalLabel">Cancel Booking</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="booking.php?cancel=true&room_id=<?php echo $room_id ?>&id=<?php echo $user_id ?>" method="POST">
                        <p>Are You Sure You Want to Cancel the Booking</p>
                        <input type="hidden" name="booking_id" id="booking_id" value="">
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Yes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize DataTable with the responsive option
            let table = new DataTable('#myTable', {
                responsive: true
            });
        });
    </script>
    <script>
        cancelBooking = document.getElementsByClassName('cancelBooking');
        Array.from(cancelBooking).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                // gives the id of the ckicked button
                sno = e.target.id;
                console.log('Booking ID= ' + sno);
                document.getElementById("booking_id").value = sno;
            })
        })
    </script>
</body>

</html>