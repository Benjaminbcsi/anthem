<?php 
  $result=new EquipeUtilManager($connexion);
  $resultats=$result->db_getEquipeUtilDemande($_SESSION["equipe"]);
  $resultequipe=new EquipeManager($connexion);
  $resultatsequipe=$resultequipe->db_getEquipeId($_SESSION["equipe"]);
  
  ?>  
  
  
  
<div class="section_header"></div>
  
<section class="container">
  
	<h1>Invitations</h1>
  
<?php include("_menuprofil_gauche.php");	?>
       
    <div class="center_content">  
    
    <h2 class="tcenter">nouvelles demande de recrutement</h2>      
    <?php while ($row_demande=$resultats->fetch_array(MYSQLI_ASSOC)) {
        $demandequipe=new EquipeUtil($row_demande);
        $resultutil=new UtilisateurManager($connexion);
        $resultatsutil=$resultutil->db_getUtilisateurById($demandequipe->getId_utilisateur());
        while ($row_util=$resultatsutil->fetch_array(MYSQLI_ASSOC)) {
        $utilisateur=new Utilisateur($row_util);
    ?>
    <div class="invitation_row">
    	<img class="img_ami" src="<?php echo $utilisateur->getChemin()?>" alt="truc" title="truc"/>
    	<div class="invit_joueur">
        	<p><?php echo $utilisateur->getPseudo()?></p>
        </div>
        <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_refequipe" name="form_refequipe">
                                    <input type="hidden" id="todo_form_refequipe" name="todo_form_refequipe" value="update_refequipe"/>
                                    <input type="hidden" name="idutil" id="idutil" value="<?php echo $utilisateur->getId();?>">
                                    <input type="hidden" name="idequipe" id="idequipe" value="<?php echo$_SESSION["equipe"];?>">
                                    <button class="btn">refuser</button>
        </form>
        <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_accequipe" name="form_accequipe">
                                    <input type="hidden" id="todo_form_accequipe" name="todo_form_accequipe" value="update_accequipe"/>
                                    <input type="hidden" name="idutil" id="idutil" value="<?php echo $utilisateur->getId();?>">
                                    <input type="hidden" name="idequipe" id="idequipe" value="<?php echo$_SESSION["equipe"];?>">
                                    <button class="btn">accepter</button>
        </form>
    </div>
    <?php }
    }?>
    
 
    </div>
       
<?php include("_menuprofil_droite.php");	?>


</section>