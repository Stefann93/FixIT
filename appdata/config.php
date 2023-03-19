<?php

$db_user = "fixitinr_fixit";
$db_pass = "9KD!Co9]B+D*";
$db_name = "fixitinr_fixit";
$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
