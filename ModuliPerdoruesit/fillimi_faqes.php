<header id="header">
						
<?php
    $rezultati = mysqli_query($lidhe, "SELECT * FROM umkf_tedhenat WHERE Pozicioni_faqes='fillimi_faqes_rrsociale'");
    while ($rreshti = mysqli_fetch_assoc($rezultati)) {

    extract($rreshti);
					  
if($rezultati==null)
mysqli_free_result($rezultati);
           ?>
			
			<div class="content">
				<header>
            		 <?php echo $Pershkrimi ?>
				</header> 
			</div>
			<?php } ?>
</header>
		
			<?php
            $rezultati = mysqli_query($lidhe, "SELECT * FROM umkf_tedhenat WHERE Pozicioni_faqes='fillimi_faqes'");
            while ($rreshti = mysqli_fetch_assoc($rezultati)) {

            extract($rreshti);
			  	  
if($rezultati==null)
  mysqli_free_result($rezultati);

            ?>
			<section id="banner">
				<div class="content">
					<header>
            			 <h1><?php echo $Titulli ?></h1>  
					</header> 
				</div>
				<span class="image object">
				<img src="foto/pic6.jpg" />
				</span>
	 		</section>
		<?php } 
	?>
	