<?php
$sql_area = "SELECT area_name FROM arearnc WHERE areaId =' $area_id' ";
$result2 = mysqli_query($conn, $sql_area);
$area_row = mysqli_fetch_assoc($result2);

$areaname = $area_row['area_name'];
