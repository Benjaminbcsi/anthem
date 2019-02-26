<?php
if (isset($_GET["id"])&&$_GET["id"]!="") {
  $idAuteur=$_GET["id"];
$resultAuteur=db_getAuteur("id=".$idAuteur);
$row_modif=$resultAuteur->fetch_array(MYSQLI_ASSOC);
}
?>
<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Email</th>
				    
					</td>
                                 </tr>
                            </thead>

                            <tbody>
                           <?php
                        $result=db_getAuteur();
                         if($result->num_rows>0) {
                                while ($row_auteur=$result->fetch_array(MYSQLI_ASSOC)) {
                                 ?>
                                <tr>
                                    <td><?php echo $row_auteur["nom"];?></td>
                                    <td><?php echo $row_auteur["prenom"];?></td>
                                    <td><?php echo $row_auteur["email"];?></td>
                                                          <?php
                        if (isset($_SESSION["role"]) && $_SESSION["role"]=="admin") { ?>
                        	 <td>
                        	<button id="modifierbutton" onclick="afficher('visible');auteurmodif(<?php echo $row_auteur["id"] ?>);">Execute GET</button>
                        </td>
                        <?php } ?>
                             </tbody>
                                <?php } ?>
                                <?php } ?>
                                
                            </tbody>
                        </table>
                        <script>
  function auteurmodif(id){
  nocache="&nocache="+Math.random()*100000000;
  requestGET = new ajaxRequest();
  requestGET.open("GET","ajaxGET.php?idauteur="+id,true);
    requestGET.onreadystatechange = function () {
    if (this.readyState==4) { //Uniquement lorsque la requête est terminée
      if (this.status==200) {   //Uniquement lorque la ressource existe
        if (this.responseText!=null) { // Uniquement lorque j'ai du contenu
        document.getElementById("nom").value = this.responseText;
        } else {
          alert("Aucune Données");
        }
      } else {
        alert("Le serveur web renvoie une erreur : "+this.statusText);
      }
    }
  };
}
    function sendAjaxRequest(method){
    if(method=="GET"){requestGET.send(null);}
  }
  function afficher(etat)
{   
    document.getElementById("modif_auteur").style.visibility=etat;
}

  </script>
  
                        <div id="modif_auteur" style="visibility:hidden">
<form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_modif" name="form_modif">
          <input type="hidden" id="from" name="from" value="index.php"/>
          <input type="hidden" id="next" name="next" value="index.php"/>
          <input type="hidden" id="id" name="id" value="<?php echo $row_modif["id"]?>">
          <input type="hidden" id="todo_form_modif_auteur" name="todo_form_modif_auteur" value="valid_modif_auteur"/>
          <br/><br/>
          <b>Nom : </b><br/>
          <input type="text" size="40"  id="nom" name="nom" value="" maxlength="30"/><br/><br/>
          <b>Prenom :</b><br/>
          <input type="text" value="<?php echo $row_modif["prenom"] ?>" name="prenom" id="prenom" size="40" maxlength="15"/><br/><br/>
          <b>E-Mail :</b><br/>
          <input type="text" size="40" value="<?php echo $row_modif["email"] ?>" id="mail" name="mail" /><br/><br/>
                <input type="submit" value="Valider"/>
</div>