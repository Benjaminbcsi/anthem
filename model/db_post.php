<?php
class PostManager{
		private $mysqli;

		public function __construct($mysqli){
			$this->setDatabaseLink($mysqli);
		}
		public function setDatabaseLink(mysqli $mysqli){
			$this->mysqli=$mysqli;
		}



	function db_getPostEquipe($id) {
	$query=$this->mysqli->prepare("
			SELECT 
				post.titre,post.contenu,post.nombre_jaime,post.id as post_id,post.id_utilisateur as id_utilisateur,media.chemin,media.type 
			from 
				post,media,utilisateur 
			where 
			post.id_media = media.id 
			and (post.id_utilisateur in ( select utilisateur_amis.id_utilisateur FROM projet2.utilisateur_amis WHERE utilisateur_amis.id_utilisateur2=? AND utilisateur_amis.etat=1 ) 
			or post.id_utilisateur in ( select utilisateur_amis.id_utilisateur2 FROM projet2.utilisateur_amis WHERE utilisateur_amis.id_utilisateur=? AND utilisateur_amis.etat=1 ) 
			or ( select equipe_utilisateur.id_utilisateur FROM projet2.equipe_utilisateur WHERE equipe_utilisateur.id_utilisateur=? AND equipe_utilisateur.etat=1 ))

			group by post.contenu 
	 		order by post.date DESC
	 		limit 5") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("iii",$id,$id,$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}

		function db_getPostEquipeLast($id,$idpost) {
	$querytext="SELECT post.*,post.id as post_id,post.id_utilisateur as id_utilisateur,media.chemin,media.type 
	from post,media,utilisateur 
	where post.id>? and ( post.id_media = media.id and post.id_utilisateur
	in ( select utilisateur_amis.id_utilisateur FROM projet2.utilisateur_amis WHERE utilisateur_amis.id_utilisateur2=? AND utilisateur_amis.etat=1 ) 
    or post.id_utilisateur 
	in ( select utilisateur_amis.id_utilisateur2 FROM projet2.utilisateur_amis WHERE utilisateur_amis.id_utilisateur=? AND utilisateur_amis.etat=1 ) 
	or ( select equipe_utilisateur.id_utilisateur FROM projet2.equipe_utilisateur WHERE equipe_utilisateur.id_utilisateur=? AND equipe_utilisateur.etat=1 ) and post.id_media = media.id ) 
     group by post.contenu order by post.date DESC limit 2";
    $query=$this->mysqli->prepare($querytext);
	if ($query) {
		$query->bind_param("iiii",$idpost,$id,$id,$id);
		$query->execute();
		return $query->get_result();
	} else {
		return 0;
	}
	}

	function db_getPostE($id,$condition="1=1",$limit=0,$offset=0,$order="id asc") {
	$query=$this->mysqli->prepare("SELECT post.*,media.chemin,media.type from post,media where post.id_equipe=? group by post.titre") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("i",$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}

	function db_getPost($id) {
	$query=$this->mysqli->prepare("SELECT post.*,post.id as post_id,media.chemin,media.type from post,media where post.id_media = media.id and post.id_utilisateur in ( select utilisateur_amis.id_utilisateur FROM projet2.utilisateur_amis WHERE utilisateur_amis.id_utilisateur2=3 AND utilisateur_amis.etat=? ) or post.id_utilisateur in ( select utilisateur_amis.id_utilisateur2 FROM projet2.utilisateur_amis WHERE utilisateur_amis.id_utilisateur=? AND utilisateur_amis.etat=1 )  and post.id_media = media.id group by post.contenu order by post.date desc limit 4") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("ii",$id,$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}
	
	function db_getPostPerso($id) {
	$query=$this->mysqli->prepare("SELECT post.*,post.id as post_id 
	from post,utilisateur 
	where post.id_utilisateur =utilisateur.id and post.id_utilisateur=? group by post.contenu 
	 		order by post.date DESC
	") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("i",$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}

	function db_getPostLast($id,$idpost) {
	$query=$this->mysqli->prepare("SELECT post.*,media.chemin,media.type from post,media where post.id>? and ( post.id_media = media.id and post.id_utilisateur in ( select utilisateur_amis.id_utilisateur FROM projet2.utilisateur_amis WHERE utilisateur_amis.id_utilisateur2=? AND utilisateur_amis.etat=1 ) or post.id_utilisateur in ( select utilisateur_amis.id_utilisateur2 FROM projet2.utilisateur_amis WHERE utilisateur_amis.id_utilisateur=? AND utilisateur_amis.etat=1 )  and post.id_media = media.id ) group by post.contenu order by post.date desc limit 2") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("iii",$idpost,$id,$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}


	function db_getPostId($id,$limit=0,$offset=0,$order="id asc") {	
	$query=$this->mysqli->prepare("select * from post where id_utilisateur=? ") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("i",$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}

	function db_insertPostEquipeNoMedia(Post $post) {
	$titre=$this->mysqli->real_escape_string(htmlspecialchars($post->getTitre()));
	$contenu=$this->mysqli->real_escape_string(htmlspecialchars($post->getContenu()));
	$date=$post->getDate();
	$etat=$post->getEtat();
	$jaime=$post->getJaime();
	$idequipe=$post->getIdequipe();
	$idutilisateur=null;
	$idmedia=null;
	$query=$this->mysqli->prepare("INSERT INTO `post`(`titre`, `contenu`, `date`, `etat`, `nombre_jaime`, `id_utilisateur`, `id_equipe`, `id_media`) VALUES (?,?,?,?,?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("sssiiiii",$titre,$contenu,$date,$etat,$jaime,$idequipe,$idutilisateur,$idmedia); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}

	function db_insertPostEquipeMedia(Post $post) {
	$titre=$this->mysqli->real_escape_string(htmlspecialchars($post->getTitre()));
	$contenu=$this->mysqli->real_escape_string(htmlspecialchars($post->getContenu()));
	$date=$post->getDate();
	$etat=$post->getEtat();
	$jaime=$post->getJaime();
	$idequipe=$post->getIdequipe();
	$idutilisateur=null;
	$idmedia=$post->getIdmedia();
	$query=$this->mysqli->prepare("INSERT INTO `post`(`titre`, `contenu`, `date`, `etat`, `nombre_jaime`, `id_utilisateur`, `id_equipe`, `id_media`) VALUES (?,?,?,?,?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("sssiiiii",$titre,$contenu,$date,$etat,$jaime,$idequipe,$idutilisateur,$idmedia); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}

	
	function db_insertPostUtilisateurNoMedia(Post $post) {
	$titre=$this->mysqli->real_escape_string(htmlspecialchars($post->getTitre()));
	$contenu=$this->mysqli->real_escape_string(htmlspecialchars($post->getContenu()));
	$date = date('Y-m-d H:i:s');
	$etat=1;
	$jaime=0;
	$idequipe=null;
	$idutilisateur=$post->getId_utilisateur();
	$idmedia=null;
	$query=$this->mysqli->prepare("INSERT INTO `post` (`titre`, `contenu`, `date`, `etat`, `nombre_jaime`, `id_utilisateur`, `id_equipe`, `id_media`) VALUES (?,?,NOW(),?,?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ssiiiii",$titre,$contenu,$etat,$jaime,$idutilisateur,$idequipe,$idmedia); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}
	

	function db_insertPostUtilisateurMedia(Post $post) {
	$titre=$this->mysqli->real_escape_string(htmlspecialchars($post->getTitre()));
	$contenu=$this->mysqli->real_escape_string(htmlspecialchars($post->getContenu()));
	$date = date('Y-m-d H:i:s');
	$etat=1;
	$jaime=0;
	$idequipe=null;
	$idutilisateur=$post->getId_utilisateur();
	$idmedia=$post->getId_media();
	$query=$this->mysqli->prepare("INSERT INTO `post` (`titre`, `contenu`, `date`, `etat`, `nombre_jaime`, `id_utilisateur`, `id_equipe`, `id_media`) VALUES (?,?,NOW(),?,?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	
	if ($query) {
		$query->bind_param("ssiiiii",$titre,$contenu,$etat,$jaime,$idutilisateur,$idequipe,$idmedia); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		echo "smldké";
		exit;
	}
	}

	function db_updatePostEquipeMedia(Post $post) {
	$titre=$this->mysqli->real_escape_string(htmlspecialchars($post->getTitre()));
	$contenu=$this->mysqli->real_escape_string(htmlspecialchars($post->getContenu()));
	$etat=$post->getEtat();
	$idmedia=$post->getIdmedia();
	$id=$post->getId();
	$query=$this->mysqli->prepare("UPDATE `post` SET `titre`=?,`contenu`=?,`etat`=?,`id_media`=? WHERE id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ssiii",$titre,$contenu,$etat,$idmedia,$id); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}

	function db_updatePostEquipeNoMedia(Post $post) {
	$titre=$this->mysqli->real_escape_string(htmlspecialchars($post->getTitre()));
	$contenu=$this->mysqli->real_escape_string(htmlspecialchars($post->getContenu()));
	$etat=$post->getEtat();
	$idmedia=null;
	$id=$post->getId();
	$query=$this->mysqli->prepare("UPDATE `post` SET `titre`=?,`contenu`=?,`etat`=?,`id_media`=? WHERE id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ssiii",$titre,$contenu,$etat,$idmedia,$id); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}

	function db_updatePostUtilisateurMedia(Post $post) {
	$titre=$this->mysqli->real_escape_string(htmlspecialchars($post->getTitre()));
	$contenu=$this->mysqli->real_escape_string(htmlspecialchars($post->getContenu()));
	$etat=$post->getEtat();
	$idmedia=$post->getIdmedia();
	$id=$post->getId();
	$query=$this->mysqli->prepare("UPDATE `post` SET `titre`=?,`contenu`=?,`etat`=?,`id_media`=? WHERE id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ssiii",$titre,$contenu,$etat,$idmedia,$id); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}

	function db_updatePostUtilisateurNoMedia(Post $post) {
	$titre=$this->mysqli->real_escape_string(htmlspecialchars($post->getTitre()));
	$contenu=$this->mysqli->real_escape_string(htmlspecialchars($post->getContenu()));
	$etat=$post->getEtat();
	$idmedia=null;
	$id=$post->getId();
	$query=$this->mysqli->prepare("UPDATE `post` SET `titre`=?,`contenu`=?,`etat`=?,`id_media`=? WHERE id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ssiii",$titre,$contenu,$etat,$idmedia,$id); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}

	function db_updatePostJaime($id) {
	$query=$this->mysqli->prepare("UPDATE `post` SET `nombre_jaime`=nombre_jaime+1 WHERE id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("i",$id); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}

	function db_getPostUtil($id) {
	$query=$this->mysqli->prepare("SELECT post.*,media.chemin,media.type from post,media where post.id_utilisateur=? and post.id_media = media.id group by post.titre,post.contenu order by post.date desc ") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("i",$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}
	function db_getPostGG($id) {
	$query=$this->mysqli->prepare("SELECT `nombre_jaime` FROM `post` WHERE id=? ") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("i",$id);
		$query->execute();		
		$result=$query->get_result();
		$row_gg=$result->fetch_array(MYSQLI_ASSOC);
		return $row_gg["nombre_jaime"];
	} else {
		return 0;
	}
	}

	function db_DelPost($id,$idutil) {
	$query=$this->mysqli->prepare("DELETE FROM `post` WHERE id_utilisateur=? and id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ii",$idutil,$id); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}
		
}

?>