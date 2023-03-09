<?php
include('./connect-to-base-calendar.php');

$sql = "SELECT * FROM events";
$result = mysqli_query($conn, $sql);

$events = array();

while ($row = mysqli_fetch_assoc($result)) {
    $title = $row['title'];
    $start = $row['start'];
    $end = $row['end'];

    $events[] = array(
        'title' => $title,
        'start' => $start,
        'end' => $end
    );
}

echo json_encode($events);
