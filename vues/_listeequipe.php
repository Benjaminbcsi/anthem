<?php
$result=new EquipeManager($connexion);
if (!isset($_SESSION["search"])){$_SESSION["search"]="";}
if (isset($_SESSION["search"]) && $_SESSION["search"]!="" || $_SESSION["search"]!="undefined") {
	$resultats=$result->db_searchEquipe($_SESSION["search"]);
	$_SESSION["search"]=="";
}else if (isset($_SESSION["autre"]) && $_SESSION["autre"]=="name") {
	$resultats=$result->db_getEquipeNameasc();
} else if (isset($_SESSION["autre"]) && $_SESSION["autre"]=="undefined") {
	$resultats=$result->db_getEquipe();
} else if(isset($_SESSION["autre"]) && $_SESSION["autre"]=="date"){
	$resultats=$result->db_getEquipeDateasc();
}
?>					
<!-- ROBIN -->
<!-- ROBIN -->
<!-- ROBIN -->
<!-- bg -->
<div class="section_header section_header_liste"></div>
<!-- /bg -->

<!-- main content -->
<section class="container liste_container">

	<div class="page_title">
		<h1>Équipes</h1>
		<h2>Rejoins les équipes qui n’attendent que toi.</h2>
	</div>
	
	<div class="listing">
		<div class="clear_border">
			<!-- zone de recherche -->
			<div class="search_zone">
				<form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_inscription" name="form_inscription">
				<input class="input" type="hidden" id="todo_form_searchplayer" name="todo_form_searchjeu" value="valid_searchjeu"/>
				<input type="text" name="searchjeu" id="searchjeu" class="search_list">
				</form>
				<p>Recherche une équipe par nom ou par jeu</p>
			</div>
			
			<!-- liste -->
			<h3>Titre trie/recherche</h3>
			<div class="public_list_container"><!--
			
				carte équipe
			 -->
			  <?php while ($row_equipe=$resultats->fetch_array(MYSQLI_ASSOC)) {
                                  $equipe=new Equipe($row_equipe);
                                  $equipeu=$equipe->getId();
                                 ?>
			 <div class="public_list e_list" id_game="1">
					<!-- bouton supprimer -->
					<!-- affichage du jeu -->
					<div
						class="public_cover e_cover"
						style="background-image:
							linear-gradient(to bottom, rgba(39,47,55,0.5), rgba(39,47,55,0.5)),
							url('./image/bg_public_list_team.jpg');"
					>
						<div class="public_team_icon"></div>
						<!-- image de profil de l'équipe -->
						<div class="public_profilpic">
							<img src="./<?php echo $equipe->getChemin();?>" width="50px;"><br/>
						</div>
						<!-- infos sur l'équipe -->
						<div class="public_infos">
							3 <span class="invit_joueuricon	"></span><br>
							3 <span class="invit_jeuicon"></span><br>
						</div>
						<!-- nom de l'équipe -->
						<h4><?php echo $equipe->getPseudo();?></h4>
						<!-- si recrute -->
						<?php $statut=$equipe->getStatut(); 
                                    if($statut==1){
                                      ?>
                                    <div class="recrut_status">Ne Recrute pas de joueurs !</div>
                                    <?php 
                                    } else if ($statut==0) { 
                                    ?>
                                      <div class="recrut_status">Recrute des joueurs !</div><br/>
                                   <?php  } ?>
					</div>

                                  <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_team" name="form_teal">
                                    <input type="hidden" id="todo_form_team" name="todo_form_team" value="valid_team"/>
                                    <input type="hidden" name="idutilisateur" id="idutilisateur" value="<?php echo $_SESSION["id"] ?>">
                                    <input type="hidden" name="idequipe" id="idequipe" value="<?php echo $equipeu ?>">
                                    <?php 
                                   if ($_SESSION["equipe"] != $equipeu ) { ?>
                                       <input type="submit" value="Postuler"/>
                                    <?php } ?>
                                  </form>
				</div><?php } ?><!--
			
				carte équipe
			 -->
	</div>
</section>
<!-- ROBIN -->
<!-- ROBIN -->
<!-- ROBIN -->
