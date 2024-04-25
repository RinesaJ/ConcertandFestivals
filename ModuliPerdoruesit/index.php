<!DOCTYPE HTML>
<?php include_once("konfigurimi.php"); ?>

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

					<section>				
					<div class="posts">
					

					<?php
			$rezultati = mysqli_query($lidhe, "SELECT eventet_umkf.Koncert_umkf,eventet_umkf.Festival_umkf,performuesit_umkf.performuesi_umkf,eventet_umkf.foto,eventet_umkf.Pershkrimi FROM eventet_umkf  LEFT OUTER JOIN performuesit_umkf ON eventet_umkf.ID_performuesi_umkf = performuesit_umkf.ID_performuesi_umkf
			  GROUP BY eventet_umkf.Koncert_umkf,eventet_umkf.Festival_umkf,performuesit_umkf.performuesi_umkf,eventet_umkf.foto,eventet_umkf.Pershkrimi
			  ORDER BY performuesit_umkf.ID_performuesi_umkf,eventet_umkf.ID_performuesi_umkf DESC");

				
			

					while ($rreshti = mysqli_fetch_assoc($rezultati)) {

					extract($rreshti);
								
					if($rezultati==null)
					mysqli_free_result($rezultati);
							
					?>
				<article>
					<div class="foto">
					<?php echo '<img src="data:foto/jpeg;base64,'.base64_encode( $rreshti['foto'] ).'" width="100%" height="100%">'; ?>			
					</div>
							<h2><?php echo $Koncert_umkf; ?></h2>
						
							<p><b>Eventi: </b><?php echo $Koncert_umkf , $Festival_umkf; ?> </p>
							<p><b>Performuesi: </b><?php echo $performuesi_umkf; ?></p>	
							<p><b>Pershkrimi: </b><?php echo $Pershkrimi; ?></p>	
																
				</article>
				<?php } ?>                                                  
						
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