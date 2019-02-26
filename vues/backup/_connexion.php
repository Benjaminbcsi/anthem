<div id="accueil">
<div id="supportFormulaireConnexion">
	<div class="headerForm">
		<h2 id="titreFormulaireConnexion">Connexion</h2>
	</div>
	<form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_connexion" name="form_connexion">
		<input type="hidden" id="todo_form_connexion" name="todo_form_connexion" value="valid_connexion"/>
	    <br/><br/>
		<b>Login</b><br/>
        <input class="input" type="text" id="pseudo" name="pseudo"  maxlength="30"/><br/><br/>
        <b>Password</b><br/>
        <input class="input" type="password" id="password" name="password" /><br/><br/><br/><br/>
		<div class="footerForm">
			<input id="buttonSubmitInscription" type="submit" value="connexion"/>
		</div>	
     </form>
</div>
</div>