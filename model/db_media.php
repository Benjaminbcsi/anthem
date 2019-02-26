<?php
class MediaManager{
		private $mysqli;

		public function __construct($mysqli){
			$this->setDatabaseLink($mysqli);
		}
		public function setDatabaseLink(mysqli $mysqli){
			$this->mysqli=$mysqli;
		}
	function db_getMedia($condition="1=1",$limit=0,$offset=0,$order="id asc") {	
	$condition=$this->mysqli->real_escape_string(htmlspecialchars($condition));
	$limit+=1-1;
	$offset+=1-1;
	$order=$this->mysqli->real_escape_string(htmlspecialchars($order));
	$query="select * from media where ".$condition; 
	print_r($query);
	$query.=" order by ".$order;	
	if($limit>0) {$query.=" limit ".$limit;}
	if($offset>0) {$query.=" offset ".$offset;}
	$result=$this->mysqli->query($query) or trace("Erreur sur la requête :".$query.":".$this->mysqli->error);
	return $result;	
	}

	function db_getMediaId($id,$limit=0,$offset=0,$order="id asc") {	
	$query=$this->mysqli->prepare("select * from media where id_utilisateur=?") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("i",$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}

	function db_getMediaIdMedia($id,$limit=0,$offset=0,$order="id asc") {	
	$query=$this->mysqli->prepare("select * from media where id=?") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("i",$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}

	function db_insertMediaEquipe(Media $media) {
	$type=$this->mysqli->real_escape_string(htmlspecialchars($media->getType()));
	$nom=$this->mysqli->real_escape_string(htmlspecialchars($media->getNom()));
	$chemin=$media->getChemin();
	$taille=$this->mysqli->real_escape_string(htmlspecialchars($media->getTaille()));
	$idequipe=$media->getIdequipe();
	$idutilisateur=null;
	$idjeu=null;
	$query=$this->mysqli->prepare("INSERT INTO `media`(`type`, `nom`,`taille`,`chemin`,`id_equipe`,`id_utilisateur`,`id_jeu`) VALUES (?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ssisiii",$type,$nom,$taille,$chemin,$idequipe,$idutilisateur,$idjeu); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}
	function db_insertMediaEquipeCreation(Media $media) {
	$type=$this->mysqli->real_escape_string(htmlspecialchars($media->getType()));
	$nom=$this->mysqli->real_escape_string(htmlspecialchars($media->getNom()));
	$chemin=$media->getChemin();
	$taille=$this->mysqli->real_escape_string(htmlspecialchars($media->getTaille()));
	$idequipe=null;
	$idutilisateur=null;
	$idjeu=null;
	$query=$this->mysqli->prepare("INSERT INTO `media`(`type`, `nom`,`taille`,`chemin`,`id_equipe`, `id_utilisateur`, `id_jeu`) VALUES (?,?,?,?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ssisiii",$type,$nom,$taille,$chemin,$idequipe,$idutilisateur,$idjeu); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}

	function db_insertMediaUtilisateurInscription(Media $media) {
	$type=$this->mysqli->real_escape_string(htmlspecialchars($media->getType()));
	$nom=$this->mysqli->real_escape_string(htmlspecialchars($media->getNom()));
	$chemin=$media->getChemin();
	$taille=$media->getTaille();
	$idequipe=null;
	$idutilisateur=null;
	$idjeu=null;
	$query=$this->mysqli->prepare("INSERT INTO `media`(`type`, `nom`,`taille`,`chemin`,`id_equipe`,`id_utilisateur`,`id_jeu`) VALUES (?,?,?,?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ssisiii",$type,$nom,$taille,$chemin,$idequipe,$idutilisateur,$idjeu); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}
	function db_insertMediaUtilisateur(Media $media) {
	$type=$this->mysqli->real_escape_string(htmlspecialchars($media->getType()));
	$nom=$this->mysqli->real_escape_string(htmlspecialchars($media->getNom()));
	$chemin=$media->getChemin();
	$taille=$this->mysqli->real_escape_string(htmlspecialchars($media->getTaille()));
	$idequipe=null;
	$idutilisateur=$media->getId_utilisateur();
	$idjeu=null;
	$query=$this->mysqli->prepare("INSERT INTO `media`(`type`, `nom`, `taille`, `chemin`, `id_equipe`, `id_utilisateur`, `id_jeu`) VALUES (?,?,?,?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ssisiii",$type,$nom,$taille,$chemin,$idequipe,$idutilisateur,$idjeu); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}

	function db_updateMediaEquipe(Media $media) {
	$id=$media->getId();
	$type=$this->mysqli->real_escape_string(htmlspecialchars($media->getType()));
	$nom=$this->mysqli->real_escape_string(htmlspecialchars($media->getNom()));
	$chemin=$media->getChemin();
	$taille=$this->mysqli->real_escape_string(htmlspecialchars($media->getTaille()));
	$idequipe=$media->getIdequipe();
	$idutilisateur=null;
	$idjeu=null;
	$query=$this->mysqli->prepare("UPDATE `media` SET `type`=?,`nom`=?,`taille`=?,`chemin`=?,`id_equipe`=?,`id_utilisateur`=? ,`id_jeu`=? WHERE id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ssisiiii",$type,$nom,$taille,$chemin,$idequipe,$idutilisateur,$idjeu,$id); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}
	function db_updateMediaUtilisateur(Media $media) {
	$id=$media->getId();
	$type=$this->mysqli->real_escape_string(htmlspecialchars($media->getType()));
	$nom=$this->mysqli->real_escape_string(htmlspecialchars($media->getNom()));
	$chemin=$media->getChemin();
	$taille=$this->mysqli->real_escape_string(htmlspecialchars($media->getTaille()));
	$idequipe=null;
	$idutilisateur=$media->getId_utilisateur();
	$idjeu=null;
	$query=$this->mysqli->prepare("UPDATE `media` SET `type`=?,`nom`=?,`taille`=?,`chemin`=?,`id_equipe`=?,`id_utilisateur`=? ,`id_jeu`=? WHERE id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ssisiiii",$type,$nom,$taille,$chemin,$idequipe,$idutilisateur,$idjeu,$id); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}

	function db_updateMediaJeu(Media $media) {
	$id=$media->getId();
	$idjeu=$media->getIdjeu();
	$query=$this->mysqli->prepare("UPDATE `media` SET `id_jeu`=? WHERE id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ii",$idjeu,$id); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}

	function db_updateMediaEquipeDel($id) {
	$query=$this->mysqli->prepare("UPDATE `media` SET `id_equipe`=null WHERE id_equipe=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("i",$id); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}


	function db_deleteMedia(Media $media) {
	$id=$media->getId();
	$query=$this->mysqli->prepare("DELETE FROM `media` WHERE id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("i",$id); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}

	function db_insertMediaUpdateUtilisateur(Media $media) {
	$type=$this->mysqli->real_escape_string(htmlspecialchars($media->getType()));
	$nom=$this->mysqli->real_escape_string(htmlspecialchars($media->getNom()));
	$chemin=$media->getChemin();
	$taille=$this->mysqli->real_escape_string(htmlspecialchars($media->getTaille()));
	$idequipe=null;
	$idutilisateur=$media->getId_utilisateur();
	$idjeu=null;
	$query=$this->mysqli->prepare("INSERT INTO `media`(`type`, `nom`, `taille`, `chemin`, `id_equipe`, `id_utilisateur`, `id_jeu`) VALUES (?,?,?,?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ssisiii",$type,$nom,$taille,$chemin,$idequipe,$idutilisateur,$idjeu); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}

	
}

?>