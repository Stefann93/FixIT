<?php
session_start();

if (isset($_SESSION["korisnik"]) || isset($_SESSION["korisnik"]) || isset($_SESSION["korisnik"])){
  echo "active";
} else {
  echo "inactive";
}
?>
