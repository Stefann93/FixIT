<?php
require_once('./config.php');
?>
<?php
if (isset($_POST)) {
  $ime = $_POST['ime'];
  $prezime = $_POST['prezime'];
  $email = $_POST['email'];
  $sifra = sha1($_POST['sifra']);
  $sql = "INSERT INTO korisnik (ime, prezime, email, sifra) Values (?,?,?,?)";
  $stmtinsert = $db->prepare($sql);
  $result = $stmtinsert->execute([$ime, $prezime, $email, $sifra]);
  if ($result) {
    echo 'Uspesna Registracija!';
  } else {
    echo 'Greska pri registraciji!';
  }
}
?>