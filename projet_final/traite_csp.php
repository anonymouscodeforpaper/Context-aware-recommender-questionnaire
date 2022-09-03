<?php

session_start();

$serveur = "localhost";
$base = "Recsys";
$user = "root";
$pass = "110119zjf";
$mysqli = new mysqli($serveur, $user, $pass, $base);
$mysqli->set_charset("utf8");
if ($mysqli->connect_error) {
    die('Erreur de connexion ('.$mysqli->connect_errno.')'. $mysqli->connect_error);
}

if ($_POST['age']==null or $_POST['csp']==null or $_POST['gender']==null or $_POST['education']==null) {
	//empeche le participant de quitter la page sans cocher des cases
	$_SESSION['alerte']=true;
	header('Location: csp.php');
}
else {
	$_SESSION['alerte']=false;
	//stockage des donnees dans la base
	if ($_POST['age']!=null or $_POST['csp']!=null or $_POST['gender']!=null or $_POST['education']!=null)
{
		//remplissage de la table participant
		$var=0;
		$stmt = $mysqli->prepare("INSERT INTO `Participants` (`id_participant`, `ref_age`, `ref_csp`, `ref_gender`, `ref_interest`, `ref_education`) VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iiiiii", $var,$_POST[age], $_POST[csp],$_POST[gender],$_SESSION[interest],$_POST[education]);
		$stmt->execute();
		$stmt->close();
	
		//un select pour récuperer l'id du participant (généré automatiquement) 
		$stmt = $mysqli->prepare("SELECT id_participant FROM Participants WHERE ref_age = ? AND ref_csp = ? AND ref_gender = ? AND ref_interest = ? AND ref_education = ?");
		$stmt->bind_param("iiiii", $_POST[age], $_POST[csp],$_POST[gender],$_SESSION[interest],$_POST[education]);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($id_participant);
		$stmt->fetch();
		$id_particip=$id_participant;
		$stmt->free_result();
		$stmt->close();
		}
$_SESSION['id_parti'] = $id_participant;
	header('Location: Mid.php');
}
$mysqli->close();
?>


