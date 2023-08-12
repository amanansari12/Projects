<?php

session_start();

$isLogin = false;
// $showAlert = false;
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $isLogin = true;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/navbar.css">
    <title>Document</title>
    <style>
        #navLogo {
            width: 100px;
        }

        #search-input {
            width: 450px
        }

        @media (max-width: 1298px) {
            #search-form {
                width: 350px
            }

            .btn-size {
                width: 110px;
            }
        }

        @media (max-width: 1148px) {
            #search-form {
                width: 300px
            }

            .btn-size {
                width: 130px;
            }
        }

        @media (max-width: 1068px) {
            #search-form {
                width: 240px
            }

            .btn-size {
                width: 145px;
            }
        }

        @media (max-width: 883px) {
            #search-form {
                width: 200px;
            }

            .btn-size {
                width: 250px;
            }
        }

        @media (max-width: 812px) {
            #search-form {
                width: 150px
            }

            .btn-size {
                width: 320px;
            }
        }
    </style>
</head>

<body>

    <?php
    echo ' <nav class="navbar navbar-expand-md bg-body-transparent-lg p-3 fixed-top navs-white" id="navbar">
      <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="img/logo.jpg" alt="Logo" class="" id="navLogo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse list d-md-flex justify-content-lg-end" id="navbarSupportedContent">';


    echo '<form action="_search.php" class="d-flex"  id="search-form">
              <input class="form-control me-2" list="datalistOptions" id="search-input" placeholder="Type to search..." name="search">
              <button type="submit" class="btn btn-primary btn-size">Search</button>
          </form>';



    echo '<ul class="navbar-nav mb-2  mt-0 mb-lg-0  " id="navslink">
                  <li class="nav-item navLinks me-lg-4 ms-lg-3">
                      <a class="nav-link  list text" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item  navLinks me-lg-4">
                      <a class="nav-link  text" href="favourite.php">Favourite</a>
                  </li>
                  <li class="nav-item  navLinks me-lg-4">
                      <a class="nav-link  text" href="renting.php">Rent Room</a>
                  </li>
                      <li class="nav-item  navLinks  me-lg-4">';
    if ($isLogin) {
        echo '<a class="nav-link text  " href="booking.php?id=' . $_SESSION['user_id'] . '">Booking</a>';
    } else {
        echo '<a class="nav-link text disabled " href="#">Booking</a>';
    }
    echo '</li>
    </ul>';

    // <p class="btn"></p>

    if ($isLogin) {
        $name = $_SESSION['name'];
        echo '<div class="button">
                                    <p class="btn mb-0 text border border-4 border-warning">' . $name . '</p>
                                    <a href="partials/_logout.php" class="btn btn-primary">Logout</a>
                                </div>
                            </div>
                        </div>
                    </nav> ';
    } else {
        echo '<div class="button">
                                    <button type="submit" class="btn btn-success me-2" id="btnLogin" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                                    <button type="submit" class="btn btn-primary" id="btnSignup" data-bs-toggle="modal" data-bs-target="#SignupModal">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </nav> ';
    }


    include "partials/_login.php";
    include "partials/_signup.php";

    ?>
    <!-- <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->

</body>

</html>