<!-- ROBIN -->
<!-- ROBIN -->
<!-- ROBIN -->
<!-- IMAGE DE BACKGROUND DE PAGE -->
<div class="section_header"></div>

<!-- DIMENTIONNEMENT ET POSITIONNEMENT -->
<section class="container" id="listeamis">
	
	<!-- TITRE PAGE -->
	<h1>Équipe</h1>

	<!-- MENU DE NAVIGATION PERSONNEL (GAUCHE) -->
	<?php include("_menuprofil_gauche.php"); ?>

	<!-- CONTENU PRINCIPAL -->
	<div class="center_content">
		
		<?php if(isset($_SESSION['messageKO']) && $_SESSION['messageKO'] != ""){ ?>
		<div><?php echo $_SESSION['messageKO']; $_SESSION['messageKO'] = ""; ?></div>
		<?php } ?>
		<!-- HEADER ÉQUIPE -->
		<div class="team_header in_team">
			<form>
				<button class="quit">Quitter L'équipe</button>
			</form>
			<img id="img_profil_messages" class="img_ami" src="./image/capitain.png" alt="truc" title="truc">
			<h4>Nom équipe</h4>
			<div class="invit_joueur">
				<div>3<span class="invit_joueuricon"></span></div>
				<div>3<span class="invit_jeuicon"></span></div>
			</div>
		</div>
		
		<!-- LISTE DES MEMBRE DE L'ÉQUIPE -->
		<h3 class="sort">Membres</h3>
		<div class="privat_list_container"><!--
		
		 --><div class="privat_list f_list" data_id="22" data_type="amis">
				<!-- bouton supprimer -->
				<div class="suppr_bt"></div>
				
				<div class="privat_cover">
					<img id="img_profil_team" class="img_ami" src="./image/capitain.png" alt="truc" title="truc">
				</div>
				<h4>pseudo</h4>
			</div><!--
		
		 --><div class="privat_list f_list" data_id="22" data_type="amis">
				<!-- bouton supprimer -->
				<div class="suppr_bt"></div>
				
				<div class="privat_cover">
					<img id="img_profil_team" class="img_ami" src="./image/capitain.png" alt="truc" title="truc">
				</div>
				<h4>pseudo</h4>
			</div><!--
		
		 --><div class="privat_list f_list" data_id="22" data_type="amis">
				<!-- bouton supprimer -->
				<div class="suppr_bt"></div>
				
				<div class="privat_cover">
					<img id="img_profil_team" class="img_ami" src="./image/capitain.png" alt="truc" title="truc">
				</div>
				<h4>pseudo</h4>
			</div><!--
		
		 --><div class="privat_list f_list" data_id="22" data_type="amis">
				<!-- bouton supprimer -->
				<div class="suppr_bt"></div>
				
				<div class="privat_cover">
					<img id="img_profil_team" class="img_ami" src="./image/capitain.png" alt="truc" title="truc">
				</div>
				<h4>pseudo</h4>
			</div><!--
		
		 --><div class="privat_list f_list" data_id="22" data_type="amis">
				<!-- bouton supprimer -->
				<div class="suppr_bt"></div>
				
				<div class="privat_cover">
					<img id="img_profil_team" class="img_ami" src="./image/capitain.png" alt="truc" title="truc">
				</div>
				<h4>pseudo</h4>
			</div>
			
		</div>
		
		<!-- LISTING DES JEUX DE L'ÉQUIPE -->
		<h3 class="sort">Jeux</h3>
		<div class="privat_list_container"><!--
		
			carte jeu
		 --><div class="privat_list g_list" data_id="22" data_type="game">
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
		 --><div class="privat_list g_list" data_id="22" data_type="game">
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
		 --><div class="privat_list g_list" data_id="22" data_type="game">
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
		 --><div class="privat_list g_list" data_id="22" data_type="game">
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
		 --><div class="privat_list g_list" data_id="22" data_type="game">
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
				var els = document.getElementsByClassName("g_list");
				for (var i=0, l=els.length; i<l; i++ ) { centerCover(els[i]); }
				els = document.getElementsByClassName("privat_list");
				for (var i=0, l=els.length; i<l; i++ ) {
					els[i].getElementsByClassName("suppr_bt")[0].addEventListener("click",displayConfirm,false);
				}
			})();
		</script>

		<!-- HEADER ÉQUIPE QUAND PAS D'ÉQUIPE -->
		<script>
		function createTeam() {
			// INITIALISATION
			var mod = document.createElement("div");
			var container = document.createElement("div");
			var bt = document.createElement("div");
			var btOK = document.createElement("button");
			var btNotOK = document.createElement("button");
			var sub = document.createElement("input");
			var f = document.createElement("form");
			var msg = document.createElement("h3");
			
			// ATTRIBUTION
			mod.className = "modale_media";
			bt.className = "suppr_bt";
			msg.innerHTML = "Créez votre équipe";
			container.className = "bt_container mkteam";
			btOK.className = btNotOK.className = "btn";
			btOK.innerHTML = "confirmer";
			btNotOK.innerHTML = "annuler";
			sub.type="submit";
			sub.value="Créer mon équipe";
			bt.onclick = function(){ document.body.removeChild(this.parentNode); };
			btNotOK.onclick = function(){ document.body.removeChild(this.parentNode.parentNode); };
			
			
			
			// FORMULAIRE
			
			// l'élément form
			f.method = "post";
			f.action = "./controllers/controller.php";
			
			// hidden
			var todo = document.createElement("input");
			todo.type = "hidden";
			todo.name = "todo_form_equipe";
			todo.value = "valid_equipe";
			
			//les éléments relatifs au formulaire
			var html = "";
			html+= '<h3>Créez votre équipe</h3>';
			html+= '<form enctype="multipart/form-data" method="post" action="./controllers/controller.php" id="mkteam">';
			html+= '<input type="hidden" name="todo_form_equipe" value="valid_equipe">'+"<br>";
			html+= '<label for="mkteam_pseudo">nom de l\'équipe</label><input type="text" name="pseudo" id="mkteam_pseudo">'+"<br>";
			html+= '<label for="mkteam_type">type</label><input type="text" name="type" id="mkteam_type">'+"<br>";
			html+= '<label for="mkteam_profil">photo de profil</label><span class="spanProfil"><input type="file" name="profil" id="mkteam_profil"><span>Trouver une image</span></span>'+"<br>";
			
			html+= '<label for="mkdir_statut">status de l\'équipe</label>';
			html+= '<select name="statut" id="mkdir_statut">';
			html+= '<option value="Cherche des joueurs">Cherche des joueurs</option>';
			html+= '<option value="Ne cherche pas de joueurs">Ne cherche pas de joueurs</option>';
			html+= '</select>'+"<br>";
			
			html+= '<label for="mkteam_desc">Description</label>';
			html+= '<textarea name="desc" id="mkteam_desc"></textarea>'+"<br>";
			html+= '<input type="submit" value="Créer">';
			html+= '</form>';
			/*
			html+= ' <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_equipe" name="form_equipe">';
			html+= ' <input type="hidden" id="from" name="from" value="index.php"/>';
          html+= ' <input type="hidden" id="next" name="next" value="index.php"/>';
          html+= ' <input type="hidden" id="todo_form_equipe" name="todo_form_equipe" value="valid_equipe"/>';
          html+= ' <br/><br/>';
          html+= ' <b>Nom d\'équipe :</b><br/>';
          html+= ' <input type="text" size="40"  placeholder="Nom team" id="pseudo" name="pseudo"  maxlength="30"/><br/><br/>';
          html+= ' <b>Type de l\'équipe : </b><br/>';
          html+= ' <input type="text" size="40"  placeholder="Try Hard/fun" id="type" name="type"  maxlength="50"/><br/><br/>';
          html+= ' <b>Statut:</b> <br/><br/>';
          html+= ' <SELECT name="statut" id="statut" size="1">';
          html+= ' <OPTION>Cherche des joueurs</OPTION>';
          html+= ' <OPTION>Ne cherche pas de joueurs</OPTION>';
          html+= ' </SELECT>';
          html+= ' <br/><br/>';
          html+= ' <b>Description</b><br/><br/>';
          html+= ' <textarea id="desc" name="desc" rows="10" cols="50" maxlength="255"/></textarea><br/><br/>';
          html+= ' <b>photo de profil :</b>';
          html+= ' <span id="spanProfil"><input type="file" name="profil" id="profil" />Trouver une image</span>';
          html+= ' <input type="submit" value="Valider"/>';
        html+= ' </form>';
			*/
			
			container.innerHTML = html;
		
			
			
			// AFFICHAGE
			mod.appendChild(bt);
			mod.appendChild(container);
			document.body.appendChild(mod);
			
			
			// TOUCHE FINALE : TRANSITION
			setTimeout(function(){
				mod.style.margin = "0em";
				mod.style.opacity = "1";
			}, 100);
		}
		</script>
		<div class="team_header without_team">
			<form>
			</form>
			<h4>Vous n'appartenez à aucune équipe</h4>
			<button onclick="javascript: createTeam();">créer une équipe</button>
		</div>
		
		
	</div>  
	<!-- /CONTENU PRINCIPAL -->

	<!-- WIDGETS (DROITE) -->
	<?php include("_menuprofil_droite.php"); ?>
	
</section>
<!-- /DIMENTIONNEMENT ET POSITIONNEMENT -->
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
