<?php
	include("kontrollo.php");	
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Uebaplikacioni per Menaxhimin e Koncerteve dhe Festivaleve(UMKF)</title>
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
	
							<section>
								<header class="major">
									<h2>Menaxhimi i të dhënave të ballinës</h2>
								</header>
								<div class="features">

									<article>
									<a href="menaxho_eventet.php"><span class="icon solid fa-solid fa-guitar"></span></a>
										<div class="content">
											<a href="menaxho_eventet.php"><h3>Menaxho Eventet</h3></a>
											<p>Forma për menaxhimin e eventeve në uebaplikacion.</p>
										</div>
									</article>
									<article>
									<a href="menaxho_performuesit.php"><span class="icon solid fa-solid fa-music"></span></a>
										<div class="content">
											<a href="menaxho_performuesit.php"><h3>Menaxho Performuesit</h3></a>
											<p>Forma për menaxhimin e performuesit në uebaplikacion.</p>
										</div>
									</article><br>
									<br>
									<article>
									<a href="menaxho_tedhenat.php"><span class="icon solid fa-solid fa-pen"></span></a>
										<div class="content">
											<a href="menaxho_tedhenat.php"><h3>Menaxho të dhënat</h3></a>
											<p>Forma për menaxhimin e të dhënave në uebaplikacion.</p>
										</div>
                                    </article>
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