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
		<script src="jquery.js"></script>
		<script>
    $(document).ready(function () {
        $.getJSON("umkf.json", function (data) {

            var vargu = [];      
            $.each(data, function (index, value) {
                vargu.push(value);       
            });

            var col = [];
            for (var i = 0; i < vargu.length; i++) {
                for (var key in vargu[i]) {
                    if (col.indexOf(key) === -1) {
                        col.push(key);
                    }
                }
            }

            var table = document.createElement("table");

            var tr = table.insertRow(-1);                  
          
            for (var i = 0; i < vargu.length; i++) {

                tr = table.insertRow(-1);

                for (var j = 0; j < col.length; j++) {
                    var tabCell = tr.insertCell(-1);
                    tabCell.innerHTML = vargu[i][col[j]];
                }
            }

            var divContainer = document.getElementById("shfaq");
            divContainer.innerHTML = "";
            divContainer.appendChild(table);
        });
    });
	</script>
	</head>
	<body class="is-preload">

		<div id="wrapper">

			<div id="main">
				<div class="inner">

						<?php include_once("fillimi_faqes.php"); ?>
								
						<p style="text-align: right;">Përshëndetje, <em><?php echo $login_user;?>!</em></p> 
				
						<section>									
							<div class="features">
								<article>
									<div class="content">											
										<h3>Moduli i Administratorit</h3>
										<blockquote id="shfaq"></blockquote>
									</div>
                                </article>    
							</div>
							<a class="button" href="Ajax/index.php">Voto</a>
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