<!DOCTYPE html>
<?php
require_once('./appdata/config.php');
session_start();
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION);
  setcookie('email', '', time() - 3600, "/");
  setcookie('sifra', '', time() - 3600, "/");
  header("Location: onama.php");
}
?>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="appdata/main.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="appdata/styleV7.css" />
  <link rel="stylesheet" href="appdata/saznajVise.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="slike/Ikonice/FAVICON2.png" type="image/x-icon">
  <link rel="stylesheet" href="./appdata/modal_styleV5.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,700&family=Fugaz+One&family=Inter&family=Montserrat:wght@500&family=Nunito&family=Rowdies:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,700&family=Fugaz+One&family=Inter&family=Montserrat:wght@500&family=Rowdies:wght@700&family=Russo+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,700&family=Fugaz+One&family=Montserrat:wght@500&family=Rowdies:wght@700&family=Russo+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,700&family=Montserrat:wght@500&family=Russo+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <title>O nama</title>
</head>

<body>
  <?php
  $host = "localhost";
  $dbusername = "root"; //fixitinr_fixit
  $dbpassword = ""; //9KD!Co9]B+D*
  $dbname = "fixitinr_fixit"; //fixitinr_fixit
  $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
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
                <form action="onama.php" method="post">
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
              <div class="col-xl-6"><img src="./register_images/fizickolice_register.jpg" class="register-img img-fluid w-100 h-100 d-none d-xl-block" alt="Responsive image"></div>
              <div class="col">
                <form action="onama.php" method="post">
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
              <li><a href="onama.php?logout=true" class="dropdown-item hover-element text-white" href="#">Odjavi se</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--#endregion -->

  <!--#region UnderNavBar-->
  <section class="bg-dark text-light p-3 pt-0 text-center text-sm-start pb-5">
    <div class="container">
      <div class="d-sm-flex align-items-center justify-content-between">
        <div>
          <h1 class="display-2 display-font pt-3">
            UPOZNAJTE <span class="text-primary" style="font-family:Grifter">NAS</span>
          </h1>
          <p class="hero-text pt-1">
            Tim čine učenici Tehničke škole Mladenovac četvrte godine smera <br>Elektrotehničar Informacionih Tehnologija.<br />
          </p>
        </div>
        <!--SLIKA DODJE OVDE-->
        <!--DODAT PT=3 U SLIKU-->
        <img class="img-fluid w-35 d-none d-lg-block pt-4 pb-4" src="./slike/team1.png" alt="radnik" />
      </div>
    </div>
  </section>
  <!-- #endregion -->
  <!-- #region Ostatak-->
  <section class="bg-primary p-5 ">
    <div class="container">
      <div class="d-sm-flex team-profiles">

        <!--DODATI NESTO-->
        <button type="button" class="btn-custom3 mt-1 mx-auto" onclick="location.href='#a'">
          FRONTEND
        </button>
        <button type="button" class="btn-custom3 mt-1 mx-auto onclick=" location.href='#v'">
          BACKEND
        </button>
        <button id=" a" type="button" class="btn-custom3 mt-1 mx-auto" onclick="location.href='#c'">
          UI/UX DESIGNERS
        </button>
      </div>
    </div>
  </section>

  <section class="p-5">
    <div class="container">
      <h1 class="display-2 display-font fs-1 pt-5 pb-4">DEVELOPERS: <span class="text-primary display-font">FRONTEND </span></h1>
      <div class="row text-center g-4">
        <div class="col-md">
          <div class="card bg-dark text-light">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <i class="bi bi-file-earmark-code-fill"></i>
              </div>
              <h3 class="card-title mb-3 ">Stefan <span class="imeDrugiRed">Ilić</span></h3>
              <p class="card-text">Programer</p>
              <button class="btn btn-primary text-light " data-bs-toggle="modal" data-bs-target="#ImePrezime-stefani">SAZNAJ VIŠE</button>
            </div>
          </div>
        </div>
        <div class="col-md">
          <div class="card bg-dark text-light">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <i class="bi bi-file-earmark-code-fill"></i>
              </div>
              <h3 class="card-title mb-3">Mihajlo <span class="imeDrugiRed"></span>Jovanović</span></h3>
              <p class="card-text">Programer</p>
              <button class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#ImePrezime-mihajloj">SAZNAJ VIŠE</button>
            </div>
          </div>
        </div>
        <div class="col-md">
          <div class="card bg-dark text-light">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <i class="bi bi-file-earmark-code-fill"></i>
              </div>
              <h3 class="card-title mb-3">Andrija <span class="imeDrugiRed">Andrejić</span></h3>
              <p class="card-text">Programer</p>
              <button class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#ImePrezime-andrijaa">SAZNAJ VIŠE</button>
            </div>
          </div>
        </div>
        <div class="col-md">
          <div class="card bg-dark text-light h-100">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <i class="bi bi-file-earmark-code-fill"></i>
              </div>
              <h3 class="card-title mb-3 fs-4">Mateja <span class="imeDrugiRed"> Milentijević</span></h3>
              <p class="card-text">Programer</p>
              <button id="v" class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#ImePrezime-matejam">SAZNAJ
                VIŠE</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class=" p-5">
    <div class="container">
      <h1 class="display-2 display-font fs-1 pb-4">DEVELOPERS: <span class="text-primary display-font">BACKEND </span></h1>
      <div class="row text-center g-4">
        <div class="col-md">
          <div class="card bg-dark text-light">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <i class="bi bi-clipboard-data"></i>
              </div>
              <h3 class="card-title mb-3">Relja Stojanović</h3>
              <p class="card-text">Database coordinator</p>
              <button class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#ImePrezime-reljas">SAZNAJ VIŠE</button>
            </div>
          </div>
        </div>
        <div class="col-md">
          <div class="card bg-dark text-light">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <i class="bi bi-clipboard-data"></i>
              </div>
              <h3 class="card-title mb-3">Stefan Ilić</h3>
              <p class="card-text">Database coordinator</p>
              <button class="btn btn-primary text-light" id="c" data-bs-toggle="modal" data-bs-target="#ImePrezime-stefani">SAZNAJ VIŠE</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="p-5 pb-5">
    <div class="container">
      <h1 class="display-2 display-font fs-1 pb-4">WEB DESIGNERS: <span class="text-primary display-font">UI/UX</span> </h1>
      <div class="row text-center g-4">
        <div class="col-md">
          <div class="card bg-dark text-light">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <i class="bi bi-brush"></i>
              </div>
              <h3 class="card-title mb-3">Stefan Brkić</h3>
              <p class="card-text">UI/UX & Graphic Designer</p>
              <button class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#ImePrezime-stefanb">SAZNAJ VIŠE</button>
            </div>
          </div>
        </div>
        <div class="col-md">
          <div class="card bg-dark text-light">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <i class="bi bi-brush"></i>
              </div>
              <h3 class="card-title mb-3">Mateja Živanović</h3>
              <p class="card-text">UI/UX & Graphic Designer</p>
              <button class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#ImePrezime-matejaz">SAZNAJ VIŠE</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="learn" class="p-5">
    <div class="container">
      <div class="row align-items-center justify-content-between">
        <div class="col-md">
          <img class="img-fluid pb-3" src="./slike/programmers2.png" alt="" />
        </div>
        <div class="col-md">
          <h1 class="display-2 display-font pt-5 pb-4 fs-2">PODRZITE <span class="display-font text-primary">NAS</span> </h2>

            <p class="hero-text">
              Vaša podrška nam omogućava da doprinesemo zajednici kroz nove i inovativne projekte. Vaša donacija je od vitalnog značaja za nas i svaki iznos se ceni. Za donaciju, jednostavno kliknite na dugme ispod i pratite uputstva. Za više informacija ili pitanja o našem radu, slobodno nas kontaktirajte. Hvala Vam na podršci i poverenju.

            </p>
            <div class="btn-doniraj text-center">
              <button class="btn-custom4 btn-custom4-1">DONIRAJ</button>
            </div>
        </div>
      </div>
    </div>
  </section>

  <section class="head bg-dark pb-5">
    <div class="container">
      <div class="card border-dark bg-dark">
        <div class="card-body">
          <h1 id="r" class="font-weight-light text-center py-3 my-3 display-2 display-font pt-3 fs-2"><span class="text-primary display-font">CONTACT</span><span class="text-white display-font"> US</span></h1>
          <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="row pt-3">
                <div class="col-lg-1 offset-1 col-md-2 col-sm-2 col-2">

                </div>
                <div class="col-12">
                  <h3 class="text-white contact-text pb-4">
                    Slobodno nas kontaktirajte za bilo kakva pitanja, predloge ili saradnju - mi smo tu da vam pomognemo!
                    <br /><br />
                    <span class="text-primary display-font">TU SMO ZA VAS!</span>
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-6">


              <form>
                <div class="d-sm-flex flex-wrap">
                  <div class="flex-fill me-md-3">
                    <div class="form-group">
                      <label for="name" class="form-label">Ime</label>
                      <input type="text" class="form-control" id="name" placeholder="Unesite ime">
                    </div>
                  </div>
                  <div class="flex-fill ">
                    <div class="form-group ">
                      <label for="surname" class="form-label">Prezime</label>
                      <input type="text" class="form-control" id="surname" placeholder="Unesite prezime">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="form-label">Email adresa</label>
                  <input type="email" class="form-control" id="email" placeholder="Unesite email adresu">
                </div>
                <div class="form-group">
                  <label for="message" class="form-label">Poruka</label>
                  <textarea class="form-control" id="message" rows="3"></textarea>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn-custom4 btn-custom4-1 btn-doniraj">Pošalji</button>
                </div>
              </form>


            </div>
          </div>
        </div>

      </div>

    </div>


  </section>
  <!--#endregion-->
  <!--#region ViseONamaMateja -->
  <div class="modal fade" id="ImePrezime-matejam">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-2 bg-dark text-white">
        <div class="modal-header">
          <h2 class="ime"><b>Mateja Milentijević</b></h2>
          <button class="btn-close p-4" data-bs-dismiss="modal" data-bs-target="ImePrezime"></button>
        </div>
        <div class="modal-body">

          <div class="row row-cols-2">

            <div class="col-8">
              <h5 class="levi-tekst">
                <h4 class="mb-0 text-center text-sm-start">Tehnička Škola Mladenovac</h4>
                </br>
                <p class="smer-it text-center text-sm-start">Elektrotehničar Informacionih Tehnologija
                <p>
                <p class="mejl mb-0 text-center text-sm-start">matejamilentijevic1205@gmail.com</h>
                  <h class="broj mb-1">tel: 061/26-34-945
                </p>
            </div>
            <div class="col-4"><img src="./slike/O nama/mateja.jpg" class="img-fluid profilna" alt="Responsive image"></div>
          </div>


          <div class="razdvoj"></div>
          <div class="row row-cols-1">
            <div class="col">
              <h6 class="donji-tekst">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Soluta,
                iusto doloribus placeat fuga, illum optio vitae cupiditate corrupti, fugiat blanditiis
                accusamus numquam maxime provident officia.</h6>
            </div>
          </div>
        </div>

        <div class="modal-footer d-flex justify-content-between">
          <img src="./slike/logo/Logo(white).svg" class="img-fluid fixit-sv" alt="Responsive image">
          <p style="padding: left 1em;"><b>Programer</b></p>
        </div>
      </div>
    </div>
  </div>
  <!--#endregion -->
  <!--#region ViseONamaStefanI -->
  <div class="modal fade" id="ImePrezime-stefani">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-2 bg-dark text-white">
        <div class="modal-header">
          <h2 class="ime"><b>Stefan Ilić</b></h2>
          <button class="btn-close p-4" data-bs-dismiss="modal" data-bs-target="ImePrezime"></button>
        </div>
        <div class="modal-body">

          <div class="row row-cols-2">

            <div class="col-8">
              <h5 class="levi-tekst">
                <h4 class="mb-0 text-center text-sm-start">Tehnička Škola Mladenovac</h4>
                </br>
                <p class="smer-it text-center text-sm-start">Elektrotehničar Informacionih Tehnologija
                <p>
                <p class="mejl mb-0 text-center text-sm-start">ilic.stefann4@gmail.com
                </p>
                <p class="mt-2">tel: 064/98-27-168</p>
            </div>
            <div class="col-4"><img src="./slike/O nama/stefan.jpg" class="img-fluid profilna" alt="Responsive image"></div>
          </div>


          <div class="razdvoj"></div>
          <div class="row row-cols-1">
            <div class="col">
              <h6 class="donji-tekst"></h6>
            </div>
          </div>
        </div>

        <div class="modal-footer d-flex justify-content-between">
          <img src="./slike/logo/Logo(white).svg" class="img-fluid fixit-sv" alt="Responsive image">
          <p style="padding: left 1em;"><b>Programer</b></p>
        </div>
      </div>
    </div>
  </div>
  <!--#endregion -->
  <!--#region ViseOMihajloJ -->
  <div class="modal fade" id="ImePrezime-mihajloj">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-2 text-white bg-dark">
        <div class="modal-header">
          <h2 class="ime"><b>Mihajlo Jovanović</b></h2>
          <button class="btn-close p-4" data-bs-dismiss="modal" data-bs-target="ImePrezime"></button>
        </div>
        <div class="modal-body">

          <div class="row row-cols-2">

            <div class="col-8">
              <h5 class="levi-tekst">
                <h4 class="mb-0 text-center text-sm-start">Tehnička Škola Mladenovac</h4>
                </br>
                <p class="smer-it text-center text-sm-start">Elektrotehničar Informacionih Tehnologija
                <p>
                <p class="mejl mb-0 text-center text-sm-start">mihajlojovanovic007@gmail.com
                </p>
                <p class="mt-2">tel: 061/25-82-368</p>
            </div>
            <div class="col-4"><img src="./slike/O nama/mihajlo.jpg" class="img-fluid profilna" alt="Responsive image"></div>
          </div>


          <div class="razdvoj"></div>
          <div class="row row-cols-1">
            <div class="col">
              <h6 class="donji-tekst">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum
                quis id, repellendus quibusdam corporis asperiores, magnam assumenda possimus commodi
                labore similique? Ea voluptas eos minus!</h6>
            </div>
          </div>
        </div>

        <div class="modal-footer d-flex justify-content-between">
          <img src="./slike/logo/Logo(white).svg" class="img-fluid fixit-sv" alt="Responsive image">
          <p style="padding: left 1em;"><b>Programer</b></p>
        </div>
      </div>
    </div>
  </div>
  <!--#endregion -->
  <!--#region ViseONamaAndrijaA -->
  <div class="modal fade" id="ImePrezime-andrijaa">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-2 bg-dark text-white">
        <div class="modal-header">
          <h2 class="ime"><b>Andrija Andrejić</b></h2>
          <button class="btn-close p-4" data-bs-dismiss="modal" data-bs-target="ImePrezime"></button>
        </div>
        <div class="modal-body">

          <div class="row row-cols-2">

            <div class="col-8">
              <h5 class="levi-tekst">
                <h4 class="mb-0 text-center text-sm-start">Tehnička Škola Mladenovac</h4>
                </br>
                <p class="smer-it text-center text-sm-start">Elektrotehničar Informacionih Tehnologija
                <p class="mejl mb-0 text-center text-sm-start">aki.andrejic123@gmail.com
                </p>
                <p class="mt-2">tel: 064/33-66-999</p>
            </div>
            <div class="col-4"><img src="./slike/O nama/andrija.jpg" class="img-fluid profilna" alt="Responsive image"></div>
          </div>


          <div class="razdvoj"></div>
          <div class="row row-cols-1">
            <div class="col">
              <h6 class="donji-tekst">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt rem
                reprehenderit dolor ipsum hic accusamus fugit eum quibusdam magni, mollitia nulla harum
                esse ea consequuntur!</h6>
            </div>
          </div>
        </div>

        <div class="modal-footer d-flex justify-content-between">
          <img src="./slike/logo/Logo(white).svg" class="img-fluid fixit-sv" alt="Responsive image">
          <p style="padding: left 1em;"><b>Programer</b></p>
        </div>
      </div>
    </div>
  </div>
  <!--#endregion -->
  <!--#region ViseONamaReljaS-->
  <div class="modal fade" id="ImePrezime-reljas">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-2 bg-dark text-white">
        <div class="modal-header">
          <h2 class="ime"><b>Relja Stojanović</b></h2>
          <button class="btn-close p-4" data-bs-dismiss="modal" data-bs-target="ImePrezime"></button>
        </div>
        <div class="modal-body">

          <div class="row row-cols-2">

            <div class="col-8">
              <h5 class="levi-tekst">
                <h4 class="mb-0 text-center text-sm-start">Tehnička Škola Mladenovac</h4>
                </br>
                <p class="smer-it text-center text-sm-start">Elektrotehničar Informacionih Tehnologija
                <p class="mejl mb-0 text-center text-sm-start">relja.stojanovic12@gmail.com
                </p>
                <p class="mt-2">tel: 060/13-52-676</p>
            </div>
            <div class="col-4"><img src="./slike/O nama/relja.jpg" class="img-fluid profilna" alt="Responsive image"></div>
          </div>


          <div class="razdvoj"></div>
          <div class="row row-cols-1">
            <div class="col">
              <h6 class="donji-tekst">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt rem
                reprehenderit dolor ipsum hic accusamus fugit eum quibusdam magni, mollitia nulla harum
                esse ea consequuntur!</h6>
            </div>
          </div>
        </div>

        <div class="modal-footer d-flex justify-content-between">
          <img src="./slike/logo/Logo(white).svg" class="img-fluid fixit-sv" alt="Responsive image">
          <p style="padding: left 1em;"><b>Database coordinator</b></p>
        </div>
      </div>
    </div>
  </div>
  <!--#endregion -->
  <!--#endregion -->
  <!--#region ViseONamaMatejaZ -->
  <div class="modal fade" id="ImePrezime-matejaz">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-2 bg-dark text-white">
        <div class="modal-header">
          <h2 class="ime"><b>Mateja Živanović</b></h2>
          <button class="btn-close p-4" data-bs-dismiss="modal" data-bs-target="ImePrezime"></button>
        </div>
        <div class="modal-body">

          <div class="row row-cols-2">

            <div class="col-8">
              <h5 class="levi-tekst">
                <h4 class="mb-0 text-center text-sm-start">Tehnička Škola Mladenovac</h4>
                </br>
                <p class="smer-it text-center text-sm-start">Elektrotehničar Multimedija</p>
                <p class="mejl mb-0 text-center text-sm-start">littlemaki05@gmail.com</h>
                </p>
                <p class="mt-2">tel: 064/03-30-611</p>
            </div>
            <div class="col-4"><img src="./slike/O nama/zivanovic.jpg" class="img-fluid profilna" alt="Responsive image"></div>
          </div>


          <div class="razdvoj"></div>
          <div class="row row-cols-1">
            <div class="col">
              <h6 class="donji-tekst">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere
                consequuntur, obcaecati vel modi autem dicta maxime ex magnam pariatur aliquam error
                animi enim. Facilis, ratione.</h6>
            </div>
          </div>
        </div>

        <div class="modal-footer d-flex justify-content-between">
          <img src="./slike/logo/Logo(white).svg" class="img-fluid fixit-sv" alt="Responsive image">
          <p style="padding: left 1em;"><b>Graphics Designer</b></p>
        </div>
      </div>
    </div>
  </div>
  <!--#endregion -->
  <!--#region ViseONamaStefanB -->
  <div class="modal fade" id="ImePrezime-stefanb">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-2 bg-dark text-white">
        <div class="modal-header">
          <h2 class="ime"><b>Stefan Brkić</b></h2>
          <button class="btn-close p-4" data-bs-dismiss="modal" data-bs-target="ImePrezime"></button>
        </div>
        <div class="modal-body">

          <div class="row row-cols-2">

            <div class="col-8">
              <h5 class="levi-tekst">
                <h4 class="mb-0 text-center text-sm-start">Tehnička Škola Mladenovac</h4>
                </br>
                <p class="smer-it text-center text-sm-start">Elektrotehničar Informacionih Tehnologija
                </p>
                <p class="mejl mb-0 text-center text-sm-start">stefanbrkicdzn.contact@gmail.com</h>
                </p>
                <p class="mt-2">tel: 062/87-14-081</p>
            </div>
            <div class="col-4"><img src="./slike/O nama/brkic.jpg" class="img-fluid profilna" alt="Responsive image"></div>
          </div>


          <div class="razdvoj"></div>
          <div class="row row-cols-1">
            <div class="col">
              <h6 class="donji-tekst">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere
                consequuntur, obcaecati vel modi autem dicta maxime ex magnam pariatur aliquam error
                animi enim. Facilis, ratione.</h6>
            </div>
          </div>
        </div>

        <div class="modal-footer d-flex justify-content-between">
          <img src="./slike/logo/Logo(white).svg" class="img-fluid fixit-sv" alt="Responsive image">
          <p style="padding: left 1em;"><b>Graphics Designer</b></p>
        </div>
      </div>
    </div>
  </div>
  <!--#region Footer-->
  <footer class=" p-2 bg-dark text-white text-center position-relative">
    <div class="container">
      <p class="lead">Copyright &copy; 2022 FixIT</p>
      <a href="#" class="position-absolute bottom-0 end-0 p-2">
        <i class="bi bi-arrow-up-circle h1"></i>
      </a>
    </div>
  </footer>
  <!--#endregion-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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