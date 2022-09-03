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
if ($_POST['note'.$_SESSION[m1][1]]==null or $_POST['note'.$_SESSION[m1][2]] == null or $_POST['note'.$_SESSION[m1][3]] == null ) {
	//empeche le participant de quitter la page sans cocher des cases
	$_SESSION['alerte']=true;
	header('Location: note1.php');
}

else {
                $_SESSION['alerte']=false;
                $var=0;
		$stmt = $mysqli->prepare("INSERT INTO `History` (`id_rating`, `ref_user`, `ref_movie`, `rating`, `ref_context1`, `ref_context2`,`ref_context3`, `ref_context4`,`ref_movie_cluster`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iiiiiiiii", $var,$_SESSION[id_parti], $_SESSION[m1][1],$_POST['note'.$_SESSION[m1][1]],$_SESSION[context_physical1],$_SESSION[context_mood1],$_SESSION[context_location1],$_SESSION[context_companion1], $_SESSION[cluster1]);
		$stmt->execute();
		$stmt->close();	
         
                $var=0;
		$stmt = $mysqli->prepare("INSERT INTO `History` (`id_rating`, `ref_user`, `ref_movie`, `rating`, `ref_context1`, `ref_context2`,`ref_context3`, `ref_context4`,`ref_movie_cluster`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iiiiiiiii", $var,$_SESSION[id_parti], $_SESSION[m1][2],$_POST['note'.$_SESSION[m1][2]],$_SESSION[context_physical2],$_SESSION[context_mood2],$_SESSION[context_location2],$_SESSION[context_companion2],$_SESSION[cluster2]);
		$stmt->execute();
		$stmt->close();
                $var=0;
		$stmt = $mysqli->prepare("INSERT INTO `History` (`id_rating`, `ref_user`, `ref_movie`, `rating`, `ref_context1`, `ref_context2`,`ref_context3`, `ref_context4`,`ref_movie_cluster`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iiiiiiiii", $var,$_SESSION[id_parti], $_SESSION[m1][3],$_POST['note'.$_SESSION[m1][3]],$_SESSION[context_physical3],$_SESSION[context_mood3],$_SESSION[context_location3],$_SESSION[context_companion3],$_SESSION[cluster3]);
		$stmt->execute();
		$stmt->close();
          
	
header('Location: note2.php');
	
	}
	

$mysqli->close();
?>


