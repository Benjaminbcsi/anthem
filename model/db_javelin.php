<?php
class JavelinManager{
		private $mysqli;

		public function __construct($mysqli){
			$this->setDatabaseLink($mysqli);
		}
		public function setDatabaseLink(mysqli $mysqli){
			$this->mysqli=$mysqli;
		}

	function db_getJavelin($id,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT * FROM `javelin` WHERE id=?";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);
    if ($query) {
      $query->bind_param("i",$id);
      $query->execute();
      return $query->get_result();
    } else {
      return 0;
    }
	}
/*
	function db_getSoutientbyid($id_soutient,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT * FROM `soutient` WHERE id=?";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);
		if ($query) {
			$query->bind_param("i",$id_soutient);
			$query->execute();
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_getUserLoginPassword($users,$mdp,$limit=0,$offset=0,$order="id asc") {

		$stmt="select * from users where pseudo=? and mdp=password(?)";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);
		if ($query) {
			$query->bind_param("ss",$users,$mdp);
			$query->execute();
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_getPersonnage($info,$limit=0,$offset=0,$order="id asc") {

	if(is_int($info)){
		$stmt="select * from personnage where id=?";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);
		if ($query) {
			$query->bind_param("i",$info);
			$query->execute();
			return $query->get_result();
		} else {
			return 0;
		}
	} else {
		$stmt="select * from personnage where pseudo=?";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);
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

		$stmt="select nom from personnages where id_user=?";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);
		if ($query) {
			$query->bind_param("i",$info);
			$query->execute();
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_countPersonnage($limit=0,$offset=0,$order="id asc") {

	$stmt="SELECT count(*) FROM personnage";
	$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);
	if ($query) {
		$query->execute();
		return $query->get_result();
	} else {
		return 0;
	}
}

	function db_delPersonnage($id,$limit=0,$offset=0,$order="id asc") {

	$stmt="DELETE FROM personnage WHERE id=?";
	$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);
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
