<?php
require_once('./appdata/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- CSS only -->
  <link href="appdata/main.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,700&family=Fugaz+One&family=Inter&family=Montserrat:wght@500&family=Nunito&family=Rowdies:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,700&family=Fugaz+One&family=Inter&family=Montserrat:wght@500&family=Rowdies:wght@700&family=Russo+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,700&family=Fugaz+One&family=Montserrat:wght@500&family=Rowdies:wght@700&family=Russo+One&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,700&family=Montserrat:wght@500&family=Russo+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="appdata/styleV3.css" />
  <link rel="shortcut icon" href="slike/Ikonice/FAVICON2.png" type="image/x-icon">
  <link rel="stylesheet" href="./appdata/modal_styleV2.css" />
  <title>FixIT</title>
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
            <form action="appdata/login.php" method="POST">
              <div class="mb-3 mt-4">
                <label for="exampleInputEmail1" class="form-label">Email adresa</label>
                <input type="email" name="email" class="form-control login-textbox" id="exampleInputEmail1" aria-describedby="emailHelp" />
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Šifra</label>
                <input type="password" name="sifra" class="form-control login-textbox" id="exampleInputPassword1" />
              </div>
              <button type="submit" name="submit" class="btn btn-primary text-light mt-3">
                Prijavi se
              </button>
              <div>
              <label><input class="mt-3" type="checkbox" name="remember-me" id="remember-me" >&nbsp; Ostavi me prijavljenim</label>
              
              </div>
            </form>
            <p id="nisi-korisnik">
              Nemaš nalog? <a id="prijava-mini" href="#">Napravi nalog!</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--#endregion-->

  <!--#region Registracija main modal-->
  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body bg-dark">
          <div id="reg-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div id="reg-title-top"></div>
          <h3 class="text-white text-center fw-bold">Registrujte se kao:</h2>
            <div class="row my-4">
              <div class="col-sm  text-center"><button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerKorisnik">Korisnik</button></div>
              <div class="col-sm razmak text-center"><button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerFizickoLice">Fizicko lice</button></div>
              <div class="col-sm text-center"><button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerFirma">Firma</button></div>
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
              <div class="col-xl-6"><img src="./register_images/register_korisnik.jpg" class="img-fluid w-100 h-100 d-none d-xl-block" alt="Responsive image"></div>
              <div class="col">
                <form action="index.php" method="post">
                  <h1 class="text-center mb-4 fw-bolder">Korisnicka registracija</h1>
                  <input style="display: block;" type="text" class="input register-textbox" placeholder="Ime" name="IME-KORISNIKA" required>

                  <input style="display: block;" type="text" class="input my-4 register-textbox" placeholder="Prezime" name="PREZIME-KORISNIKA" required>

                  <input style="display: block;" type="email" class="input register-textbox" placeholder="Email" name="EMAIL-KORISNIKA" required>

                  <input style="display: block;" type="password" class="input my-4 register-textbox" placeholder="Sifra" name="SIFRA-KORISNIKA" required>

                  <input style="display: block;" type="password" class="input my-4 register-textbox" placeholder="Potvrdite sifru" required>

                  <button type="submit" name="submitK" class="btn btn-primary text-center text-white fw-bold w-100">Registruj
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
              <div class="col-xl-6"><img src="./register_images/register_fizickolice.png" class="img-fluid w-100 h-100 d-none d-xl-block" alt="Responsive image"></div>
              <div class="col">
                <form action="index.php" method="post">
                  <h2 class="text-center mb-4 fw-bolder">Registracija fizickog lica</h2>
                  <input style="display: block;" id="ime-fizicko" type="text" class="input register-textbox" placeholder="Ime" name="IME-FIZICKOG-LICA" required>
                  <input style="display: block;" id="prezime-fizicko" type="text" class="input my-4 register-textbox" placeholder="Prezime" name="PREZIME-FIZICKOG-LICA" required>
                  <input style="display: block;" id="email-fizicko" type="email" class="input register-textbox" placeholder="Email" name="EMAIL-FIZICKOG-LICA" required>
                  <input style="display: block;" id="telefon-fizicko" type="text" class="input my-4 register-textbox" placeholder="Broj telefona" name="BROJ-TELEFONA" required>
                  <input style="display: block;" id="jmbg-fizicko" type="text" class="input my-4 register-textbox" placeholder="JMBG" name="JMBG" required>
                  <input style="display: block;" id="sifra-fizicko" type="password" class="input my-4 register-textbox" placeholder="Sifra" name="SIFRA" required>
                  <input style="display: block;" id="potvrda-sifre" type="password" class="input my-4 register-textbox" placeholder="Potvrdite sifru" required>
                  <div class="row">
                    <div class="col">
                      <select class="dropdown reg-drop" required id="delatnost-levo" NAME="delatnost">
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
                  <select class="dropdown my-4 reg-drop" required id="vrstaPosla" name="VRSTA_POSLA">
                    <!-- OPASNOST SQL INJECTIONA -->
                    <option value="odaberiPosao" id="odaberiPosao" disabled selected>Odaberi vrstu posla... </option>
                    <!--  -->
                  </select>
                  <select class="dropdown reg-drop" NAME="OPSTINA" id="opstina">
                    <option value="odaberi" disabled selected>Odaberi opstinu...</option>
                    <?php
                    $opstine = $conn->query("SELECT ime_opstine,id_opstine FROM opstine")
                      or die($conn->error);
                    while ($podatakOpstine = $opstine->fetch_assoc()) : ?>
                      <option value="<?= $podatakOpstine['id_opstine'] ?>"><?= $podatakOpstine['ime_opstine'] ?></option>
                    <?php endwhile; ?>
                  </select>
                  <input style="display: block;" type="text" class="input my-4 register-textbox" placeholder="Adresa"id="adresa" name="ADRESA" required>
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
              <div class="col-xl-6"><img src="./register_images/register_firma.jpg" class="img-fluid w-100 h-100 d-none d-xl-block" alt="Responsive image"></div>
              <div class="col">
                <h1 class="text-center mb-4 fw-bolder">Registracija firme</h1>
                <input style="display: block;" type="text" class="input register-textbox" placeholder="Ime firme" name="IME FIRME" required>
                <input style="display: block;" type="text" class="input my-4 register-textbox" placeholder="Ime i prezime vlasnika" name="IME I PREZIME VLASNIKA" required>
                <input style="display: block;" type="email" class="input register-textbox" placeholder="Email" name="EMAIL" required>
                <input style="display: block;" type="password" class="input my-4 register-textbox" placeholder="Sifra" name="SIFRA" required>
                <input style="display: block;" type="password" class="input my-4 register-textbox" placeholder="Potvrdite sifru" required>
                <div class="row">
                  <div class="col">
                    <select class="dropdown reg-drop" required id="delatnost-firma" NAME="DELATNOST">
                      <option value="odaberi" disabled selected>Odaberi delatnost</option>
                      <?php
                      $delatnosti = $conn->query("SELECT naziv_delatnosti FROM delatnosti")
                        or die($conn->error);
                      while ($podatakDelatnost = $delatnosti->fetch_assoc()) : ?>
                        <option value="<?= $podatakDelatnost['naziv_delatnosti'] ?>"><?= $podatakDelatnost['naziv_delatnosti'] ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                </div>
                <select class="dropdown my-4 reg-drop" required id="vrstaPoslaFirma" name="VRSTA_POSLA">
                  <option value="odaberi" id="odaberi" disabled selected>Odaberi vrstu posla... </option>
                </select>

                <select class="dropdown reg-drop mb-4" id="firma_opstina" NAME="OPSTINA">
                  <option value="odaberi" disabled selected>Odaberi opstinu</option>
                  <?php
                  $opstine = $conn->query("SELECT ime_opstine FROM opstine")
                    or die($conn->error);
                  while ($podatakOpstine = $opstine->fetch_assoc()) : ?>
                    <option value="<?= $podatakOpstine['ime_opstine'] ?>"><?= $podatakOpstine['ime_opstine'] ?></option>
                  <?php endwhile; ?>
                </select>

                <label class="form-label" for="customFile">Izaberite sliku kao dokaz o postojanju
                  firme:</label>
                <input type="file" class="form-control upload-rad text-white" id="customFile" />

                <button type="submit" name="submit" class="btn btn-primary text-center text-white fw-bold w-100 mt-4">Registruj se</button>
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
      <a href="#" class="nav brand"><img class="image" src="slike/logo/Logo(white).svg" alt="logo" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="onama.php" class="nav-link">O nama</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">Prijavi se</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#registerModal">Registruj se</a>
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
            <input type="text" class="form-control search-bar" placeholder="Pronadji majstora..." />
            <button class="btn btn-primary btn-lg text-light search-button" type="button">Pretraži</button>
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
        <a href="delatnosti/gradjevina.html" class="col-6 col-lg-3 ada mt-3">
          <div>
            <img src="slike/Ikonice/GRADJEVINA.svg" alt="" class="img-fluid ikonice" />
            <h5 class="text-dark pt-4"><strong>Građevina</strong> </h5>
          </div>
        </a>
        <a href="delatnosti/elektrika.html" class="col-6 col-lg-3 ada mt-3">
          <div>
            <img src="slike/Ikonice/ELEKTRONIKA.svg" alt="" class="img-fluid ikonice " />
            <h5 class="text-dark pt-4"><strong>Elektrika</strong> </h5>
          </div>
        </a>
        <a href="delatnosti/odrzavanje.html" class="col-6 col-lg-3 ada mt-3">
          <div>
            <img src="slike/Ikonice/ODRZAVANJE.svg" alt="" class="img-fluid ikonice" />
            <h5 class="text-dark pt-4"><strong>Održavanje</strong> </h5>
          </div>
        </a>
        <a href="delatnosti/cevne-instalacije.html" class="col-6 col-lg-3 ada mt-3 ">
          <div>
            <img src="slike/Ikonice/CEVNEINSTALACIJE.svg" alt="" class="img-fluid ikonice" />
            <h5 class="text-dark pt-4"><strong>Cevne instalacije</strong> </h5>
          </div>
        </a>
        <a href="delatnosti/obrada-materijala.html" class="col-6 col-lg-3 ada mb-lg-5">
          <div>
            <img src="slike/Ikonice/OBRADA.svg" alt="" class="img-fluid ikonice" />
            <h5 class="text-dark pt-4"><strong>Obrada materijala</strong> </h5>
          </div>
        </a>
        <a href="delatnosti/vozila.html" class="col-6 col-lg-3 ada mb-lg-5">
          <div>
            <img src="slike/Ikonice/VOZILA.svg" alt="" class="img-fluid ikonice" />
            <h5 class="text-dark pt-4"><strong> Održavanje vozila</strong></h5>
          </div>
        </a>
        <a href="delatnosti/garderoba.html" class="col-6 col-lg-3 ada mb-5">
          <div>

            <img src="slike/Ikonice/GARDEROBA.svg" alt="" class="img-fluid ikonice" />
            <h5 class="text-dark pt-4"><strong> Garderoba i nakit</strong></h5>
          </div>
        </a>
        <a href="delatnosti/ostalo.html" class="col-6 col-lg-3 ada mb-5">
          <div>
            <img src="slike/Ikonice/NEKATEGORIZOVANO.svg" alt="" class="img-fluid ikonice" />
            <h5 class="text-dark pt-4"><strong>Ostalo</strong> </h5>
          </div>
        </a>
      </div>
    </div>
  </section>
  <!--#endregion -->
  <br>
  <section class="background-section">
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
              <img src="./slike/ikonice/database-icon.png" alt="booking">
              <strong>
                <p class="icon-text">BAZA MAJSTORA</p>
              </strong>
            </div>
            <div class="col-sm-6 col-6 desire-section">
              <img src="./slike/ikonice/search-icon.png" alt="booking">
              <strong>
                <p class="icon-text">LAKA PRETRAGA</p>
              </strong>
            </div>
            <div class="col-sm-6  col-6 desire-section">
              <img src="./slike/ikonice/contact-icon.png" alt="booking">
              <strong>
                <p class="icon-text">RECENZIJE I KONTAKT</p>
              </strong>
            </div>
            <div class="col-sm-6  col-6  desire-section">
              <img src="./slike/ikonice/booking-icon.png" alt="booking">
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
  <footer class="p-4 bg-dark text-white text-center position-relative">
    <div class="container">
      <p class="lead">Copyright &copy; 2022 FixIT</p>
      <a href="#" class="position-absolute bottom-0 end-0 p-4">
        <i class="bi bi-arrow-up-circle h1"></i>
      </a>
    </div>
  </footer>
  <!--#endregion-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#delatnost-levo").change(function() {
        var selectedOption = $(this).children("option:selected").val();
        $.ajax({
          type: "POST",
          url: "ajax.php",
          data: {
            option: selectedOption
          },
          success: function(response) {
            $("#vrstaPosla").html(response); // Update the content of the #result div with the selected value
          }
        });
      });
    });

    $(document).ready(function() {
      $("#delatnost-firma").change(function() {
        var selectedOption = $(this).children("option:selected").val();
        $.ajax({
          type: "POST",
          url: "ajax.php",
          data: {
            option: selectedOption
          },
          success: function(response) {
            $("#vrstaPoslaFirma").html(response); // Update the content of the #result div with the selected value
          }
        });
      });
    });
  </script>
  <script>
    $(function() {
      $('#RegisterFL').click(function(e) {
      var valid = this.form.checkValidity();
      
      if(valid){

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
          url: 'process.php',
        data: {ime: ime, prezime: prezime, email: email, sifra: sifra, JMBG: JMBG, id_opstine: id_opstine, adresa: adresa, id_delatnosti: id_delatnosti, posao_id: posao_id, br_tel: br_tel},
      
        success: function(data){
          Swal.fire({
        icon: 'success',
        title: 'Regitracija',
        text: data,
        type: 'success'

      })
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
    },
        error: function(data){
          Swal.fire({
        icon: 'error',
        title: 'Regitracija',
        text: 'Greska tokom cuvanja podataka!',
        type: 'error'
        })
      }
    });
  }else{
}
});		
});
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="appdata/function.js"></script>
</body>

</html>