<?php
class EquipeUtilManager{
		private $mysqli;

		public function __construct($mysqli){
			$this->setDatabaseLink($mysqli);
		}
		public function setDatabaseLink(mysqli $mysqli){
			$this->mysqli=$mysqli;
		}
	function db_getEquipeUtil($id,$id2,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT * FROM `equipe_utilisateur` WHERE `id_utilisateur`=? and id_equipe=?";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("ii",$id,$id2);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_getEquipeUtilDemande($id,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT * FROM `equipe_utilisateur` WHERE id_equipe=? and etat =0";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("i",$id);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}
	function db_getEquipeUtilId($id,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT * FROM `equipe_utilisateur` WHERE `id_utilisateur`=?";
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

	function db_deleteEquipeUtil($id,$idequipe) {
		$stmt="DELETE FROM `equipe_utilisateur` WHERE id_utilisateur=? and id_equipe=?";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("ii",$id,$idequipe);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}
	function db_updateEquipeUtil($id,$idequipe) {
		$stmt="UPDATE `equipe_utilisateur` SET `etat`=1 WHERE  id_utilisateur=? and id_equipe=?";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("ii",$id,$idequipe);
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

	function db_deleteEquipeUtil2($id) {
	$query=$this->mysqli->prepare("DELETE FROM `equipe_utilisateur` WHERE id_equipe=?") or trace("Erreur sur la requête :".$query.":".$query->error);
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