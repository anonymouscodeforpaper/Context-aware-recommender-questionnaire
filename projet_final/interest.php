<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="fr" xml:lang="fr">

<script>
function validateForm()
{
var x=document.forms["my_form"]["interest"].value;
if (x==null || x=="")
  {
  alert("Merci de répondre à cette question.");
  return false;
  }
}
</script>

<link rel="stylesheet" href="style_sheet.css">

<body>
<div class="div-body">

		<a href="https://www.lamsade.dauphine.fr/" target=_blank>
		<img src='../img/lamsade.jpeg'  height='80px' style="position: relative;top: -40px;left:0px;"></a>
                <a href="https://dauphine.psl.eu/" target=_blank>
                <img src='../img/dauphine.png'  height='80px' style="position: relative;top: -40px;left:600px;"></a>
		<h1 align="center"> Avant de commencer...  </h1>
		
		        <h2 align="left">
				A quelle fréquence regardez-vous des films?
				</h2>
				
				<form method="POST" name="my_form" action="traite_interest.php" onsubmit="return validateForm()">
				<input type="radio" class='form-radio' name="interest" value="3">Je regarde des films régulièrement.<br>
				<input type="radio" class='form-radio' name="interest" value="2">Je regarde des films de temps en temps.<br>
                                <input type="radio" class='form-radio' name="interest" value="1">Je ne regarde pas du tout de film.
				<br />
				<br />
				<br />
				<p class='submit'>
				<center>
				<input type="submit" value="Suivant"/>
				</center>
				</p>
				</form>
				
</div>
				
</body>
</html>
