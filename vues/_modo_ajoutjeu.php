<?php
$result=new GenreManager($connexion);
$resultatsgenre=$result->db_getGenre();
?>   

 <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_jeu" name="form_jeu">
          <input type="hidden" id="from" name="from" value="index.php"/>
          <input type="hidden" id="next" name="next" value="index.php"/>
          <input type="hidden" id="todo_form_jeu" name="todo_form_jeu" value="valid_jeu"/>
          <br/><br/>
          <b>Nom du jeu : </b><br/>
          <input type="text" size="40"  id="nomjeu" name="nomjeu"  maxlength="30"/><br/><br/>
          <b>Genre</b><br/><br/>
          <SELECT id="genre" name="genre" size="1">
          <?php
          while ($row_genre=$resultatsgenre->fetch_array(MYSQLI_ASSOC)) {
          $genre=new Genre($row_genre);?>
          <OPTION value="<?php echo $genre->getId()?>"><?php echo $genre->getGenre() ?></OPTION>
          <?php } ?>
          </SELECT>
          <br/><br/>
          <b>Description</b><br/><br/>
          <textarea id="descjeu" name="descjeu" rows="10" cols="50" maxlength="800"/></textarea><br/><br/>
          <b>photo du jeu :</b>
          <input type="file" name="jeu" id="jeu" />
          <br/><br/>
          <input type="submit" value="Valider"/><br/>
        </form>
</html>

