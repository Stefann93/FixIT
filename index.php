<?php
require_once('./appdata/config.php');
session_start();
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION);
  setcookie('email', '', time() - 3600, "/");
  setcookie('sifra', '', time() - 3600, "/");
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- CSS only -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link href="appdata/main.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!--#region Tekst-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <!--#endregion-->
  <link rel="stylesheet" href="appdata/styleV9.css" />
  <link rel="shortcut icon" href="slike/Ikonice/FAVICON2.png" type="image/x-icon">
  <link rel="stylesheet" href="./appdata/modal_styleV6.css" />
  <title>FixIT</title>
</head>

<body>
  <?php
  $host = "localhost";
  $dbusername = "fixitinr_fixit"; //fixitinr_fixit
  $dbpassword = "9KD!Co9]B+D*"; //9KD!Co9]B+D*
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
            <form action="appdata/login.php" method="POST">
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

  <!--#region Uslovi koriscenja modal-->
  <div class="modal fade" id="usloviModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable ">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h5 class="modal-title text-light">Uslovi korišćenja</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body m-4 uslovi-text">
          <p>Molimo Vas da pažljivo pročitate ove uslove korišćenja pre upotrebe našeg sajta. Korišćenjem našeg sajta, slažete se sa svim ovim uslovima. Ako se ne slažete sa ovim uslovima, molimo Vas da ne koristite naš sajt.<br><br>

            Sva autorska prava na ovaj sajt i njegov sadržaj (tekstovi, slike, grafike, logoi, ikone, audio i video zapisi, itd.) pripadaju nama ili našim licenciranim partnerima. Nije dozvoljeno kopiranje, reprodukovanje, distribuiranje, objavljivanje, preuzimanje, prikazivanje ili prenošenje bilo kog dela ovog sajta bez prethodne pisane dozvole.<br><br>

            Mi ćemo činiti razumne napore da održimo tačnost i ažurnost informacija na ovom sajtu, ali ne garantujemo da su sve informacije tačne, potpune i ažurne u svakom trenutku. Mi zadržavamo pravo da u bilo koje vreme i bez prethodne najave, izmenimo ili uklonimo sadržaj sa ovog sajta.<br>

            Ovaj sajt može sadržati linkove do drugih sajtova. Mi ne kontrolišemo ove sajtove i ne snosimo odgovornost za njihov sadržaj ili za bilo kakve gubitke ili štete koje mogu nastati kao posledica korišćenja ovih sajtova.<br><br>

            Naš sajt služi kao platforma za povezivanje pružalaca usluga i korisnika njihovih usluga. Mi ne snosimo odgovornost za bilo kakve prevare, nesporazume ili štete koje se mogu desiti između pružaoca usluga i korisnika usluga. Korisnici našeg sajta su odgovorni za provjeru kvaliteta usluga koje pružaju pružaoci usluga, kao i za pregovaranje uslova usluga direktno sa pružaocima usluga.<br>

            Sva lična informacija koju prikupljamo od korisnika ovog sajta će biti obrađena u skladu sa našom Politikom privatnosti. Mi ćemo koristiti ove informacije samo u svrhu pružanja usluga na ovom sajtu i nećemo ih deliti sa trećim stranama osim u slučajevima kada je to neophodno za pružanje usluga, kao što je posredovanje u kontaktu između korisnika i pružaoca usluga. Korisnici ovog sajta mogu u bilo kom trenutku zatražiti pristup, izmenu ili brisanje svojih ličnih informacija putem našeg Kontakt obrasca."<br><br>

            Ova odredba bi trebalo da obezbedi korisnicima da se osećaju sigurno i zaštićeno kada koriste naš sajt i da znaju da se njihove lične informacije obrađuju u skladu sa relevantnim zakonima i pravilima o privatnosti.<br><br>

            Korišćenje ovog sajta i ovih uslova korišćenja regulisano je zakonima Republike Srbije. Svi sporovi koji proisteknu iz ili u vezi sa ovim uslovima korišćenja ili ovog sajta biće rešeni isključivo pred nadležnim sudom u Beogradu, Republika Srbija."<br></p>
          <div class="tacbox">
            <input id="checkbox1" type="checkbox" />
            <label for="checkbox">Pročitao sam i slažem se sa <span class="green-color-text2">Uslovima korišćenja</span>.</label>
          </div>
        </div>
        <div class="modal-footer nextbutton-center">

          <button id="nextbutton" class="btn-custom text-light" data-bs-toggle="modal" data-bs-target="#registerModal" disabled>Sledeće</button>
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
                <form action="index.php" method="post">
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
                <form action="index.php" method="post">
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
                                        } ?>" data-bs-toggle="modal" data-bs-target="#usloviModal">Registruj se</a>
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
              <li><a href="index.php?logout=true" class="dropdown-item hover-element text-white" href="#">Odjavi se</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--#endregion -->
  <!--#region underHeader -->
  <section class="bg-dark text-light pt-0 text-center text-sm-start">
    <div class="container">
      <div class="d-sm-flex align-items-xxl-center align-items-md-end justify-content-between">
        <div>
          <h1 class="display-2 display-font pt-3">
            SVI MAJSTORI <br><span class="text-primary display-font2"> NA </span> <span class="text-primary display-font3">JEDNOM MESTU</span>
          </h1>
          <div class=" phone-text">
            <p>Pretražite našu bazu majstora ili ih izlistajte po delatnostima. <span class="hero-text"> Direktno
                stupite u kontakt sa majstorom i angažujte majstora u vremenskom periodu koji vama odgovara.</span></p>
          </div>
          <div class="input-group trazi pt-4">
            <input type="text" class="form-control search-bar" placeholder="Pronadji majstora..." id="search" />
            <button class="btn btn-primary btn-lg text-light search-button" type="button" onclick="Pretraga()">Pretraži</button>
          </div>

          <div class="popular pt-4 d-md-flex align-items-baseline">
            <strong class="popular-text">Popularno:</strong>
            <a href="./posao.php?posao=moler&p=1" class="btn btn-outlined">Moler</a>
            <a href="./posao.php?posao=zidar&p=1" class="btn btn-outlined">Zidar</a>
            <a href="./posao.php?posao=elekricar&p=1" class="btn btn-outlined">Električar</a>
            <a href="./posao.php?posao=obucar&p=1" class="btn btn-outlined">Obućar</a>
            <a href="./posao.php?posao=vulkanizer&p=1" class="btn btn-outlined">Vulkanizer</a>
          </div>
          <div class="pt-4 phone2-text">
            <p>Pretražite našu bazu majstora ili ih izlistajte po delatnostima. <span class="hero-text"> Direktno
                stupite u kontakt sa majstorom i angažujte majstora u vremenskom periodu koji vama odgovara.</span></p>
          </div>

          <br><br>
        </div>
        <img class="img-fluid w-40 d-none d-lg-block" src="slike/heroimage.png" alt="radnik" />
      </div>
    </div>
  </section>
  <section class="bg-primary p-5 section ">

  </section>
  <!--#endregion -->
  <!--#region Poslovi-->
  <section>
    <div class="container-sm">
      <div class="row text-center poslovii">
        <div class="text-center mt-5 pt-2">
          <h1 class="naslov1"><span class="text-primary naslov1">MAJSTORI</span> PO DELATNOSTIMA</h1>
        </div>
        <a href="./delatnost.php?delatnost=gradjevinski-radovi" class="col-6 col-lg-3 ada mt-3">
          <div>
            <img src="./slike/Ikonice/GRADJEVINA.svg" alt="" class="img-fluid ikonice" />
            <h5 class="text-dark pt-4"><strong>Građevina</strong> </h5>
          </div>
        </a>
        <a href="./delatnost.php?delatnost=elektrika" class="col-6 col-lg-3 ada mt-3">
          <div>
            <img src="./slike/Ikonice/ELEKTRONIKA.svg" alt="" class="img-fluid ikonice " />
            <h5 class="text-dark pt-4"><strong>Elektrika</strong> </h5>
          </div>
        </a>
        <a href="./delatnost.php?delatnost=odrzavanje" class="col-6 col-lg-3 ada mt-3">
          <div>
            <img src="./slike/Ikonice/ODRZAVANJE.svg" alt="" class="img-fluid ikonice" />
            <h5 class="text-dark pt-4"><strong>Održavanje</strong> </h5>
          </div>
        </a>
        <a href="./delatnost.php?delatnost=cevne-instalacije" class="col-6 col-lg-3 ada mt-3 ">
          <div>
            <img src="./slike/Ikonice/CEVNEINSTALACIJE.svg" alt="" class="img-fluid ikonice" />
            <h5 class="text-dark pt-4"><strong>Cevne instalacije</strong> </h5>
          </div>
        </a>
        <a href="./delatnost.php?delatnost=obrada-materijala" class="col-6 col-lg-3 ada mb-lg-5">
          <div>
            <img src="./slike/Ikonice/OBRADA.svg" alt="" class="img-fluid ikonice" />
            <h5 class="text-dark pt-4"><strong>Obrada materijala</strong> </h5>
          </div>
        </a>
        <a href="./delatnost.php?delatnost=odrzavanje-vozila" class="col-6 col-lg-3 ada mb-lg-5">
          <div>
            <img src="./slike/Ikonice/VOZILA.svg" alt="" class="img-fluid ikonice" />
            <h5 class="text-dark pt-4"><strong> Održavanje vozila</strong></h5>
          </div>
        </a>
        <a href="./delatnost.php?delatnost=garderoba-i-nakit" class="col-6 col-lg-3 ada mb-5">
          <div>
            <img src="./slike/Ikonice/GARDEROBA.svg" alt="" class="img-fluid ikonice" />
            <h5 class="text-dark pt-4"><strong> Garderoba i nakit</strong></h5>
          </div>
        </a>
        <a href="./delatnost.php?delatnost=ostalo" class="col-6 col-lg-3 ada mb-5">
          <div>
            <img src="./slike/Ikonice/NEKATEGORIZOVANO.svg" alt="" class="img-fluid ikonice" />
            <h5 class="text-dark pt-4"><strong>Ostalo</strong> </h5>
          </div>
        </a>
      </div>
    </div>
  </section>
  <!--#endregion -->
  <br>
  <section class="background-section pb-5">
    <div class="container text-white pt-5">
      <h1 class="display-font">PROVERENI POUZDANI MAJSTORI</h1>
      <p class="podnaslov">Pronađite pouzdane majstore za sve vaše potrebe na našem sajtu!</p>
      <p>Brzo i lako pronalaženje pouzdanih majstora za sve vaše potrebe. Pregledajte profile majstora sa recenzijama
        drugih korisnika, komunicirajte direktno sa majstorom putem sajta, pronađite majstore u vašoj blizini, i
        pregledajte cene usluga. Olakšajte sebi pronalaženje najboljeg majstora za vaše potrebe uz minimalni napor i
        maksimalnu udobnost. Isprobajte naš sajt danas i uverite se sami u njegove prednosti!</p>
      <div class="container text-center text-sm-center pt-5">
        <div class="d-sm-flex">
          <div class="row">
            <div class="col-sm-6  col-6 desire-section">
              <img src="./slike/Ikonice/database-icon.png" alt="booking">
              <strong>
                <p class="icon-text">BAZA MAJSTORA</p>
              </strong>
            </div>
            <div class="col-sm-6 col-6 desire-section">
              <img src="./slike/Ikonice/search-icon.png" alt="booking">
              <strong>
                <p class="icon-text">LAKA PRETRAGA</p>
              </strong>
            </div>
            <div class="col-sm-6  col-6 desire-section">
              <img src="./slike/Ikonice/contact-icon.png" alt="booking">
              <strong>
                <p class="icon-text">RECENZIJE I KONTAKT</p>
              </strong>
            </div>
            <div class="col-sm-6  col-6  desire-section">
              <img src="./slike/Ikonice/booking-icon.png" alt="booking">
              <strong>
                <p class="icon-text">ANGAŽOVANJE</p>
              </strong>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




  <!--#region Footer-->
  <footer class="footer" style="background-color:#212529;">
<div class="container bottom_border">
<div class="row">
<div class=" col-sm-4 col-md col-sm-4  col-12 col">
<h5 class="headin5_amrc col_white_amrc pt2">Pronađite nas</h5>
<!--headin5_amrc-->
<div class="">
  <img src="./slike/logo/LOGO.png" alt="logo" class="logo-footer">
</div>
<p class="mb10">Kompanija "FixIT" je nastala 2022. godine kao projekat Učeničke kompanije Tehničke škole iz
Mladenovca.</p>
<p><i class="fa fa-location-arrow"></i>Mladenovac, Vuka Karadžića 75 </p>
<p><i class="fa fa-phone"></i>  +381/ 11 8230 143 </p>
<p><i class="fa fa fa-envelope"></i> fixit.rs.contact@gmail.com </p>


</div>

<div class=" col-sm-4 col-md  col-6 col">
<h5 class="headin5_amrc col_white_amrc pt2">Navigacija</h5>
<!--headin5_amrc-->
<ul class="footer_ul_amrc">
<li><a href="index.php">Početna</a></li>
<li><a href="onama.php">O nama</a></li>
<li><a href="onama.php">Kontakt</a></li>
<li><a href="#">Prijavi se</a></li>
<li><a href="#">Registruj se</a></li>




</ul>
<!--footer_ul_amrc ends here-->
</div>

<div class=" col-sm-4 col-md  col-6 col">
<h5 class="headin5_amrc col_white_amrc pt2">Linkovi</h5>
<!--headin5_amrc-->
<ul class="footer_ul_amrc">
<li><a href="#">Kako Postati Korisnik</a></li>
<li><a href="#">Registracija Fizickog Lica</a></li>
<li><a href="#">Registracija Firme</a></li>
<li><a href="#">Uslovi Korišćenja</a></li>
<li><a href="#">Pravila O Privatnosti</a></li>

</ul>
<!--footer_ul_amrc ends here-->
</div>



<div class=" col-sm-4 col-md  col-12 col">
<h5 class="headin5_amrc col_white_amrc pt2">Zapratite nas</h5>
<!--headin5_amrc ends here-->

<ul class="footer_ul2_amrc">
<li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a><p>Instagram<a href="#">https://www.instagram.com/fixit.in.rs/</a></p></li>
<li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a><p>Facebook<a href="#">https://www.instagram.com/fixit.in.rs/</a></p></li>
<li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a><p>Twitter<a href="#">https://www.instagram.com/fixit.in.rs/</a></p></li>
</ul> 

<!--footer_ul2_amrc ends here-->
</div>
</div>
</div>


<!--foote_bottom_ul_amrc ends here-->
<p class="text-center pt-4">Copyright @2023 | by <a href="#">FixIT</a></p>

<ul class="social_footer_ul">
<li><a href="https://www.instagram.com/fixit.in.rs/"><i class="fab fa-facebook-f"></i></a></li>
<li><a href="https://www.instagram.com/fixit.in.rs/"><i class="fab fa-twitter"></i></a></li>
<li><a href="https://www.instagram.com/fixit.in.rs/"><i class="fab fa-linkedin"></i></a></li>
<li><a href="https://www.instagram.com/fixit.in.rs/"><i class="fab fa-instagram"></i></a></li>
</ul>
</div>
<!--social_footer_ul ends here-->
</div>

</footer>
  <!--#endregion-->


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
    const checkbox1 = document.getElementById('checkbox1');
    const nextbutton = document.getElementById('nextbutton');

    checkbox1.addEventListener('change', function() {
      if (this.checked) {
        nextbutton.disabled = false;
      } else {
        nextbutton.disabled = true;
      }
    });

    function Pretraga() {
      var rezultat = document.getElementById("search");
      window.location.href = "posao.php?posao=" + rezultat.value + "&p=1"
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>