<?php
include('./connect-to-base-calendar.php');

// if (isset($_POST['posao']) && isset($_POST['id'])) {
//     $posao = $_POST['posao'];
//     $id = $_POST['id'];
// }


$sql = "SELECT * FROM events";
$result = mysqli_query($conn, $sql);

$events = array();

while ($row = mysqli_fetch_assoc($result)) {
    $start = $row['start'];
    $end = $row['end'];

    $events[] = array(
        'title' => 'REZERVISANO',
        'start' => $start,
        'end' => $end,
        'display' => 'background'
    );
}
echo json_encode($events);
