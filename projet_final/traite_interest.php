<?php 
//$_SESSION['interest'] = $_POST['interest']
if($_POST['interest']=="1")  //cas où la personne ne regarde pas du tout de film : 
	{
	//update de la table exclus
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
	else 
		{	
		$requete = "UPDATE Exclus SET exclus_interest=exclus_inerest+1 ";
		$mysqli->query($requete); 
		}
	header('Location:fin.php'); //redirection vers la page de fin
	$mysqli->close();
	}
	
else	//si tout va bien
	{
	session_start ();
        $_SESSION['interest'] = $_POST['interest'];
	$_SESSION['alerte']=false;

	
	//update de la table exclus
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
	else 
		{
		if ($_SESSION['verif']['incr_interest']==0) //verification : c'est bien la premiere fois que l'utilisateur vient sur la page
			{
			$requete = "UPDATE Exclus SET perdus_interest=perdus_interest+1 ";
			$mysqli->query($requete); 
			$_SESSION['verif']['incr_interest']++;
			}				
		$mysqli->close();
		}
		{
		header('Location: csp.php'); 
		}
	}
?>

