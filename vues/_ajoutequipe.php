 <?php
require_once("./model/db_utilisateur.php");
 ?>
 <div class="form-style-5">
 <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_equipe" name="form_equipe">
          <input type="hidden" id="from" name="from" value="index.php"/>
          <input type="hidden" id="next" name="next" value="index.php"/>
          <input type="hidden" id="todo_form_equipe" name="todo_form_equipe" value="valid_equipe"/>
          <br/><br/>
          <b>Nom d'équipe :</b><br/>
          <input type="text" size="40"  placeholder="Nom team" id="pseudo" name="pseudo"  maxlength="30"/><br/><br/>
          <b>Type de l'équipe : </b><br/>
          <input type="text" size="40"  placeholder="Try Hard/fun" id="type" name="type"  maxlength="50"/><br/><br/>
          <b>Statut:</b> <br/><br/>
          <SELECT name="statut" id="statut" size="1">
          <OPTION>Cherche des joueurs</OPTION>
          <OPTION>Ne cherche pas de joueurs</OPTION>
          </SELECT>
          <br/><br/>
          <b>Description</b><br/><br/>
          <textarea id="desc" name="desc" rows="10" cols="50" maxlength="255"/></textarea><br/><br/>
          <b>photo de profil :</b>
          <span id='spanProfil'><input type="file" name="profil" id="profil" />Trouver une image</span>
          <input type="submit" value="Valider"/>
        </form>
</div>
</html>

