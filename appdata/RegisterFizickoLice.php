<?php
$email = $_POST['EMAIL'];
$sifra = $_POST['SIFRA'];
$ime = $_POST['IME'];
$prezime = $_POST['PREZIME'];
$vrstaRada = $_POST['VRSTA_RADA'];
$delatnost = $_POST['DELATNOST'];
$usluga = $_POST['USLUGA'];
$check = " ";
foreach ($usluga as $checked) {
    $check .= $checked . ",";
}
if (!empty($email) || !empty($sifra) || !empty($ime) || !empty($prezime) || !empty($vrstaRada) || !empty($delatnost) || !empty($usluga)) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "fixit";
    $dbname = "fixit";
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connection Error(' . mysqli_connect_error() . ')' . mysqli_connect_error());
    } else {
        $stmt = $conn->prepare("SELECT EMAIL From fizicko_lice Where EMAIL=?");
        $stmt->bind_param("s", $email);
        if ($email)
            $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $runm = $stmt->num_rows;
        if ($runm == 0) {
            $stmt->close();
            $stmt = $conn->prepare("INSERT Into fizicko_lice (ime,prezime,email,sifra,vrsta_rada,delatnost,usluga) values(?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssss", $ime, $prezime, $email, $sifra, $vrstaRada, $delatnost, $check);
            $stmt->execute();
        }
        $stmt->close();
        $conn->close();
    }
} else {
    die();
}
