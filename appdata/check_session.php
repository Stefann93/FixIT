<?php
session_start();

if (isset($_SESSION["korisnik"]) || isset($_SESSION["fizicko lice"]) || isset($_SESSION["firma"])) {
  echo "active";
} else {
  echo "inactive";
}
