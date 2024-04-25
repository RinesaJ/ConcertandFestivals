<?php
	include("kontrollo.php");	
?>
<?php
include_once("konfigurimi.php");

if(isset($_POST['modifiko_performuesit']))
{	
	$ID_performuesi_umkf=$_POST['ID_performuesi_umkf'];
	$performuesi_umkf=$_POST['performuesi_umkf'];
	
	if(empty($performuesi_umkf) )
		{			
		if(empty($performuesi_umkf)) {
			echo "<font color='red'>Fusha Performuesi është i zbrazët.</font><br/>";
		}
	} else {	
	
		$rezultati = mysqli_query($lidhe,"UPDATE performuesit_umkf SET performuesi_umkf='$performuesi_umkf' WHERE ID_performuesi_umkf = $ID_performuesi_umkf");
		
		header("Location: menaxho_performuesit.php");
	}
}
?>
<?php

$ID_performuesi_umkf = $_GET['ID_performuesi_umkf'];

$rezultati = mysqli_query($lidhe,"SELECT * FROM performuesit_umkf WHERE ID_performuesi_umkf = $ID_performuesi_umkf");

while($res = mysqli_fetch_array($rezultati))
{
	$performuesi_umkf = $res['performuesi_umkf'];
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
		<title>Moduli Administratorit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main1.css" />
	</head>
	<body class="is-preload">
		<div id="wrapper">
			<div id="main">
				<div class="inner">
		
					<?php include_once("fillimi_faqes.php"); ?>
		
					<section id="main" class="wrapper">
						<div class="inner">
							<p style="text-align:right;">Përshëndetje, <em><?php  echo $login_user;?>!</em></p>
							<div class="content">
								<div class="row">
									<form name="form1" method="post" action="modifiko_performuesit.php">
										<h3>Modifiko të dhënat e performuesit</h3>
										Performuesi
										<input type="text" name="performuesi_umkf" value='<?php echo $performuesi_umkf;?>' required />
										<br>
										<input type="hidden" name="ID_performuesi_umkf" value='<?php echo $_GET['ID_performuesi_umkf'];?>' />
										<input type="submit" name="modifiko_performuesit" value="Modifiko">
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