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
if ($_POST['note'.$_SESSION[recommendation12]] == null ) {
	//empeche le participant de quitter la page sans cocher des cases
	$_SESSION['alerte']=true;
	header('Location: noexp12.php');
}

else {
              
                        $_SESSION['alerte']=false;
			$_SESSION['note2']=$_POST['note'.$_SESSION[recommendation12]];
			
               $stmt = $mysqli->prepare("INSERT INTO `Reponse` (`ref_participant`, `ref_movie`, `note1`, `note2`, `t_note1`, `t_note2`,`id_explanation`) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iiiissi", $_SESSION[id_parti],$_SESSION[recommendation12],$_SESSION[note1],$_SESSION[note2],$_SESSION[t1],$_SESSION[t2],$_SESSION[id_explanation12]);
		$stmt->execute();
		$stmt->close();
			

          
	
header('Location: before.php');
	
	}
	

$mysqli->close();
?>


