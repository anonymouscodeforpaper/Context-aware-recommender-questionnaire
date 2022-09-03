<?php

session_start();

$serveur = "localhost";
$base = "Recsys";
$user = "root";
$pass = "110119zjf";
$mysqli = new mysqli($serveur, $user, $pass, $base);
$mysqli->set_charset("utf8");
if ($mysqli->connect_error)
{
    die('Erreur de connexion ('.$mysqli->connect_errno.')'. $mysqli->connect_error);
}


else {
                        
			$_SESSION['note1']=$_POST['note'.$_SESSION[recommendation1]];
			

          
	
header('Location: noexp1.php');
	
	}
	

$mysqli->close();
?>


