<?php
include('./connect-to-base-calendar.php');

if (isset($_POST['start']) && isset($_POST['end'])) {
    $start = $_POST['start'];
    $end = $_POST['end'];

    $sql = "INSERT INTO events( start, end) values( '$start', '$end')";
    $result = mysqli_query($conn, $sql);
    echo json_encode($result);
}
