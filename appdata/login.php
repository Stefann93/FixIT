<?php
$email = $_POST['email'];
$sifra = $_POST['sifra'];

$pokazivac = 0;
if (!empty($email) || !empty($sifra) || !empty($adresa) || !empty($ime)) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "fixit";
    $dbname = "fixit";
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connection Error(' . mysqli_connect_error() . ')' . mysqli_connect_error());
    } else {
        $stmt = $conn->prepare("SELECT email From korisnik Where email=?");
        $stmt->bind_param("s", $email);
        if ($email) {
            $stmt = $conn->prepare("SELECT sifra From korisnik Where sifra=?");
            $stmt->bind_param("s", $sifra);
            if ($sifra) {
                $pokazivac = 1;
                echo "cao cao";
            }
        }

        $stmt->close();
        $conn->close();
    }
} else {
    die();
}
