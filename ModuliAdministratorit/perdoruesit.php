<?php
	include("kontrollo.php");	
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
			
				<!-- Section -->
					<section>
						<header class="major">
							<h2>Përdoruesit</h2>
						</header>
						<div class="features">	
							<article>
								<a href="shto_perdoruesit.php"><span class="icon solid fa-solid fa-user-plus"></a></span>
									<div class="content">
										<a href="shto_perdorues.php"><h3>Shto Përdorues</h3></a>
										<p>Forma për shtimin e përdoruesve të rinjë në Uebaplikacionin.</p>
									</div>
							</article>
							<article>
								<a href="modifiko_perdorues.php"><span class="icon solid fa-solid fa-pen"></a></span>
									<div class="content">
										<a href="modifiko_perdorues.php"><h3>Modifiko Përdorues</h3></a>
										<p>Forma për modifikimin e përdoruesve në Uebaplikacionin.</p>
									</div>
							</article>
							<article>
								<a href="fshije_perdorues.php"><span class="icon solid fa-solid fa-user-slash"></a></span>
									<div class="content">
										<a href="fshije_perdorues.php"><h3>Fshij Përdorues</h3></a>
										<p>Forma për fshirjen e Përdoruesve në Uebaplikacionin.</p>
									</div>
							</article>
						</div>
						<br>
						<div class="inner">
							<div class="content">
								<div class="row">
									<div class="table-wrapper">
										<form action="" method="post">  
											<table>
												<tr>
													<h3>Kërko të dhënat e përdoruesit</h3>
												</tr>
												<tr>
													<td>
													Shkruaj:
													</td>
													<td>
													<input type="text" name="term" value="%" placeholder="Përdoruesin ose Email-in"/>
													</td>
													<td> 
													<input type="submit" value="Kërko" /></td>
												</tr>
											</table> 
										</form> 													
									</div>
								</div>
								<div class="table-wrapper">
									<table>
										<tr>
											<td>Përdoruesi</td>
											<td>Fjalëkalimi</td>
											<td>Email-i</td>
										</tr> 
													<?php
													if (!empty($_REQUEST['term'])) {
													$term = mysqli_real_escape_string
													($lidhe,$_REQUEST['term']);     
													$sql = mysqli_query($lidhe,
													"SELECT * FROM perdoruesit_umkf
													WHERE Perdoruesi LIKE '%".$term."%' 
													OR  Email LIKE '%".$term."%'"); 
													while($rreshti = mysqli_fetch_array($sql)) { 		
															echo "<tr>";
															echo "<td>".$rreshti['Perdoruesi']."</td>";
															echo "<td>".$rreshti['Fjalekalimi']."</td>";
															echo "<td>".$rreshti['Email']."</td>";														
															}
														}
													?>											
									</table>
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