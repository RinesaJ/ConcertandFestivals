<?php

include("../konfigurimi.php");

$id_perdoruesi_umkf = $_GET['ID_perdoruesi_umkf'];

$result = mysqli_query($conn,"DELETE FROM perdoruesit_umkf WHERE ID_perdoruesi_umkf=$ID_perdoruesi_umkf");


header("Location:fshije_perdorues.php");
?>

