 <?php
$result=new MediaManager($connexion);
$resultats=$result->db_getMediaId($_SESSION["id"]);
 ?>
<!-- IMAGE DE BACKGROUND DE PAGE -->
<div class="section_header"></div>

<!-- DIMENTIONNEMENT ET POSITIONNEMENT -->
<section class="container" id="listeamis">
	
	<!-- TITRE PAGE -->
	<h1>Photos</h1>

	<!-- MENU DE NAVIGATION PERSONNEL (GAUCHE) -->
	<?php include("_menuprofil_gauche.php"); ?>

	<!-- CONTENU PRINCIPAL -->
	<div class="center_content">

		<!-- LISTING DES JEUX DE L'UTILISATEUR -->
			<div class="privat_list_container"><!--
			
				carte photo
			 --><?php while ($row_media=$resultats->fetch_array(MYSQLI_ASSOC)) {
                                  $media=new Media($row_media);
                                  $type=$media->getType();
                                  $id=$media->getId();
                                  ?><div class="privat_list" data_id="33" data_type="img"><!-- les attibuts data_* servent à la fonction d'affichage javascript -->
					<!-- bouton supprimer -->
					<div class="suppr_bt"></div>
					<!-- affichage du photo -->
					<div class="privat_cover" style="text-align: center;">
						<!-- image du photo -->
						<img src="./<?php echo $media->getChemin();?>" alt="<?php echo $media->getNom();?>" title="">
					</div>
				</div><!--
			
				carte photo
			 -->
			 	<?php } ?>
			</div>
			
			<script>
				(function(){
					var els = document.getElementsByClassName("privat_list");
					for (var i=0, l=els.length; i<l; i++ ) {
						// centrer les cover
						centerCover(els[i]);
						// ajout des événements
						els[i].getElementsByTagName("img")[0].addEventListener("click",displayMedias,false);
						els[i].getElementsByClassName("suppr_bt")[0].addEventListener("click",displayConfirm,false);
					}
				})();
			</script>
		
		
	</div>  
	<!-- /CONTENU PRINCIPAL -->

	<!-- WIDGETS (DROITE) -->
	<?php include("_menuprofil_droite.php"); ?>
	
</section>
<!-- /DIMENTIONNEMENT ET POSITIONNEMENT -->

