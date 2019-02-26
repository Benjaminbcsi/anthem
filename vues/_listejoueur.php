
	
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
				<form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_inscription" name="form_inscription">
				<input class="input" type="hidden" id="todo_form_searchplayer" name="todo_form_searchplayer" value="valid_searchplayer"/>
				<input type="text" name="search" id="search" class="search_list black">
				</form>
				<p>Recherche un joueur</p>
			</div>
			
			<!-- liste -->
			<h3>Titre trie/recherche</h3>
			<div class="public_list_container"><!--
			 --><?php
				$mngr = new UtilisateurManager($connexion);
				if (isset($_SESSION["search"]) && $_SESSION["search"]!="" ) {
					$liste = $mngr->db_searchUtilisateur($_SESSION["search"]);
					$_SESSION["search"]="";
				} else if (isset($_SESSION["autre"]) && $_SESSION["autre"]=="name") {
					$liste = $mngr->db_getUtilisateur3();
				} else if (isset($_SESSION["autre"]) && $_SESSION["autre"]=="undefined") {
					$liste = $mngr->db_getUtilisateur1();
				} else if(isset($_SESSION["autre"]) && $_SESSION["autre"]=="date"){
					$liste = $mngr->db_getUtilisateur2();
				}
				
				while($row = $liste->fetch_array(MYSQLI_ASSOC)) {
					$joueur = new Utilisateur($row);

				?>
				<!--
			
				carte joueur-->

			 <div class="public_list e_list" id_game="1" >
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
							<img src="<?php echo $joueur->getChemin(); ?>" alt="" title="">
						</div>
						<!-- infos sur le joueur -->
						<div class="public_infos">
							3 <span class="invit_joueuricon	"></span><br>
							3 <span class="invit_jeuicon"></span><br>
							3 <span class="invit_succesicon"></span><br>
						</div>
						<!-- nom du joueur -->
						<h4><a href="#" onclick="navigate('<?php echo encrypt('profil_joueur','DISII28');?>','<?php echo $joueur->getId()?>','<?php echo $joueur->getId_equipe()?>')"><?php echo $joueur->getPseudo()?></a></h4>
					</div>
					<form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_ajoutami_<?php echo $joueur->getIdjoueur()?>" name="form_ajoutami_<?php echo $joueur->getIdjoueur()?>">
                    <input type="hidden" id="todo_form_amis" name="todo_form_amis" value="valid_amis"/>
                    <input type="hidden" id="idutilisateur" name="idutilisateur" value="<?php echo $_SESSION["id"] ?>"/>
                     <input type="hidden" id="idutilisateur2" name="idutilisateur2" value="<?php echo $joueur->getIdjoueur()?>"/>
                    </form>
					<?php if ($_SESSION["id"]!="") { ?>
					<button class="btn" id="btnparam" onclick="document.getElementById('form_ajoutami_<?php echo $joueur->getIdjoueur()?>').submit();" >Ajouter</button>
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

