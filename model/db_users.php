<?php
class UserManager{
		private $mysqli;

		public function __construct($mysqli){
			$this->setDatabaseLink($mysqli);
		}
		public function setDatabaseLink(mysqli $mysqli){
			$this->mysqli=$mysqli;
		}

	function db_addUsers(Users $users) {
	$nom=$users->getPseudo();
	$mdp=$users->getMdp();
	$email=$users->getEmail();
	$gamertag=$users->getGamertag();
	$playstation=$users->getPlaystation_network();
	$origin=$users->getOrigin_pc();
	$query=$this->mysqli->prepare("INSERT INTO `users`(`pseudo`, `mdp`, `email`,`gamertag`, `playstation_network`, `origin_pc`) VALUES (?,password(?),?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
		if ($query) {
			$query->bind_param("ssssss",$nom,$mdp,$email,$gamertag,$playstation,$origin);
			$query->execute();
			return 1;
		} else {
			return 0;
		}
	}

	function db_getUsersLogin($users,$limit=0,$offset=0,$order="id asc") {
		$stmt="select * from users where pseudo=?";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);
		if ($query) {
			$query->bind_param("s",$users);
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

	function db_getUsersId($id,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT `id`, `pseudo`, `email`, `gamertag`, `playstation_network`, `origin_pc` FROM `users` WHERE id=?";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);
		if ($query) {
			$query->bind_param("i",$id);
			$query->execute();
			return $query->get_result();
		} else {
			return 0;
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

function db_updateUsers(Users $users) {
	$id=$users->getId();
	$nom=$users->getPseudo();
	$mdp=$users->getMdp();
	$email=$users->getEmail();
	$gamertag=$users->getGamertag();
	$playstation=$users->getPlaystation_network();
	$origin=$users->getOrigin_pc();
	$query=$this->mysqli->prepare("UPDATE `users` SET `pseudo`=?,`email`=?,`gamertag`=?,`playstation_network`=?,`origin_pc`=? WHERE `users`.`id`=?") or trace("Erreur sur la requête :".$query.":".$query->error);
		if ($query) {
			$query->bind_param("sssssi",$nom,$email,$gamertag,$playstation,$origin,$id);
			$query->execute();
			return 1;
		} else {
			return 0;
		}
}

}

?>
