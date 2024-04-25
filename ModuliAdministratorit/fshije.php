<?php
include("konfigurimi.php");

$ID_perdoruesi_umkf = $_GET['ID_perdoruesi_umkf'];

$rezultati = mysqli_query($lidhe,"DELETE FROM perdoruesit_umkf WHERE ID_perdoruesi_umkf=$ID_perdoruesi_umkf");

header("Location:fshije_perdorues.php");
?>

