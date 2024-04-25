<?php
  $rezultati = mysqli_query($lidhe, "SELECT * FROM  umkf_tedhenat WHERE Pozicioni_faqes='meny_administratori'");
  while ($rreshti = mysqli_fetch_assoc($rezultati)) {

  extract($rreshti);
	echo $Pershkrimi;
			  
if($rezultati==null)
  mysqli_free_result($rezultati);
}