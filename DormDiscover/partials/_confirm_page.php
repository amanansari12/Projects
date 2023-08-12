<?php

// Fetching the Login user details from session and displaying them
$user_id = $_SESSION['user_id'];
include 'models/users.php';

$user_row = mysqli_fetch_assoc($user_result);
$username = $user_row['username'];
$tenantName = $user_row['user_name'];
$tenantContact = $user_row['contact'];

?>

<style>
    .form-control-plaintext {
        border: none;
        background-color: transparent;
        box-shadow: none;
        /* Optionally, you can add more styles to make it visually consistent with disabled fields */
        pointer-events: none;
        /* Prevents mouse events on the element */
    }
</style>

<div class="modal fade " id="confirmPageModal" tabindex="-1" aria-labelledby="confirmPageModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class=" modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="confirmPageModalLabel">Confirm Booking</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="partials/handlers/_confirmRoomHandler.php?room_id=<?php echo $room_id; ?>" method="post">
                    <div class="row">
                        <input type="hidden" name="host_user_id" class="host_user_id" value="<?php echo $host_user_id; ?>">
                        <div class="mb-3 d-flex">
                            <label for="staticEmail" class="col-sm-2 col-md-3 col-form-label">Name: </label>
                            <div class="col-sm-10 col-md-9 ms-2">
                                <input type="text" class="form-control-plaintext" id="tenantName" name="tenantName" value="<?php echo $tenantName; ?>">
                            </div>
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="staticEmail" class="col-sm-2 col-md-3 col-form-label">Contact:</label>
                            <div class="col-sm-10 col-md-9 ms-2">
                                <input type="text" class="form-control-plaintext" id="tenantContact" name="tenantContact" value="<?php echo $tenantContact; ?>"">
                            </div>
                        </div>
                        <div class=" mb-3 d-md-flex">
                                <label for="staticEmail" class="col-sm-2 col-md-3 col-form-label">Room Address:</label>
                                <div class="col-sm-10 col-md-9 ms-2">
                                    <input type="text" class="form-control-plaintext" id="address" name="address" value="<?php echo $address . ', ' . $areaname['area_name']; ?>"">
                            </div>
                        </div>
                        <div class=" mb-3 d-flex">
                                    <label for="staticEmail" class="col-sm-2 col-md-3 col-form-label">Price:</label>
                                    <div class="col-sm-10 col-md-9 ms-2">
                                        <input type="text" class="form-control-plaintext" id="price" name="price" value="<?php echo $price; ?>"">
                            </div>
                        </div>
                        <div class=" mb-3 d-flex">
                                        <label for="staticEmail" class="col-sm-2 col-md-3 col-form-label">Host Name:</label>
                                        <div class="col-sm-10 col-md-9 ms-2">
                                            <input type="text" readonly class="form-control-plaintext" id="hostname" name="hostname" value="<?php echo $host_name; ?>"">
                            </div>
                        </div>
                        <div class=" mb-3 d-flex">
                                            <label for="staticEmail" class="col-sm-2 col-md-3 col-form-label">Host Contact</label>
                                            <div class="col-sm-10 col-md-9 ms-2">
                                                <input type="text" readonly class="form-control-plaintext" id="hostContact" name="hostContact" value="<?php echo $host_contact; ?>"">
                            </div>
                        </div>
                    </div>
                    <button type=" submit" class="btn btn-primary">Confirm Details</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>