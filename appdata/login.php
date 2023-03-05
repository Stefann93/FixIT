<?php
session_start();
require_once('./config.php');

$email = $_POST['email'];
$sifra = $_POST['sifra'];
$hashed_input_password = sha1($sifra);
$sql = "SELECT email, sifra, 'korisnik' as tip
FROM korisnik
WHERE email=? AND sifra = ?
UNION
SELECT email, sifra, 'fizicko lice' as tip
FROM fizicko_lice
WHERE email=? AND sifra = ?
UNION
SELECT email, sifra, 'firma' as tip
FROM firma
WHERE email=? AND sifra = ?
Limit 1 ";
$stmtselect = $db->prepare($sql);
$result = $stmtselect->execute([$email, $hashed_input_password, $email, $hashed_input_password, $email, $hashed_input_password]);

if ($result) {
    $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
    if ($stmtselect->rowCount() > 0) {
        $tip = $user['tip']; // Get the value of the 'tip' column
        $_SESSION[$tip] = $user;
        echo 'Uspesna prijava!';
    } else {
        echo 'Neki od podataka nisu tacni!';
    }
} else {
    echo 'greska prilikom konekcije na bazu';
}
