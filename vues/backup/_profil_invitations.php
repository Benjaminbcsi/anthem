<?php 
  $result=new AmisManager($connexion);
  $resultats=$result->db_getAmisId($_SESSION["id"]);
  $results=new UtilisateurManager($connexion);
  $resultatsutil=$results->db_getUtilisateurId($_SESSION["id"]);
  ?>  
  
  
  
<div class="section_header"></div>
  
<section class="container">
  
	<h1>Invitations</h1>
  
<?php include("_menuprofil_gauche.php");	?>
       
    <div class="center_content">  
    
    <h2 class="tcenter">N nouvelles invitations</h2>      
    
    <div class="invitation_row">
    	<img class="img_ami" src="./image/capitain.png" alt="truc" title="truc"/>
    	<div class="invit_joueur">
        	<p>Linsect</p>
        	<div>3<span class="invit_joueuricon"></span></div>
            <div>3<span class="invit_jeuicon"></span></div>
            <div>3<span class="invit_succesicon"></span></div>
        </div>
        <button class="btn">refuser</button>
        <button class="btn">accepter</button>
    </div>
    
    <div class="invitation_row">
    	<img class="img_ami" src="./image/capitain.png" alt="truc" title="truc"/>
    	<div class="invit_joueur">
        	<p>gzqjkbgdlgvdljfbljsdhbvliezh</p>
        	<div>3<span class="invit_joueuricon"></span></div>
            <div>3<span class="invit_jeuicon"></span></div>
            <div>3<span class="invit_succesicon"></span></div>
        </div>
        <button class="btn">refuser</button>
        <button class="btn">accepter</button>
    </div>
    
    <div class="invitation_row">
    	<img class="img_ami" src="./image/capitain.png" alt="truc" title="truc"/>
    	<div class="invit_joueur">
        	<p>Linsect</p>
        	<div>3<span class="invit_joueuricon"></span></div>
            <div>3<span class="invit_jeuicon"></span></div>
            <div>3<span class="invit_succesicon"></span></div>
        </div>
        <button class="btn">refuser</button>
        <button class="btn">accepter</button>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
                    
    
    	   <div style="text-align: center;">
                           <?php while ($row_amis=$resultats->fetch_array(MYSQLI_ASSOC)) {
                                  $amis=new Amis($row_amis);
                                 ?> 
                                    <?php 
                                    $results=new UtilisateurManager($connexion);
                                    $resultatsutil=$results->db_getUtilisateurId($amis->getIdutilisateur());
                                    while ($row_util=$resultatsutil->fetch_array(MYSQLI_ASSOC)) { 
                                      $utilisateur = new Utilisateur($row_util)
                                      ?>
                                    Demande d'amis de : <?php echo $utilisateur->getPseudo();?><br/>
                                    <?php } ?>
                                      id <?php echo $amis->getIdutilisateur();?><br/>
                                    id amis : <?php echo $amis->getIdutilisateur2();?><br/>
                                    <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_accepte_amis" name="form_accepte_amis">
                                    <input type="hidden" id="todo_form_accepte_amis" name="todo_form_accepte_amis" value="valid_accepte_amis"/>
                                    <input type="hidden" name="idutilisateur" id="idutilisateur" value="<?php echo $amis->getIdutilisateur();?>">
                                    <input type="hidden" name="idutilisateur2" id="idutilisateur2" value="<?php echo $amis->getIdutilisateur2() ?>">
                                    <input type="submit" value="Accepter"/>
                                    </form>

                                <?php } ?>
                               
                                  </div>
    
    </div>
       
<?php include("_menuprofil_droite.php");	?>

</section>