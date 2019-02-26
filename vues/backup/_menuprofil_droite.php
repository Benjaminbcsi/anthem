<aside id="sidebar_right">
       <?php if ($_SESSION["id"] == $utilisateurprofil) { ?>
       		<div class="side_trucs" id="side_notifs"><h3>Notifications</h3>
            		<h4>A nouvelle demande d'ami</h4>
                	<img class="img_ami img_ami_small" src="./image/capitain.png" alt="truc" title="truc"/>
                        <div class="invit_joueur">
                            <p>Linsect</p>
                            <div>3<span class="invit_joueuricon"></span></div>
                            <div>3<span class="invit_jeuicon"></span></div>
                            <div>3<span class="invit_succesicon"></span></div>
                        </div><div class="button_container">
                        <button class="btn">accepter</button>
                        <button class="btn">refuser</button>
                        </div>
                        <a href="#" onclick="navigate('<?php echo encrypt('profil_invitations','DISII28');?>')
            ;">VOIR TOUTES LES NOTIFICATIONS</a>
            </div> <?php } ?>


            <div class="side_trucs" id="side_succes"><h3>Succès</h3>
                <div class="succes_container"><span></span><p>Inscription</p></div><!--
                --><div class="succes_container"><span></span><p>Inscription</p></div><!--
                --><div class="succes_container"><span></span><p>Inscription</p></div>
                <a href="#" onclick="navigate('<?php echo encrypt('profil_invitations','DISII28');?>')
            ;">VOIR TOUS LES SUCCÈS</a>
            </div>

            <div class="side_trucs" id="side_equipe"><h3>Equipe</h3>
            <img class="img_ami img_ami_small" src="./image/capitain.png" alt="truc" title="truc"/>
            <div class="invit_joueur">
                            <p>PyroTeam</p>
                            <div>5<span class="invit_joueuricon"></span></div>
                            <div>3<span class="invit_jeuicon"></span></div>
            </div>  
             <button class="btn">recruter</button>             
            <a href="#" onclick="navigate('<?php echo encrypt('profil_invitations','DISII28');?>')
            ;">VOIR LE PROFIL</a>
            </div>

            <div class="side_trucs" id="side_jeux"><h3>Jeux</h3>
            <div class="jeu_container"><span></span></div><!--
            --><div class="jeu_container"><span></span></div><!--
            --><div class="jeu_container"><span></span></div><!--
            --><div class="jeu_container"><span></span></div>
            <a href="#" onclick="navigate('<?php echo encrypt('profil_invitations','DISII28');?>')
            ;">VOIR TOUS LES JEUX</a>
            </div>

            <div class="side_trucs" id="side_amis"><h3>Amis</h3>
            <div class="ami_container"><span></span></div><!--
            --><div class="ami_container"><span></span></div><!--
            --><div class="ami_container"><span></span></div><!--
            --><div class="ami_container"><span></span></div>
            <a href="#" onclick="navigate('<?php echo encrypt('profil_invitations','DISII28');?>')
            ;">VOIR TOUS LES AMIS</a>
            </div>
</aside>