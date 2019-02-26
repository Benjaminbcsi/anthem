<?php
class CommentaireManager{
		private $mysqli;

		public function __construct($mysqli){
			$this->setDatabaseLink($mysqli);
		}
		public function setDatabaseLink(mysqli $mysqli){
			$this->mysqli=$mysqli;
		}
	function db_getCommentaireSimple($condition="1=1",$limit=0,$offset=0,$order="id asc") {	
	$query=$this->mysqli->prepare("select * from commentaire") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
}


	function db_getCommentaireAll($id,$condition="1=1",$limit=0,$offset=0,$order="id asc") {	
	$query=$this->mysqli->prepare("SELECT commentaire.data,utilisateur.pseudo,media.chemin,commentaire.nombre_jaime FROM media,`commentaire`,utilisateur,post WHERE commentaire.id_utilisateur=utilisateur.id and commentaire.id_utilisateur=utilisateur.id and utilisateur.id_photo =media.id and commentaire.id_post=post.id and id_post=?") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("i",$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}

	function db_insertCommentaire(Commentaire $commentaire) {
	$data=$this->mysqli->real_escape_string(htmlspecialchars($commentaire->getData()));
	$nombrejaime=0;
	$idpost=$commentaire->getId_post();
	$idutilisateur=$commentaire->getId_utilisateur();
	$query=$this->mysqli->prepare("INSERT INTO `commentaire`(`data`, `nombre_jaime`, `id_post`, `id_utilisateur`) VALUES (?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("siii",$data,$nombrejaime,$idpost,$idutilisateur); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}


	function db_updateCommentaire(Commentaire $commentaire) {
	$data=$this->mysqli->real_escape_string(htmlspecialchars($commentaire->getData()));
	$id=$commentaire->getId();
	$query=$this->mysqli->prepare("UPDATE `commentaire` SET `data`=? WHERE id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("si",$data,$id); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}

	function db_DelCommentaire($id) {
	$query=$this->mysqli->prepare("DELETE FROM `commentaire` WHERE id_post=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("i",$id); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}
	

}



?>