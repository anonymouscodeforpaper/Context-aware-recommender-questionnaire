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
if ($_POST['note'.$_SESSION[m4][1]]==null or $_POST['note'.$_SESSION[m4][2]] == null or $_POST['note'.$_SESSION[m4][3]] == null ) {
	//empeche le participant de quitter la page sans cocher des cases
	$_SESSION['alerte']=true;
	header('Location: note4.php');
}

else {
                $_SESSION['alerte']=false;
                $var=0;
		$stmt = $mysqli->prepare("INSERT INTO `History` (`id_rating`, `ref_user`, `ref_movie`, `rating`, `ref_context1`, `ref_context2`,`ref_context3`, `ref_context4`,`ref_movie_cluster`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iiiiiiiii", $var,$_SESSION[id_parti], $_SESSION[m4][1],$_POST['note'.$_SESSION[m4][1]],$_SESSION[context_physical10],$_SESSION[context_mood10],$_SESSION[context_location10],$_SESSION[context_companion10],$_SESSION[cluster10]);
		$stmt->execute();
		$stmt->close();	
         
                $var=0;
		$stmt = $mysqli->prepare("INSERT INTO `History` (`id_rating`, `ref_user`, `ref_movie`, `rating`, `ref_context1`, `ref_context2`,`ref_context3`, `ref_context4`,`ref_movie_cluster`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iiiiiiiii", $var,$_SESSION[id_parti], $_SESSION[m4][2],$_POST['note'.$_SESSION[m4][2]],$_SESSION[context_physical11],$_SESSION[context_mood11],$_SESSION[context_location11],$_SESSION[context_companion11],$_SESSION[cluster11]);
		$stmt->execute();
		$stmt->close();
                
                $var=0;
		$stmt = $mysqli->prepare("INSERT INTO `History` (`id_rating`, `ref_user`, `ref_movie`, `rating`, `ref_context1`, `ref_context2`,`ref_context3`, `ref_context4`,`ref_movie_cluster`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iiiiiiiii", $var,$_SESSION[id_parti], $_SESSION[m4][3],$_POST['note'.$_SESSION[m4][3]],$_SESSION[context_physical12],$_SESSION[context_mood12],$_SESSION[context_location12],$_SESSION[context_companion12],$_SESSION[cluster12]);
		$stmt->execute();
		$stmt->close();


          
	
header('Location: avant.php');
	
	}
	

$mysqli->close();
?>


