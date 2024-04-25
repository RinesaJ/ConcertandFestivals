<?php
	include("kontrollo.php");	
?>
<?php
include_once("konfigurimi.php");

if(isset($_POST['modifiko']))
{	
	$ID_perdoruesi_umkf = $_POST['ID_perdoruesi_umkf'];
	
	$perdoruesi_umkf=$_POST['Perdoruesi'];
	$fjalekalimi_umkf=$_POST['Fjalekalimi'];
	$Email=$_POST['Email'];	
	
	if(empty($perdoruesi_umkf) || empty($fjalekalimi_umkf) || empty($Email)) {	
			
		if(empty($perdoruesi_umkf)) {
			echo "<font color='red'>Fusha Përdoruesi është i zbrazët.</font><br/>";
		}
		if(empty($fjalekalimi_umkf)) {
			echo "<font color='red'>Fusha Fjalëkalimi është i zbrazët.</font><br/>";
		}
		if(empty($Email)) {
			echo "<font color='red'>Fusha Email është i zbrazët.</font><br/>";
		}		
	} else {	
		$rezultati = mysqli_query($lidhe,"UPDATE perdoruesit_umkf SET Perdoruesi='$perdoruesi_umkf',Fjalekalimi='$fjalekalimi_umkf',Email='$Email' WHERE ID_perdoruesi_umkf=$ID_perdoruesi_umkf");
		
		header("Location: modifiko_perdorues.php");
	}
}
?>
<?php
$ID_perdoruesi_umkf = $_GET['ID_perdoruesi_umkf'];

$rezultati = mysqli_query($lidhe,"SELECT * FROM perdoruesit_umkf WHERE ID_perdoruesi_umkf=$ID_perdoruesi_umkf");

while($res = mysqli_fetch_array($rezultati))
{
	$perdoruesi_umkf = $res['Perdoruesi'];
	$fjalekalimi_umkf = $res['Fjalekalimi'];
	$Email = $res['Email'];
}
?>

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
	<body class="is-preload">

			<div id="wrapper">

				<div id="main">
					<div class="inner">

					<?php include_once("fillimi_faqes.php"); ?>
							
					<p style="text-align: right;">Përshëndetje, <em><?php echo $login_user;?>!</em></p> 

						<section id="main" class="wrapper">
							<div class="inner">
								<div class="content">
									<div class="row">
										<form name="form1" method="post" action="modifiko.php">
											<h3>Modifiko të dhënat e përdoruesit</h3>
											Përdoruesi
											<input type="text" name="Perdoruesi" value='<?php echo $perdoruesi_umkf;?>' />
											<br>
											Fjalëkalimi
											<input type="text" name="Fjalekalimi" value='<?php echo $fjalekalimi_umkf;?>' />
											<br>
											Email-i
											<input type="text" name="Email" value='<?php echo $Email;?>' />
											<br>
											<input type="hidden" name="ID_perdoruesi_umkf" value='<?php echo $_GET['ID_perdoruesi_umkf'];?>' />
											<input type="submit" name="modifiko" value="Modifiko">
										</form>
									</div>
								</div>
							</div>
						</section>
							
					</div>
				</div>

					
					<div id="sidebar">
						<div class="inner">

							<?php include_once("meny.php"); ?>

							<?php include_once("fundi_faqes.php"); ?>

						</div>
					</div>

			</div>

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>