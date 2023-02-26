<?php
$host = "localhost";
$dbusername = "root"; //fixitinr_fixit
$dbpassword = ""; //9KD!Co9]B+D*
$dbname = "fixitinr_fixit"; //fixitinr_fixit
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if (isset($_POST['option'])) {
    $selectedOption = $_POST['option'];
    $poslovi = $conn->query("SELECT naziv_posla FROM poslovi INNER JOIN delatnosti ON poslovi.id_delatnosti = delatnosti.id_delatnosti WHERE delatnosti.naziv_delatnosti = '$selectedOption'")
        or die($conn->error);
} ?>
<option value="odaberiPosao" id="odaberiPosao" disabled selected>Odaberi vrstu posla </option>
<?php while ($podatakPosao = $poslovi->fetch_assoc()) :
?>
    <option value="<?= $podatakPosao['naziv_posla']; ?>"><?= $podatakPosao['naziv_posla']; ?></option>
<?php endwhile; ?>