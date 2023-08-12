<?php
if (isset($_GET['result']) && $_GET['result']  == 'true') {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Data Enetered successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
} else if (isset($_GET['result']) && $_GET['result']  == 'true') {
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Data Entry Failed.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

if (isset($_GET['formFill']) && $_GET['formFill']  == 'false') {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Kindly Enter All the details Before Proceding.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}



if (isset($_GET['cancel']) && $_GET['cancel']  == 'true') {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Success</strong> Booking Canceled Successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
