<?php
class CardgamejoueurManager{
		private $mysqli;

		public function __construct($mysqli){
			$this->setDatabaseLink($mysqli);
		}
		public function setDatabaseLink(mysqli $mysqli){
			$this->mysqli=$mysqli;
		}

	function db_addJoueurinGame(Cardgamejoueur $cardgamejoueur) {
	$id_joueur=$cardgamejoueur->getId_joueur();
	$id_game=$cardgamejoueur->getId_game();
	$carte=$cardgamejoueur->getNum_card();
	$color=$cardgamejoueur->getColor_card();
	$query=$this->mysqli->prepare("INSERT INTO `card_game_joueur`( `num_card`, `color_card`, `id_joueur`, `id_game`) VALUES (?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
		if ($query) {
			$query->bind_param("isii",$carte,$color,$id_joueur,$id_game);
			$query->execute();
			return $this->mysqli->insert_id;
		} else {
			return 0;
		}
	}



	function db_getAllCardGame($id_joueur,$id_game,$limit=0,$offset=0,$order="id asc") {
		global $connexion;
		$stmt="SELECT * FROM `card_game_joueur` where id_joueur = ? and id_game = ? ";
		$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);
		if ($query) {
			$query->bind_param("ii",$id_joueur,$id_game);
			$query->execute();
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_delCardGame(Cardgamejoueur $cardgamejoueur) {
		global $connexion;
		$id_joueur=$cardgamejoueur->getId_joueur();
		$id_game=$cardgamejoueur->getId_game();
		$carte=$cardgamejoueur->getNum_card();
		$color=$cardgamejoueur->getColor_card();
		if (!isset($color) || $color == "") {
			$stmt="DELETE FROM `card_game_joueur` WHERE id_joueur = ? and id_game = ? and num_card = ? limit 1";
		} else {
			$stmt="DELETE FROM `card_game_joueur` WHERE id_joueur = ? and id_game = ? and num_card = ? and color_card = ? limit 1";
		}
		$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);
		if ($query) {
			if (!isset($color) || $color == "") {
				$query->bind_param("iii",$id_joueur,$id_game,$carte);
			} else {
				$query->bind_param("iiis",$id_joueur,$id_game,$carte,$color);
			}
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
