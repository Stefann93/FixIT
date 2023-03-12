<?php
include('./appdata/connect-to-base-calendar.php');

$posao = $_POST['posao'];
$id = $_POST['id'];

$stmt = $conn->prepare("INSERT INTO events (naziv_posla, id_radnika) VALUES (?, ?)");

// bind the values to the placeholders
$stmt->bind_param("si", $posao, $id);

// set the values of $posao and $id to the values from the Ajax request

// execute the statement
if ($stmt->execute() === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error inserting record: " . $conn->error;
}
