<?php
include('./connect-to-base-calendar.php');

if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end'])) {
    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $sql = "INSERT INTO events(title, start, end) values('$title', '$start', '$end')";
    $result = mysqli_query($conn, $sql);
    echo json_encode($result);
}
