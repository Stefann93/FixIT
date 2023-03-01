<?php
require_once('./appdata/config.php');
?>
<?php
  if (isset($_POST)) {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];
    $br_tel = $_POST['br_tel'];
    $JMBG = $_POST['JMBG'];
    $sifra = sha1($_POST['sifra']);
    $id_delatnosti = $_POST['id_delatnosti'];
    $posao_id = $_POST['posao_id'];
    $id_opstine = $_POST['id_opstine'];
    $adresa = $_POST['adresa'];
    $sql = "INSERT INTO fizicko_lice (ime, prezime, email, sifra, JMBG, id_opstine, adresa, id_delatnosti, posao_id, br_tel) Values (?,?,?,?,?,?,?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$ime, $prezime, $email, $sifra, $JMBG, $id_opstine, $adresa, $id_delatnosti, $posao_id, $br_tel]);
  if($result){
    echo 'Uspesna Registracija!';
  }
  else
  {
    echo 'Greska pri registraciji!';
  }
  }
  ?>