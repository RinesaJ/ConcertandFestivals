<?php
	include("kontrollo.php");	
?>

<?php
include_once("konfigurimi.php");

$rezultati = mysqli_query($lidhe,
"SELECT * FROM umkf_tedhenat ORDER BY ID_edhena DESC");
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
									<div class="table-wrapper">
										<form action="" method="post">  
											<table>
												<tr>
													<h3>Kërko të dhënat për modifikim</h3>
												</tr>
												<tr>
													<td>
													Shkruaj:
													</td>
													<td>
													<input type="text" name="term" placeholder="Titulli"/>
													</td>
													<td> <input type="submit" value="Kërko" /></td>
												</tr>
												<tr>
													<td>Titulli</td>
													<td>Përshkrimi</td>	
													<td>Dosja</td>
													<td>Pozicioni i faqes</td>
													
													<td>Modifiko</td>
												</tr> 

												<?php
													if (!empty($_REQUEST['term'])) {

													$term = mysqli_real_escape_string($lidhe,$_REQUEST['term']);     

													$sql = mysqli_query($lidhe,	
												"SELECT * FROM umkf_tedhenat 
												WHERE Titulli LIKE '%".$term."%' "); 

										while($rreshti = mysqli_fetch_array($sql)) { 		
										echo "<tr>";
										echo "<td>".$rreshti['Titulli']."</td>";
										echo "<td>".$rreshti['Pershkrimi']."</td>";	
										echo "<td>".$rreshti['Dosja']."</td>";	
										
										echo "<td>".$rreshti['Pozicioni_faqes']."</td>";						
										
										echo "<td><a href=\"modifikotedhenat.php?ID_edhena=$rreshti[ID_edhena]\" class='button' class='button primary'>Modifiko</a> </td>";			
									}
								}
							?>

											</table>
										</form>
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