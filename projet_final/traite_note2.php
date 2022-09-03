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
if ($_POST['note'.$_SESSION[m2][1]]==null or $_POST['note'.$_SESSION[m2][2]] == null or $_POST['note'.$_SESSION[m2][3]] == null ) {
	//empeche le participant de quitter la page sans cocher des cases
	$_SESSION['alerte']=true;
	header('Location: note2.php');
}

else {
                $_SESSION['alerte']=false;
                $var=0;
		$stmt = $mysqli->prepare("INSERT INTO `History` (`id_rating`, `ref_user`, `ref_movie`, `rating`, `ref_context1`, `ref_context2`,`ref_context3`, `ref_context4`,`ref_movie_cluster`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iiiiiiiii", $var,$_SESSION[id_parti], $_SESSION[m2][1],$_POST['note'.$_SESSION[m2][1]],$_SESSION[context_physical4],$_SESSION[context_mood4],$_SESSION[context_location4],$_SESSION[context_companion4],$_SESSION[cluster4]);
		$stmt->execute();
		$stmt->close();	
         
                $var=0;
		$stmt = $mysqli->prepare("INSERT INTO `History` (`id_rating`, `ref_user`, `ref_movie`, `rating`, `ref_context1`, `ref_context2`,`ref_context3`, `ref_context4`,`ref_movie_cluster`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iiiiiiiii", $var,$_SESSION[id_parti], $_SESSION[m2][2],$_POST['note'.$_SESSION[m2][2]],$_SESSION[context_physical5],$_SESSION[context_mood5],$_SESSION[context_location5],$_SESSION[context_companion5],$_SESSION[cluster5]);
		$stmt->execute();
		$stmt->close();	
                $var=0;
		$stmt = $mysqli->prepare("INSERT INTO `History` (`id_rating`, `ref_user`, `ref_movie`, `rating`, `ref_context1`, `ref_context2`,`ref_context3`, `ref_context4`,`ref_movie_cluster`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iiiiiiiii", $var,$_SESSION[id_parti], $_SESSION[m2][3],$_POST['note'.$_SESSION[m2][3]],$_SESSION[context_physical6],$_SESSION[context_mood6],$_SESSION[context_location6],$_SESSION[context_companion6],$_SESSION[cluster6]);
		$stmt->execute();
		$stmt->close();
          
	
header('Location: note3.php');
	
	}
	

$mysqli->close();
?>


