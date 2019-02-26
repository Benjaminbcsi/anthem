<?php
$result=new UtilisateurManager($connexion);
if($_SESSION["equipe"]!=""){
$resultats=$result->db_getUtilisateurId($_SESSION["id"]);
} else {
  $resultats=$result->db_getUtilisateurId1($_SESSION["id"]);
  
}

while ($row_equipe=$resultats->fetch_array(MYSQLI_ASSOC)) {
                                $utilisateur = new Utilisateur($row_equipe);
                                $utilisateurprofil = $utilisateur->getIdjoueur();
?>	

<div id="profil_banner" class="section_header section_header_profil"></div>

  
      <section id="filactumain" class="container">
           
       <?php };
	   
	   include("_menuprofil_gauche.php");	?>
       
       <div class="center_content" id="fil_actu">                      
    
	   		<?php include("_filactu.php"); ?>

       </div>
       
      	<?php
	   
	   include("_menuprofil_droite.php");	?>


        </section>

