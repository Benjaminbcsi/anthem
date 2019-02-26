<?php // vue accès directe au requêtes AJAX en méthode POST
require_once("./fonctions/fonctions.php");
require_once("./model/db_init.php");
require_once("./model/_model.php");
session_start();
function safeData($data){
	$data=strip_tags($data); //Suppression des tags
	$data=htmlentities($data); // Suppression des entités HTML
	$data=stripslashes($data);//Suppression des slashs
	return $data;
}

if (isset($_GET["todo"]) && $_GET["todo"]=="getlastactu") {
  $resultcomment=new CommentaireManager($connexion);
  $postManager=New PostManager($connexion);
  if (isset($_SESSION["equipe"]) && $_SESSION["equipe"]!="") {
  $resultats=$postManager->db_getPostEquipeLast($_SESSION["id"],$_GET["id"]);
  } else {
  $resultats=$postManager->db_getPostLast($_SESSION["id"],$_GET["id"]);
  }
  $html="";
  $id=$_GET["id"];
  while ($row_post=$resultats->fetch_array(MYSQLI_ASSOC)) {
                                  $id=$row_post["id"];
                                  $post = new Post($row_post);
                                  $type=$post->getType();
                                  $idutil=$post->getId_utilisateur();
                                  $html.=$post->getTitre()."<br/>";
                                  $html.=$post->getContenu()."&nbsp;&nbsp;&nbsp;&nbsp;";
                                  $html.=$post->getNombre_jaime()."GG<br/>";
                                  
                                  if($idutil!="" && $idutil==$_SESSION["id"]){ 
                                     $html.='<a href="#">Supprimer</a>';
                                  }
								  
								  
								  
								  
								  
								   
                                  if ($type=="JPG" || $type=="jpg" || $type=="PNG"|| $type=="png" || $type=="jpeg" || $type=="JPEG") {
                                  $html.="<img src=\"./".$post->getChemin()."\"/>";
                                  } else {
                                  $html.="<video controls width='20%' src='./'".$post->getChemin()."/>";
                                 } 
                                $html.="<br/><br/><br/>";
                                $html.='<form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_comm" name="form_comm">
                                    <input type="hidden" id="todo_form_comm" name="todo_form_comm" value="valid_comm"/>
                                    <input type="hidden" name="idpost" id="idpost" value="'.$post->getPost_id().'">
                                    <input type="hidden" name="idutilisateur" id="idutilisateur" value="'.$_SESSION["id"].'">
                                    <textarea rows="4" cols="50" name="commentaire" id="commentaire" placeholder="Describe yourself here..."></textarea> 
                                  <input type="submit" value="Commenter"/>
                                  </form>';
                                $resultatscomment=$resultcomment->db_getCommentaireAll($post->getPost_id());
                                while ($row_commentaire=$resultatscomment->fetch_array(MYSQLI_ASSOC)) {
                                  $commentaire = new Commentaire($row_commentaire);
                                  $html.='<form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_comm" name="form_comm">
                                    <input type="hidden" id="todo_form_updatecomm" name="todo_form_updatecomm" value="update_comm"/>
                                    <input type="hidden" name="idcomm" id="idcomm" value="'.$commentaire->getId().'">
                                    <input type="submit" value="Modifier"/>
                                  </form>';
                                  $html.=$commentaire->getPseudo()."<br/>";
                                  $html.=$commentaire->getData()."<br/>";
                                  $html.=$commentaire->getNombre_jaime()."<br/>";
                                  $html.="GG<br/>";
                                 }
                                } 
                                if ($id!=$_GET["id"]) {
                                  $html.='<input type="hidden" name="lastID" id="lastID"/>';
                                  $html.="<script>setID(".$id.")</script>";}

    echo $html;

}



if(isset($_GET["todo"]) && $_GET["todo"]=="sendMsg") {
  $typeData=$_GET["typeData"];
  // Pour les auteurs
  if ($typeData=="sendMsg") {
    $util1="";$util2="";$data="";
    if (isset($_GET["data"])) {$data=$_GET["data"];}
    if (isset($_GET["idUtil1"])) {$util1=$_GET["idUtil1"];}
    if (isset($_GET["idUtil2"])) {$util2=$_GET["idUtil2"];}
    $messageManager=new MessageManager($connexion);
    $messageManager->db_insertMessage($util1,$util2,$data);
}
}

if (isset($_GET["todo"]) && $_GET["todo"]=="getlastmessage") {
  $resultmessage=new MessageManager($connexion);
  if($_GET["date"]==""){
  $resultats=$resultmessage->db_getMessage($_GET["id"]);
  } else {
  $resultats=$resultmessage->db_getMessageDate($_GET["id"],$_GET["date"]);
  } 
  $html="";
  $id=$_GET["id"];
  $lastDate="";
  while ($row_message=$resultats->fetch_array(MYSQLI_ASSOC)) {
    if ($row_message["id_utilisateur1"]==$_SESSION["id"] || $row_message["id_utilisateur2"]==$_SESSION["id"]) {
    	$message= new Message ($row_message);
        if($_SESSION["id"] == $message->getId_utilisateur1()){
           $html.='<p class="message_say">'.$message->getData().'</p>
           <div class="date_say">'.$message->getDate().'</div>';
         } else {
           $html.='<p class="message_answer">'.$message->getData().'</p>';
           $html.='<span class="date_answer">'.$message->getDate().'</span>';
          }
      $lastDate=$message->getDate();
      }
    }
    $html.='<script>setIDMessage('.$id.')</script>';
    if ($lastDate!="") {$html.='<script>setLastDateMessage("'.$lastDate.'")</script>';}
    echo $html;
    
    }


  if(isset($_GET["todo"]) && $_GET["todo"]=="AddJeu") {
  $typeData=$_GET["typeData"];
  // Pour les auteurs
  if ($typeData=="JeuUtil") {
    $util="";$jeu="";
    if (isset($_GET["idjoueur"])) {$util=$_GET["idjoueur"];}
    if (isset($_GET["idJeu"])) {$jeu=$_GET["idJeu"];}
    $result      = new JeuUtilManager($connexion);
    $resultats = $result->db_getJeuUtil($util,$jeu);
    if ($resultats->num_rows) {
        $_SESSION["messageKO"] = "Jeu existant";
        header("Location:../index.php");
        exit;
    }
    $resultats = $result->db_getJeuUtilNb($util);
    if ($resultats->num_rows>=3) {
        $_SESSION["messageKO"] = "Maximun de jeu ajouter";
        header("Location:../index.php");
        exit;
    }
    $jeuManager=new JeuManager($connexion);
    $jeuManager->db_insertJeuUtil($util,$jeu);
}
}

if (isset($_GET["todo"]) && $_GET["todo"]=="sendMsg") {
  $resultmessage=new MessageManager($connexion);
  if($_GET["date"]==""){
  $resultats=$resultmessage->db_getMessage($_GET["id"]);
  } else {
  $resultats=$resultmessage->db_getMessageDate($_GET["id"],$_GET["date"]);
  } 
  $html="";
  $id=$_GET["id"];
  $lastDate="";
  while ($row_message=$resultats->fetch_array(MYSQLI_ASSOC)) {
    if ($row_message["id_utilisateur1"]==$_SESSION["id"] || $row_message["id_utilisateur2"]==$_SESSION["id"]) {
    	
      $message= new Message ($row_message);
        if($_SESSION["id"] == $message->getId_utilisateur1()){
           $html.='<p class="message_say">'.$message->getData().'</p>
           <div class="date_say">'.$message->getDate().'</div>';
         } else {
           $html.='<p class="message_answer">'.$message->getData().'</p>';
           $html.='<span class="date_answer">'.$message->getDate().'</span>';
          
      }
      $lastDate=$message->getDate();
  		}
    }
    $html.='<script>setIDMessage('.$id.')</script>';
    if ($lastDate!="") {$html.='<script>setLastDateMessage("'.$lastDate.'")</script>';}
    echo $html;
    
    }
	
if(isset($_GET["todo"]) && $_GET["todo"]=="gg") {
  $typeData=$_GET["typeData"];
  if ($typeData=="gg") {
    $gg="";
    if (isset($_GET["idgg"])) {$gg=$_GET["idgg"];}
    $messageManager=new PostManager($connexion);
    $messageManager->db_updatePostJaime($gg);
	$resultgg=$messageManager-> db_getPostGG($gg);
	echo $resultgg;	
}
}
?>