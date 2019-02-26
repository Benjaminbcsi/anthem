<article id="accueil">
	<div id="supportContenuAccueil">
		<h1 id="titreAccueil">Votre inscription est validée !<br/>Connectez-vous dès maintenant</h1>
		<div id="supportBoutons">
			<button id="boutonConnexion" onclick="javascript:navigate('<?php echo encrypt('connexion','DISII28');?>');">Connexion</button>
		</div>
	</div>
	<?php
	print_r($_SESSION);
	?>
</article>