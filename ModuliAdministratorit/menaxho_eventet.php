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
								
							<p style="text-align: right;">Përshëndetje, <em><?php echo $login_user;?>!</em></p> 

							<section>
								<div class="content">
									
										<div class="row">
											<div class="col-12 col-12-medium">
												
												<h3>Shto Eventet</h3>

													<div class="table-wrapper">
														<form enctype="multipart/form-data"  action="shto_eventet.php" method="post" name="form1">
															<table>																	
																<tr> 
																	<td>Eventi</td>
																	<td><input type="text" name="eventet_umkf"></td>
																</tr>
																<tr>
																	<select name="ID_eventi_umkf">
																		<option selected="selected">Zgjedh Performuesin</option>
																			<?php
																			$res=mysqli_query($lidhe,"SELECT * FROM performuesit_umkf");
																			while($rreshti=$res->fetch_array())
																			{
																				?>
																				<option value="<?php echo $rreshti['ID_performuesi_umkf']; ?>"><?php echo $rreshti['performuesi_umkf']; ?></option>
																				<?php
																			}
																			?>
																	</select><br/>
																<tr>
																</tr>
																
																<tr> 
																	<td>Pershkrimi</td>
																	<td><input type="text" name="Pershkrimi"></td>
																</tr>
																<tr>                                       
																	<td><input type="hidden" name="MAX_FILE_SIZE" value="10000000" /></td>
																	<td><input name="foto" type="file" /></td>
																</tr>																
																<tr> 
																	<td></td>
																	<td><input type="submit" name="shto_eventet" value="Shto"></td>
																</tr>                                                               																					
															</table>
														</form>
													</div>
								
																		
										<div class="row">
											<div class="col-12 col-12-medium">
												<form action="" method="post">  
													<table>
														<tr>
															<h3>Kërko Eventin për modifikim ose fshirje </h3>
														</tr>
														<tr>
															<td>
															Shkruaj:
															</td>
															<td>
															<input type="text" name="term" placeholder="Eventi ose Pershkrimi"/>
															</td>
															<td> <input type="submit" value="Kërko" /></td>
														</tr>
														<table>
															<tr>
																<td>Konerte</td>
																<td>Festival</td>
																<td>Performuesi</td>
																<td>Përshkrimi</td>
																<td>Foto</td>	
																<td>Modifiko</td>
																<td>Fshijë</td>
															</tr> 

														<?php
															if (!empty($_REQUEST['term'])) {

															$term = mysqli_real_escape_string($lidhe,$_REQUEST['term']);     

															$sql = mysqli_query($lidhe,	
														"SELECT
														e.ID_eventi_umkf,
														e.Koncert_umkf,
														e.Festival_umkf,
														p.performuesi_umkf,
														
														e.Pershkrimi,
														e.foto

														FROM
														eventet_umkf e
														INNER JOIN
														performuesit_umkf p ON e.ID_performuesi_umkf = p.ID_performuesi_umkf
														WHERE
														e.Koncert_umkf OR e.Festival_umkf LIKE '%".$term."%' OR e.Pershkrimi LIKE '%".$term."%'"
															); 

															while($rreshti = mysqli_fetch_array($sql)) { 		
																	echo "<tr>";
																	echo "<td>".$rreshti['Koncert_umkf']."</td>";
																	echo "<td>".$rreshti['Festival_umkf']."</td>";
																	echo "<td>".$rreshti['performuesi_umkf']."</td>";
																	echo "<td>".$rreshti['Pershkrimi']."</td>";
																	
																	
																echo "<td><img src=data:foto/jpeg;base64,".base64_encode($rreshti['foto'])." width='80'  height='100'/></td>";
													
																echo "<td><a href=\"modifiko_eventet.php?ID_eventi_umkf=$rreshti[ID_eventi_umkf]\" class='button' class='button primary'>Modifiko</a> </td>";	
																echo "<td><a href=\"fshije_eventet.php?ID_eventi_umkf=$rreshti[ID_eventi_umkf]\" onClick=\"return confirm('A jeni të sigurt se dëshironi ta fshini eventin?')\" class='button' class='button primary'>Fshijë</a></a> </td>";			
											
																}

															}

															?>
													</table>
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