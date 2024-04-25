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
											<div class="col-12 col-12-medium">

											<h3>Shto Performues</h3>
											
												<div class="table-wrapper">
													<form method="post" action="shto_performuesit.php">
														<div class="table-wrapper">
															<div class="row gtr-uniform">
																<div class="col-6 col-12-xsmall">
																	<input type="text" name="Performuesi" id="Performuesi" value="" placeholder="Performuesi" />
																</div>
																<div class="col-6">
																	<ul class="actions">
																	<li><input type="submit" name="shto_performuesit" value="Shto" class="primary" /></li>
																	</ul>
																</div>
															</div>
														</div>
													</form>
													<br>
													<form action="" method="post">  
														<br><br>
														<table>
															<tr>
																<h3>Kërko performues për modifikim ose fshirje</h3>
															</tr>
															<tr>
																<td>
																Shkruaj:
																</td>
																<td>
																<input type="text" name="term" placeholder="Performuesi" value=""/>
																</td>
																<td> <input type="submit" value="Kërko" /></td>
															</tr>
														</table> 
													</form> 
													<div class="table-wrapper">
														<table width='80%' border=0>
															<div class="table-wrapper">
																<tr>
																	<td>Performuesi</td>
																	<td>Modifiko</td>
																	<td>Fshij</td>
																</tr> 
														<?php
														if (!empty($_REQUEST['term'])) {
														$term = mysqli_real_escape_string
														($lidhe,$_REQUEST['term']);     
														$sql = mysqli_query($lidhe,
														"SELECT * FROM performuesit_umkf
														WHERE performuesi_umkf LIKE '%".$term."%'"); 
														while($rreshti = mysqli_fetch_array($sql)) { 		
																echo "<tr>";
																echo "<td>".$rreshti['performuesi_umkf']."</td>";
																echo "<td><a href=\"modifiko_performuesit.php?ID_performuesi_umkf=$rreshti[ID_performuesi_umkf]\" class='button' class='button primary'>Modifiko</a></td>";
																echo "<td><a href=\"fshije_performuesit.php?ID_performuesi_umkf=$rreshti[ID_performuesi_umkf]\" onClick=\"return confirm('A jeni të sigurt se dëshironi të fshini performuesin?')\" class='button' class='button primary'>Fshij</a>
																</td></tr>";		
															}
														}
														?>
															</div>
														</table>															
													</div>
												</div>		
											</div>
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