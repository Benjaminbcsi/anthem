<?php
$result=new JeuManager($connexion);
if (isset($_SESSION["autre"]) && $_SESSION["autre"]=="name") {
	$resultats=$result->db_getJeuName();
} else if (isset($_SESSION["autre"]) && $_SESSION["autre"]=="undefined") {
	$resultats=$result->db_getJeu();
}
?>		


<?php $connected =  (isset($_SESSION['pseudo']) && $_SESSION['pseudo'] != "") ? true : false; ?>



<div class="section_header section_header_liste"></div>
<!-- /bg -->

<!-- main content -->
<section class="container liste_container">

	<div class="page_title">
		<h1>Jeux</h1>
		<h2>Choisis un jeu avant d'accéder aux offres et demandes de recrutement des joueurs et équipes.</h2>
	</div>
	
	<div class="listing lj">
		<div class="clear_border">
			<!-- zone de recherche -->
			<div class="search_zone">
				<form>
					<input type="text" name="" class="search_list black">
				</form>
				<p>Recherche un jeu</p>
			</div>
		</div>	
     
			<!-- liste -->
			<h3>Titre trie/recherche</h3>
			<div class="public_list_container"><!--
			
				carte jeu
			 --><?php while ($row_jeu=$resultats->fetch_array(MYSQLI_ASSOC)) {
                             $jeu = new Jeu($row_jeu);
					 		 if($connected) { ?>
                    <div class="public_list g_list" >         
					<!-- bouton supprimer -->
					<div class="suppr_bt"></div>
					<?php } ?>
                    
                    <!-- affichage du jeu -->
					<div class="public_cover g_cover" data_type="jeu" data_id="<?php echo $jeu->getId();?>">
						<!-- image du jeu -->
						<img src="./<?php echo $jeu->getChemin();?>" alt="" title=""/>
						<!-- infos jeu -->
                    
                    
						<div class="game_info">
							<div class="show_game_infos">
							</div>
							<p>
								<span class="info_l">équipes</span><!--
								--><span class="info_r">9999</span><br>
								
								<span class="info_l">joueurs</span><!--
								--><span class="info_r">99999</span><br>
							</p>
							<p>
								<span class="info_l">recrutements</span><!--
								--><span class="info_r">99</span><br>
								
								<span class="info_l">demandes</span><!--
								--><span class="info_r">999</span><br>
							</p>
						</div>
					</div>
					<h4><?php echo $jeu->getNom();?></h4>
					<?php if ($connected) { ?>
					<form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_amis" name="form_amis">
                                    <input type="hidden" id="todo_form_amis" name="todo_form_amis" value="valid_amis"/>
                                    <input type="hidden" name="util" id="util" value="<?php echo $_SESSION["id"] ?>"/>
                                    <input type="hidden" name="jeu" id="jeu" value="<?php echo $jeu->getIdjeu();?>"/>
                    </form>
					<a href="#" onclick="javascript:ajaxAddJeu('JeuUtil',{'idjoueur':document.getElementById('util').value,'idJeu':<?php echo $jeu->getIdjeu();?>})" value="Ajouter a mes jeu"/>ajouter</a>
					<?php } ?>
				</div><!--
			
				carte jeu
			 -->
	
    <?php } ?>
   </div> 
	
	<script>
		(function(){
			var els = document.getElementsByClassName("game_info");
			for (var i = 0, l = els.length; i<l; i++) {
				centerCover(els[i].parentNode);
				els[i].addEventListener("click",infosGames,false);
			}
			
			els = document.getElementsByClassName("g_list");
			for (var i = 0, l = els.length; i<l; i++) {
				els[i].getElementsByTagName("img")[0].addEventListener("click",displayGamePage,false);
			}
		})();
	</script>

</section>
<!-- /main content -->
								
								
								
