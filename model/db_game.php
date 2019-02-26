<?php
class GameManager{
		private $mysqli;

		public function __construct($mysqli){
			$this->setDatabaseLink($mysqli);
		}
		public function setDatabaseLink(mysqli $mysqli){
			$this->mysqli=$mysqli;
		}

	function db_addGame(Game $game) {
	$nom=$game->getNom();
	$etat=0;
	$nb_joueur=1;
	$query=$this->mysqli->prepare("INSERT INTO `game`(`nom`, `nb_joueur`,`etat`) VALUES (?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
		if ($query) {
			$query->bind_param("sis",$nom,$nb_joueur,$etat);
			$query->execute();
			return $this->mysqli->insert_id;
		} else {
			return 0;
		}
	}


	
	function db_getAllGame($limit=0,$offset=0,$order="id asc") {
		global $connexion;
		$stmt="select * from game";
		$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);
		if ($query) {
			$query->execute();
			return $query->get_result();
		} else {
			return 0;
		}
	}
/*
	function db_getUserLoginPassword($users,$mdp,$limit=0,$offset=0,$order="id asc") {
	global $connexion;
		$stmt="select * from users where pseudo=? and mdp=password(?)";
		$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);
		if ($query) {
			$query->bind_param("ss",$users,$mdp);
			$query->execute();
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_getPersonnage($info,$limit=0,$offset=0,$order="id asc") {
	global $connexion;
	if(is_int($info)){
		$stmt="select * from personnage where id=?";
		$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);
		if ($query) {
			$query->bind_param("i",$info);
			$query->execute();
			return $query->get_result();
		} else {
			return 0;
		}
	} else {
		$stmt="select * from personnage where pseudo=?";
		$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);
		if ($query) {
			$query->bind_param("s",$info);
			$query->execute();
			return $query->get_result();
		} else {
			return 0;
		}
	}

}

	function db_getPersonnageUser($info,$limit=0,$offset=0,$order="id asc") {
	global $connexion;
		$stmt="select nom from personnages where id_user=?";
		$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);
		if ($query) {
			$query->bind_param("i",$info);
			$query->execute();
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_countPersonnage($limit=0,$offset=0,$order="id asc") {
	global $connexion;
	$stmt="SELECT count(*) FROM personnage";
	$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);
	if ($query) {
		$query->execute();
		return $query->get_result();
	} else {
		return 0;
	}
}

	function db_delPersonnage($id,$limit=0,$offset=0,$order="id asc") {
	global $connexion;
	$stmt="DELETE FROM personnage WHERE id=?";
	$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);
	if ($query) {
		$query->bind_param("i",$id);
		$query->execute();
		return $query->get_result();
	} else {
		return 0;
	}
}

	function db_updateEquipe(Personnage $perso) {
	$id=$perso->getId();
	$degats=$perso->getDegats();
	$query=$this->mysqli->prepare("UPDATE personnage SET degats=? WHERE id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ii",$degats,$id);
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}
	*/
}

?>
