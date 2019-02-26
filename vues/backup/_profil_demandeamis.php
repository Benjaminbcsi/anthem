<?php 
  $result=new AmisManager($connexion);
  $resultats=$result->db_getAmisId($_SESSION["id"]);
  $results=new UtilisateurManager($connexion);
  $resultatsutil=$results->db_getUtilisateurId($_SESSION["id"]);
  ?>  
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
                                <B> pas de demande d'ami en cour</B>
                               
                                  </div>
