<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Uebaplikacioni Për Menaxhimin e Koncerteve dhe Festivaleve(UMKF)</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main1.css" />
	</head>
	<body>
	<?php

include_once("konfigurimi.php");

if(isset($_POST['shto_evetet'])) {	
	$Koncert=$_POST['Koncert_umkf'];
	$Festival=$_POST['Festival_umkf'];
	$ID_performuesi_umkf=$_POST['shto_performuesit'];
	
	$Pershkrimi=$_POST['Pershkrimi'];
	
	$foto =addslashes (file_get_contents($_FILES['foto']['tmp_name']));

		
	$maxsize = 10000000; //set to approx 10 MB
	
	// checking empty fields
	if(empty($Koncert) || empty($Festival) || empty($ID_performuesi_umkf) || empty($Pershkrimi) || empty($foto)) {
				
		if(empty($Koncert)) {
			echo "<font color='red'>Fusha Koncerti është i zbrazët.</font><br/>";
		}
		if(empty($Festival)) {
			echo "<font color='red'>Fusha Festivali është i zbrazët.</font><br/>";
		}
	
		if(empty($ID_performuesi_umkf)) {
			echo "<font color='red'>Fusha Performuesi është i zbrazët.</font><br/>";
		}
	
		if(empty($Pershkrimi)) {
			echo "<font color='red'>Fusha Përshkrimi është i zbrazët.</font><br/>";
		}
		if(empty($foto)) {
			echo "<font color='red'>Fusha Foto është e zbrazët.</font><br/>";
		}
		
	} else { 
			
		$rezultati = mysqli_query($lidhe, "INSERT INTO eventet_umkf(Koncert_umkf,Festival_umkf, ID_performuesi_umkf,  Pershkrimi, foto)
		 VALUES('$Koncert','$Festival','$ID_performuesi_umkf', '$Pershkrimi','$foto')");
		
	echo "<script>
         setTimeout(function(){
            window.location.href = 'menaxho_eventet.php';
         }, 3000);
      </script>";
		 echo"<p><b> Eventi është duke u regjistruar në sistem. Ju lutem prisni 3 sekonda. <b></p>";
	
	}
}
?>
			
	</body>
</html>