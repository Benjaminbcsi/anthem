<?php
$idAuteur=$_GET["id"];
$resultAuteur=db_getAuteur("id=".$idAuteur);
$row_auteur=$resultAuteur->fetch_array(MYSQLI_ASSOC);
?>
<h2>Vous modifier l'utilisateur <?php echo $row_auteur["nom"]?></h2>
<div style="visibility:hidden">
<form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_modif" name="form_modif">
          <input type="hidden" id="from" name="from" value="index.php"/>
          <input type="hidden" id="next" name="next" value="index.php"/>
          <input type="hidden" id="id" name="id" value="<?php echo $row_auteur["id"]?>">
          <input type="hidden" id="todo_form_modif_auteur" name="todo_form_modif_auteur" value="valid_modif_auteur"/>
		      <br/><br/>
					<b>Nom : </b><br/>
					<input type="text" size="40"  id="nom" name="nom" value="<?php echo $row_auteur["nom"] ?>" maxlength="30"/><br/><br/>
					<b>Prenom :</b><br/>
					<input type="text" value="<?php echo $row_auteur["prenom"] ?>" name="prenom" id="prenom" size="40" maxlength="15"/><br/><br/>
					<b>E-Mail :</b><br/>
					<input type="text" size="40" value="<?php echo $row_auteur["email"] ?>" id="mail" name="mail" /><br/><br/>
          			<input type="submit" value="Valider"/>
</div>