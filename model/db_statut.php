<?php
class StatutManager{
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



	function db_getStatut($id,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT element FROM `statut` WHERE id=?";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);
    if ($query) {
      $query->bind_param("i",$id);
      $query->execute();
      return $query->get_result();
    } else {
      return 0;
    }
	}

	function db_getWeaponbyid($id_arme,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT * FROM `armes` WHERE id=?";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);
		if ($query) {
			$query->bind_param("i",$id_arme);
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
