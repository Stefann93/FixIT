<!DOCTYPE html>
<html lang="en">
<?php
require_once('./appdata/config.php');
session_start();
$url = "http" . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 's' : '') . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$newStr = substr($url, 0, -12);
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION);
  setcookie('email', '', time() - 3600, "/");
  setcookie('sifra', '', time() - 3600, "/");
  header("Location:" . $newStr);
}
?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- CSS only -->
  <link href="./appdata/main.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./appdata/zanimanjaV8.css" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="shortcut icon" href="./slike/Ikonice/FAVICON2.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="appdata/modal_styleV5.css" />
  <!--#region Tekst-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <!--#endregion-->
  <title>FixIT</title>
</head>

<body>
  <?php
  $host = "localhost";
  $dbusername = "root"; //fixitinr_fixit
  $dbpassword = ""; //9KD!Co9]B+D*
  $dbname = "fixitinr_fixit"; //fixitinr_fixit
  $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
  $radnik = $conn->query("SELECT id_fizicko,ime,prezime FROM `fizicko_lice` INNER JOIN poslovi ON fizicko_lice.Posao_id = poslovi.posao_id WHERE id_fizicko>7*($_GET[p]-1) and id_fizicko<=7*$_GET[p] and poslovi.naziv_posla = '$_GET[posao]';")
    or die($conn->error);
  $vrstaRada = $conn->query("SELECT ime_opstine FROM opstine")
    or die($conn->error);
  ?>
  <!--#region Modal-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="myform bg-dark">
            <h1 id="naslov" class="text-center">Forma za prijavu</h1>
            <form action="./appdata/login.php" method="POST">
              <div class="mb-3 mt-4">
                <label for="exampleInputEmail1" class="form-label">Email adresa</label>
                <input type="email" name="email" class="form-control login-textbox" id="loginMail" required />
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Šifra</label>
                <input type="password" name="sifra" class="form-control login-textbox" id="loginSifra" required />
              </div>
              <button type="submit" name="submit" id="prijavi-se" class="btn btn-primary text-light mt-3">
                Prijavi se
              </button>
              <div>
                <label><input class="mt-3" type="checkbox" name="remember-me" id="remember-me">&nbsp; Ostavi me prijavljenim</label>

              </div>
            </form>
            <p id="nisi-korisnik">
              Nemaš nalog? <a id="prijava-mini" href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerModal">Napravi nalog!</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--#endregion-->

  <!--#region Registracija main modal-->
  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content radius-register-mc">
        <div class="modal-body bg-dark radius-register">
          <div id="reg-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="text-white text-center fw-bold m-3 fs-2">Registracija</div>

          <div class="d-none d-lg-block"><!--Nestaje-->

            <div class="row">
              <div class="col">
                <div class="w-100 bg-white text-center" style="height: 2px;"></div>
              </div>
            </div>

            <div class="row">
              <div class="col-8 text-white mb-3">
                <div class=" fs-3 ms-3 mt-3">Korisnik usluga</div>
                <div class="text-white fs-6 ms-3 mt-1">Registrujete se kao korisnik i zakažite termin koji Vama odgovara! Nađite usluge koje su Vam trenutno potrebne</div>
              </div>
              <div class="col-4 d-flex align-items-center text-center">
                <button type="button" class="btn-custom w-100 text-center m-4" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerKorisnik">Nastavi<svg viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" fill-rule="evenodd"></path>
                  </svg></button>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="w-100 bg-white text-center" style="height: 2px;"></div>
              </div>
            </div>

            <div class="row">
              <div class="col-8 text-white mb-3">
                <div class=" fs-3 ms-3 mt-3">Izvođač usluga - Fizičko lice</div>
                <div class="text-white fs-6 ms-3 mt-1">Registrujete se kao fizičko lice i pružajte usluge kao samostalni radnik! Lako stupite u kontatk sa klijentima kojima su Vaše usluge potrebne</div>
              </div>
              <div class="col-4 d-flex align-items-center text-center">
                <button type="button" class="btn-custom w-100 text-center m-4" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerFizickoLice">Nastavi<svg viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" fill-rule="evenodd"></path>
                  </svg></button>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="w-100 bg-white text-center" style="height: 2px;"></div>
              </div>
            </div>

            <div class="row">
              <div class="col-8 text-white mb-3">
                <div class=" fs-3 ms-3 mt-3">Izvođač usluga - Firma</div>
                <div class="text-white fs-6 ms-3 mt-1">Registrujete se kao firma i iskoristite Vaše resurse za klijente! Lako stupite u kontatk sa klijentima kojima su Vaše usluge potrebne</div>
              </div>
              <div class="col-4 d-flex align-items-center text-center">
                <button type="button" class="btn-custom w-100 text-center m-4" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerFirma">Nastavi<svg viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" fill-rule="evenodd"></path>
                  </svg></button>
              </div>
            </div>
          </div>

          <div class="d-block d-lg-none justify-content-center">
            <div class="row">
              <div class="col text-center m-2"><button type="button" class="btn-custom2" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerKorisnik">Korisnik<svg viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" fill-rule="evenodd"></path>
                  </svg></button></div>
            </div>
            <div class="row">
              <div class="col text-center m-2"><button type="button" class="btn-custom2" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerFizickoLice">Fizicko lice<svg viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" fill-rule="evenodd"></path>
                  </svg></button></div>
            </div>
            <div class="row mb-4">
              <div class="col text-center m-2"><button type="button" class="btn-custom2" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerFirma">Firma<svg viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" fill-rule="evenodd"></path>
                  </svg></button></div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!--#endregion-->

  <!--#region Korisnik modal -->
  <?php
  if (isset($_POST['submitK'])) {
    $ime = $_POST['IME-KORISNIKA'];
    $prezime = $_POST['PREZIME-KORISNIKA'];
    $email = $_POST['EMAIL-KORISNIKA'];
    $sifra = $_POST['SIFRA-KORISNIKA'];
    $sql = "INSERT INTO korisnik (ime, prezime, email, sifra) Values (?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$ime, $prezime, $email, $sifra]);
  }
  ?>
  <div class="modal fade" id="registerKorisnik" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content radius-register-mc">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="myform bg-dark radius-register">
            <div class="row">
              <div class="col-xl-6"><img src="./register_images/korisnik_register.jpg" class="img-fluid w-100 h-100 d-none d-xl-block register-img" alt="Responsive image"></div>
              <div class="col">
                <form action="posao.php" method="post">
                  <div class="text-center mb-4 fw-bolder fs-3">Korisnička registracija</div>
                  <input style="display: block;" type="text" class="input register-textbox fs-6" placeholder="Ime" id="IME-KORISNIKA" required>

                  <input style="display: block;" type="text" class="input my-4 register-textbox fs-6" placeholder="Prezime" id="PREZIME-KORISNIKA" required>

                  <input style="display: block;" type="text" class="input my-4 register-textbox fs-6" placeholder="JMBG" id="JMBG-KORISNIKA" required>

                  <input style="display: block;" type="number" inputmode="tel" class="input my-4 register-textbox fs-6" placeholder="Kontakt telefon" id="TELEFON-KORISNIKA" required>

                  <input style="display: block;" type="email" class="input register-textbox  fs-6" placeholder="Email" id="EMAIL-KORISNIKA" required>

                  <input style="display: block;" type="password" class="input my-4 register-textbox fs-6" placeholder="Sifra" id="SIFRA-KORISNIKA" required>

                  <input style="display: block;" type="password" class="input my-4 register-textbox fs-6" placeholder="Potvrdite sifru" required>



                  <button type="submit" name="submitK" id="RegisterK" class="btn fs-6 btn-primary text-center text-white fw-bold w-100">Registruj
                    se</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <!--#endregion -->

  <!--#region Fizicko lice modal -->
  <div class="modal fade" id="registerFizickoLice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered ">
      <div class="modal-content radius-register-mc">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="myform bg-dark radius-register">
            <div class="row">
              <div class="col-xl-6"><img src="./register_images/fizickolice_register.jpg" class="img-fluid w-100 h-100 d-none d-xl-block register-img" alt="Responsive image"></div>
              <div class="col">
                <form action="posao.php" method="post">
                  <h2 class="text-center mb-4 fw-bolder fs-3">Registracija fizičkog lica</h2>
                  <input style="display: block;" id="ime-fizicko" type="text" class="input register-textbox  fs-6" placeholder="Ime" name="IME-FIZICKOG-LICA" required>
                  <input style="display: block;" id="prezime-fizicko" type="text" class="input my-4 register-textbox fs-6" placeholder="Prezime" name="PREZIME-FIZICKOG-LICA" required>
                  <input style="display: block;" id="email-fizicko" type="email" class="input register-textbox fs-6" placeholder="Email" name="EMAIL-FIZICKOG-LICA" required>
                  <input style="display: block;" id="telefon-fizicko" type="text" class="input my-4 register-textbox fs-6" placeholder="Broj telefona" name="BROJ-TELEFONA" required>
                  <input style="display: block;" id="jmbg-fizicko" type="text" class="input my-4 register-textbox fs-6" placeholder="JMBG" name="JMBG" required>
                  <input style="display: block;" id="sifra-fizicko" type="password" class="input my-4 register-textbox fs-6" placeholder="Sifra" name="SIFRA" required>
                  <input style="display: block;" id="POTVRDA-SIFRA-FIRMA" type="password" class="input my-4 register-textbox fs-6" placeholder="Potvrdite sifru" required>
                  <div class="row">
                    <div class="col">
                      <select class="dropdown  reg-drop dropdown-register fs-6" required id="delatnost-levo" NAME="delatnost">
                        <option value="odaberi" disabled selected>Odaberi delatnost...</option>
                        <?php
                        $delatnosti = $conn->query("SELECT naziv_delatnosti,id_delatnosti FROM delatnosti")
                          or die($conn->error);
                        while ($podatakDelatnost = $delatnosti->fetch_assoc()) : ?>
                          <option value="<?= $podatakDelatnost['id_delatnosti'] ?>"><?= $podatakDelatnost['naziv_delatnosti'] ?></option>
                        <?php endwhile; ?>
                      </select>
                    </div>
                  </div>
                  <select class="dropdown my-4 reg-drop dropdown-register fs-6" required id="vrstaPosla" name="VRSTA_POSLA">
                    <!-- OPASNOST SQL INJECTIONA -->
                    <option value="odaberiPosao" id="odaberiPosao" disabled selected>Odaberi vrstu posla... </option>
                    <!--  -->
                  </select>
                  <select class="dropdown reg-drop dropdown-register fs-6" NAME="OPSTINA" id="opstina">
                    <option value="odaberi" disabled selected>Odaberi opštinu...</option>
                    <?php
                    $opstine = $conn->query("SELECT ime_opstine,id_opstine FROM opstine")
                      or die($conn->error);
                    while ($podatakOpstine = $opstine->fetch_assoc()) : ?>
                      <option value="<?= $podatakOpstine['id_opstine'] ?>"><?= $podatakOpstine['ime_opstine'] ?></option>
                    <?php endwhile; ?>
                  </select>
                  <input style="display: block;" type="text" class="input my-4 register-textbox fs-6" placeholder="Adresa" id="adresa" name="ADRESA" required>
                  <button type="reset" name="submitFL" id="RegisterFL" class="btn btn-primary text-center text-white fw-bold w-100 mt-4">Registruj se</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!--#endregion -->

  <!--#region firma modal -->
  <div class="modal fade" id="registerFirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered ">
      <div class="modal-content radius-register-mc">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="myform bg-dark radius-register">
            <div class="row">
              <div class="col-xl-6"><img src="./register_images/firma_register.jpg" class="img-fluid w-100 h-100 d-none d-xl-block register-img" alt="Responsive image"></div>
              <div class="col">
                <form action="radnik.php" method="post">
                  <h1 class="text-center mb-4 fw-bolder fs-3">Registracija firme</h1>
                  <input style="display: block;" type="text" class="input register-textbox fs-6" placeholder="Ime firme" id="IME-FIRME" required>
                  <input style="display: block;" type="text" class="input my-4 register-textbox fs-6" placeholder="Kontakt izvođača" id="IME-I-PREZIME-VLASNIKA" required>
                  <input style="display: block;" type="email" class="input register-textbox fs-6" placeholder="Email" id="EMAIL-FIRME" required>
                  <input style="display: block;" type="password" class="input my-4 register-textbox fs-6" placeholder="Sifra" id="SIFRA-FIRME" required>
                  <input style="display: block;" type="password" class="input my-4 register-textbox fs-6" id="potvrda-sifre" placeholder="Potvrdite sifru" required>
                  <div class="row">
                    <div class="col">
                      <select class="dropdown reg-drop dropdown-register fs-6 mb-4" required id="DELATNOST-FIRMA" NAME="DELATNOST">
                        <option value="odaberi" disabled selected>Odaberi delatnost...</option>
                        <?php
                        $delatnosti = $conn->query("SELECT naziv_delatnosti,id_delatnosti FROM delatnosti")
                          or die($conn->error);
                        while ($podatakDelatnost = $delatnosti->fetch_assoc()) : ?>
                          <option value="<?= $podatakDelatnost['id_delatnosti'] ?>"><?= $podatakDelatnost['naziv_delatnosti'] ?></option>
                        <?php endwhile; ?>
                      </select>
                    </div>
                  </div>

                  <textarea class="form-control bg-dark mb-4 ta-work text-white" placeholder="Napišite vrstu rada" id="VRSTA-POSLA-FIRMA" rows="3"></textarea>

                  <select class="dropdown reg-drop dropdown-register fs-6" NAME="OPSTINA" id="OPSTINA-FIRMA">
                    <option value="odaberi" disabled selected>Odaberi opštinu...</option>
                    <?php
                    $opstine = $conn->query("SELECT ime_opstine,id_opstine FROM opstine")
                      or die($conn->error);
                    while ($podatakOpstine = $opstine->fetch_assoc()) : ?>
                      <option value="<?= $podatakOpstine['id_opstine'] ?>"><?= $podatakOpstine['ime_opstine'] ?></option>
                    <?php endwhile; ?>
                  </select>
                  <input style="display: block;" type="text" class="input my-4 register-textbox fs-6" placeholder="Adresa" id="ADRESA-FIRME" name="ADRESA-FIRME" required>
                  <!-- <label class="form-label" for="customFile">Izaberite sliku kao dokaz o postojanju
                  firme:</label>
                <input type="file" class="form-control upload-rad text-white" id="SLIKA-FIRME" /> -->

                  <button type="submit" name="submit" id="RegisterF" class="btn btn-primary text-center text-white fw-bold w-100 mt-4">Registruj se</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--#endregion -->


  <!-- #region NavBar -->
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
    <div class="container">
      <a href="./index.php" class="nav brand"><img class="image" src="./slike/logo/Logo(white).svg" alt="logo" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto text-uppercase">
          <li class="nav-item">
            <a href="./index.php" class="nav-link">Početna</a>
          </li>
          <li class="nav-item">
            <a href="./onama.php" class="nav-link">O nama</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link <?php
                                        if (isset($_SESSION['korisnik']) || isset($_SESSION['fizicko lice']) || isset($_SESSION['firma']) || (isset($_COOKIE['email']) && isset($_COOKIE['sifra']))) {
                                          echo 'd-none';
                                        } ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">Prijavi se</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link <?php
                                        if (isset($_SESSION['korisnik']) || isset($_SESSION['fizicko lice']) || isset($_SESSION['firma']) || (isset($_COOKIE['email']) && isset($_COOKIE['sifra']))) {
                                          echo 'd-none';
                                        } ?>" data-bs-toggle="modal" data-bs-target="#registerModal">Registruj se</a>
          </li>
          <li class="nav-item dropdown account-drop me-lg-5">
            <a class="nav-link dropdown-toggle <?php
                                                if (!isset($_SESSION['korisnik']) && !isset($_SESSION['fizicko lice']) && !isset($_SESSION['firma']) && (!isset($_COOKIE['email']) && !isset($_COOKIE['sifra']))) {
                                                  echo 'd-none';
                                                }
                                                ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="./slike/registericon.png" style="height: 30px;" class="img-fluid" alt="Responsive image">
            </a>
            <ul class="dropdown-menu text-center bg-dark text-white">
              <li><a class="dropdown-item hover-element text-white" onmouseover="" href="#">Moj profil</a></li>
              <li><a class="dropdown-item hover-element text-white" href="#">Sanduče</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a href="<?php $fullUrl = "http" . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 's' : '') . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
                            echo $fullUrl . "&logout=true" ?>" class="dropdown-item hover-element text-white <?php
                                                                                                              if (!isset($_SESSION['korisnik']) && !isset($_SESSION['fizicko lice']) && !isset($_SESSION['firma']) && (!isset($_COOKIE['email']) && !isset($_COOKIE['sifra']))) {
                                                                                                                echo 'd-none';
                                                                                                              }
                                                                                                              ?>">Odjavi se</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--#endregion -->
  <?php
  $posao = $conn->query("SELECT poslovi.naziv_posla,delatnosti.naziv_delatnosti FROM ((`fizicko_lice` INNER JOIN poslovi ON fizicko_lice.Posao_id = poslovi.posao_id) INNER JOIN delatnosti ON fizicko_lice.id_delatnosti = delatnosti.id_delatnosti) WHERE poslovi.naziv_posla = '$_GET[posao]';")
    or die($conn->error);
  $podatak = $posao->fetch_assoc();
  ?>
  <div class="pozadinaCenter" style="background-image: url('./slike/DelatnostiHighRes/<?= $podatak['naziv_delatnosti'] ?>/<?= strtoupper($podatak['naziv_posla']); ?>.jpg');">
  </div>
  <div class="container">
    <div class="naslov text-uppercase fw-bold mb-5" id="ImePosla">
      <?= $podatak['naziv_posla'] ?>
    </div>


    <div class="d-sm-flex w-100">
      <div class="input-group mb-3 prviRed">
        <input type="text" class="form-control border-dark" placeholder="Pretraga majstora" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-primary text-light search-button" type="button" id="button-addon2">Pretraži</button>
      </div>

      <div class="btn-group">
        <button class="btn filter-dugme btn-secondary btn-sm dropdown-toggle btn-filter ms-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Opština
        </button>
        <ul class="dropdown-menu" id="opstineFilter">
          <?php
          $opstine = $conn->query("SELECT ime_opstine,id_opstine FROM opstine")
            or die($conn->error);
          while ($podatakOpstine = $opstine->fetch_assoc()) : ?>
            <li class="tip ps-2"><?= $podatakOpstine['ime_opstine'] ?></li>
          <?php endwhile; ?>
        </ul>
      </div>

      <div class="btn-group flatpickr-input" id="calendar-range">
        <button class="btn filter-dugme btn-secondary btn-sm dropdown-toggle btn-filter ms-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Kalendar
        </button>
      </div>

      <div class="btn-group">
        <button class="btn filter-dugme btn-secondary btn-sm dropdown-toggle btn-filter ms-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Tip
        </button>
        <ul class="dropdown-menu" id="tipFilter">
          <li class="tip ps-2">Fizičko Lice</li>
          <li class="tip ps-2">Firma</li>
        </ul>
      </div>
    </div>
    <div class="popular mb-3 align-items-baseline <?php if (!isset($_GET['opstina']) && !isset($_GET['tip'])) {
                                                    echo 'd-none';
                                                  } else {
                                                    echo 'd-md-flex';
                                                  } ?>">
      <strong class="popular-text">Filteri:</strong>
      <button class="btn btn-outlined <?php if (!isset($_GET['opstina'])) {
                                        echo 'd-none';
                                      } ?>" onclick="Nazad()"><?php echo $_GET['opstina'] ?><span class="text-primary">&nbsp;X</span></button>
      <button class="btn btn-outlined <?php if (!isset($_GET['tip'])) {
                                        echo 'd-none';
                                      } ?>" onclick="Nazad()"><?php echo $_GET['tip'] ?><span class="text-primary">&nbsp;X</span></button>
    </div>

    <div class="as">
      <table class="tabelaa">
        <tr class="aa1">
          <td class="majstor">Majstor</td>
          <td class="ocena">Prosecna ocena</td>
        </tr>
      </table>
      <table class="tabela2">
        <?php
        $limit = ($_GET['p'] - 1) * 7;
        if (isset($_GET['opstina'])) {
          $radnik = $conn->query("SELECT id_fizicko,ime,prezime from ((fizicko_lice INNER JOIN opstine on fizicko_lice.id_opstine = opstine.id_opstine) inner join poslovi on fizicko_lice.posao_id = poslovi.posao_id) where opstine.ime_opstine = '$_GET[opstina]' and poslovi.naziv_posla = '$_GET[posao]';")
            or die($conn->error);
        } else {
          $radnik = $conn->query("SELECT id_fizicko,ime,prezime FROM `fizicko_lice` INNER JOIN poslovi ON fizicko_lice.posao_id = poslovi.posao_id WHERE poslovi.naziv_posla = '$_GET[posao]' LIMIT $limit,7")
            or die($conn->error);
        }
        while ($podatak = $radnik->fetch_assoc()) : ?>
          <tr class="aa">
            <td onclick="getId(this);" class="majstor2" id="<?= $podatak['id_fizicko'] ?>">
              <?= $podatak['ime'] ?>
              <?= $podatak['prezime'] ?>
            </td>
            <td class="ocena2">10.0</td>
          </tr>
        <?php endwhile; ?>
        <tr>
          <td colspan="2" class="page">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-md-end justify-content-center">
                <li class="page-item"><a class="page-link  fs-5" href="#">Nazad</a></li>
                <li class="page-item"><a class="page-link fs-5" id="1" onclick="page(this);">1</a>
                </li>
                <li class="page-item"><a class="page-link fs-5" id="2" onclick="page(this);">2</a>
                </li>
                <li class="page-item"><a class="page-link  fs-5" id="3" onclick="page(this);">3</a>
                </li>
                <li class="page-item"><a class="page-link  fs-5" href="./moler-p2.php">Napred</a>
                </li>
              </ul>
            </nav>
          </td>
        </tr>
      </table>
    </div>


  </div>
  <section id="instructors" class="p-5 bg-primary">
    <div class="container">
      <h1 class="text-center text-white">OCENE MAJSTORA</h1>
      <p class="lead text-center text-white mb-5">
        Recenzije najbolje ocenjenih majstora
      </p>
      <div class="row g-4 pb-5">
        <div class="col-md-6 col-lg-3">
          <div class="card bg-light">
            <div class="card-body text-center">
              <img src="https://randomuser.me/api/portraits/men/11.jpg" class="rounded-circle mb-3" alt="" />
              <h3 class="card-title mb-3">Marko Nikolic</h3>
              <p class="card-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Assumenda accusamus nobis sed cupiditate iusto? Quibusdam.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="card bg-light">
            <div class="card-body text-center">
              <img src="https://randomuser.me/api/portraits/women/11.jpg" class="rounded-circle mb-3" alt="" />
              <h3 class="card-title mb-3">Stefan Markovic</h3>
              <p class="card-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Assumenda accusamus nobis sed cupiditate iusto? Quibusdam.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="card bg-light">
            <div class="card-body text-center">
              <img src="https://randomuser.me/api/portraits/men/12.jpg" class="rounded-circle mb-3" alt="" />
              <h3 class="card-title mb-3">Milos Nikolic</h3>
              <p class="card-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Assumenda accusamus nobis sed cupiditate iusto? Quibusdam.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="card bg-light">
            <div class="card-body text-center">
              <img src="https://randomuser.me/api/portraits/women/12.jpg" class="rounded-circle mb-3" alt="" />
              <h3 class="card-title mb-3">Aleksandar Pavlovic</h3>
              <p class="card-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Assumenda accusamus nobis sed cupiditate iusto? Quibusdam.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="p-5  bg-dark">
    <div class="container text-center text-sm-start">
      <h2 class="nasMajstorNaslov pt-5 text-white display-4">
        POSTANITE NAS MAJSTOR
      </h2>
      <h4 class="text-primary nasMajstorTekst">Besplatno se upisite u nasu bazu majstora brzo i lako u
        par
        koraka
      </h4>
      <div style="text-align: center;">
        <button type="button" class="majstor-button btn buttonn btn-primary text-white py-2 mt-5 fs-4">Register</button>
      </div>
    </div>
  </section>

  <div class="bg-primary ss"></div>
  <!--#region Footer-->
  <footer class="p-4 bg-dark text-white text-center position-relative">
    <div class="container">
      <p class="lead">Copyright &copy; 2022 FixIT</p>
      <a href="#" class="position-absolute bottom-0 end-0 p-4">
        <i class="bi bi-arrow-up-circle h1"></i>
      </a>
    </div>
  </footer>
  <!--#endregion-->
  <script src="https://kit.fontawesome.com/41428e8763.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/sr.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
    var tip = document.getElementById('tipFilter');
    tip.addEventListener('click', function(event) {
      if (event.target.tagName === 'LI') {
        var odabranTip = event.target.textContent;
        if (odabranTip.includes(" ")) {
          odabranTip = odabranTip.replace(/ /g, "-");
        }
        localStorage.setItem('start', window.location.href);
        url = window.location.href + "&tip=" + odabranTip;
        window.location.href = url;
      }
    });

    var dropdownMenu = document.getElementById('opstineFilter');
    if (window.location.search.indexOf('opstina=') > -1) {
      dropdownMenu.addEventListener('click', function(event) {
        if (event.target.tagName === 'LI') {
          let searchParams = new URLSearchParams(window.location.search);
          let currentOpstina = searchParams.get('opstina');
          var newOpstina = event.target.textContent;
          searchParams.set('opstina', newOpstina);
          let newSearchString = searchParams.toString();
          let currentUrlWithoutSearch = window.location.href.split('?')[0];
          let newUrl = currentUrlWithoutSearch + '?' + newSearchString;
          window.location.href = newUrl;
        }
      });
    } else {
      dropdownMenu.addEventListener('click', function(event) {
        if (event.target.tagName === 'LI') {
          var opstina = event.target.textContent;
          localStorage.setItem('start', window.location.href);
          url = window.location.href + "&opstina=" + opstina;
          window.location.href = url;
        }
      });
    }

    function Nazad() {
      window.location.href = localStorage.getItem('start');
    }

    function getId(element) {
      var posao = document.getElementById("ImePosla").textContent.trim().toLocaleLowerCase();
      let id = element.id;
      let naziv = element.textContent;
      window.location.href = "./radnik.php?posao=" + posao + "&id=" + id;
    }

    function page(element) {
      var posao = document.getElementById("ImePosla").textContent.trim().toLocaleLowerCase();
      var page = element.id;
      window.location.href = "./posao.php?posao=" + posao + "&p=" + page;
    }
    flatpickr('#calendar-range', {
      mode: "range",
      minDate: "today",
      dateFormat: "d-m-Y",
      "locale": "sr"
    });
    var expanded = false;

    function showCheckboxes() {
      var checkboxes = document.getElementById("checkboxes");
      if (!expanded) {
        checkboxes.style.display = "block";
        expanded = true;
      } else {
        checkboxes.style.display = "none";
        expanded = false;
      }
    }

    function showCheckboxes2() {
      var checkboxes2 = document.getElementById("checkboxes2");
      if (!expanded) {
        checkboxes2.style.display = "block";
        expanded = true;
      } else {
        checkboxes2.style.display = "none";
        expanded = false;
      }
    }
    $('tr').click(function() {
      window.location = $(this).find('a').attr('href');
    }).hover(function() {
      $(this).toggleClass('hover');
    });
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#delatnost-levo").change(function() {
        var selectedOption = $(this).children("option:selected").val();
        $.ajax({
          type: "POST",
          url: "./appdata/ajax.php",
          data: {
            option: selectedOption
          },
          success: function(response) {
            $("#vrstaPosla").html(response); // Update the content of the #result div with the selected value
          }
        });
      });
    });
  </script>
  <script>
    $(function() {
      $('#RegisterFL').click(function(e) {

        var valid = this.form.checkValidity();

        if (valid) {

          var ime = $('#ime-fizicko').val();
          var prezime = $('#prezime-fizicko').val();
          var email = $('#email-fizicko').val();
          var br_tel = $('#telefon-fizicko').val();
          var JMBG = $('#jmbg-fizicko').val();
          var sifra = $('#sifra-fizicko').val();
          var adresa = $('#adresa').val();
          var id_delatnosti = $('#delatnost-levo').val();
          var posao_id = $('#vrstaPosla').val();
          var id_opstine = $('#opstina').val();

          e.preventDefault();

          $.ajax({
            type: 'POST',
            url: './appdata/process.php',
            data: {
              ime: ime,
              prezime: prezime,
              email: email,
              sifra: sifra,
              JMBG: JMBG,
              id_opstine: id_opstine,
              adresa: adresa,
              id_delatnosti: id_delatnosti,
              posao_id: posao_id,
              br_tel: br_tel,
            },

            success: function(data) {
              Swal.fire({
                icon: 'success',
                title: 'Regitracija',
                text: data,
                type: 'success',
                confirmButtonColor: '#64B245'

              }).then((result) => {
                if (result.isConfirmed) {
                  setTimeout(function() {
                    window.location.reload();
                  }, 200);
                  document.getElementById('ime-fizicko').value = '';
                  document.getElementById('prezime-fizicko').value = '';
                  document.getElementById('email-fizicko').value = '';
                  document.getElementById('telefon-fizicko').value = '';
                  document.getElementById('jmbg-fizicko').value = '';
                  document.getElementById('sifra-fizicko').value = '';
                  document.getElementById('adresa').value = '';
                  document.getElementById('potvrda-sifre').value = '';
                  document.getElementById("delatnost-levo").selectedIndex = 0;
                  document.getElementById('vrstaPosla').selectedIndex = 0;
                  document.getElementById('opstina').selectedIndex = 0;
                }
              })
            },
            error: function(data) {
              Swal.fire({
                icon: 'error',
                title: 'Regitracija',
                text: 'Greska tokom cuvanja podataka!',
                confirmButtonColor: '#64B245'
              })
            }
          });
        } else {
          Swal.fire({
            icon: 'warning',
            title: 'Regitracija',
            text: 'Niste uneli neki od podataka!',
            confirmButtonColor: '#64B245'
          })
        }
      });
    });
    $(function() {
      $('#RegisterF').click(function(e) {

        var valid = this.form.checkValidity();

        if (valid) {

          var imeFirme = $('#IME-FIRME').val();
          var imeVlasnika = $('#IME-I-PREZIME-VLASNIKA').val();
          var email = $('#EMAIL-FIRME').val();
          var sifra = $('#SIFRA-FIRME').val();
          var id_delatnosti = $('#DELATNOST-FIRMA').val();
          var posao = $('#VRSTA-POSLA-FIRMA').val();
          var id_opstine = $('#OPSTINA-FIRMA').val();
          var adresa = $('#ADRESA-FIRME').val();

          e.preventDefault();

          $.ajax({
            type: 'POST',
            url: './appdata/processFirma.php',
            data: {
              imeFirme: imeFirme,
              imeVlasnika: imeVlasnika,
              email: email,
              sifra: sifra,
              id_opstine: id_opstine,
              adresa: adresa,
              id_delatnosti: id_delatnosti,
              posao: posao,
            },

            success: function(data) {
              Swal.fire({
                icon: 'success',
                title: 'Regitracija',
                text: data,
                type: 'success',
                confirmButtonColor: '#64B245'

              }).then((result) => {
                if (result.isConfirmed) {
                  setTimeout(function() {
                    window.location.reload();
                  }, 200);
                  document.getElementById('IME-FIRME').value = '';
                  document.getElementById('IME-I-PREZIME-VLASNIKA').value = '';
                  document.getElementById('EMAIL-FIRME').value = '';
                  document.getElementById('SIFRA-FIRME').value = '';
                  document.getElementById('DELATNOST-FIRMA').value = '';
                  document.getElementById('VRSTA-POSLA-FIRMA').value = '';
                  document.getElementById('OPSTINA-FIRMA').value = '';
                  document.getElementById('ADRESA-FIRME').value = '';
                  document.getElementById('potvrda-sifre').value = '';
                  document.getElementById("VRSTA-POSLA-FIRMA").selectedIndex = 0;
                  document.getElementById('DELATNOST-FIRMA').selectedIndex = 0;
                  document.getElementById('OPSTINA-FIRMA').selectedIndex = 0;
                }
              })
            },
            error: function(data) {
              Swal.fire({
                icon: 'error',
                title: 'Regitracija',
                text: 'Greska tokom cuvanja podataka!',
                confirmButtonColor: '#64B245'
              })
            }
          });
        } else {
          Swal.fire({
            icon: 'warning',
            title: 'Regitracija',
            text: 'Niste uneli neki od podataka!',
            confirmButtonColor: '#64B245'
          })
        }
      });
    });
    $(function() {
      $('#RegisterK').click(function(e) {
        var valid = this.form.checkValidity();

        if (valid) {

          var ime = $('#IME-KORISNIKA').val();
          var prezime = $('#PREZIME-KORISNIKA').val();
          var email = $('#EMAIL-KORISNIKA').val();
          var sifra = $('#SIFRA-KORISNIKA').val();
          var adresa = $('#adresa').val();
          var id_delatnosti = $('#delatnost-levo').val();
          var posao_id = $('#vrstaPosla').val();
          var id_opstine = $('#opstina').val();

          e.preventDefault();

          $.ajax({
            type: 'POST',
            url: './appdata/processKorisnik.php',
            data: {
              ime: ime,
              prezime: prezime,
              email: email,
              sifra: sifra
            },

            success: function(data) {
              Swal.fire({
                icon: 'success',
                title: 'Regitracija',
                text: data,
                type: 'success',
                confirmButtonColor: '#64B245'

              }).then((result) => {
                if (result.isConfirmed) {
                  setTimeout(function() {
                    window.location.reload();
                  }, 200);
                  document.getElementById('IME-KORISNIKA').value = '';
                  document.getElementById('PREZIME-KORISNIKA').value = '';
                  document.getElementById('EMAIL-KORISNIKA').value = '';
                  document.getElementById('SIFRA-KORISNIKA').value = '';
                }
              })

            },
            error: function(data) {
              Swal.fire({
                icon: 'error',
                title: 'Regitracija',
                text: 'Greska tokom cuvanja podataka!',
                confirmButtonColor: '#64B245'
              })
            }
          });
        } else {
          Swal.fire({
            icon: 'warning',
            title: 'Regitracija',
            text: 'Niste uneli neki od podataka!',
            confirmButtonColor: '#64B245'
          })
        }
      });
    });
    $(function() {
      $('#prijavi-se').click(function(e) {

        var valid = this.form.checkValidity();

        if (valid) {
          var email = $('#loginMail').val();
          var sifra = $('#loginSifra').val();
          if ($('#remember-me').prop('checked')) {
            var rememberMe = 'true';
          } else
            rememberMe = 'false';
          e.preventDefault();

          $.ajax({
            type: 'POST',
            url: './appdata/login.php',
            data: {
              email: email,
              sifra: sifra,
              rememberMe: rememberMe
            },
            success: function(data) {
              if (data == "Neki od podataka nisu tacni!") {
                Swal.fire({
                  icon: 'warning',
                  title: 'Prijava',
                  text: data,
                  confirmButtonColor: '#64B245'
                })
              } else
                Swal.fire({
                  icon: 'success',
                  title: 'Prijava',
                  text: data,
                  type: 'success',
                  confirmButtonColor: '#64B245'
                }).then((result) => {
                  if (result.isConfirmed) {
                    setTimeout(function() {
                      window.location.reload();
                    }, 200);
                    document.getElementById('loginMail').value = '';
                    document.getElementById('loginSifra').value = '';
                  }
                })
            },
            error: function(data) {
              Swal.fire({
                icon: 'warning',
                title: 'Prijava',
                text: data,
                confirmButtonColor: '#64B245'
              })
            }
          });
        } else {
          Swal.fire({
            icon: 'warning',
            title: 'Prijava',
            text: 'Niste uneli podatke!',
            confirmButtonColor: '#64B245'
          })
        }
      });
    });
  </script>
</body>

</html>