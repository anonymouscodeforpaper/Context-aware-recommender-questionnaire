<?php

if($_POST['regime']=="0")  //cas où la personne a un régime particulier : 
	{
	//update de la table exclus
	$serveur = "localhost";
	$base = "basefilrouge";
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
		$requete = "UPDATE exclus SET exclus_regime=exclus_regime+1 ";
		$mysqli->query($requete); 
		}
	header('Location:fin.php'); //redirection vers la page de fin
	$mysqli->close();
	}
	
else	//si tout va bien
	{
	//on demarre une session pour récupérer l'ordre de présentation des deux sets
	session_start ();
	$_SESSION['alerte']=false;

	
	//update de la table exclus
	$serveur = "localhost";
	$base = "basefilrouge";
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
		if ($_SESSION['verif']['incr_regime']==0) //verification : c'est bien la premiere fois que l'utilisateur vient sur la page
			{
			$requete = "UPDATE exclus SET perdus_regime=perdus_regime+1 ";
			$mysqli->query($requete); 
			$_SESSION['verif']['incr_regime']++;
			}				
		$mysqli->close();
		}
				
	if ($_SESSION['ordre']==1 )
		{
		header('Location: drag1.php'); 
		}
	elseif ($_SESSION['ordre']==2 )
		{
		header('Location: drag2.php');
		}
	}
?>

