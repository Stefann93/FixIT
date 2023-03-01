<?php
session_start();
require_once('./config.php');

$email = $_POST['email'];
$sifra = $_POST['sifra'];
$sql = "SELECT * FROM fizicko_lice WHERE email = ? AND sifra = ? LIMIT 1 ";
$stmtselect = $db->prepare($sql);
$result = $stmtselect->execute([$email, $sifra]);

if ($result) {
    $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
    if ($stmtselect->rowCount() > 0) {
        $_SESSION['userlogin'] = $user;
        echo 'Uspesna prijava!';
    } else {
        echo 'Invalid podaci!';
    }
} else {
    echo 'greska prilikom konekcije na bazu';
}
