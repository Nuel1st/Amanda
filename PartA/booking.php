<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie = $_POST["movies"];
    $showtime = $_POST["showtimes"];
    $mobile = $_POST["mobile"];

    // You can perform additional validation or database operations here

    echo "Your booking for '$movie' on $showtime is confirmed.";
}
?>
