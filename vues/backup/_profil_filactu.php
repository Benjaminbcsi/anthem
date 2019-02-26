<?php
$result=new UtilisateurManager($connexion);
if($_SESSION["equipe"]!=""){
$resultats=$result->db_getUtilisateurId($_SESSION["id"]);
} else {
  $resultats=$result->db_getUtilisateurId1($_SESSION["id"]);
  
}

while ($row_equipe=$resultats->fetch_array(MYSQLI_ASSOC)) {
                                $utilisateur =new Utilisateur($row_equipe);
                                $utilisateurprofil = $utilisateur->getIdjoueur();
?>	

<div id="profil_banner" class="section_header section_header_profil"></div>

  
      <section class="container">
      
      		<div id="profil_sum">
            	<div id="sum_pic" style="background-image:url(<?php echo $utilisateur->getChemin();?>);"></div>
                <div id="sum_text">
            		<h1><?php echo $utilisateur->getPseudo();?></h1>
                    <h2>Niveau : <?php echo $utilisateur->getNiveauutil();?></h2>   
            	</div>
            <?php /*if ($_SESSION["id"] == $utilisateurprofil) { ?>
            <a href="#" onclick="navigate('<?php echo encrypt('page_modifutil','DISII28');?>');">Modifier profil</a><?php } */?>
            
            </div>
                    
            
       <?php };
	   
	   include("_menuprofil_gauche.php");	?>
       
       <div class="center_content" id="fil_actu">                      
    
	   		<?php include("_filactu.php"); ?>

       </div>
       
      	<?php
	   
	   include("_menuprofil_droite.php");	?>


        </section>

