<!-- IMAGE DE BACKGROUND DE PAGE -->
<div class="section_header"></div>

<!-- DIMENTIONNEMENT ET POSITIONNEMENT -->
<section class="container" id="listeamis">
	
	<!-- TITRE PAGE -->
	<h1>Jeux</h1>

	<!-- MENU DE NAVIGATION PERSONNEL (GAUCHE) -->
	<?php include("_menuprofil_gauche.php"); ?>

	<!-- CONTENU PRINCIPAL -->
	<div class="center_content">

		<!-- zone de recherche -->
		<div class="search_zone">
			<form>
				<input type="text" name="" class="search_list">
			</form>
		</div>

		<!-- LISTING DES JEUX DE L'UTILISATEUR -->
			<h3 class="sort">Titre trie/recherche</h3>
			<div class="privat_list_container"><!--
			
				carte jeu
			 --><div class="privat_list g_list" data_id="22" data_type="jeu">
					<!-- bouton supprimer -->
					<div class="suppr_bt"></div>
					<!-- affichage du jeu -->
					<div class="privat_cover g_cover">
						<!-- image du jeu -->
						<img src="./image/test_cover.png" alt="" title="">
					</div>
					<h4>Titre du jeux</h4>
				</div><!--
			
				carte jeu
			 --><div class="privat_list g_list" data_id="22" data_type="jeu">
					<!-- bouton supprimer -->
					<div class="suppr_bt"></div>
					<!-- affichage du jeu -->
					<div class="privat_cover g_cover">
						<!-- image du jeu -->
						<img src="./image/test_cover.png" alt="" title="">
					</div>
					<h4>Titre du jeux</h4>
				</div><!--
			
				carte jeu
			 --><div class="privat_list g_list" data_id="22" data_type="jeu">
					<!-- bouton supprimer -->
					<div class="suppr_bt"></div>
					<!-- affichage du jeu -->
					<div class="privat_cover g_cover">
						<!-- image du jeu -->
						<img src="./image/test_cover.png" alt="" title="">
					</div>
					<h4>Titre du jeux</h4>
				</div><!--
			
				carte jeu
			 --><div class="privat_list g_list" data_id="22" data_type="jeu">
					<!-- bouton supprimer -->
					<div class="suppr_bt"></div>
					<!-- affichage du jeu -->
					<div class="privat_cover g_cover">
						<!-- image du jeu -->
						<img src="./image/test_cover.png" alt="" title="">
					</div>
					<h4>Titre du jeux</h4>
				</div><!--
			
				carte jeu
			 --><div class="privat_list g_list" data_id="22" data_type="jeu">
					<!-- bouton supprimer -->
					<div class="suppr_bt"></div>
					<!-- affichage du jeu -->
					<div class="privat_cover g_cover">
						<!-- image du jeu -->
						<img src="./image/test_cover.png" alt="" title="">
					</div>
					<h4>Titre du jeux</h4>
				</div>

			</div>
			
			<script>
				(function(){
					var els = document.getElementsByClassName("privat_list");
					for (var i=0, l=els.length; i<l; i++ ) {
						// centrer les cover
						centerCover(els[i]);
						// ajout des événements
						els[i].getElementsByClassName("suppr_bt")[0].addEventListener("click",displayConfirm,false);
						els[i].getElementsByTagName("img")[0].addEventListener("click",displayGamePage,false);
					}
				})();
			</script>
		
	</div>  
	<!-- /CONTENU PRINCIPAL -->

	<!-- WIDGETS (DROITE) -->
	<?php include("_menuprofil_droite.php"); ?>
	
</section>
<!-- /DIMENTIONNEMENT ET POSITIONNEMENT -->
