<?php
$result=new UtilisateurManager($connexion);
if($_SESSION["equipe"]!=""){
$resultats=$result->db_getUtilisateurId($_SESSION["id"]);
} else {
  $resultats=$result->db_getUtilisateurId1($_SESSION["id"]);
  
}

?>
<?php while ($row_equipe=$resultats->fetch_array(MYSQLI_ASSOC)) {
	$utilisateur =new Utilisateur($row_equipe);
	$utilisateurprofil = $utilisateur->getIdjoueur();
	$statut=$utilisateur->getStatutjoueur();
?>


<div class="section_header"></div>
	<section class="container">
    
    <h1>Paramètres</h1>

	<?php include("_menuprofil_gauche.php");	?>
       
	<div class="center_content nopb">
    
    <h2 class="tcenter">Modification du profil de : <?php echo $utilisateur->getPseudo()?></h2>
    <?php if(isset($_SESSION["messageKO"]) && $_SESSION["messageKO"]!=""){ ?>
    <div class="error_container">
    
    	<h3>Erreur :</h3>
	   	<span class="error_icon"></span><p class="error_msg"><?php echo $_SESSION["messageKO"] ?></p><br/>
    	
    </div>
    <?php } ?>
    <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_util"  name="form_util">
    	<input type="hidden" id="todo_form_updateutil" name="todo_form_updateutil" value="update_util"/>
    	<input type="hidden" name="idutil" id="idutil" value="<?php echo $utilisateur->getIdjoueur() ?>">   
    	<input type="hidden" name="pseudoutil" id="pseudoutil" value="<?php echo $_SESSION["pseudo"]?>">               
    	<b>Modifier mon image de profil :</b><br/><br/>
        <span id='spanProfil'><input type="file" name="fichier" id="fichier"/>trouver une image</span><br/>
        <p>Changer ma description :</p>
        <textarea cols="70%" rows="3" name="updatedesc" id="updatedesc"><?php echo $utilisateur->getDescjoueur() ?></textarea><br/>
        <p>Modifier mon status</p>
        <SELECT class="styled-select" name="statut" id="statut" size="1">
              <OPTION <?php if(isset($statut) && $statut==1){echo "selected='selected'";}?> value="1" >Cherche une &eacute;quipe</OPTION>
              <OPTION <?php if(isset($statut) && $statut==0){echo "selected='selected'";}?> value="0" >Ne cherche pas d'&eacute;quipe</OPTION>
        </SELECT>        
    
     </form>

      <div id="jesaisplus">
     	<button class="btn" id="btnparam" onclick="document.getElementById('form_util').submit();" >valider</button>
     </div>
     <?php } ?>

	</div>
       
	<?php include("_menuprofil_droite.php");	?>
    
    </section>
 </div>



                                 
