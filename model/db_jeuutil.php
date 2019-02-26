<?php
class JeuUtilManager{
		private $mysqli;

		public function __construct($mysqli){
			$this->setDatabaseLink($mysqli);
		}
		public function setDatabaseLink(mysqli $mysqli){
			$this->mysqli=$mysqli;
		}
	function db_getJeuUtil($id,$id2,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT * FROM `utilisateur_jeu` WHERE `id_utilisateur`=? and id_jeu=?";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("ii",$id,$id2);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_getJeuUtilJeu($id,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT *,media.chemin,jeu.nom FROM `utilisateur_jeu`,media,jeu WHERE utilisateur_jeu.`id_utilisateur`=? and utilisateur_jeu.id_jeu=jeu.id and jeu.id_media=media.id";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("i",$id);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}
	function db_getJeuUtilNb($id,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT * FROM `utilisateur_jeu` WHERE `id_utilisateur`=?";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("i",$id);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_getEquipeUtilPost($id,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT * FROM `equipe_utilisateur` WHERE equipe_utilisateur.`id_equipe`=?";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("i",$id);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}
	

	function db_insertEquipeUtil(EquipeUtil $equipeutil) {
	$idutilisateur=$equipeutil->getId_utilisateur();
	$idequipe=$equipeutil->getId_equipe();
	$etat=0;
	$query=$this->mysqli->prepare("INSERT INTO `equipe_utilisateur`(`id_utilisateur`, `id_equipe`, `etat`) VALUES (?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("iii",$idutilisateur,$idequipe,$etat); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}

	function db_deletetEquipeUtil(EquipeUtil $equipeutil) {
	$idutilisateur=$equipeutil->getId_utilisateur();
	$idequipe=$equipeutil->getId_equipe();
	$query=$this->mysqli->prepare("DELETE FROM `equipe_utilisateur` WHERE `id_utilisateur`=? and id_equipe=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ii",$idutilisateur,$idequipe); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}

	
}

?>