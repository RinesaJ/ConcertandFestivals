<?php
include("konfigurimi.php");

$ID_eventi_umkf = $_GET['ID_eventi_umkf'];

$rezultati = mysqli_query($lidhe,"DELETE FROM eventet_umkf WHERE ID_eventi_umkf=$ID_eventi_umkf");

header("Location:menaxho_eventet.php");
?>

