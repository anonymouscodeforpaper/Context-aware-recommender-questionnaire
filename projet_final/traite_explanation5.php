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

if ($_POST['note'.$_SESSION[recommendation5]] == null ) {
	//empeche le participant de quitter la page sans cocher des cases
	$_SESSION['alerte']=true;
	header('Location: explanation5.php');
}
else {
                        $_SESSION['alerte']=false;
			$_SESSION['note1']=$_POST['note'.$_SESSION[recommendation5]];
			

          
	
header('Location: noexp5.php');
	
	}
	

$mysqli->close();
?>


