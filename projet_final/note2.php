<?php
session_start ();
//determine le numero de l'etape en fonction de l'ordre


if ($_SESSION['alerte']==true){
	echo "<script>alert(\"Merci de noter tous les films\")</script>"; 
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

	//entrer les informations de date dans la base SQL : ...
	
	//affichage de la notation
         


          
	$requete = "SELECT `id_movie`,`title`,`director`,`genre1`,`genre2`,`genre3`,`actor1`, `actor2`,`actor3`,`IMDB_Link`,`cluster` FROM Movies WHERE id in ($_SESSION[film4]) ORDER BY id_movie;";
        $requete .= "SELECT `Physical_text`FROM Context_Physical WHERE id_context1 in ($_SESSION[context_physical4]);";
        $requete .= "SELECT `Mood_text` FROM Context_Mood WHERE id_context2 in ($_SESSION[context_mood4]);";
        $requete .= "SELECT Location_text FROM Context_Location WHERE id_context3 in ($_SESSION[context_location4]);";
        $requete .= "SELECT Companion_text FROM Context_Companion WHERE id_context4 in ($_SESSION[context_companion4])";
        if ($mysqli->multi_query($requete)){
        $resultat = $mysqli->store_result();
             if ($mysqli->next_result()){
             $contextphy = $mysqli->store_result();
                 if ($mysqli->next_result()){
                    $contextmood = $mysqli->store_result(); 
                    if ($mysqli->next_result()){
                             $contextloca = $mysqli->store_result();
                             if ($mysqli->next_result()){$contextcomp = $mysqli->store_result();}                      
}        
                                             }
              }

}

	$images_repas ="<form method='post' action='traite_note2.php'>";

         $ligne = $resultat->fetch_assoc();
         $_SESSION['m2'][1] = $ligne['id_movie'];
         $_SESSION['cluster4'] = $ligne['cluster'];
         $context1 = $contextphy->fetch_assoc();
         $context2 = $contextmood->fetch_assoc();
         $context3 = $contextloca->fetch_assoc();
         $context4 = $contextcomp->fetch_assoc();
         $images_repas .= "
                        <p>Imaginez qu'il $context4[Companion_text], que vous êtes $context3[Location_text], $context1[Physical_text], et que vous $context2[Mood_text]</p>
<b>Titre: $ligne[title]</b> 
<p>Genres: $ligne[genre1], $ligne[genre2], $ligne[genre3]</p>
<p>Réalisé par $ligne[director], avec $ligne[actor1], $ligne[actor2],$ligne[actor3]</p>
                        <a href=$ligne[IMDB_Link] target=_blank>Pour plus d'information</a>
                        <br></br>
                        <b>Votre note</b>
			<input type='radio' class='form-radio'  name='note".$ligne['id_movie']."' value='1'>1
			<input type='radio' class='form-radio'  name='note".$ligne['id_movie']."' value='2'>2
			<input type='radio' class='form-radio'  name='note".$ligne['id_movie']."' value='3'>3
			<input type='radio' class='form-radio'  name='note".$ligne['id_movie']."' value='4'>4
			<input type='radio' class='form-radio'  name='note".$ligne['id_movie']."' value='5'>5 
			<br></br>
                        <br></br>
                        <br></br>
			";
}
	
$requete = "SELECT `id_movie`,`title`,`director`,`genre1`,`genre2`,`genre3`,`actor1`, `actor2`,`actor3`,`IMDB_Link`,`cluster` FROM Movies WHERE id in ($_SESSION[film5]) ORDER BY id_movie;";
        $requete .= "SELECT `Physical_text`FROM Context_Physical WHERE id_context1 in ($_SESSION[context_physical5]);";
        $requete .= "SELECT `Mood_text` FROM Context_Mood WHERE id_context2 in ($_SESSION[context_mood5]);";
        $requete .= "SELECT Location_text FROM Context_Location WHERE id_context3 in ($_SESSION[context_location5]);";
        $requete .= "SELECT Companion_text FROM Context_Companion WHERE id_context4 in ($_SESSION[context_companion5])";
        if ($mysqli->multi_query($requete)){
        $resultat = $mysqli->store_result();
             if ($mysqli->next_result()){
             $contextphy = $mysqli->store_result();
                 if ($mysqli->next_result()){
                    $contextmood = $mysqli->store_result(); 
                    if ($mysqli->next_result()){
                             $contextloca = $mysqli->store_result();
                             if ($mysqli->next_result()){$contextcomp = $mysqli->store_result();}                      
}        
                                             }
              }



	

         $ligne = $resultat->fetch_assoc();
         $_SESSION['m2'][2] = $ligne['id_movie'];
         $_SESSION['cluster5'] = $ligne['cluster'];
         $context1 = $contextphy->fetch_assoc();
         $context2 = $contextmood->fetch_assoc();
         $context3 = $contextloca->fetch_assoc();
         $context4 = $contextcomp->fetch_assoc();
         $images_repas .= "
                        <p>Imaginez qu'il $context4[Companion_text], que vous êtes $context3[Location_text], $context1[Physical_text], et que vous $context2[Mood_text]</p>
<b>Titre: $ligne[title]</b> 
<p>Genres: $ligne[genre1], $ligne[genre2], $ligne[genre3]</p>
<p>Réalisé par $ligne[director], avec $ligne[actor1], $ligne[actor2],$ligne[actor3]</p>
                        <a href=$ligne[IMDB_Link] target=_blank>Pour plus d'information</a>
                        <br></br>
                        <b>Votre note</b>
			<input type='radio' class='form-radio'  name='note".$ligne['id_movie']."' value='1'>1
			<input type='radio' class='form-radio'  name='note".$ligne['id_movie']."' value='2'>2
			<input type='radio' class='form-radio'  name='note".$ligne['id_movie']."' value='3'>3
			<input type='radio' class='form-radio'  name='note".$ligne['id_movie']."' value='4'>4
			<input type='radio' class='form-radio'  name='note".$ligne['id_movie']."' value='5'>5 
			<br></br>
                        <br></br>
                        <br></br>
			";
}
$requete = "SELECT `id_movie`,`title`,`director`,`genre1`,`genre2`,`genre3`,`actor1`, `actor2`,`actor3`,`IMDB_Link`,`cluster` FROM Movies WHERE id in ($_SESSION[film6]) ORDER BY id_movie;";
        $requete .= "SELECT `Physical_text`FROM Context_Physical WHERE id_context1 in ($_SESSION[context_physical6]);";
        $requete .= "SELECT `Mood_text` FROM Context_Mood WHERE id_context2 in ($_SESSION[context_mood6]);";
        $requete .= "SELECT Location_text FROM Context_Location WHERE id_context3 in ($_SESSION[context_location6]);";
        $requete .= "SELECT Companion_text FROM Context_Companion WHERE id_context4 in ($_SESSION[context_companion6])";
        if ($mysqli->multi_query($requete)){
        $resultat = $mysqli->store_result();
             if ($mysqli->next_result()){
             $contextphy = $mysqli->store_result();
                 if ($mysqli->next_result()){
                    $contextmood = $mysqli->store_result(); 
                    if ($mysqli->next_result()){
                             $contextloca = $mysqli->store_result();
                             if ($mysqli->next_result()){$contextcomp = $mysqli->store_result();}                      
}        
                                             }
              }



	

         $ligne = $resultat->fetch_assoc();
         $_SESSION['m2'][3] = $ligne['id_movie'];
         $_SESSION['cluster6'] = $ligne['cluster'];
         $context1 = $contextphy->fetch_assoc();
         $context2 = $contextmood->fetch_assoc();
         $context3 = $contextloca->fetch_assoc();
         $context4 = $contextcomp->fetch_assoc();
         $images_repas .= "
                        <p>Imaginez qu'il $context4[Companion_text], que vous êtes $context3[Location_text], $context1[Physical_text], et que vous $context2[Mood_text]</p>
<b>Titre: $ligne[title]</b> 
<p>Genres: $ligne[genre1], $ligne[genre2], $ligne[genre3]</p>
<p>Réalisé par $ligne[director], avec $ligne[actor1], $ligne[actor2],$ligne[actor3]</p>
                        <a href=$ligne[IMDB_Link] target=_blank>Pour plus d'information</a>
                        <br></br>
                        <b>Votre note</b>
			<input type='radio' class='form-radio'  name='note".$ligne['id_movie']."' value='1'>1
			<input type='radio' class='form-radio'  name='note".$ligne['id_movie']."' value='2'>2
			<input type='radio' class='form-radio'  name='note".$ligne['id_movie']."' value='3'>3
			<input type='radio' class='form-radio'  name='note".$ligne['id_movie']."' value='4'>4
			<input type='radio' class='form-radio'  name='note".$ligne['id_movie']."' value='5'>5 
			<br></br>
                        <br></br>
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
	<h1>Etape 2/4: </h1>
        <h2>Veuillez noter les films présentés ci-dessous de 1 (je n'aime pas du tout) à 5 (j'aime beaucoup): </h2>
	<br />
	<?php echo ($images_repas); ?>	
</div>
</body>
</html>
