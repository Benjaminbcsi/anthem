<?php 
  $result=new AmisManager($connexion);
  $resultats=$result->db_getAmisId($_SESSION["id"]);
  $results=new UtilisateurManager($connexion);
  $resultatsutil=$results->db_getUtilisateurId($_SESSION["id"]);
  $resultse=new EquipeUtilManager($connexion);
  $resultatsequipe=$resultse->db_getEquipeUtilId($_SESSION["id"]);
  $resultatsdemandeequipe=$resultse->db_getEquipeUtilDemande($_SESSION["equipe"]);
  ?>  
  
  
<div class="section_header"></div>
  
<section class="container">
  
	<h1>In progress</h1>
  
<?php include("_menuprofil_gauche.php");	?>
       
    <div class="center_content">      
                                     
     <p>PLOP</p>                               
                                

    </div>
       
<?php include("_menuprofil_droite.php");	?>

</section>