
	
<!-- ROBIN -->
<!-- ROBIN -->
<!-- ROBIN -->
<?php $connected =  (isset($_SESSION['pseudo']) && $_SESSION['pseudo'] != "") ? true : false; ?>

<!-- bg -->
<div class="section_header section_header_liste"></div>
<!-- /bg -->

<!-- main content -->
<section class="container liste_container">

	<div class="page_title">
		<h1>Joueurs</h1>
		<h2>Repère les bons et fraternises avec pour délirer en ligne sur tes jeux préférés.</h2>
	</div>
	
	<div class="listing">
		<div class="clear_border">
			<!-- zone de recherche -->
			<div class="search_zone">
				<form>
					<input type="text" name="" class="search_list">
				</form>
				<p>Recherche un joueur</p>
			</div>
			
			<!-- liste -->
			<h3>Titre trie/recherche</h3>
			<div class="public_list_container"><!--
			 --><?php
				$mngr = new UtilisateurManager($connexion);
				$liste = $mngr->db_getUtilisateur1();
				while($row = $liste->fetch_array(MYSQLI_ASSOC)) {
					$joueur = new Utilisateur($row);
				?><!--
			
				carte joueur
			 --><div class="public_list e_list" id_game="1">
					<?php if ($connected) { ?>
					<!-- bouton supprimer -->
					<div class="suppr_bt"></div>
					<?php } ?>
					<!-- affichage du jeu -->
					<div
						class="public_cover e_cover"
						style="background-image:
							linear-gradient(to bottom, rgba(39,47,55,0.5), rgba(39,47,55,0.5)),
							url('./image/background_profil.jpg');"
					>
						<!-- image de profil du joueur -->
						<div class="public_profilpic">
							<img src="./image/profil_img_pyroteam.jpg" alt="" title="">
						</div>
						<!-- infos sur le joueur -->
						<div class="public_infos">
							3 <span class="invit_joueuricon	"></span><br>
							3 <span class="invit_jeuicon"></span><br>
							3 <span class="invit_succesicon"></span><br>
						</div>
						<!-- nom du joueur -->
						<h4><?php echo $joueur->getChemin(); ?></h4>
					</div>
					<?php if ($connected) { ?>
					<a href="#" onclick="">ajouter</a>
					<?php } ?>
				</div><!--
				--><?php } ?>

			</div>
		</div>
	</div>
</section>
<!-- ROBIN -->
<!-- ROBIN -->
<!-- ROBIN -->

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