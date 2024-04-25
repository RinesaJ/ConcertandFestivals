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

if(isset($_POST['shto'])) {	
	$Perdoruesi = $_POST['Perdoruesi'];
	$Fjalekalimi = $_POST['Fjalekalimi'];
	$Email = $_POST['Email'];
		
	if(empty($Perdoruesi) || empty($Fjalekalimi) || empty($Email)) {			
		if(empty($Perdoruesi)) {echo "<font color='red'>Fusha e përdoruesit është e zbrazët.</font><br/>";}
		if(empty($Fjalekalimi)) {echo "<font color='red'>Fusha e fjalëkalimit është e zbrazët.</font><br/>";}
		if(empty($Email)) {echo "<font color='red'>Fusha e email është e zbrazët.</font><br/>";}
	
		echo "<script>
		setTimeout(function(){
		   window.location.href = 'shto_perdorues.php';
		}, 3000);
	 </script>";
		echo"<p><b> Ju lutem prisni 3 sekonda deri sa të ktheheni në formën e shtimit të përdoruesve. <b></p>";
   
	} else { 
	
		$rezultati = mysqli_query($lidhe, "INSERT INTO perdoruesit_umkf(Perdoruesi,Fjalekalimi,Email) VALUES('$Perdoruesi','$Fjalekalimi','$Email')");
	
	echo "<script>
         setTimeout(function(){
            window.location.href = 'perdoruesit.php';
         }, 3000);
      </script>";
		 echo"<p><b> E dhëna është duke u regjistruar në sistem. Ju lutem prisni 3 sekonda. <b></p>";
		
	}
}
?>
	</body>
</html>