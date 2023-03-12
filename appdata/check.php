<?php
if (isset($_POST['posao']) && isset($_POST['id'])) {
    $posao = $_POST['posao'];
    $id = $_POST['id'];
    echo 'Suceess' . $posao . $id;
}
