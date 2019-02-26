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
  
	<h1>Invitations</h1>
  
<?php include("_menuprofil_gauche.php");	?>
       
    <div class="center_content">  
    
    <h2 class="tcenter">N nouvelles invitations</h2>      
    <?php while ($row_amis=$resultats->fetch_array(MYSQLI_ASSOC)) {
                                  $amis=new Amis($row_amis);
                                    $results=new UtilisateurManager($connexion);
                                      ?>
    <div class="invitation_row">
    	<img class="img_ami" src="<?php echo $amis->getChemin();?>" />
    	<div class="invit_joueur">
        	<p><?php echo $amis->getPseudoamis();?></p>
        	<div>3<span class="invit_joueuricon"></span></div>
            <div>3<span class="invit_jeuicon"></span></div>
            <div>3<span class="invit_succesicon"></span></div>
        <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_accepte_amis" name="form_accepte_amis">
        <input type="hidden" id="todo_form_accepte_amis" name="todo_form_accepte_amis" value="valid_accepte_amis"/>
        <input type="hidden" name="idutilisateur" id="idutilisateur" value="<?php echo $amis->getId_utilisateur();?>">
        <input type="hidden" name="idutilisateur2" id="idutilisateur2" value="<?php echo $_SESSION["id"] ?>">
        <button class="btn">accepter</button>
        </form>
        <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_refuse_amis" name="form_refuse_amis">
        <input type="hidden" id="todo_form_refuse_amis" name="todo_form_refuse_amis" value="valid_refuse_amis"/>
        <input type="hidden" name="idutilisateur" id="idutilisateur" value="<?php echo $amis->getId_utilisateur();?>">
        <input type="hidden" name="idutilisateur2" id="idutilisateur2" value="<?php echo $amis->getId_utilisateur2() ?>">
        <button class="btn">refuser</button>
        </form>
        
        </div>
    </div>
    <?php }
    ?>
    
                                     
                                    
                                

    </div>
       
<?php include("_menuprofil_droite.php");	?>

</section>