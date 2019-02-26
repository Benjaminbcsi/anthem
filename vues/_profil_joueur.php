<?php
$result=new UtilisateurManager($connexion);
if($_SESSION["autre"]!="undefined" && $_SESSION["autre1"]=="" ){
  $resultats=$result->db_getUtilisateurId1($_SESSION["autre"]);
} 
else if($_SESSION["autre1"]!=""){
$resultats=$result->db_getUtilisateurId($_SESSION["autre"]);
}

while ($row_equipe=$resultats->fetch_array(MYSQLI_ASSOC)) {
  
    $utilisateur =new Utilisateur($row_equipe);
    $utilisateurprofil = $utilisateur->getIdjoueur();
?>	

<div class="section_header section_header_profil"></div>

  
      <section class="container">
      <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_conv"  name="form_conv">
      <input type="hidden" id="todo_form_conv" name="todo_form_conv" value="conv_util"/>
      <input type="hidden" name="idutil" id="idutil" value="<?php echo $utilisateurprofil ?>">   
      <input type="hidden" name="pseudoutil" id="pseudoutil" value="<?php echo $_SESSION["id"]?>">               
      </form>
      
      		<div id="profil_sum">
            	<div id="sum_pic" style="background-image:url(<?php echo $utilisateur->getChemin();?>);"></div>
                <div id="sum_text">
            		<h1><?php echo $utilisateur->getPseudo();?></h1>

      
   
                    <h2>Niveau : <?php echo $utilisateur->getNiveauutil();?></h2>   
            	</div>
              
            <?php /*if ($_SESSION["id"] == $utilisateurprofil) { ?>
            <a href="#" onclick="navigate('<?php echo encrypt('page_modifutil','DISII28');?>');">Modifier profil</a><?php } */?>
            <?php if ($_SESSION["id"]!=$utilisateurprofil){ ?>
              <button class="btn" id="btnparam" onclick="document.getElementById('form_conv').submit();" style="margin-left:50px;position: relative; top: 3em;" >Discuter</button>
              <?php }?>
            </div>
                    
            
       <?php };
	   
	   include("_menuprofil_gauche.php");	?>
       
       <div class="center_content">                        
    

       </div>
       
      	<?php
	   
	   include("_menuprofil_droite.php");	?>


        </section>

