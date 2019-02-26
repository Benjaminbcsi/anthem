<?php
$idUtilisateur=$_SESSION["id"];
$resultUtilisateur=db_getAuteur("id=".$idUtilisateur);
$row_utilisateur=$resultUtilisateur->fetch_array(MYSQLI_ASSOC);
?>
<h2>Vous modifier l'utilisateur <?php echo $row_utilisateur["login"]?></h2>
<form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_modif" name="form_modif">
          <input type="hidden" id="from" name="from" value="index.php"/>
          <input type="hidden" id="next" name="next" value="index.php"/>
          <input type="hidden" id="id" name="id" value="<?php echo $row_utilisateur["id"]?>">
          <input type="hidden" id="todo_form_modif" name="todo_form_modif" value="valid_modif"/>
		      <br/><br/>
					<b>Identifiant : </b><br/>
					<input type="text" size="40"  placeholder="nom" id="login" name="login" value="<?php echo $row_utilisateur["login"] ?>" maxlength="30"/><br/><br/>
					<b>Mot de passe :</b><br/>
					<input type="password" value="<?php echo $row_utilisateur["password"] ?>" name="password" id="password" size="40" maxlength="15"/><br/><br/>
					<b>E-Mail :</b><br/>
					<input type="text" size="40" value="<?php echo $row_utilisateur["email"] ?>" id="mail" name="mail" /><br/><br/>
          <b>Nom : </b><br/>
          <input type="text" size="40" value="<?php echo $row_utilisateur["nom"] ?>" placeholder="nom" id="nom" name="nom" /><br/><br/>
					<input type="submit" value="Valider"/>