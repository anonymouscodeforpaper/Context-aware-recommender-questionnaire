<?php
// On démarre la session
session_start ();

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="fr" xml:lang="fr"> 
<link rel="stylesheet" href="style_sheet.css">
<div class="div-body">   
    <body>
		<a href="https://www.lamsade.dauphine.fr/" target=_blank>
		<img src='../img/lamsade.jpeg'  height='80px' style="position: relative;top: -40px;left:0px;"></a>
                <a href="https://dauphine.psl.eu/" target=_blank>
                <img src='../img/dauphine.png'  height='80px' style="position: relative;top: -40px;left:600px;"></a>

	
        <h2 align="center"> Dans quelle mesure vous pensez que les explications vous aident à prendre une décision plus rapidement, dans quelle mesure les explications vous aident à prendre une meilleure décision(à mieux estimer une note que vous allez donner), dans quelle mesure vous pensez qu'elles sont persuasives, satisfaisantes, dignes de confiance et dans quelle mesure vous pensez que ce système est transparentes en fournissant les explications.  </h2><br />
        
        
				
		<?php
		{ echo
		'<form name="page suivante" action="efficient.php" method="post">
		<center><input type="submit" value="Suivant"></center>
		</form>';
		}
		?>
          
    </body>
</div>
</html>


