<?php
class BuildsManager{
		private $mysqli;

		public function __construct($mysqli){
			$this->setDatabaseLink($mysqli);
		}
		public function setDatabaseLink(mysqli $mysqli){
			$this->mysqli=$mysqli;
		}

	function db_addBuilds(Builds $builds) {
	$nom=$builds->getNom();
	$id_user=$builds->getId_user();
	$id_javelin=$builds->getId_javelin();
	$id_soutient=$builds->getId_soutient();
	$id_explosion=$builds->getId_explosion();
	$id_concentration=$builds->getId_concentration();
	$query=$this->mysqli->prepare("INSERT INTO `builds`(`nom`, `id_user`, `id_javelin`, `id_soutient`, `id_explosion`, `id_concentration`) VALUES (?,?,?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
		if ($query) {
			$query->bind_param("siiiii",$nom,$id_user,$id_javelin,$id_soutient,$id_explosion,$id_concentration);
			$query->execute();
			return $this->mysqli->insert_id;
		} else {
			return 0;
		}
	}



	function db_getAllGame($limit=0,$offset=0,$order="id asc") {
		$stmt="select * from game";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);
		if ($query) {
			$query->execute();
			return $query->get_result();
		} else {
			return 0;
		}
	}
/*
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
