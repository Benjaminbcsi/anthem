 <?php
require_once("./model/db_utilisateur.php");
 ?>
<article id="accueil">
<div id="supportFormulaireInscription">
	<div class="headerForm">
		<h2 id="titreFormulaireInscription">Inscription</h2>
	</div>
	<form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_inscription" name="form_inscription">
		<input class="input" type="hidden" id="todo_form_inscription" name="todo_form_inscription" value="valid_inscription"/>
        <br/><br/>
        <b>Login</b><br/>
        <input class="input" type="text" id="pseudo" name="pseudo"  maxlength="30"/><br/><br/>
        <b>E-Mail</b><br/>
        <input class="input" type="text" id="mail" name="mail" /><br/><br/>
		<div class='demi'>
			<b>Mot de passe</b><br/>
			<input class="input" type="password" name="password" id="password"/><br/><br/>
		</div>
		<div class='demi'>	
			<b>Confirmation</b><br/>
			<input class="input" type="password" name="password2" id="password2"/><br/><br/>
		</div><br/>
		<b id='bProfil'>Image de profil</b><br/><br/>
        <span id='spanProfil'><input type="file" name="profil" id="profil"/>Trouver une image</span><br/><br/>
		<b>Description</b><br/>
        <textarea class="input" id="desc" name="desc" maxlength="255"/></textarea><br/><br/>
		<div class='demi'>
			<b>Date de Naissance</b><br/>
			<input class="input" placeholder="jj/mm/yyyy" type="text" id="datepicker" name="datenaissance"><br/><br/>
		</div>
		<div class='demi'>	
			<b>Sexe</b><br/>
			<img src="./image/iconeMale.png"/><input type="radio" name="genre" id="genre" value="homme" >
			<img src="./image/iconeFemelle.png"/><input type="radio" name="genre" id="genre" value="femme" ><br/><br/>
		</div><br/>
		<div class='demi'>
			 <b>Ville</b><br/>
			 <input class="input" name="ville" type="text" id="ville"><br/><br/>
		</div>
		<div class='demi'>	
			<b>Statut</b><br/>
			<SELECT class="input" name="statut" id="statut" size="1">
			<OPTION>Cherche une &eacute;quipe</OPTION>
			<OPTION>Ne cherche pas d'&eacute;quipe</OPTION>
			</SELECT><br/><br/>
		</div><br/>
		<div class="footerForm">
			<input id="buttonSubmitInscription" type="submit" value="s'inscrire"/>
		</div>		
     </form>
</div><br/>
</article>

