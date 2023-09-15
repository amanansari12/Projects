<?php


// genrating the unique room id 
function generateUniqueRoomID($length = 8)
{
    require "../_DBConnect.php";
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $maxAttempts = 10; // Maximum number of attempts to generate a unique ID
    $roomId = '';

    for ($attempt = 1; $attempt <= $maxAttempts; $attempt++) {
        $roomId = '';
        for ($i = 0; $i < $length; $i++) {
            $roomId .= $characters[rand(0, strlen($characters) - 1)];
        }
        echo "Attempt: $attempt, Room ID: $roomId<br>";
        // Check if the generated room ID already exists in the database
        $sql = "SELECT COUNT(*) AS count FROM rooms WHERE room_id = '$roomId'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo var_dump($row['count']);
        if ($row['count'] == 0) {
            return $roomId; // Return the unique room ID
        }
    }

    echo "Room id not generated";
    return false; // Unable to generate a unique room ID after max attempts
}

// Usage




session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require "../_DBConnect.php";
    $address = $_POST['address'];
    $area_id = $_POST['areanameId'];
    $price = $_POST['price'];
    $singleRoom = $_POST['singleRooms'];
    $attachBathroom = $_POST['attachBathroom'];
    $roomImages = $_FILES['roomImages'];
    $user_id = $_SESSION['user_id'];
    // echo $attachBathroom;
    $room_id = generateUniqueRoomID();
    if ($room_id !== false) {
        echo $room_id;
    } else {
        echo "Unable to generate a unique room ID.";
    }



    if (empty($address) || empty($area_id) || empty($price) || empty($singleRoom) || empty($attachBathroom)) {
        echo "Please fill in all the required fields.";
        header('Location: /dormDiscover/renting.php?formFill=false');
    } else {
        // Sanitize user inputs to prevent SQL injection
        $address = mysqli_real_escape_string($conn, $address);
        $area_id = mysqli_real_escape_string($conn, $area_id);
        $price = mysqli_real_escape_string($conn, $price);
        $singleRoom = mysqli_real_escape_string($conn, $singleRoom);
        $attachBathroom = mysqli_real_escape_string($conn, $attachBathroom);

        // Perform the database insertion
        $insert_sql = "INSERT INTO `rooms` (`room_id`,`address`, `areaId`, `price`, `user_id`, `singleRoom`, `attach_bathroom`, `room_available`) VALUES ('$room_id','$address', '$area_id', '$price', '$user_id', '$singleRoom', '$attachBathroom', 'true')";

        $query_result = mysqli_query($conn, $insert_sql);

        if ($query_result) {
            echo "Data Enetred in DB";
            echo "The Room ID is" . $room_id;
            $target_dir = "../../img/roomImage/$room_id/";
            $uploadOk = 1;

            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true); // Create the directory if it doesn't exist
            }

            // Loop through each uploaded file
            for ($i = 0; $i < count($_FILES['roomImages']['name']); $i++) {
                $imageNumber = $i + 1;
                $imageFileName = "img-$imageNumber." . strtolower(pathinfo($roomImages["name"][$i], PATHINFO_EXTENSION));
                $target_file = $target_dir . $imageFileName;

                // Check if image file is a valid image
                $check = getimagesize($roomImages["tmp_name"][$i]);

                if ($check === false) {
                    echo "File " . $_FILES["roomImages"]["name"][$i] . " is not an image.<br>";
                    $uploadOk = 0;
                    continue;
                }

                // ... Perform other checks as before ...

                if ($uploadOk == 0) {
                    echo "Image files were not uploaded.";
                } else {
                    if (move_uploaded_file($roomImages["tmp_name"][$i], $target_file)) {

                        echo "Image " . $_FILES["roomImages"]["name"][$i] . " uploaded successfully as $imageFileName.<br>";
                    } else {
                        echo "Error uploading image " . $_FILES["roomImages"]["name"][$i] . ".<br>";
                    }
                }
            }
            echo "Images Uploaded successfully";
            $showAlert = true;
            header('Location: /dormDiscover/renting.php?result=true');
        } else {
            header('Location: /dormDiscover/renting.php?result=false');
        }
    }
}
