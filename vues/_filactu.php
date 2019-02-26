<?php
if (!isset($_SESSION["messageKO"]) && $_SESSION["messageKO"]==""){$_SESSION["messageKO"]="SALSIFIS";}
$result=new PostManager($connexion);
if (isset($_SESSION["equipe"]) && $_SESSION["equipe"]!="") {
	$resultats=$result->db_getPostEquipe($_SESSION["id"]);
} else {
	$resultats=$result->db_getPost($_SESSION["id"]);
}
$resultcomment=new CommentaireManager($connexion);

?>	

<div class="enter_post ">
		<div>
        
        
        
            <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_post" name="form_post">
                <input type="hidden" id="todo_form_post" name="todo_form_post" value="valid_post"/>
                <input type="hidden" id="idutilisateurpost" name="idutilisateurpost" value="<?php echo $_SESSION["id"] ?>"/>
                <label for="post" id="labelfichier" class="fileContainer">ajouter une image<div id="nomfichertype">Aucun fichier</div></label>
                <input onchange="displayfilename();" class="input-file" type="file" name="post" id="post">
                <textarea rows="8" name="contenupost" id="contenupost" placeholder="Entrez votre message"></textarea>
                <div class="right"><span>public</span><button>Envoyer</button></div>
            </form>	
		</div>
	</div>																												
	
<div class="post_list" id="actu">
							<?php $id=0;?>
							<?php while ($row_post=$resultats->fetch_array(MYSQLI_ASSOC)){
								if(!$id){$id=$row_post["post_id"];}
                                  $post = new Post($row_post);
                                  $type=$post->getType();
                                  $idutil=$post->getId_utilisateur();
								  $idmedia=$post->getId_media();
								  $idpost=$post->getPost_id();
								  $resultUtil=new UtilisateurManager($connexion);
								  $resultatsUtil=$resultUtil->db_getUtilisateurIdPost($idutil);
						          while ($row_util=$resultatsUtil->fetch_array(MYSQLI_ASSOC)) {
									 $utilisateur2 = new Utilisateur($row_util);
                                  ?>
                                  
	<div class="post_container">
        
        <div class="post_joueurid">
            <p><img src="<?php echo $utilisateur2->getChemin()?>" class="img_ami img_ami_xsmall"><span><?php echo $utilisateur2->getPseudo()?></span></p>
            <p>29/06/2017</p>
        </div>
    
        <?php } ?>     
        
        <div class="post_content">

                            <?php if(isset($idmedia) && $idmedia!=""){
                            $resultmedia=new MediaManager($connexion);
                            $resultatsmedia=$resultmedia->db_getMediaIdMedia($idmedia);
                            while ($row_media=$resultatsmedia->fetch_array(MYSQLI_ASSOC)) {
								print_r($row_media);
								exit;
                                    $media = new Media($row_media);
                                    $type=$media->getType();
                            if ($type=="JPG" || $type=="jpg" || $type=="PNG"|| $type=="png" || $type=="jpeg" || $type=="JPEG") { ?>
                            
                            <div class="post_media_container" data_type="<?php echo ($type != "mp4") ? "img" : "video" ;?>" data_id="<?php echo $media->getId();?>">
  								 <img src="./<?php echo $post->getChemin();?>" width="50px"/>
                            </div>
                            <?php } ?> 
                            <p><?php echo $post->getContenu();?>
							   
                            </p>
                                             
						  
                          <?php } } ?>                                 
                                  
           <div class="post_ggnbresp">
               <div><span onclick="javascript:ajaxUpdategg('gg',{'idgg':<?php echo $post->getPost_id()?>});return false;">GG</span><span id="gg_<?php echo $post->getPost_id()?>" class="gg_count"><?php echo $post->getNombre_jaime(); ?></span><span id="bulle"></span>2</div>
           </div>           
       </div>  
       
       
             
             <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" class="enter_response" id="form_comm" name="form_comm">
                <input type="hidden" id="todo_form_comm" name="todo_form_comm" value="valid_comm"/>
                <input type="hidden" name="idpost" id="idpost_<?php echo $post->getPost_id()?>" value="<?php echo $idpost?>"/>
                <input type="hidden" name="idutilisateur" id="idutilisateur" value="<?php echo $_SESSION["id"] ?>"/>
                <img src="<?php echo $utilisateur->getChemin()?>" class="img_ami img_ami_xsmall">
                <textarea rows="5" name="commentaire" id="commentaire" class="rep_msg" placeholder="Répondre"></textarea> 
         	 </form>
             
       <button class="show_comments">▲ masquer les commentaires</button>        
             
        <div class="reponse_container">                   

                                <?php
                                $resultatscomment=$resultcomment->db_getCommentaireAll($post->getPost_id());
                                while ($row_commentaire=$resultatscomment->fetch_array(MYSQLI_ASSOC)) {
                                  $commentaire = new Commentaire($row_commentaire);
                                  ?>
                                 
                <div class="post_reponses">              
                    <p><img src="<?php echo $commentaire->getChemin()?>" class="img_ami img_ami_xsmall"><span><?php echo $commentaire->getPseudo();?><br/></span>
                    <?php echo $commentaire->getData();?></p> 
                    <div class="post_ggnbresp comment_gg">
                    	<div><span >GG</span><?php echo $commentaire->getNombre_jaime();?></div>
                	</div> 
                	<input type="hidden" name="lastID" id="lastID"/>
       		 	</div>  
         <?php }
         ?>  
          
     </div>
   <?php print"<script>setID(".$id.")</script>";?> 
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

  $(document).ready(function() {
  setInterval(chargerNews,1000);
}); 

function ajaxUpdategg(typeData,arrayID){
	nocache="&nocache="+Math.random()*1000000;
	var getUrl="ajaxGET.php?todo=gg&typeData="+typeData
	for (var id in arrayID) {getUrl+='&'+id+'='+arrayID[id]}
	getUrl+=nocache
	jQuery.ajax({url:getUrl,
		success: function(data){
			$("#gg_"+arrayID[id]).html(data);
		}
	});
}

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
</script>