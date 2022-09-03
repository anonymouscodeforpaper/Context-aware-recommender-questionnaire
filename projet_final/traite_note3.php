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

if ($_POST['note'.$_SESSION[m3][1]]==null or $_POST['note'.$_SESSION[m3][2]] == null or $_POST['note'.$_SESSION[m3][3]] == null ) {
	//empeche le participant de quitter la page sans cocher des cases
	$_SESSION['alerte']=true;
	header('Location: note3.php');
}
else {
                $_SESSION['alerte']=false;
                $var=0;
		$stmt = $mysqli->prepare("INSERT INTO `History` (`id_rating`, `ref_user`, `ref_movie`, `rating`, `ref_context1`, `ref_context2`,`ref_context3`, `ref_context4`,`ref_movie_cluster`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iiiiiiiii", $var,$_SESSION[id_parti], $_SESSION[m3][1],$_POST['note'.$_SESSION[m3][1]],$_SESSION[context_physical7],$_SESSION[context_mood7],$_SESSION[context_location7],$_SESSION[context_companion7],$_SESSION[cluster7]);
		$stmt->execute();
		$stmt->close();	
         
                $var=0;
		$stmt = $mysqli->prepare("INSERT INTO `History` (`id_rating`, `ref_user`, `ref_movie`, `rating`, `ref_context1`, `ref_context2`,`ref_context3`, `ref_context4`,`ref_movie_cluster`) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)");
		$stmt->bind_param("iiiiiiiii", $var,$_SESSION[id_parti], $_SESSION[m3][2],$_POST['note'.$_SESSION[m3][2]],$_SESSION[context_physical8],$_SESSION[context_mood8],$_SESSION[context_location8],$_SESSION[context_companion8],$_SESSION[cluster8]);
		$stmt->execute();
		$stmt->close();
                
                $var=0;
		$stmt = $mysqli->prepare("INSERT INTO `History` (`id_rating`, `ref_user`, `ref_movie`, `rating`, `ref_context1`, `ref_context2`,`ref_context3`, `ref_context4`,`ref_movie_cluster`) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)");
		$stmt->bind_param("iiiiiiiii", $var,$_SESSION[id_parti], $_SESSION[m3][3],$_POST['note'.$_SESSION[m3][3]],$_SESSION[context_physical9],$_SESSION[context_mood9],$_SESSION[context_location9],$_SESSION[context_companion9],$_SESSION[cluster9]);
		$stmt->execute();
		$stmt->close();


          
	
header('Location: note4.php');
	
	}
	

$mysqli->close();
?>


