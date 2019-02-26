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
			 --><div class="privat_list" data_id="33" data_type="img"><!-- les attibuts data_* servent à la fonction d'affichage javascript -->
					<!-- bouton supprimer -->
					<div class="suppr_bt"></div>
					<!-- affichage du photo -->
					<div class="privat_cover" style="text-align: center;">
						<!-- image du photo -->
						<img src="./image/test_cover.png" alt="" title="">
					</div>
				</div><!--
			
				carte photo
			 --><div class="privat_list" data_id="2" data_type="img"><!-- les attibuts data_* servent à la fonction d'affichage javascript -->
					<!-- bouton supprimer -->
					<div class="suppr_bt"></div>
					<!-- affichage du photo -->
					<div class="privat_cover" style="text-align: center;">
						<!-- image du photo -->
						<img src="./image/test_cover.png" alt="" title="">
					</div>
				</div><!--
			
				carte photo
			 --><div class="privat_list" data_id="2" data_type="img"><!-- les attibuts data_* servent à la fonction d'affichage javascript -->
					<!-- bouton supprimer -->
					<div class="suppr_bt"></div>
					<!-- affichage du photo -->
					<div class="privat_cover" style="text-align: center;">
						<!-- image du photo -->
						<img src="./image/test_cover.png" alt="" title="">
					</div>
				</div><!--
			
				carte photo
			 --><div class="privat_list" data_id="2" data_type="img"><!-- les attibuts data_* servent à la fonction d'affichage javascript -->
					<!-- bouton supprimer -->
					<div class="suppr_bt"></div>
					<!-- affichage du photo -->
					<div class="privat_cover" style="text-align: center;">
						<!-- image du photo -->
						<img src="./image/test_cover.png" alt="" title="">
					</div>
				</div><!--
			
				carte photo
			 --><div class="privat_list" data_id="2" data_type="img"><!-- les attibuts data_* servent à la fonction d'affichage javascript -->
					<!-- bouton supprimer -->
					<div class="suppr_bt"></div>
					<!-- affichage du photo -->
					<div class="privat_cover" style="text-align: center;">
						<!-- image du photo -->
						<img src="./image/test_cover.png" alt="" title="">
					</div>
				</div>

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



<?php
$result=new UtilisateurManager($connexion);
$resultats=$result->db_getUtilisateur1();



?>	
							<?php while ($row_equipe=$resultats->fetch_array(MYSQLI_ASSOC)) {
                                  $utilisateur = new Utilisateur($row_equipe);
                                  $utilisateurprofil = $utilisateur->getIdjoueur();
                                  $resultu=new EquipeManager($connexion);
                                  $resultatsu=$resultu->db_getEquipeId($utilisateur->getIdequipe());
                                 ?>
                                 <?php 
                                   if ($_SESSION["id"] != $utilisateurprofil) { ?>
                                    
                                 <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_amis" name="form_amis">
								                    <input type="hidden" id="todo_form_amis" name="todo_form_amis" value="valid_amis"/>
	                                 	<input type="hidden" name="idutilisateur" id="idutilisateur" value="<?php echo $_SESSION["id"] ?>">
	                                 	<input type="hidden" name="idutilisateur2" id="idutilisateur2" value="<?php echo  $utilisateurprofil ?>">
                                    <?php 
                                   if ($_SESSION["id"] != $utilisateurprofil && $_SESSION["pseudo"]!="") { ?>
                                       <input type="submit" value="Envoyer une requete d'amis"/>
                                    <?php } ?>
                                 	</form>
                                    <img src="./<?php echo $utilisateur->getChemin();?>"><br/>
                                    Pseudo : <?php echo $utilisateur->getPseudo();?><br/>
                                    Niveau : <?php echo $utilisateur->getNiveauutil();?><br/>
                                    Expérience : <?php echo $utilisateur->getExputil();?><br/>
                                    <?php while ($row_equipe=$resultatsu->fetch_array(MYSQLI_ASSOC)) {
                                          $equipe=new Equipe($row_equipe);
                                          ?>
                                          Equipe : <a href="#" onclick="navigate('<?php echo encrypt('pageequipe','DISII28');?>');"><?php echo $equipe->getPseudoequip();?></a>
                                           <?php }
                                          ?>

                                    <?php $statut=$utilisateur->getStatutjoueur(); 
                                    if($statut==1){
                                      ?>
                                    Statut : <td>Ne cherche pas d'équipe !</td>
                                    <?php 
                                    } else if ($statut==0) { 
                                    ?>
                                      <td>Cherche une équipe !</td><br/>
                                   <?php  } ?>
                                   <br/>
                                   Description : <?php echo $utilisateur->getDescjoueur();?><br/>
                                    <?php } ?>
                                <?php } ?>
