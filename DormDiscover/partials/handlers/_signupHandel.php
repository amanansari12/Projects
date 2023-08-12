<?php

$showalert = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require "../_DBConnect.php";
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $cnfPassword = $_POST['cnfPass'];

    $sql = "SELECT Username FROM users WHERE username =  '$username' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);

    if ($row == 0) {

        if ($password == $cnfPassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            //Insert data into database
            $insertQuery = "INSERT INTO `users` ( `user_name`, `contact`, `username`, `password`) VALUE ('$name', '$contact', '$username','$hash')";
            $result = mysqli_query($conn, $insertQuery);

            if ($result) {
                header('Location: /findAccomodation/index.php?signupsuccess=true');
                $showalert = true;
                exit();
            }
        } else {
            // echo "Password Does not match";
            header('Location: /findAccomodation/index.php?signupsuccess=false&pass=false');
            exit();
        }
    } else {
        header('Location: /findAccomodation/index.php?signupsuccess=false');
        exit();
    }
}
