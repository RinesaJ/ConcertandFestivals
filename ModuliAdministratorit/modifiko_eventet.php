<?php
	include("kontrollo.php");	
?>
<?php
	include_once("konfigurimi.php");

if(isset($_POST['modifiko_eventet']))
{	
	$ID_eventi_umkf = $_POST['ID_eventi_umkf'];
	$Koncert_umkf = $_GET['Koncert_umkf'];
	$Festival_umkf = $_GET['Festival_umkf'];
	$ID_performuesi_umkf=$_POST['ID_performuesi_umkf'];
	$Pershkrimi=$_POST['Pershkrimi'];

	$foto =addslashes (file_get_contents($_FILES['foto']['tmp_name']));

	
	$maxsize = 10000000; 

	if(empty($Koncert_umkf && $Festival_umkf)  || empty($ID_performuesi_umkf) ||  empty($Pershkrimi) || empty($foto)) {
				
		if(empty($Koncert_umkf && $Festival_umkf)) {
			echo "<font color='red'>Fusha Eventi është e zbrazët.</font><br/>";
		}
		
		if(empty($ID_performuesi_umkf)) {
			echo "<font color='red'>Fusha Performuesi është e zbrazët.</font><br/>";
		}
		
		if(empty($Pershkrimi)) {
			echo "<font color='red'>Fusha Përshkrimi është e zbrazët.</font><br/>";
		}
		if(empty($foto)) {
			echo "<font color='red'>Fusha Foto është e zbrazët.</font><br/>";
		}
	
	} else {	
		$rezultati = mysqli_query($lidhe,"UPDATE eventet_umkf SET Koncert_umkf='$Koncert_umkf,$Festival_umkf', ID_performuesi_umkf='$ID_performuesi_umkf', Pershkrimi='$Pershkrimi', foto='$foto' WHERE ID_eventi_umkf=$ID_eventi_umkf");
		
		header("Location: menaxho_eventet.php");
	}
}
?>
<?php
$Koncert_umkf = $_GET['Koncert_umkf'];
$Festival_umkf = $_GET['Festival_umkf'];

$rezultati = mysqli_query($lidhe,"SELECT * FROM eventet_umkf WHERE ID_eventi_umkf=$Koncert_umkf ,$Festival_umkf");

while($res = mysqli_fetch_array($rezultati))
{
	$Koncert_umkf = $_GET['Koncert_umkf'];
	$Festival_umkf = $_GET['Festival_umkf'];
	$ID_performuesi_umkf = $res['ID_performuesi_umkf'];
	
	$Pershkrimi = $res['Pershkrimi'];
}
?>


<!DOCTYPE HTML>
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
												<form enctype="multipart/form-data"  action="modifiko_eventet.php" method="post" name="form1">
												<table width='100%' border=0>
														<h3>Modifiko të dhënat e Eventit</h3>
													<tr> 
														<td>Koncerti</td>
														<td><input type="text" name="Koncert_umkf" value='<?php echo $Koncert_umkf;?>' required /></td>
													</tr>
													<tr> 
														<td>Festivali</td>
														<td><input type="text" name="Festival_umkf" value='<?php echo $Festival_umkf;?>' required /></td>
													</tr>
													<tr>
														<select name="ID_performuesi_umkf">
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
														</select><br />
													</tr>
													
													<tr> 
														<td>Pershkrimi</td>
														<td><input type="text" name="Pershkrimi" value='<?php echo $Pershkrimi;?>'  required /></td>
													</tr>		
													<tr>
														<td><input type="hidden" name="MAX_FILE_SIZE" value="10000000" /></td>
														<td><input name="foto" type="file"  value='<?php echo $foto;?>'  required/></td>
													</tr>
													<tr>
														<td><input type="hidden" name="ID_eventi_umkf" value='<?php echo $_GET['ID_eventi_umkf'];?>' /></td>
														<td><input type="submit" name="modifiko_eventet" value="Modifiko"></td>
													</tr>
												</table>
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