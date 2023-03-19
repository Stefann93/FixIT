<?php
$host = "localhost";
$dbusername = "fixitinr_fixit"; //fixitinr_fixit
$dbpassword = "9KD!Co9]B+D*"; //9KD!Co9]B+D*
$dbname = "fixitinr_fixit"; //fixitinr_fixit
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if (isset($_POST['option'])) {
    $selectedOption = $_POST['option'];
    $poslovi = $conn->query("SELECT naziv_posla,posao_id FROM poslovi Where id_delatnosti = '$selectedOption'")
        or die($conn->error);
} ?>
<option value="odaberiPosao" id="odaberiPosao" disabled selected>Odaberi vrstu posla </option>
<?php while ($podatakPosao = $poslovi->fetch_assoc()) :
?>
    <option value="<?= $podatakPosao['posao_id']; ?>"><?= $podatakPosao['naziv_posla']; ?></option>
<?php endwhile; ?>