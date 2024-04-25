<?php
	include('kycu.php'); 
	if ((isset($_SESSION['Perdoruesi']) != '')) 
	{
		header('Location: faqja_administratorit.php');
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
									
				<hr class="major" />
										
					<div class="row gtr-200">
						<div class="col-6 col-12-medium">

						<h3><i>Udhëzim</i></h3>
							<blockquote>Për kycje në Uebaplikacion kontaktoni Administratorin për krijimin e llogarisë.</blockquote>
													
						</div>
						<div class="col-6 col-12-medium">

							<h3>Forma për kycje</h3>

								<form method="post" action="#">
									<div class="row gtr-uniform">
										<div class="col-6 col-12-xsmall">
												<input type="text" name="Perdoruesi" id="demo-name" value="" placeholder="Perdoruesi" />
										</div>
										<div class="col-6 col-12-xsmall">
											<input type="password" name="Fjalekalimi" id="demo-email" value="" placeholder="Fjalekalimi" />
										</div>
										<div class="col-12">
											<ul class="actions">
												<li><input type="submit" name="submit" value="Kycu" class="primary" /></li>
											</ul>
										</div>
									</div>
								</form>

						</div>
					</div>

				</div>
			</div>

					<div id="sidebar">
						<div class="inner">

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