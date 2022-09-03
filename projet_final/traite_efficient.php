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
if ($_POST[explanation1]==null or $_POST[explanation2] == null or $_POST[explanation3] == null or $_POST[explanation4]==null or $_POST[explanation5] == null or $_POST[explanation6] == null ) {
	//empeche le participant de quitter la page sans cocher des cases
	$_SESSION['alerte']=true;
	header('Location: efficient.php');
}

else {
                $_SESSION['alerte']=false;
		$stmt = $mysqli->prepare("INSERT INTO `efficient` (`ref_participant`, `explanation1`, `explanation2`, `explanation3`, `explanation4`, `explanation5`,`explanation6`) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iiiiiii", $_SESSION[id_parti],$_POST[explanation1],$_POST[explanation2],$_POST[explanation3],$_POST[explanation4],$_POST[explanation5],$_POST[explanation6]);
		$stmt->execute();
		$stmt->close();	
         
	
header('Location: effectiveness.php');
	
	}
	

$mysqli->close();
?>


