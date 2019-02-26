<?php 
  $result=new AmisManager($connexion);
  $resultats=$result->db_getAmisIdDel($_SESSION["id"],$_SESSION["pseudo"]);
  $results=new UtilisateurManager($connexion);
  $resultatsutil=$results->db_getUtilisateurId($_SESSION["id"]);
  ?>  
  
  
  
<div class="section_header"></div>
  
<section class="container" id="listeamis">
  
	<h1>Amis</h1>
  
<?php include("_menuprofil_gauche.php");	?>
       
    <div class="center_content">  
    
    <div class="search_zone">
         <input type="text" name="" class="search_list">
    </div>    
        
                           <?php while ($row_amis=$resultats->fetch_array(MYSQLI_ASSOC)) {
                                  	$amis=new Amis($row_amis);
                                    $amis1=$amis->getId_utilisateur();
                                    $amis2=$amis->getId_utilisateur2();
                                    $results=new UtilisateurManager($connexion);
                                    $resultatsutil=$results->db_getUtilisateurIdAmis($amis->getId_utilisateur());
                                    while ($row_util=$resultatsutil->fetch_array(MYSQLI_ASSOC)) { 
                                    $utilisateur = new Utilisateur($row_util);
                                      ?>
                                    <div class="invitation_row">
                                    <img class="img_ami" src="<?php echo $amis->getChemin()?>" alt="truc" title="truc"/>
                                    <div class="invit_joueur">
                                        <p><?php echo $amis->getPseudoamis();?></p>
                                        <div>3<span class="invit_joueuricon"></span></div>
                                          <div>3<span class="invit_jeuicon"></span></div>
                                          <div>3<span class="invit_succesicon"></span></div>
                                       <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_accepte_amis" name="form_accepte_amis">
                                    <input type="hidden" id="todo_form_retirer_amis" name="todo_form_retirer_amis" value="valid_retirer_amis"/>
                                    <input type="hidden" name="idutilisateur" id="idutilisateur" value="<?php echo $amis->getId_utilisateur();?>">
                                    <input type="hidden" name="idutilisateur2" id="idutilisateur2" value="<?php echo $amis->getId_utilisateur2() ?>">
                                    <button class="btn">retirer de la liste</button>
                                    </form>
                                  </div>
                                  </div>
                                <?php }
                                } ?>
                                </div>
                                
                               
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
                    

    
    </div>
       
<?php include("_menuprofil_droite.php");	?>


</section>