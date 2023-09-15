<?php

if (isset($_GET['id'])) {
    echo '<h5 class="text-center mt-4 fs-2">Booked Rooms</h5>';
    $show_booked = "SELECT * FROM confirmbooking WHERE tenant_user_id = '$user_id' ";
    $book_result = mysqli_query($conn, $show_booked);
    $booked_rows_count = mysqli_num_rows($book_result);

    if ($booked_rows_count > 0) {

        echo '<table class="table" id="myTable">
                    <thead>
                        <tr>
                        <th scope="col">Sr No</th>
                        <th scope="col">Booking ID</th>
                        <th scope="col">Host Name</th>
                        <th scope="col">Host Contact</th>
                        <th scope="col">Room Address</th>
                        <th scope="col">Price</th>
                        <th scope="col">Tenant Name</th>
                        <th scope="col">Tenant Contact</th>
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
                            <td>' . $row['user_name'] . '</td>
                            <td>' . $row['contact'] . '</td>
                            <td>' . $room_address . '</td>
                            <td>' . $room_price . '</td>
                            <td>' . $tenant_name . '</td>
                            <td>' . $tenant_contact . '</td>
                            <td><a href="room_desc.php?room_id=' . $room_id . '" class="showDetails btn btn-primary">Detials</a></td>
                            <td><button class="cancelBooking btn btn-primary" id="' . $booking_id . '"data-bs-toggle="modal" data-bs-target="#cancelBookingModal"">Cancel</button></td>
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
