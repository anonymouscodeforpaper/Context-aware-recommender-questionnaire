<?php 
session_start ();
//determine le numero de l'etape en fonction de l'ordre


if ($_SESSION['alerte']==true){
	echo "<script>alert(\"Merci de noter ce film\")</script>"; 
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
        $_SESSION['t1'] = date('d/m/Y G:i:s');
	$images_repas ="<form method='post' action='traite_explanation10.php'>";
	 
		 
			$images_repas .= "
			<b>Le système vous recommendons ce film parce que ce film est similaire avec les films que vous avez regardés avant.</b> 
                        <br></br>
                        <b>Votre note</b>
			<input type='radio' class='form-radio'  name='note".$_SESSION[recommendation10]."' value='1'>1
			<input type='radio' class='form-radio'  name='note".$_SESSION[recommendation10]."' value='2'>2
			<input type='radio' class='form-radio'  name='note".$_SESSION[recommendation10]."' value='3'>3
			<input type='radio' class='form-radio'  name='note".$_SESSION[recommendation10]."' value='4'>4
			<input type='radio' class='form-radio'  name='note".$_SESSION[recommendation10]."' value='5'>5 
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
	<title>Questionnaire diversité alimentaire</title>
	<meta http-equiv="content-Language" content="fr" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="style_sheet.css">
</head>
<div class="div-body">
<body>
	<h1>Etape 3/4: </h1>
	<h2>Veuillez noter ce film selon l'explication founie ci-dessous de 1(je n'aime pas du tout) à 5(j'aime beaucoup): </h2>
<h3>Voici l'explication pour 10ème recommandation </h3>
	<br />
	<?php echo ($images_repas); ?>	
</div>
</body>
</html>

