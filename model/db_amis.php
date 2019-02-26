<?php
class AmisManager{
		private $mysqli;

		public function __construct($mysqli){
			$this->setDatabaseLink($mysqli);
		}
		public function setDatabaseLink(mysqli $mysqli){
			$this->mysqli=$mysqli;
		}
	function db_getAmis($id,$id2,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT * FROM `utilisateur_amis` WHERE `id_utilisateur`=? and id_utilisateur2=?";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("ii",$id,$id2);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}
	function db_getAmisTest($id,$id2,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT * FROM `utilisateur_amis` WHERE (`id_utilisateur`=? and id_utilisateur2=?) or (`id_utilisateur`=? and id_utilisateur2=?)";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("ii",$id,$id2);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}
	function db_getAmis2($id,$id2,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT * FROM `utilisateur_amis` WHERE `id_utilisateur`=? and id_utilisateur2=?";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("ii",$id2,$id);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}
	
	function db_getAmisId($id,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT utilisateur_amis.*,media.chemin,utilisateur.pseudo as pseudoamis FROM `utilisateur_amis`,media,utilisateur WHERE id_utilisateur2=? and utilisateur_amis.id_utilisateur=utilisateur.id and utilisateur.id_photo=media.id and utilisateur_amis.etat=0" ;
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("i",$id);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_getAmisIdDel($id,$nomjoueur,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT utilisateur.pseudo as pseudoamis,media.chemin,utilisateur_amis.id_utilisateur,utilisateur_amis.id_utilisateur2 
FROM media,`utilisateur_amis`,utilisateur 
WHERE (utilisateur_amis.`id_utilisateur`=? or utilisateur_amis.id_utilisateur2=?)
and (utilisateur_amis.id_utilisateur = utilisateur.id or utilisateur_amis.id_utilisateur2 = utilisateur.id ) 
and utilisateur_amis.id_utilisateur = utilisateur.id and utilisateur.id_photo=media.id
and utilisateur.pseudo!=? and utilisateur_amis.etat = 1" ;
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("iis",$id,$id,$nomjoueur);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_getAmisIdLast($id,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT utilisateur.pseudo as pseudoamis,media.chemin,utilisateur_amis.id_utilisateur,utilisateur_amis.id_utilisateur2 FROM media,`utilisateur_amis`,utilisateur WHERE `utilisateur_amis`.`id_utilisateur2`=? and utilisateur_amis.id_utilisateur = utilisateur.id and utilisateur_amis.id=media.id_utilisateur and utilisateur_amis.etat = 0 order by utilisateur_amis.id desc limit 1" ;
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("i",$id);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}
	function db_insertAmis(Amis $amis) {
	$idutilisateur=$amis->getId_utilisateur();
	$idutilisateur2=$amis->getId_utilisateur2();
	$etat=0;
	$query=$this->mysqli->prepare("INSERT INTO `utilisateur_amis`(`id_utilisateur`, `id_utilisateur2`, `etat`) VALUES (?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("iii",$idutilisateur,$idutilisateur2,$etat); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}
	

	function db_updateAmis(Amis $amis) {
	$idutilisateur=$amis->getId_utilisateur();
	$idutilisateur2=$amis->getId_utilisateur2();
	$etat=$amis->getEtat();
	$query=$this->mysqli->prepare("UPDATE `utilisateur_amis` SET `etat`=? WHERE id_utilisateur=? and id_utilisateur2=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("iii",$etat,$idutilisateur,$idutilisateur2); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}

	function db_delAmis(Amis $amis) {
	$idutilisateur=$amis->getId_utilisateur();
	$idutilisateur2=$amis->getId_utilisateur2();
	$etat=$amis->getEtat();
	$query=$this->mysqli->prepare("DELETE FROM `utilisateur_amis` WHERE id_utilisateur=? and id_utilisateur2=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ii",$idutilisateur,$idutilisateur2); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}


	function db_deleteAmis(Amis $amis) {
	$idutilisateur=$amis->getId_utilisateur();
	$idutilisateur2=$amis->getId_utilisateur2();
	$etat=$amis->getEtat();
	$query=$this->mysqli->prepare("DELETE FROM `utilisateur_amis` WHERE 0") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("iii",$etat,$idutilisateur,$idutilisateur2); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}
}

?>