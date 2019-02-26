<?php

$result=new PostManager($connexion);
if (isset($_SESSION["equipe"]) && $_SESSION["equipe"]!="") {
	$resultats=$result->db_getPostEquipe($_SESSION["id"]);
} else {
	$resultats=$result->db_getPost($_SESSION["id"],$_SESSION["id"]);
}

$resultcomment=new CommentaireManager($connexion);

?>	

	<div class="enter_post ">
    	<div>
        	<form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_post" name="form_post">
                <input type="hidden" id="todo_form_post" name="todo_form_post" value="valid_post"/>
                <input type="hidden" id="idutilisateurpost" name="idutilisateurpost" value="<?php echo $_SESSION["id"] ?>"/>
                <label for="post" class="fileContainer">médias</label>
                <input class="input-file" type="file" name="post" id="post">
                <textarea rows="8" name="contenupost" id="contenupost" placeholder="Entrez votre message"></textarea>
                <div class="right"><span>public</span><button>Envoyer</button></div>
              </form>	
         </div>  
	</div>

	<div class="post_list" id="actu">
		<?php $id=0;?>
		<?php while ($row_post=$resultats->fetch_array(MYSQLI_ASSOC)) {
				if(!$id){$id=$row_post["id"];} 

							  $post = new Post($row_post);
							  $type=$post->getType();
							  $idutil=$post->getId_utilisateur();
                                  ?>
             
			<div class="post_container">
            	<div class="post_joueurid">
                	<p><img src="./image/capitain.png" class="img_ami img_ami_xsmall"><span>Linsect :</span></p>
                    <p>29/06/2017</p>
                </div>
                
                
                <div class="post_content">
                	
                    <div class="post_media_container">
                    <?php
					  if(isset($idmedia) && $idmedia!=""){
						$resultmedia=new MediaManager($connexion);
						$resultatsmedia=$resultmedia->db_getMediaIdMedia($idmedia);
							while ($row_media=$resultatsmedia->fetch_array(MYSQLI_ASSOC)) {
								$media = new Media($row_media);
								$type=$media->getType();
					 	if ($type=="JPG" || $type=="jpg" || $type=="PNG"|| $type=="png" || $type=="jpeg" || $type=="JPEG") { ?>
                                    
                      <img class="img_post" src="./<?php echo $media->getChemin();?>"/>
                      
                            <?php } else { ?>
                            
                       <video controls width="20%" src="./<?php echo $media->getChemin();?>"></video>
                                <?php } } } ?>
                                
					 <p><?php echo $post->getContenu();?></p>
                     
                     </div>
                      
                      <div class="post_ggnbresp">
                      <div><span>GG</span><?php echo $post->getNombre_jaime(); ?><span id="bulle"></span>2</div>
                  </div>
             </div>
          

            <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" class="enter_response" id="form_comm" name="form_comm">
                <input type="hidden" id="todo_form_comm" name="todo_form_comm" value="valid_comm"/>
                <input type="hidden" name="idpost" id="idpost" value="<?php echo $idpost?>"/>
                <input type="hidden" name="idutilisateur" id="idutilisateur" value="<?php echo $_SESSION["id"] ?>"/>
                <img src="./image/capitain.png" class="img_ami img_ami_xsmall">
                <textarea rows="5" name="commentaire" id="commentaire" class="rep_msg" placeholder="Répondre"></textarea> 
             </form>
                      
                       
                        
             <button class="show_comments">▲ masquer les commentaires</button>
           
                
             <div class="reponse_container">
                <?php $resultatscomment=$resultcomment->db_getCommentaireAll($post->getPost_id());
                    while ($row_commentaire=$resultatscomment->fetch_array(MYSQLI_ASSOC)) {
                    if ($resultats->num_rows) {
                        $commentaire = new Commentaire($row_commentaire); ?> 
                                       	
                        <div class="post_reponses">
                    	
                        <p><img src="./image/capitain.png" class="img_ami img_ami_xsmall"><span>Linsect</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sodales ullamcorper tellus. In eget lorem porta, sodales nulla at, aliquet odio. Nunc nisi sem, mattis bibendum tortor a, efficitur lobortis augue. Quisque ornare vulputate volutpat. In facilisis, libero sed suscipit rhoncus, arcu nisl faucibus tellus, ut porta ligula nulla nec.</p>
                        <div class="post_ggnbresp comment_gg">
                			<div><span>GG</span>99</div>
                  		</div>
                        
                    </div>
                    
                    <?php } } ?>
                        
                    </div>       	
                </div	
 
 
    
	<input type="hidden" name="lastID" id="lastID" value="test"/>
                                <?php print"
								<script>
									alert('smdlfmk'+$('#totova').val());
									setID(".$id.");
								</script>";?>
                                
         	
	</div>
<?php } ?>
</div>




 

<script>
			    function send_fil_msg(e) {
		   if(e && e.keyCode == 13 && !e.shiftKey) {
			  var el = e.currentTarget.parentNode;
			  // document.getElementById("form_comm").submit();
			  el.submit();
		   }
		}
	   (function () {
			  document.getElementById("commentaire").addEventListener("keypress",send_fil_msg,false);
			  var els = document.getElementsByClassName("rep_msg");
			  for (var i=0; i<els.length; i++) {
				  els[i].addEventListener("keypress",send_fil_msg,false);
				  }
				els = document.getElementsByClassName("img_post");
			  for ( var i=0; i<els.length; i++ ) {
				  els[i].addEventListener("click",displayMedias,false);
				  }
			  //document.getElementsByClassName("rep_msg").addEventListener("keypress",send_fil_msg,false);
		})();
</script>

 <script type="text/javascript">
					  $().ready(function() {
						$('.show_comments').on('click', function() {
						  var textbutton = $(this).text();	
						  $(this).parent(this).find('.reponse_container').toggle();
						  if(textbutton == "▲ masquer les commentaires"){
						    	$(this).text("▼ afficher les commentaires");
						  }else{
								$(this).text("▲ masquer les commentaires");  
						  }
						  return false;
						});
					 });
	
$(document).ready(function() {
	setInterval(chargerNews,5000);
	//document.getElementById('chat_container').scrollTop = document.getElementById('chat_container').scrollHeight;
});

</script>	
