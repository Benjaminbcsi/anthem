   



   <form name="form_upload" action="./controllers/controller.php" method="POST" enctype="multipart/form-data" onsubmit="javascript:return checkFile('fichier')"/>
   	<input type="hidden" name="todo_form_upload"  id="todo_form_upload" value="valid_upload"/>
    <input type="hidden" name="MAX_FILE_SIZE" value="1572864"/>
    Fichier: <br/>
    <input type="file" id="fichier" name="fichier"/>
    <input type="submit" name="valider"/>
   </form>