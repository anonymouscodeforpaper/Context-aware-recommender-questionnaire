<?php 
session_start ();
//determine le numero de l'etape en fonction de l'ordre


if ($_SESSION['alerte']==true){
	echo "<script>alert(\"Merci de répondre aux ces questions\")</script>"; 
}

$serveur = "localhost";
$base = "Recsys";
$user = "root";
$pass = "110119zjf";
$mysqli = new mysqli($serveur, $user, $pass, $base);
$mysqli->set_charset("utf8");
if ($mysqli->connect_error) {
    die('Erreur de connexion ('.$mysqli->connect_errno.')'. $mysqli->connect_error);
}
else {
	$images_repas ="<form method='post' action='traite_trust.php'>";
	 
		 
			$images_repas .= "
			<b>Le système vous recommendons ce film parce que le score moyen de ce film est...</b> 
                        <br></br>
                        <b>Votre note</b>
			<input type='radio' class='form-radio'  name='explanation1' value='1'>1
			<input type='radio' class='form-radio'  name='explanation1' value='2'>2
			<input type='radio' class='form-radio'  name='explanation1' value='3'>3
			<input type='radio' class='form-radio'  name='explanation1' value='4'>4
			<input type='radio' class='form-radio'  name='explanation1' value='5'>5 
			<br></br>
<br></br>
<br></br>
			";
		$images_repas .= "
			<b>Le système vous recommendons ce film parce que 80%(ou autre chiffre) des utilisateurs ont donné un score supérieure à ...</b> 
                        <br></br>
                        <b>Votre note</b>
			<input type='radio' class='form-radio'  name='explanation2' value='1'>1
			<input type='radio' class='form-radio'  name='explanation2' value='2'>2
			<input type='radio' class='form-radio'  name='explanation2' value='3'>3
			<input type='radio' class='form-radio'  name='explanation2' value='4'>4
			<input type='radio' class='form-radio'  name='explanation2' value='5'>5 
			<br></br>
<br></br>
<br></br>
			";
$images_repas .= "
			<b>Le système vous recommendons ce film parce que les utilisateurs qui ont des préférences similaires que vous ont donné un score moyen de ...</b> 
                        <br></br>
                        <b>Votre note</b>
			<input type='radio' class='form-radio'  name='explanation3' value='1'>1
			<input type='radio' class='form-radio'  name='explanation3' value='2'>2
			<input type='radio' class='form-radio'  name='explanation3' value='3'>3
			<input type='radio' class='form-radio'  name='explanation3' value='4'>4
			<input type='radio' class='form-radio'  name='explanation3' value='5'>5 
			<br></br>
<br></br>
<br></br>
			";
$images_repas .= "
			<b>Le système vous recommendons ce film parce que ce film est similaire aux films que vous avez regardés avant</b> 
                        <br></br>
                        <b>Votre note</b>
			<input type='radio' class='form-radio'  name='explanation4' value='1'>1
			<input type='radio' class='form-radio'  name='explanation4' value='2'>2
			<input type='radio' class='form-radio'  name='explanation4' value='3'>3
			<input type='radio' class='form-radio'  name='explanation4' value='4'>4
			<input type='radio' class='form-radio'  name='explanation4' value='5'>5 
			<br></br>
<br></br>
<br></br>
			";
$images_repas .= "
			<b>Le système vous recommendons ce film parce que ce film a été réalisé par ...(un réalisateur que vous aimez peut-être)</b> 
                        <br></br>
                        <b>Votre note</b>
			<input type='radio' class='form-radio'  name='explanation5' value='1'>1
			<input type='radio' class='form-radio'  name='explanation5' value='2'>2
			<input type='radio' class='form-radio'  name='explanation5' value='3'>3
			<input type='radio' class='form-radio'  name='explanation5' value='4'>4
			<input type='radio' class='form-radio'  name='explanation5' value='5'>5 
			<br></br>
<br></br>
<br></br>
			";

$images_repas .= "
			<b>Le système vous recommendons ce film parce que le système suppose que vous souhaitez regarder ce film quand il (méteo), vous êtes (votre location), (votre état physical), et (votre état d'ésprit). </b> 
                        <br></br>
                        <b>Votre note</b>
			<input type='radio' class='form-radio'  name='explanation6' value='1'>1
			<input type='radio' class='form-radio'  name='explanation6' value='2'>2
			<input type='radio' class='form-radio'  name='explanation6' value='3'>3
			<input type='radio' class='form-radio'  name='explanation6' value='4'>4
			<input type='radio' class='form-radio'  name='explanation6' value='5'>5 
			<br></br>
			";
		
	$images_repas .="
					<p class='submit'>	
					<input type='submit' value='Suivant'/>
					</p>
					</form>
					</center>";
	}
	$mysqli->close();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="fr" xml:lang="fr">
<head>
	<title>Questionnaire sur l'explicaction dans les système de recommendation</title>
	<meta http-equiv="content-Language" content="fr" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="style_sheet.css">
</head>
<div class="div-body">
<body> 
        <h1>Etape 4/4: </h1>
	<h2>Veuillez indiquer dans quelle mesure vous faites confiance aux recommandations accompagnées avec ces explications de 1(pas du tout) à 5(beaucoup)</h2>
	<br />
	<?php echo ($images_repas); ?>	
</div>
</body>
</html>

