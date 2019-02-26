<div class="section_header"></div>
  
<section class="container" id="messagerie">

<?php include("_menuprofil_gauche.php");

  $result=new MessageManager($connexion);
  $utilisateurManager=new UtilisateurManager($connexion);
  $resultatsInterlocuteurs=$result->db_getMyInterlocuteurs($_SESSION["id"]);
?>

 	   <div class="chat_amis">
 	   <h3>Contacts</h3>

 	   		<div class="row_amis_container">
 	   					<?php $InterlocuteurDejaAffiche=array();?>
 	   					<?php $idInterlocuteur=0;?>
 	   		 	   		<?php while ($row_interlocuteur=$resultatsInterlocuteurs->fetch_array(MYSQLI_ASSOC)) {
 	   		 	   			if ($row_interlocuteur["id_utilisateur1"]==$_SESSION["id"]) { // C'est moi qui cause
 	   		 	   				$idInterlocuteur=$row_interlocuteur["id_utilisateur2"];
 	   		 	   				if (!isset($InterlocuteurDejaAffiche[$idInterlocuteur]) or !$InterlocuteurDejaAffiche[$idInterlocuteur]){
 	   		 	   					$resultUtilisateur=$utilisateurManager->db_getUtilisateurId1($idInterlocuteur);
 	   		 	   					$row_utilisateur=$resultUtilisateur->fetch_array(MYSQLI_ASSOC);
 	   		 	   					$utilisateur =new Utilisateur($row_utilisateur);
 	   		 	   					$InterlocuteurDejaAffiche[$idInterlocuteur]=1;
 	   		 	   					// CONSTRUCTION DU HTML
 	   		 	   				?>
 	   		 	   				<div class="row_amis notif" onclick="navigate('<?php echo encrypt('profil_messages','DISII28');?>','<?php echo $idInterlocuteur?>');">
				 	   			<img class="img_ami img_ami_xsmall" src="<?php echo $utilisateur->getChemin();?>" alt="truc" title="truc"/>
				 	   			<span><?php echo $utilisateur->getPseudo();?></span>
				 	   			<span>2</span>
				 	   		</div>
 	   		 	   				<?php 
 	   		 	   			}
 	   		 	   			}
 	   		 	   			echo '<input type="hidden" name="lastIDMessage" id="lastIDMessage"/>';
 	   		 	   		
 	   		 	   			echo "<script>setIDMessage(".$idInterlocuteur.")</script>";
 	   		 	   			if ($row_interlocuteur["id_utilisateur2"]==$_SESSION["id"]) { // C'est à moi qu'on cause
 	   		 	   				$idInterlocuteur=$row_interlocuteur["id_utilisateur1"];
 	   		 	   				if (!isset($InterlocuteurDejaAffiche[$idInterlocuteur]) or !$InterlocuteurDejaAffiche[$idInterlocuteur]){
 	   		 	   					$resultUtilisateur=$utilisateurManager->db_getUtilisateurId1($idInterlocuteur);
 	   		 	   					$row_utilisateur=$resultUtilisateur->fetch_array(MYSQLI_ASSOC);
 	   		 	   					$utilisateur =new Utilisateur($row_utilisateur);
 	   		 	   					$InterlocuteurDejaAffiche[$idInterlocuteur]=1;
 	   		 	   					// CONSTRUCTION DU HTML
 	   		 	   					?>
 	   		 	   					<div class="row_amis notif" onclick="navigate('<?php echo encrypt('profil_messages','DISII28');?>','<?php echo $idInterlocuteur?>');">
					 	   			<img class="img_ami img_ami_xsmall" src="<?php echo $utilisateur->getChemin();?>" alt="truc" title="truc"/>
					 	   			<span><?php echo $utilisateur->getPseudo();?></span>
					 	   			<span>2</span>
					 	   		</div>
 	   		 	   				<?php } 	   		 	   			
 	   		 	   			}
 	   		 	   		}
 	   		 	   		echo '<input type="hidden" name="lastIDMessage" id="lastIDMessage"/>';
 	   		 	   		if(isset($_SESSION["autre"]) && $_SESSION["autre"]!=""){
 	   		 	   		echo "<script>setIDMessage(".$_SESSION["autre"].")</script>";
 	   		 	   		} else {
 	   		 	   		echo "<script>setIDMessage(".$idInterlocuteur.")</script>";
 	   		 	   		}

?>
 	   		</div>
 	   		
 	   		
 	   </div>
 	  
       
       <div id="containermessage" class="center_content nopb">                     
    		
				<?php 
				if (isset($_SESSION["autre"]) && $_SESSION["autre"]>0) {
					$idInterlocuteur=$_SESSION["autre"];
   					$resultUtilisateur=$utilisateurManager->db_getUtilisateurId1($idInterlocuteur);
   					$row_utilisateur=$resultUtilisateur->fetch_array(MYSQLI_ASSOC);
   					$utilisateur =new Utilisateur($row_utilisateur);					
				}
				?>
    			<img id="img_profil_messages" class="img_ami" src="<?php echo $utilisateur->getChemin();?>" alt="truc" title="truc"/>
    			<p class="tcenter"><?php echo $utilisateur->getPseudo();?></p>
				<div id="chat_container" class="chat_container">
				<?php 
				$resultatsMessage=$result->db_getMessageLast($_SESSION["id"],$idInterlocuteur);
				$lastDate="";
				$countMessage=0;
				while ($row_messagerep=$resultatsMessage->fetch_array(MYSQLI_ASSOC) ) {
					$messagerep =new Message($row_messagerep);
					if($_SESSION["id"] == $messagerep->getId_utilisateur1()){?>
					<p class="message_say"><?php echo $messagerep->getData();?></p>
					<div class="date_say"><?php echo $messagerep->getDate();?></div>
					<?php } else {?>
					<p class="message_answer"><?php echo $messagerep->getData();?></p>
					<span class="date_answer"><?php echo $messagerep->getDate();?></span>

					<?php } $countMessage++;?>
				<?php } ?>

				<?php if($countMessage>0){
				$lastDate=$messagerep->getDate();
				echo '<input type="hidden" name="lastDateMessage" id="lastDateMessage"/>';
				echo "<script>setLastDateMessage('".$lastDate."')</script>";
				}?>
				</div>
			
			 	

    		<div class="sendmessage_container">
    		<form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_comm" name="form_comm">
            <input type="hidden" id="todo_form_msg" name="todo_form_msg" value="valid_msg"/>
            <input type="hidden" name="idutilisateur1" id="idutilisateur1" value="<?php echo $_SESSION["id"] ?>">
            <input type="hidden" name="idutilisateur2" id="idutilisateur2" value="<?php echo $idInterlocuteur ?>">
            <textarea placeholder="Entrez votres message" id="contentmessage"></textarea>
    		<button class="btn" onclick="javascript:ajaxPostMsg('sendMsg',{'idUtil1':document.getElementById('idutilisateur1').value,'idUtil2':document.getElementById('idutilisateur2').value,'data':document.getElementById('contentmessage').value});return false;">envoyer</button>
            </form>
	   		</div>

    		
	   	

       </div>

</section>

<script>$(document).ready(function() {
	setInterval(chargerNews,10000);
	setInterval(chargerMessages,2000);
	document.getElementById('chat_container').scrollTop = document.getElementById('chat_container').scrollHeight;
});</script>