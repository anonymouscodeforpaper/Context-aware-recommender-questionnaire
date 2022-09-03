<?php
// On démarre la session
session_start ();

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="fr" xml:lang="fr"> 
<link rel="stylesheet" href="style_sheet.css">
<div class="div-body">   
    <body>
		<img src='../img/dauphine.png'  height='80px' style="position: relative;top: -40px;left:800px;">

	<h2 align="center"> A partir de maintenant notre système de recommandation s'adapte en fonction de vos réponses aux questions précédentes.</h2><br />
        <h3 align="center"> Dans la suite du questionnaire, nous allons tout d'abord vous montrer une explication, &agrave; savoir une raison pour laquelle une recommandation est proposée (sans information sur le film recommandé). Nous vous demandons d'estimer une note pour cette recommandation. Ensuite, nous allons vous présenter des informations détaillées sur le film recommandé et nous vous demandons de donner une note &agrave; ce film (une deuxième fois). </h3><br />

				
		<?php
		{ echo
		'<form name="page suivante" action="explanation1.php" method="post">
		<center><input type="submit" value="Suivant"></center>
		</form>';

		}
		?>
          <h4 align="center"> Soyez patient... Le traitement peut prendre entre 30 secondes et une minute. </h4><br/>
    </body>
</div>
</html>


