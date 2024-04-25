<?php
    session_start();
    require("kontrolluesidb.php");
	$kontrolluesidb = new kontrolluesidb();
	
	$ID_Pergjigjja  = $_POST['Pergjigjja'];
	$ID_Pyetja = $_POST['Pyetja'];
	
	$query = "INSERT INTO votimi_umkf (ID_Pyetja,ID_Pergjigjja,ID_Pjesmarresi) VALUES ('" . $ID_Pyetja ."','" . $ID_Pergjigjja . "','" . $_SESSION["ID_Pjesmarresi"] . "')";
    $insert_id = $kontrolluesidb->insertQuery($query);
    
    if(!empty($insert_id)) {
        $query = "SELECT * FROM pergjigjet_umkf WHERE ID_pyetja = " . $ID_pyetja;
        $Pergjigjja = $kontrolluesidb->runQuery($query);
    }
    
    if(!empty($Pergjigjja)) {
?>        
        <div class="poll-heading"> Rezultati </div> 
<?php
        $query = "SELECT count(ID_Pergjigjja) as total_count FROM votimi_umkf WHERE ID_pyetja = " . $ID_pyetja;
        $total_rating = $kontrolluesidb->runQuery($query);

        foreach($Pergjigjja as $k=>$v) {
            $query = "SELECT count(ID_Pergjigjja) as Pergjigjja_count FROM votimi_umkf WHERE ID_pyetja = " .$ID_pyetja . " AND ID_Pergjigjja = " . $Pergjigjja[$k]["ID"];
            $Pergjigjja_rating = $kontrolluesidb->runQuery($query);
            $Pergjigjejet_count = 0;
            if(!empty($Pergjigjja_rating)) {
                $Pergjigjejet_count = $Pergjigjja_rating[0]["Pergjigjja_count"];
            }
            $percentage = 0;
            if(!empty($total_rating)) {
                $percentage = ( $Pergjigjejet_count / $total_rating[0]["total_count"] ) * 100;
                if(is_float($percentage)) {
                    $percentage = number_format($percentage,2);
                }
            }
            
?>
		<div class="answer-rating"> <span class="answer-text"><?php echo $Pergjigjja[$k]["Pergjigjja"]; ?></span><span class="answer-count"> <?php echo $percentage . "%"; ?></span></div>      
<?php 
        }
    }
?>
<div class="poll-bottom">
	<button class="next-link" onClick="show_poll();">Vazhdo</button>
</div>