<?php
require_once('./config.php');
?>
<?php
if (isset($_POST)) {
  $ime_firme = $_POST['imeFirme'];
  $ime_vlasnika = $_POST['imeVlasnika'];
  $email = $_POST['email'];
  $sifra = sha1($_POST['sifra']);
  $id_delatnosti = $_POST['id_delatnosti'];
  $adresa = $_POST['adresa'];
  $id_opstine = $_POST['id_opstine'];
  $sql = "INSERT INTO firma (ime_firme, ime_vlasnika, email, sifra, id_opstine, id_delatnosti, adresa) Values (?,?,?,?,?,?,?)";
  $stmtinsert = $db->prepare($sql);
  $result = $stmtinsert->execute([$ime_firme, $ime_vlasnika, $email, $sifra, $id_opstine, $id_delatnosti, $adresa]);
  if ($result) {
    echo 'Uspesna Registracija!';
  } else {
    echo 'Greska pri registraciji!';
  }
}
?>