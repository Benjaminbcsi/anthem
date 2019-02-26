<?php 
  
  ?>
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
		<div class="error_container">
			<h3>Erreur</h3>
			<span class="error_icon"></span>
			<p><?php echo $_SESSION['messageKO']; $_SESSION['messageKO'] = ""; ?></p>
		</div>
		<?php } ?>
		<!-- HEADER ÉQUIPE -->
		<?php if(isset($_SESSION["equipe"]) && $_SESSION["equipe"]!=""){
		  $resultu=new UtilisateurManager($connexion);
		  $resultatsu=$resultu->db_getUtilisateurEquipe($_SESSION["equipe"]);
		  $result=new EquipeManager($connexion);
		  $resultats=$result->db_getEquipeId($_SESSION["equipe"]); ?>
		<?php while ($row_equipe=$resultats->fetch_array(MYSQLI_ASSOC)) {
                                  $equipe=new Equipe($row_equipe);
                                  $chefequipe=$equipe->getChefequipe();?>

		<div class="team_header in_team">
			<?php


                                    if ($_SESSION["pseudo"] == $chefequipe) { ?>
                                       <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_refequipe" name="form_refequipe">
                                    <input type="hidden" id="todo_form_delequipe" name="todo_form_delequipe" value="del_equipe"/>
                                    <input type="hidden" name="idequipe" id="idequipe" value="<?php echo $_SESSION["equipe"];?>">
                                    <button class="quit">Supprimer</button>
                                    </form>
                                    <?php } else {?>
                                  <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_refequipe" name="form_refequipe">
                                    <input type="hidden" id="todo_form_ragequit" name="todo_form_ragequit" value="ragequit_equipe"/>
                                    <input type="hidden" name="idutil" id="idutil" value="<?php echo $_SESSION["id"];?>">
                                    <input type="hidden" name="idequipe" id="idequipe" value="<?php echo $_SESSION["equipe"];?>">
                                    <button class="quit">Quitter l'équipe</button>
                                    </form>
                                    <?php   } ?>
			<img id="img_profil_messages" class="img_ami" src="./<?php echo $equipe->getChemin();?>" alt="truc" title="truc">
			<h4><?php echo $equipe->getPseudo();?></h4>
			<div class="invit_joueur">
			 <?php $statut=$equipe->getStatut(); 
                                    if($statut==1){
                                      ?>
                                    <div>Ne Recrute pas de joueurs !<span class="invit_joueuricon"></span></div>
                                    <?php 
                                    } else if ($statut==0) { 
                                    ?>
                                      <div>Recrute des joueurs !<span class="invit_joueuricon"></span></div>
                                   <?php  } ?>
				<div><?php echo $equipe->getChefequipe();?><span class="invit_joueuricon"></span></div>
				<div><?php echo $equipe->getNiveau();?><span class="invit_jeuicon"></span></div><br/>
				<div><?php echo $equipe->getDescriptif();?></span></div>
			</div>
		</div>
		
		<!-- LISTE DES MEMBRE DE L'ÉQUIPE -->
		<h3 class="sort">Membres</h3>
		<div class="privat_list_container"><!--
		
		 -->
		 <?php while ($row_utilisateur=$resultatsu->fetch_array(MYSQLI_ASSOC)) {
                                  $utilisateur = new Utilisateur($row_utilisateur); 
                                    ?>
                <div class="privat_list f_list" data_id="22" data_type="amis">
				<!-- bouton supprimer -->
				<?php if ($_SESSION["pseudo"] == $chefequipe) { ?>
				<div class="suppr_bt"></div>
				<?php } ?>
				<div class="privat_cover">
					<img id="img_profil_team" class="img_ami" src="<?php echo $utilisateur->getChemin();?>" alt="truc" title="truc">
				</div>
				<h4><?php echo $utilisateur->getPseudo();?></h4>
			</div><?php } ?><!--
		
		 -->
		<!-- LISTING DES JEUX DE L'ÉQUIPE -->
		<?php } ?>
		
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
		<?php } else { ?>
		<div class="team_header without_team">
			<form>
			</form>
			<h4>Vous n'appartenez à aucune équipe</h4>
			<button onclick="javascript:createTeam();">créer une équipe</button>
		</div>

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
			html+= '<input type="hidden" id="idutil" name="idutil" value="<?php echo $_SESSION["id"] ?>"/>'
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
		<?php } ?>
		
		
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
