<section>
	<?php
    	$rezultati = mysqli_query($lidhe, "SELECT * FROM umkf_tedhenat WHERE Pozicioni_faqes='fundi_faqes'");
            while ($rreshti = mysqli_fetch_assoc($rezultati)) {
            extract($rreshti);
			  
if($rezultati==null)
  mysqli_free_result($rezultati);

            ?>
			<?php echo $Pershkrimi; ?>
		<?php } ?>
</section>