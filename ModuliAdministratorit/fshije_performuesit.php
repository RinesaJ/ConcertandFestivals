<?php

include("konfigurimi.php");

$ID_performuesi_umkf = $_GET['ID_performuesi_umkf'];

$rezultati = mysqli_query($lidhe,"DELETE FROM performuesit_umkf WHERE ID_performuesi_umkf=$ID_performuesi_umkf");

header("Location:menaxho_performuesit.php");
?>

