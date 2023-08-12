<?php
$showAlert = false;
$loginSuccess = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require "../_DBConnect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' ";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);

    if ($numRows == 1) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            session_start();

            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $row['user_name'];
            header('Location: /dormDiscover/index.php?loginSuccess=true');
        } else {
            header("Location: /dormDiscover/index.php?loginSuccess=false");
            $showAlert = true;
        }
    } else {
        header("Location: /dormDiscover/index.php?account=false");
    }
}
