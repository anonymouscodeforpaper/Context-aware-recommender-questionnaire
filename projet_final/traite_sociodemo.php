<?php

session_start();

$serveur = "localhost";
$base = "basefilrouge";
$user = "root";
$pass = "110119zjf";
$mysqli = new mysqli($serveur, $user, $pass, $base);
$mysqli->set_charset("utf8");
if ($mysqli->connect_error) {
    die('Erreur de connexion ('.$mysqli->connect_errno.')'. $mysqli->connect_error);
}

if ($_POST['age']==null or $_POST['csp']==null or $_POST['genre']==null) {
	//empeche le participant de quitter la page sans cocher des cases
	$_SESSION['alerte']=true;
	header('Location: sociodemo.php');
}
else {
	$_SESSION['alerte']=false;
	//stockage des donnees dans la base
	
	if ($_SESSION['ordre']==2 AND $_SESSION['verif']['decr_note1']==0)
		{
		$requete = "UPDATE exclus SET perdus_note1=perdus_note1-1 ";
		$mysqli->query($requete); 
		$_SESSION['verif']['decr_note1']++;
		}
	elseif ($_SESSION['ordre']==1 AND $_SESSION['verif']['decr_note2']==0)
		{
		$requete = "UPDATE exclus SET perdus_note2=perdus_note2-1 ";
		$mysqli->query($requete); 
		$_SESSION['verif']['decr_note2']++;
		}
	
	if ($_SESSION['ordre']!=null AND $_SESSION['date']['drag1']!=null AND $_SESSION['date']['drag2']!=null AND $_SESSION['date']['note1']!=null AND $_SESSION['date']['note2']!=null AND $_SESSION['date']['sociodemo']!=null)
		{
		//remplissage de la table participant
		$var=0;
		$stmt = $mysqli->prepare("INSERT INTO `participant` (`id_participant`, `ordre_set`, `t_drag1`, `t_drag2`, `t_note1`, `t_note2`, `t_socio`, `ref_csp`, `ref_age`, `ref_genre`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iisssssiii", $var, $_SESSION['ordre'], $_SESSION['date']['drag1'], $_SESSION['date']['drag2'],$_SESSION['date']['note1'],$_SESSION['date']['note2'], $_SESSION['date']['sociodemo'],$_POST['csp'],$_POST['age'], $_POST['genre']);
		$stmt->execute();
		$stmt->close();
	
		//un select pour récuperer l'id du participant (généré automatiquement) 
		$stmt = $mysqli->prepare("SELECT id_participant FROM participant WHERE ordre_set=? AND t_drag1=? AND t_drag2=? AND t_note1=? AND t_note2=? AND t_socio=? AND ref_csp=? AND ref_age=? AND ref_genre = ?");
		$stmt->bind_param("isssssiii", $_SESSION['ordre'], $_SESSION['date']['drag1'], $_SESSION['date']['drag2'],$_SESSION['date']['note1'],$_SESSION['date']['note2'], $_SESSION['date']['sociodemo'],$_POST['csp'],$_POST['age'], $_POST['genre']);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($id_participant);
		$stmt->fetch();
		$id_particip=$id_participant;
		$stmt->free_result();
		$stmt->close();
		}
	
	
	
	//remplissage de la table reponse
	
	// verification que les variables de sessions associées aux repas sont toutes remplies
	$requete = "SELECT `id`,`image` FROM repas WHERE numero_set=1 ORDER BY id";
	$resultat = $mysqli->query($requete); 
	$images_repas = "<div style='height:110px; width:850px'> ";
	$total=0;
	$correct=0;
	while ($ligne = $resultat->fetch_assoc()) 
		{
		$total++;
		if ($_SESSION['repas'][$ligne['image']]['note']!=null AND $_SESSION['repas'][$ligne['image']]['classement']!=null AND $_SESSION['repas'][$ligne['image']]['ordre']!=null)
			{
			$correct++;
			}
		}
	//si tout va bien, on insère les données dans la base
	if ($correct==$total)
		{
		
		$stmt = $mysqli->prepare("INSERT INTO reponse(ref_participant, ref_image, ordre_presentation, classement, note) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("isssi", $id_parti, $ref_image, $ordre_pres, $class, $note);
	

		foreach ($_SESSION['repas'] as $key => $value) 
			{
			$id_parti=$id_particip;
			$ref_image=$key;
			$ordre_pres=$value['ordre'];
			$class=$value['classement'];
			$note=$value['note'];
			$stmt->execute();
			}	
	
		$stmt->close();
		unset($value);
		}
	
	header('Location: fin.php');
}
$mysqli->close();
?>
