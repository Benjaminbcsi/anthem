<?php

$result=new UtilisateurManager($connexion);
if($_SESSION["equipe"]!=""){
$resultatsm=$result->db_getUtilisateurId($_SESSION["id"]);
} else {
$resultatsm=$result->db_getUtilisateurId1($_SESSION["id"]);
  
}

while ($row_equipe=$resultatsm->fetch_array(MYSQLI_ASSOC)) {
                                $utilisateur =new Utilisateur($row_equipe);
                                $utilisateurprofil = $utilisateur->getIdjoueur();
?>

<header id="main-header">

<div id="logotype">
	 <a href="#" onclick="navigate('<?php echo encrypt('accueil','DISII28');?>');"><img src="./image/Logotype.png" height="54px"></a>
</div>

				<nav id="main-nav" class="container">
				<ul><li>
                       <a href="#" onclick="navigate('<?php echo encrypt('listejeu','DISII28');?>')
                        ;">Jeux</a>
						
						<ul>
							<li>
								<a href="#" onclick="navigate('<?php echo encrypt('listejeu','DISII28');?>','name');">ordre alphabétique</a>
							</li><!--
						 -->
						</ul>
                    </li><li>
                       <a href="#" onclick="navigate('<?php echo encrypt('listeequipe','DISII28');?>')
                        ;">Equipes</a>
						
						<ul>
							<li>
								<a href="#" onclick="navigate('<?php echo encrypt('listeequipe','DISII28');?>','name');">ordre alphabétique</a>
							</li><!--
						 
						 --><li>
								<a href="#" onclick="navigate('<?php echo encrypt('listeequipe','DISII28');?>','date');">ancienneté</a>
							</li>
						</ul>
                    </li><li>
                       <a href="#" onclick="navigate('<?php echo encrypt('listejoueur','DISII28');?>')
                        ;">Joueurs</a>
						
						<ul>
							<li>
								<a href="#" onclick="navigate('<?php echo encrypt('listejoueur','DISII28');?>','name');">ordre alphabétique</a>
							</li><!--
						 --><!--
						 --><li>
								<a href="#" onclick="navigate('<?php echo encrypt('listejoueur','DISII28');?>','date');">ancienneté</a>
							</li>
						</ul>
                    </li><li>
                       <a href="#" onclick="navigate('<?php echo encrypt('inprogress','DISII28');?>')
                        ;">Evennements</a>
                    </li></ul></nav>
                    
                    
                    
                    
					<?php if(!isset($_SESSION["pseudo"]) || $_SESSION["pseudo"]==""){?>
                    
					<nav id="connect-nav">
							<ul>
								 <li>
									<a href="#" onclick="navigate('<?php echo encrypt('connexion','DISII28');?>')
									;">Connexion</a>
							</li>

						</ul>
					</nav>
                   
                    <?php } else { ?>
                   
					<nav id="connect-nav">
						<ul>
                        	<li><a href="#" onclick="navigate('<?php echo encrypt('profil_messages','DISII28');?>');">
                        		 	<div id="icon_message"></div>
                                 </a>
                            </li>
                        	<li><a href="#" onclick="navigate('<?php echo encrypt('profil','DISII28');?>');">
                        		 	<div id="profilpic_mini"  style="background-image:url(<?php echo $utilisateur->getChemin();?>);"></div>
                        		</a>
                            </li>
							<li>
								<a href="logout.php" >D&eacute;connexion</a>
							</li>
								<?php }; ?>
						</ul>
					</nav>
					 
                     

</header>
<?php } ?>
