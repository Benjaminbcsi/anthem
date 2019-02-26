<aside id="sidebar_right">
       <?php if ($_SESSION["id"] == $utilisateurprofil) { ?>
       		<div class="side_trucs" id="side_notifs"><h3>Notifications</h3>
					<h4>N nouvelle demande d'ami</h4>
                    <?php 
                      $result=new AmisManager($connexion);
                      $resultats=$result->db_getAmisIdLast($_SESSION["id"]);
                      while ($row_amis=$resultats->fetch_array(MYSQLI_ASSOC)) {
                                  $amis=new Amis($row_amis);
                                    $results=new UtilisateurManager($connexion);
                                      ?>
                	<img class="img_ami img_ami_small" src="<?php echo $amis->getChemin();?>" alt="truc" title="truc"/>
                        <div class="invit_joueur">
                            <p><?php echo $amis->getPseudoamis();?></p>
                            <div>3<span class="invit_joueuricon"></span></div>
                            <div>3<span class="invit_jeuicon"></span></div>
                            <div>3<span class="invit_succesicon"></span></div>
                        </div><div class="button_container">
                        <button class="btn">accepter</button>
                        <button class="btn">refuser</button>
                        </div>
                        <a href="#" onclick="navigate('<?php echo encrypt('profil_invitations','DISII28');?>')
            ;">VOIR TOUTES LES NOTIFICATIONS</a>
            <?php }
            } ?></div> 


            <div class="side_trucs" id="side_succes"><h3>Succès</h3>
                <div class="succes_container"><span></span><p>Inscription</p></div><!--
                --><div class="succes_container"><span></span><p>Inscription</p></div><!--
                --><div class="succes_container"><span></span><p>Inscription</p></div>
                <a href="#" onclick="navigate('<?php echo encrypt('profil_invitations','DISII28');?>')
            ;">VOIR TOUS LES SUCCÈS</a>
            </div>
            
            <div class="side_trucs" id="side_equipe"><h3>Equipe</h3>
            <?php if(isset($_SESSION["equipe"]) && $_SESSION["equipe"]!=""){
              $resultEQUI=new EquipeManager($connexion);
              $resultatsEqui=$resultEQUI->db_getEquipeId($_SESSION["equipe"]);
                while ($row_equipeEqui=$resultatsEqui->fetch_array(MYSQLI_ASSOC)) {
                $equipeEqui=new Equipe($row_equipeEqui);
            ?>
            <img class="img_ami img_ami_small" src="./<?php echo $equipeEqui->getChemin();?>" alt="truc" title="truc"/>
            <div class="invit_joueur">
                            <p><?php echo $equipeEqui->getPseudo();?></p>
                            <div>5<span class="invit_joueuricon"></span></div>
                            <div>3<span class="invit_jeuicon"></span></div>
            </div>  
             <button class="btn" onclick="navigate('<?php echo encrypt('listejoueur','DISII28');?>')
            ;">recruter</button>             
            <a href="#" onclick="navigate('<?php echo encrypt('profil_equipe','DISII28');?>')
            ;">VOIR LE PROFIL</a>
            <?php }
            } ?>
            </div>
                                
            

            <div class="side_trucs" id="side_jeux"><h3>Jeux</h3>
            <?php $resultjeu=new JeuUtilManager($connexion);
              $resultatsjeu=$resultjeu->db_getJeuUtilJeu($_SESSION["id"]);
                while ($row_jeu=$resultatsjeu->fetch_array(MYSQLI_ASSOC)) {
                $jeu=new Jeu($row_jeu);
            ?>
            <img src="<?php echo $jeu->getChemin() ?>"class="jeu_container"><!--
            --><?php } ?>
            <a href="#" onclick="navigate('<?php echo encrypt('profil_listejeu','DISII28');?>')
            ;">VOIR TOUS LES JEUX</a>
            </div>

            <div class="side_trucs" id="side_amis"><h3>Amis</h3>
            <div class="ami_container"><span></span></div><!--
            --><div class="ami_container"><span></span></div><!--
            --><div class="ami_container"><span></span></div><!--
            --><div class="ami_container"><span></span></div>
            <a href="#" onclick="navigate('<?php echo encrypt('profil_amis','DISII28');?>')
            ;">VOIR TOUS LES AMIS</a>
            </div>
</aside>