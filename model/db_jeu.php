<?php
class JeuManager{
		private $mysqli;

		public function __construct($mysqli){
			$this->setDatabaseLink($mysqli);
		}
		public function setDatabaseLink(mysqli $mysqli){
			$this->mysqli=$mysqli;
		}

	function db_getJeuName() {	
	$result=$this->mysqli->query("SELECT jeu.*,media.chemin,jeu.id as idjeu FROM `jeu`,genre,media WHERE id_genre = genre.id and id_media=media.id order by nom asc") or trace("Erreur sur la requête :".$query.":".$this->mysqli->error);
	return $result;	
	}
	
	function db_getJeu() {	
	$result=$this->mysqli->query("SELECT jeu.*,media.chemin,jeu.id as idjeu FROM `jeu`,genre,media WHERE id_genre = genre.id and id_media=media.id ") or trace("Erreur sur la requête :".$query.":".$this->mysqli->error);
	return $result;	
	}

	function db_getJeuNom($nom) {
	$query=$this->mysqli->prepare("select * from jeu where jeu.nom=?") or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("s",$nom);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_insertJeu(Jeu $jeu) {
	$nom=$this->mysqli->real_escape_string(htmlspecialchars($jeu->getNom()));
	$descjeu=$this->mysqli->real_escape_string(htmlspecialchars($jeu->getDescriptif()));
	$idgenre=$jeu->getId_genre();
	$idmedia=$jeu->getId_media();
	$query=$this->mysqli->prepare("INSERT INTO `jeu`(`nom`, `descriptif`, `id_genre`, `id_media`) VALUES (?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ssii",$nom,$descjeu,$idgenre,$idmedia); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}

	function db_updateJeu(Jeu $jeu) {
	$nom=$this->mysqli->real_escape_string(htmlspecialchars($jeu->getNom()));
	$descjeu=$this->mysqli->real_escape_string(htmlspecialchars($jeu->getDescjeu()));
	$idgenre=$jeu->getIdgenre();
	$id=$jeu->getId();
	$query=$this->mysqli->prepare("UPDATE `jeu` SET `nom`=?,`descriptif`=?,`id_genre`=? WHERE id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("sssi",$nom,$id); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}

	function db_insertJeuUtil($idutil,$idjeu) {
	$query=$this->mysqli->prepare("INSERT INTO `utilisateur_jeu`(`id_utilisateur`, `id_jeu`) VALUES (?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ii",$idutil,$idjeu); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}
	
	
	function db_getJeuId($id) {
	$query=$this->mysqli->prepare("select * from jeu where jeu.id=?") or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("i",$id);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}

}

?>