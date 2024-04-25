<html>
<head>
<title>Moduli Administratorit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		
		
<?php
include('../konfigurimi.php');
session_start();
$user_check=$_SESSION['Perdoruesi'];
$ses_sql = mysqli_query($lidhe,"SELECT ID_perdoruesi_umkf, Perdoruesi FROM perdoruesit_umkf WHERE Perdoruesi='$user_check' ");
$rreshti=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_user=$rreshti['Perdoruesi'];
if(!isset($user_check))
{ header("Location: index.php");} 

	
    $_SESSION["ID_Pjesmarresi"] =  $rreshti['ID_perdoruesi_umkf'];
    
	require("kontrolluesidb.php");
	$kontrolluesidb = new kontrolluesidb();
	
	$query = "SELECT DISTINCT ID_pyetja from votimi_umkf WHERE ID_Pjesmarresi = " . $_SESSION["ID_Pjesmarresi"]; 
	$rezultati = $kontrolluesidb->getIds($query);
	
	$condition = "";
	if(!empty($rezultati)) {
	    $condition = " WHERE id NOT IN (" . implode(",", $rezultati) . ")";
    }
    
    $query = "SELECT * FROM `pyetjet_umkf` " . $condition . " limit 1";
    $Pyetjet = $kontrolluesidb->runQuery($query);
    
    if(!empty($Pyetjet)) {
?>      
		<div class="Pyetja"><?php echo $Pyetjet[0]["Pyetja"]; ?><input type="hidden" name="Pyetja" id="Pyetja" value="<?php echo $Pyetjet[0]["ID_pyetja"]; ?>" ></div>      
<?php 
        $query = "SELECT * FROM  pergjigjiet_umkf WHERE ID_pyetja = " . $Pyetjet[0]["ID_pyetja"];
        $Pergjigjejet = $kontrolluesidb->runQuery($query);
        if(!empty($Pergjigjejet)) {
            foreach($Pergjigjejet as $k=>$v) {
                ?>
			<div class="Pyetja"><input type="radio" name="Pergjigjja" class="radio-input" value="<?php echo $Pergjigjejet[$k]["ID_pyetja"]; ?>" /><?php echo $Pergjigjejet[$k]["Pergjigjja"]; ?></div>      
<?php 
            }
        }
?>
		<div class="poll-bottom">
			<button id="btnSubmit" onClick="addPoll()">Dergo</button>
		</div>
<?php        
    } else {
?>

<div class="error">Votimi perfundoi me sukses!</div>


<?php 
    }
?>