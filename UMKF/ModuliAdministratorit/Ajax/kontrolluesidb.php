<?php
class kontrolluesidb {
	private $vendilokal = "localhost";
	private $Perdoruesi = "root";
	private $Fjalkalimi = "";
	private $databaza = "umkf";
	private $lidhe;
	
	function __construct() {
		$this->lidhe = $this->connectDB();
	}
	
	function connectDB() {
		$lidhe = mysqli_connect($this->vendilokal,$this->Perdoruesi,$this->Fjalkalimi,$this->databaza);
		return $lidhe;
	}
	
	function runQuery($query) {
		$rezultati = mysqli_query($this->lidhe,$query);
		while($rreshti=mysqli_fetch_array($rezultati)) {
			$resultset[] = $rreshti;
		}
		if(!empty($resultset))
			return $resultset;
	}
	
	function insertQuery($query) {
	    mysqli_query($this->lidhe, $query);
	    $insert_id = mysqli_insert_id($this->lidhe);
	    return $insert_id;
	}
	
	function getIds($query) {
	    $rezultati = mysqli_query($this->lidhe,$query);
	    while($rreshti=mysqli_fetch_array($rezultati)) {
	        $resultset[] = $rreshti[0];
	    }
	    if(!empty($resultset))
	        return $resultset;
	}
}
?>