<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS only -->
    <link href="./appdata/main.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./appdata/radnikV8.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="./slike/Ikonice/FAVICON2.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="appdata/modal_style.css"/>
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
    <!--#region Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="myform bg-dark">
                        <h1 id="naslov" class="text-center">Forma za prijavu</h1>
                        <form>
                            <div class="mb-3 mt-4">
                                <label for="exampleInputEmail1" class="form-label">Email adresa</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Šifra</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" />
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary text-light mt-3">
                                PRIJAVI SE
                            </button>
                            <p id="nisi-korisnik">
                                Nemaš nalog? <a id="prijava-mini" href="#">Napravi nalog!</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--#endregion -->

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
              <div class="col text-center"><button type="button" class="btn btn-link" data-bs-dismiss="modal"
                  data-bs-toggle="modal" data-bs-target="#registerKorisnik">Korisnik</button></div>
              <div class="col text-center"><button type="button" class="btn btn-link" data-bs-dismiss="modal"
                data-bs-toggle="modal" data-bs-target="#registerFizickoLice">Fizicko lice</button></div>
              <div class="col text-center"><button type="button" class="btn btn-link" data-bs-dismiss="modal"
                data-bs-toggle="modal" data-bs-target="#registerFirma">Firma</button></div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!--#endregion-->

    <!--#region Korisnik modal -->
    <div class="modal fade" id="registerKorisnik" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content izabrani-modal">
          <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="myform bg-dark"> 
            </br>
                  <h1 class="text-center mb-4 fw-bolder">Korisnicka registracija</h1>
                  <input style="display: block;" type="text" class="input register-textbox" placeholder="Ime"
                    name="IME KORISNIKA" required>
    
                  <input style="display: block;" type="text" class="input my-4 register-textbox" placeholder="Prezime"
                    name="PREZIME KORISNIKA" required>
    
                  <input style="display: block;" type="email" class="input register-textbox" placeholder="Email"
                    name="EMAIL" required>
    
                  <input style="display: block;" type="password" class="input my-4 register-textbox" placeholder="Sifra"
                    name="SIFRA" required>
    
                  <input style="display: block;" type="password" class="input my-4 register-textbox"
                    placeholder="Potvrdite sifru" required>

                    <button type="submit" name="submit" class="btn btn-primary w-25 text-center text-white fw-bold w-100">Registruj se</button>
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
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content izabrani-modal">
          <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="myform bg-dark"> 
            </br>
                  <h1 class="text-center mb-4 fw-bolder">Registracija fizickog lica</h1>

                  <input style="display: block;" type="text" class="input register-textbox" placeholder="Ime"
                                name="IME FIZICKOG LICA" required>
                            <input style="display: block;" type="text" class="input my-4 register-textbox"
                                placeholder="Prezime" name="PREZIME FIZICKOG LICA" required>

                            <input style="display: block;" type="email" class="input register-textbox" placeholder="Email" name="EMAIL"
                                required>

                            <input style="display: block;" type="text" class="input my-4 register-textbox"
                                placeholder="Broj telefona" name="BROJ TELEFONA" required>

                            <input style="display: block;" type="text" class="input my-4 register-textbox"
                                placeholder="JMBG" name="JMBG" required>

                            <input style="display: block;" type="password" class="input my-4 register-textbox" placeholder="Sifra"
                                name="SIFRA" required>
                            <input style="display: block;" type="password" class="input my-4 register-textbox"
                                placeholder="Potvrdite sifru" required>
                            <div class="row">
                                <div class="col">
                                    <select class="dropdown reg-drop" required id="delatnost-levo" NAME="DELATNOST">
                                        <option value="odaberi" disabled selected>Odaberi delatnost</option>
                                        <option value="gradjevina">Gradjevina</option>
                                        <option value="elektrika">Elektrika</option>
                                        <option value="fasader">Fasader</option>
                                        <option value="odrzavanje">Odrzavanje</option>
                                        <option value="cevneIntalacije">Cevne intalacije</option>
                                        <option value="obradaMaterijala">Obrada materijala</option>
                                        <option value="odrzavanjeVozila">Odrzavanje vozila</option>
                                        <option value="garderobaINakit">Garderoba i nakit</option>
                                        <option value="ostalo">Ostalo</option>
                                    </select>
                                </div>
                            </div>

                            <select class="dropdown my-4 reg-drop" required id="vrstaPosla" name="VRSTA_POSLA">
                                <option value="odaberiPosao" id="odaberiPosao" disabled selected>Odaberi vrstu posla </option>
                            </select>

                            <select class="dropdown reg-drop" NAME="OPSTINA">
                                <option value="odaberi" disabled selected>Odaberi opstinu</option>
                                <option value="ostalo">Ostalo</option>
                            </select>
                    <button type="submit" name="submit" class="btn btn-primary text-center text-white fw-bold w-100 mt-4">Registruj se</button>
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
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content izabrani-modal">
          <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="myform bg-dark"> 
            </br>
                  <h1 class="text-center mb-4 fw-bolder">Registracija fizickog lica</h1>
                  <input style="display: block;" type="text" class="input register-textbox" placeholder="Ime firme"
                                name="IME FIRME" required>
                            <input style="display: block;" type="text" class="input my-4 register-textbox"
                                placeholder="Ime i prezime vlasnika" name="IME I PREZIME VLASNIKA" required>
                            <input style="display: block;" type="email" class="input register-textbox" placeholder="Email" name="EMAIL"
                                required>
                            <input style="display: block;" type="password" class="input my-4 register-textbox" placeholder="Sifra"
                                name="SIFRA" required>
                            <input style="display: block;" type="password" class="input my-4 register-textbox"
                                placeholder="Potvrdite sifru" required>
                            <div class="row">
                                <div class="col">
                                    <select class="dropdown reg-drop" required id="delatnost-levo" NAME="DELATNOST">
                                        <option value="odaberi" disabled selected>Odaberi delatnost</option>
                                        <option value="gradjevina">Gradjevina</option>
                                        <option value="elektrika">Elektrika</option>
                                        <option value="fasader">Fasader</option>
                                        <option value="odrzavanje">Odrzavanje</option>
                                        <option value="cevneIntalacije">Cevne intalacije</option>
                                        <option value="obradaMaterijala">Obrada materijala</option>
                                        <option value="odrzavanjeVozila">Odrzavanje vozila</option>
                                        <option value="garderobaINakit">Garderoba i nakit</option>
                                        <option value="ostalo">Ostalo</option>
                                    </select>
                                </div>
                            </div>


                            <select class="dropdown my-4 reg-drop" required id="vrstaPosla" name="VRSTA_POSLA">
                            <option value="odaberi" id="odaberi" disabled selected>Odaberi vrstu posla </option>
                            </select>

                            <select class="dropdown reg-drop mb-4" id="firma_opstina" NAME="OPSTINA">
                                <option value="odaberi" disabled selected>Odaberi opstinu</option>
                                <option value="ostalo">Ostalo</option>
                            </select>

                            <label class="form-label" for="customFile" >Izaberite sliku kao dokaz o postojanju
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


    <!-- Start popup dialog box -->
    <div class="modal fade" id="event_entry_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Angazujte majstora</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="event_name">Naziv Posla</label>
                                    <input type="text" name="event_name" id="event_name" class="form-control" placeholder="Krecenje, postavljanje izolacije...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="event_start_date">Event start</label>
                                    <input type="date" name="event_start_date" id="event_start_date" class="form-control onlydatepicker" placeholder="Event start date">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="event_end_date">Event end</label>
                                    <input type="date" name="event_end_date" id="event_end_date" class="form-control" placeholder="Event end date">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="save_event()">Save Event</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End popup dialog box -->
    <!--#region NavBar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top aa">
        <div class="container">
            <a href="./index.html" class="nav brand"><img class="image" src="./slike/logo/Logo(white).svg" alt="logo" /></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto z">
                    <li class="nav-item">
                        <a href="./index.html" class="nav-link">Pocetna</a>
                    </li>
                    <li class="nav-item">
                        <a href="./onama.html" class="nav-link">O nama</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">Prijavi
                            se</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#registerModal">Registruj se</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--#endregion -->

    <section class="bg-dark naziv-radnika">
        <div class="container text-white">
            <div class="row">
                <div class="col-8 mt-5">
                    <?php $result = $conn->query("select * from fizicko_lice where id_fizicko=($_GET[id])")
                        or die($conn->error);
                    $podatak = $result->fetch_assoc();
                    $posao = $conn->query("SELECT poslovi.naziv_posla,opstine.ime_opstine FROM ((`fizicko_lice` INNER JOIN poslovi ON fizicko_lice.Posao_id = poslovi.posao_id) inner join opstine on fizicko_lice.ID_Opstine = opstine.ID_Opstine) WHERE Poslovi.naziv_posla = '$_GET[posao]' and fizicko_lice.id_fizicko='$_GET[id]';")
                        or die($conn->error);
                    $podatakPosao = $posao->fetch_assoc();
                    ?>
                    <div class="asa"><span id="a" class="text-primary fs-3 okupacija d-block my-0"><?= $podatakPosao['naziv_posla'] ?>,
                            <?= $podatakPosao['ime_opstine'] ?></span>
                        <span class="ime d-block my-0"><?= $podatak['ime'] ?> <?= $podatak['prezime'] ?></span>

                    </div>
                </div>
                <div class="col-4 fs-1 ocena text-center"><span class="boja bg-primary">10.0</span></div>
            </div>
        </div>
    </section>
    <div class="container" id="nestani">
        <ul class="tabs d-flex text-center" id="crno">
            <li data-tab-target="#recenzije" class="tab active recenzije-tab fs-3">Recenzije</li>
            <li data-tab-target="#kontakt" class="tab kontakt  fs-3">Kontakt</li>
            <li data-tab-target="#angazovanje" class="tab angazovanje fs-3">Angazovanje</li>
        </ul>
        <div class="container">
            <div class="tab-content mb-5">
                <div id="recenzije" data-tab-content class="active">
                    <div class="d-lg-flex justify-content-between flex-wrap">
                        <div class="recenzije">
                            <h4><span class="zvezdica"></span>
                                Ocena
                            </h4>
                            <p class="lead undertext">Ocena na osnovu glasanja korisnika</p>
                            <p class="lead posebne-ocene d-block d-sm-flex justify-content-between"><span class="kvalitet-usluga"></span>Kvalitet
                                Usluge<span class="wrapper"><span class="bar" style="background-color: #CBE8DA;"></span><span class="fw-bold">10</span></span>
                            </p>
                            <p class="lead posebne-ocene d-block d-sm-flex justify-content-between"><span class="postovanje-rokova"></span>Postovanje
                                rokova<span class="wrapper"><span class="bar" style="background-color: #c0d4e4;"></span><span class="fw-bold">10</span></span>
                            </p>
                            <p class="lead posebne-ocene d-block d-sm-flex justify-content-between"><span class="povoljnost-cena"></span>Povoljnost
                                cena<span class="wrapper"><span class="bar" style="background-color: #beb4d6;"></span><span class="fw-bold">10</span></span>
                            </p>
                            <p class="lead posebne-ocene d-block d-sm-flex pb-4 justify-content-between"><span class="odnos"></span>Odnos
                                prema
                                korisniku
                                usluga<span class="wrapper"><span class="bar" style="background-color: #d194c3;"></span><span class="fw-bold">10</span></span>
                            </p>
                        </div>
                        <div class="glavna-ocena">
                            <h4 class="text-primary fw-bold">Prosecna Ocena</h4>
                            <p class="lead">Prosecna ocena majstora</p>
                            <div class="display-4 ocena text-center"><span class="boja2 bg-primary">10.0</span></div>
                        </div>
                    </div>
                    <div class="ostatak-sekcija mt-3">
                        <h4><span class="zvezdica"></span>
                            Ocenite majstora
                        </h4>
                        <p class="lead undertext">Opisite vase iskustvo sa ovim majstorom i time pomozite drugima koji
                            planiraju angazovanje ovog majstora</p>
                        <div style="text-align: center;" class="pb-4">
                            <button type="button" class="ocenite-button btn btn-primary text-white py-2 mt-4 fs-4">Oceni
                                majstora</button>
                        </div>
                    </div>
                    <div class="komentari mt-3 pb-4">
                        <h4><span class="korisnik"></span>
                            User name
                            <span class="wrapper-komentar">
                                <span class="kvalitet-usluga-kruzic">10</span><span class="postovanje-rokova-kruzic mx-2">10</span><span class="povoljnost-cena-kruzic">10</span><span class="odnos-kruzic mx-2">10</span></span>
                        </h4>
                        <p class="undertext-komentar">Lorem Ipsum is simply dummy text of the printing and
                            typesetting
                            industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        <p class="datum">
                            dd/mm/yyyy</p>
                    </div>
                    <div class="komentari mt-3 pb-4">
                        <h4><span class="korisnik"></span>
                            User name
                            <span class="wrapper-komentar">
                                <span class="kvalitet-usluga-kruzic">10</span><span class="postovanje-rokova-kruzic mx-2">10</span><span class="povoljnost-cena-kruzic">10</span><span class="odnos-kruzic mx-2">10</span></span>
                        </h4>
                        <p class="undertext-komentar">Lorem Ipsum is simply dummy text of the printing and
                            typesetting
                            industry.
                        </p>
                        <p class="datum">
                            dd/mm/yyyy</p>
                    </div>
                    <div class="komentari mt-3 pb-4">
                        <h4><span class="korisnik"></span>
                            User name
                            <span class="wrapper-komentar">
                                <span class="kvalitet-usluga-kruzic">10</span><span class="postovanje-rokova-kruzic mx-2">10</span><span class="povoljnost-cena-kruzic">10</span><span class="odnos-kruzic mx-2">10</span></span>
                        </h4>
                        <p class="undertext-komentar">Lorem Ipsum is simply dummy text of the printing and
                            typesetting
                            industry.
                            Lorem Ipsum has been the industry's standard dummy text.</p>
                        <p class="datum">
                            dd/mm/yyyy</p>
                    </div>
                </div>
                <div id="kontakt" data-tab-content>
                    <div class="d-lg-flex justify-content-between flex-wrap">
                        <div class="sub-container">
                            <div class="kontakt-sekcija">
                                <h4><span class="telefon"></span>
                                    Kontakt telefon
                                </h4>
                                <?php
                                $telefon = $conn->query("SELECT br_tel FROM fizicko_lice where id_fizicko='$_GET[id]';")
                                    or die($conn->error);
                                $podatakTelefon = $telefon->fetch_assoc();
                                ?>
                                <p class="lead undertext">+<?= $podatakTelefon['br_tel'] ?></p>
                            </div>
                            <div class="email-sekcija">
                                <h4><span class="email"></span>
                                    E-mail
                                </h4>
                                <p class="lead undertext"><?= $podatak['email'] ?></p>
                            </div>
                        </div>
                        <div class="radno-vreme">
                            <h4><span class="sat"></span>
                                Radno vreme
                            </h4>
                            <p class="lead" style="padding-left: 25%; margin-bottom: 0;">Ponedeljak: 08:00 - 17:00</p>
                            <p class="lead" style="padding-left: 25%; margin-bottom: 0;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Utorak: 08:00 - 17:00</p>
                            <p class="lead" style="padding-left: 25%; margin-bottom: 0;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sreda: 08:00 - 17:00</p>
                            <p class="lead" style="padding-left: 25%; margin-bottom: 0;">
                                &nbsp;&nbsp;&nbsp;&nbsp;Cetvrtak: 08:00 - 17:00</p>
                            <p class="lead" style="padding-left: 25%; margin-bottom: 0;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Petak: 08:00
                                - 17:00</p>
                            <p class="lead" style="padding-left: 25%; margin-bottom: 0;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subota: 10:00 - 17:00</p>
                            <p class="lead" style="padding-left: 25%; margin-bottom: 0;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nedelja: 10:00 - 15:00</p>
                        </div>
                    </div>
                    <div class="lokacija-sekcija mt-3">
                        <h4><span class="lokacija-pinned"></span>
                            Lokacija
                        </h4>
                        <?php
                        $adresa = $conn->query("SELECT fizicko_lice.adresa,opstine.ime_opstine FROM fizicko_lice inner join opstine on fizicko_lice.id_opstine = opstine.id_opstine where fizicko_lice.id_fizicko='$_GET[id]';")
                            or die($conn->error);
                        $podatakAdresa = $adresa->fetch_assoc();
                        ?>
                        <p class="lead undertext"><?= $podatakAdresa['adresa'] ?>, <?= $podatakAdresa['ime_opstine'] ?></p>
                    </div>
                    <div class="ostatak-sekcija mt-3 pb-4">
                        <h4><span class="lokacija"></span>
                            Moguc izlazak majstora na teren
                        </h4>
                        <p class="lead undertext">Na mapi je prikazano podrucje koje pokriva</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22791.426697029554!2d20.691289773867474!3d44.434632202799015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4750bac18302ae3f%3A0xc6c85658f278872!2z0JzQu9Cw0LTQtdC90L7QstCw0YY!5e0!3m2!1ssr!2srs!4v1673096595731!5m2!1ssr!2srs" width="100%" height="450" style="border:0; border-radius: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div id="angazovanje" data-tab-content>
                    <div class="ostatak-sekcija mt-3 pb-4">
                        <h4><span class="kliper"></span>
                            Vrsta posla
                        </h4>

                        <p class="lead undertext">Odaberite koja vam je usluga potrebna.</p>
                        <select class="dropdown mb-3">
                            <option value="odaberi" disabled selected>Odaberi uslugu...</option>
                            <?php
                            $usluga = $conn->query("SELECT vrsta_rada.ime_posla from vrsta_rada INNER JOIN poslovi on vrsta_rada.posao_id = poslovi.posao_id where poslovi.naziv_posla ='$_GET[posao]';")
                                or die($conn->error);
                            while ($podatakUsluga = $usluga->fetch_assoc()) :
                            ?>
                                <option value="<?= $podatakUsluga['ime_posla'] ?>"><?= $podatakUsluga['ime_posla'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="komentari mt-3 pb-4">
                        <h4><span class="lokacija"></span>
                            Lokacija
                        </h4>
                        <p class="lead undertext">Unesite lokaciju radova</p>
                        <select class="dropdown mt-2 mb-3">
                            <option value="odaberi" disabled selected>Odaberi Lokaciju</option>
                            <?php
                            $opstine = $conn->query("SELECT ime_opstine FROM opstine")
                                or die($conn->error);
                            while ($podatakOpstine = $opstine->fetch_assoc()) : ?>
                                <option value="<?= $podatakOpstine['ime_opstine'] ?>"><?= $podatakOpstine['ime_opstine'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="ostatak-sekcija mt-3">
                        <h4><span class="kalendar"></span>
                            Kalendar
                        </h4>
                        <p class="lead undertext ">Odaberite zeljeni dan/period za izvrsenje usluga i pogledajte zauzete
                            dane
                            majstora.</p>
                        <p class="lead dani d-flex pb-4 justify-content-center"><span class="slobodan-dan"></span> -
                            Slobodan
                            dan<span class="wrapper-dani"><span class="zauzet-dan"></span><span>- Zauzet
                                    dan</span></span>
                        </p>
                        <div id="calendar" class="h-100"></div>
                    </div>

                    <div class="ostatak-sekcija mt-3">
                        <h4><span class="opis"></span>
                            Opis
                        </h4>
                        <p class="lead undertext">Opisite majstoru ukratko vas razlog angazovanja, kvar ili posao koji
                            treba
                            obaviti</p>
                        <textarea name="opis" class="opis-tekst  mb-4" id="opis" rows="7" placeholder="Type..."></textarea>
                    </div>
                    <div class="text-center">
                        <button type="button" class="prijavi-button btn btn-primary text-white py-2 mt-4 fs-4" onclick="Angazovanje()">ANGAZUJ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <section class="p-5 bg-primary nasMajstor">
        <div class="container">
            <h2 class="nepravilnost pt-5 text-white fs-1">
                PRIJAVITE NEPRAVILNOST
            </h2>
            <h4 class="text-white nepravilnost-dodatak fs-5">Pronasli ste netacne podatke ili neki od brojeva vise
                nisu
                u funkciji?
            </h4>
            <div style="text-align: center;">
                <button type="button" class="prijavi-button btn btn-dark text-white py-2 mt-4 fs-4">PRIJAVI</button>
            </div>
        </div>
    </section>
    <footer class="p-4 bg-dark text-white text-center position-relative">
        <div class="container">
            <p class="lead footer">Copyright &copy; 2022 FixIT</p>
            <a href="#" class="position-absolute bottom-0 end-0 p-4">
                <i class="bi bi-arrow-up-circle h1"></i>
            </a>
        </div>
    </footer>
    <!-- JS for jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- JS for full calender -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://kit.fontawesome.com/3e24ca445f.js" crossorigin="anonymous"></script>
    <script>
        const tabs = document.querySelectorAll('[data-tab-target]')
        const tabContents = document.querySelectorAll('[data-tab-content]')
        const nestani = document.querySelector('#nestani');
        const crno = document.querySelector('#crno');
        const a = document.querySelector('#a');
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = document.querySelector(tab.dataset.tabTarget)
                tabContents.forEach(tabContent => {
                    tabContent.classList.remove('active')
                })
                tabs.forEach(tab => {
                    tab.classList.remove('active')
                })
                tab.classList.add('active')
                target.classList.add('active')
            })
        })

        function updateElementClass() {
            if (window.innerWidth <= 760) {
                nestani.classList.remove('container');
                crno.classList.add('bg-dark');
                a.classList.add('fs-5');
            } else {
                nestani.classList.add('container');
                crno.classList.remove('bg-dark');
                crno.classList.remove('fs-5');
            }
        }
        updateElementClass();
        window.addEventListener('resize', updateElementClass);

        function Angazovanje() {
            Swal.fire(
                'Uspesno ste angazovali radnika!',
                'Ocekujte odgovor radnika na mail-u',
                'success'
            )
        }
    </script>
    <script>
        $(document).ready(function() {
            display_events();
        }); //end document.ready block

        function display_events() {
            var events = new Array();
            $.ajax({
                url: 'display_event.php',
                dataType: 'json',
                success: function(response) {

                    var result = response.data;
                    $.each(result, function(i, item) {
                        events.push({
                            event_id: result[i].event_id,
                            title: result[i].title,
                            start: result[i].start,
                            end: result[i].end,
                            color: result[i].color,
                            url: result[i].url
                        });
                    })
                    var calendar = $('#calendar').fullCalendar({
                        defaultView: 'month',
                        timeZone: 'local',
                        editable: true,
                        selectable: true,
                        selectHelper: true,
                        select: function(start, end) {
                            alert(start);
                            alert(end);
                            $('#event_start_date').val(moment(start).format('YYYY-MM-DD'));
                            $('#event_end_date').val(moment(end).format('YYYY-MM-DD'));
                            $('#event_entry_modal').modal('show');
                        },
                        events: events,
                        eventRender: function(event, element, view) {
                            element.bind('click', function() {
                                alert(event.event_id);
                            });
                        }
                    }); //end fullCalendar block	
                }, //end success block
                error: function(xhr, status) {
                    alert(xhr.responseText);
                }
            }); //end ajax block	
        }

        function save_event() {
            var event_name = $("#event_name").val();
            var event_start_date = $("#event_start_date").val();
            var event_end_date = $("#event_end_date").val();
            if (event_name == "" || event_start_date == "" || event_end_date == "") {
                alert("Please enter all required details.");
                return false;
            }
            $.ajax({
                url: "save_event.php",
                type: "POST",
                dataType: 'json',
                data: {
                    event_name: event_name,
                    event_start_date: event_start_date,
                    event_end_date: event_end_date
                },
                success: function(response) {
                    $('#event_entry_modal').modal('hide');
                    if (response.status == true) {
                        alert(response.msg);
                        location.reload();
                    } else {
                        alert(response.msg);
                    }
                },
                error: function(xhr, status) {
                    console.log('ajax error = ' + xhr.statusText);
                    alert(xhr.responseText);
                }
            });
            return false;
        }
    </script>
</body>

</html>