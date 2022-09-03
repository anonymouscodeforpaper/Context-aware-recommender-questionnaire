<?php 
session_start ();
//determine le numero de l'etape en fonction de l'ordre


if ($_SESSION['alerte']==true){
	echo "<script>alert(\"Merci de noter tous ce film\")</script>"; 
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
        //unset($out);
        exec("python haha.py $_SESSION[id_parti] $_SESSION[context_physical1] $_SESSION[context_mood1] $_SESSION[context_location1] $_SESSION[context_companion1]",$out);
        $_SESSION['recommendation'] = $out;
        $_SESSION['t1'] = date('d/m/Y G:i:s');
        $_SESSION['recommendation1'] = $out[0];
        $_SESSION['recommendation2'] = $out[1];
        $_SESSION['recommendation3'] = $out[2];
        $_SESSION['recommendation4'] = $out[3];
        $_SESSION['recommendation5'] = $out[4];
        $_SESSION['recommendation6'] = $out[5];
        $_SESSION['recommendation7'] = $out[6];
        $_SESSION['recommendation8'] = $out[7];
        $_SESSION['recommendation9'] = $out[8];
        $_SESSION['recommendation10'] = $out[9];
        $_SESSION['recommendation11'] = $out[10];
        $_SESSION['recommendation12'] = $out[11];
	$images_repas ="<form method='post' action='traite_explanation1.php'>";
	 
		 
			$images_repas .= "
			<b>Le système vous recommendons ce film parce que le score moyen de ce film est 3.9</b> 
                        <br></br>
                        <b>Votre note</b>
			<input type='radio' class='form-radio'  name='note".$_SESSION[recommendation1]."' value='1'>1
			<input type='radio' class='form-radio'  name='note".$_SESSION[recommendation1]."' value='2'>2
			<input type='radio' class='form-radio'  name='note".$_SESSION[recommendation1]."' value='3'>3
			<input type='radio' class='form-radio'  name='note".$_SESSION[recommendation1]."' value='4'>4
			<input type='radio' class='form-radio'  name='note".$_SESSION[recommendation1]."' value='5'>5 
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
        <h1>Etape 3/4: </h1>
	<h2>Veuillez noter ce film selon l'explication founie ci-dessous de 1(je n'aime pas du tout) à 5(j'aime beaucoup): </h2>
<h3>Voici l'explication pour 1er recommandation </h3>
	<br />
	<?php echo ($images_repas); ?>	
</div>
</body>
</html>

