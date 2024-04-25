<?php
/* Kontrollon sesionin */
include('konfigurimi.php');
session_start();
$user_check=$_SESSION['Perdoruesi'];
$ses_sql = mysqli_query($lidhe,"SELECT Perdoruesi FROM perdoruesit_umkf WHERE Perdoruesi='$user_check' ");
$rreshti=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_user=$rreshti['Perdoruesi'];
if(!isset($user_check))
{
header("Location: index.php");
} ?>