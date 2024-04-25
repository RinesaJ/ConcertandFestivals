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
									<div class="table-wrapper">
										<form action="" method="post">  
											<table>
												<tr>
													<h3>Kërko të dhënat e përdoruesit për modifikim</h3>
												</tr>
												<tr>
													<td>
														Shkruaj:
													</td>
													<td>
														<input type="text" name="term" placeholder="Përdoruesin ose Email-in"/>
													</td>
													<td> 
														<input type="submit" value="Kërko" />
													</td>
												</tr>
											</table> 
										</form> 
										
										<div class="table-wrapper">
											<table>
												<div>
													<tr>
														<td>Përdoruesi</td>
														<td>Fjalëkalimi</td>
														<td>Email-i</td>
														<td>Modifiko</td>
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
																echo "<td><a href=\"modifiko.php?ID_perdoruesi_umkf=$rreshti[ID_perdoruesi_umkf]\" class='button' class='button primary'>Modifiko</a></td></tr>";		
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