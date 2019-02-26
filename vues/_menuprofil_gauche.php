<nav id="side-nav">
	<ul>
        <li>
           <a href="#" onclick="navigate('<?php echo encrypt('profil_filactu','DISII28');?>')
            ;">fil d'actu</a>
        </li><li>
           <a href="#" onclick="navigate('<?php echo encrypt('profil','DISII28');?>')
            ;">profil</a>
        </li><li>
           <a href="#" onclick="navigate('<?php echo encrypt('profil_messages','DISII28');?>')
            ;">messages</a>
        </li><li>
           <a href="#" onclick="navigate('<?php echo encrypt('profil_invitations','DISII28');?>')
            ;">invitations</a>
        </li><li>
           <a href="#" onclick="navigate('<?php echo encrypt('profil_notifications','DISII28');?>')
            ;">postulation</a>
        </li>
         <li>
           <a href="#" onclick="navigate('<?php echo encrypt('profil_parametres','DISII28');?>')
            ;">paramêtres</a>
        </li><li>
           <a href="#" onclick="navigate('<?php echo encrypt('profil_amis','DISII28');?>')
            ;">amis</a>
        </li><li>
           <a href="#" onclick="navigate('<?php echo encrypt('profil_equipe','DISII28');?>')
            ;">équipes</a>
        </li><li>
           <a href="#" onclick="navigate('<?php echo encrypt('listejeu','DISII28');?>')
            ;">jeux</a>
        </li>
        <li>
           <a href="#" onclick="navigate('<?php echo encrypt('inprogress','DISII28');?>')
            ;">évènements</a>
        </li><li>
           <a href="#" onclick="navigate('<?php echo encrypt('profil_listephoto','DISII28');?>')
            ;">photos</a>
        </li><li>
           <a href="#" onclick="navigate('<?php echo encrypt('profil_listevideo','DISII28');?>')
            ;">vidéos</a>
        </li><li>
           <a href="#" onclick="navigate('<?php echo encrypt('inprogress','DISII28');?>')
            ;">succès</a>
        </li>
        <?php if($_SESSION["rang"]=="Modérateur" || $_SESSION["rang"]=="Admin"){?>
        <li>
           <a href="#" onclick="navigate('<?php echo encrypt('modo_ajoutjeu','DISII28');?>')
            ;">Ajouter jeu</a>
        </li>
        <?php } if($_SESSION["rang"]=="Admin"){?>
        <li>
           <a href="#" onclick="navigate('<?php echo encrypt('inprogress','DISII28');?>')
            ;">Ajouter Modo</a>
        </li>
        <?php } ?>
    </ul>
</nav>
    


