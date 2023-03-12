<?php
include('./connect-to-base-calendar.php');

if (isset($_POST['start']) && isset($_POST['end'])) {
    $start = $_POST['start'];
    $end = $_POST['end'];
    $posao = $_POST['posao'];
    $id = $_POST['id'];

    $stmt = $conn->prepare("INSERT INTO events( start, end, id_radnika, naziv_posla) VALUES ( ?,?,?,?)");

    $stmt->bind_param("ssis", $start, $end, $id, $posao);

    $stmt->execute();

    echo json_encode($stmt);
    echo $id . $posao;
}
