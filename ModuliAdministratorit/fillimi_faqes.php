<header id="header">						
		<ul class="icons">
				<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon brands fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
				<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
				<li><a href="#" class="icon brands fa-medium-m"><span class="label">Medium</span></a></li>
		</ul>
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
	</section>	
	 
<?php } ?>