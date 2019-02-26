<?php
class GameuserManager{
		private $mysqli;

		public function __construct($mysqli){
			$this->setDatabaseLink($mysqli);
		}
		public function setDatabaseLink(mysqli $mysqli){
			$this->mysqli=$mysqli;
		}

	function db_addGameUser(Gameuser $gameuser) {
	$id_game=$gameuser->getId_game();
	$id_joueur=$gameuser->getId_joueur();
	$is_tour=$gameuser->getIs_tour();
	$ordre=$gameuser->getOrdre();
	$query=$this->mysqli->prepare("INSERT INTO `game_users`(`id_game`, `id_joueur`,`is_tour`,`ordre`) VALUES (?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
		if ($query) {
			$query->bind_param("iiii",$id_game,$id_joueur,$is_tour,$ordre);
			$query->execute();
			return 1;
		} else {
			return 0;
		}
	}

	function db_getGameUserCount($id_game,$limit=0,$offset=0,$order="id asc") {
		global $connexion;
		$stmt="select count(*) from game_users where id_game = ?";
		$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);
		if ($query) {
			$query->bind_param("i",$id_game);
			$query->execute();
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_getGameUser($id,$id_game,$limit=0,$offset=0,$order="id asc") {
		global $connexion;
		$stmt="select * from game_users where id_joueur=? and id_game = ?";
		$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);
		if ($query) {
			$query->bind_param("ii",$id,$id_game);
			$query->execute();
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_getGameOrdreUser($id_game,$ordre,$limit=0,$offset=0,$order="id asc") {
		global $connexion;
		$stmt="select * from game_users where id_game = ? and ordre = ?";
		$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);
		if ($query) {
			$query->bind_param("ii",$id_game,$ordre);
			$query->execute();
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_getGameIdUser(Gameuser $gameuser) {
		global $connexion;
		$id_game=$gameuser->getId_game();
		$id_joueur=$gameuser->getId_joueur();
		$stmt="select * from game_users where id_joueur=? and id_game=?";
		$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);
		if ($query) {
			$query->bind_param("ii",$id_joueur,$id_game);
			$query->execute();
			return $query->get_result();
		} else {
			return 0;
		}
	}



	function db_updateGameUserIsTour(Gameuser $gameuser) {
		$id_game=$gameuser->getId_game();
		$id_joueur=$gameuser->getId_joueur();
		$query=$this->mysqli->prepare("UPDATE game_users SET is_tour=0 WHERE id_game = ? and id_joueur = ?") or trace("Erreur sur la requête :".$query.":".$query->error);
		if ($query) {
			$query->bind_param("ii",$id_game,$id_joueur);
			$query->execute();
			return 1;
		} else {
			return 0;
		}
	}

	function db_updateGameUserIsNotTour($game,$ordre) {
		$query=$this->mysqli->prepare("UPDATE game_users SET is_tour=1 WHERE id_game=? and ordre = ?") or trace("Erreur sur la requête :".$query.":".$query->error);
		if ($query) {
			$query->bind_param("ii",$game,$ordre);
			$query->execute();
			return 1;
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
*/


}

?>
