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
	$utilisateurprofil = $utilisateur->getIdjoueur()
?>


<div class="section_header"></div>
	<section class="container">
    
    <h1>Paramètres</h1>

	<?php include("_menuprofil_gauche.php");	?>
       
	<div class="center_content nopb">
    
    <h2 class="tcenter">Modifier mes paramètres de profil</h2>
    
    <div class="error_container">
    	<h3>Erreur :</h3>
    	<span class="error_icon"></span><p class="error_msg">format d’image non reconnu</p><br/>
        <span class="error_icon"></span><p class="error_msg">la description doit faire moins de 140 caractères</p>
    </div>
    <form id="form_util">                  
    	<b>Modifier mon image de profil :</b><br/><br/>
        <span id='spanProfil'><input type="file" name="fichier" id="fichier" />trouver une image</span><br/>
        <p>Changer ma description :</p>
        <textarea cols="70%" rows="3"></textarea><br/>
        <p>Modifier mon status</p>
        <SELECT class="styled-select" name="statut" id="statut" size="1">
              <OPTION>Cherche une &eacute;quipe</OPTION>
              <OPTION>Ne cherche pas d'&eacute;quipe</OPTION>
        </SELECT>        
     </form>
     <div id="jesaisplus">
     	<button class="btn" id="btnparam">valider</button>
     </div>
     <?php } ?>

	</div>
       
	<?php include("_menuprofil_droite.php");	?>
    
    </section>
 </div>



                                 
