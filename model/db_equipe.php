<?php
class EquipeManager{
		private $mysqli;

		public function __construct($mysqli){
			$this->setDatabaseLink($mysqli);
		}
		public function setDatabaseLink(mysqli $mysqli){
			$this->mysqli=$mysqli;
		}

	function db_getEquipe($limit=0,$offset=0,$order="id asc") {	
	global $connexion;
	$stmt="SELECT equipe.*,media.chemin FROM `equipe`,media WHERE media.id=equipe.id_photoequipe";
	$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
}

	function db_getEquipeNameasc($limit=0,$offset=0,$order="id asc") {	
	global $connexion;
	$stmt="SELECT equipe.*,media.chemin FROM `equipe`,media WHERE media.id=equipe.id_photoequipe order by pseudo asc";
	$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
}

function db_getEquipeDateasc($limit=0,$offset=0,$order="id asc") {	
	global $connexion;
	$stmt="SELECT equipe.*,media.chemin FROM `equipe`,media WHERE media.id=equipe.id_photoequipe order by date_creation asc";
	$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
}
	function db_insertEquipe(Equipe $equipe) {
	$pseudo=$this->mysqli->real_escape_string(htmlspecialchars($equipe->getPseudo()));
	$niveau=$this->mysqli->real_escape_string(htmlspecialchars($equipe->getNiveau()));
	$exp=$equipe->getExp();
	$descriptif=$this->mysqli->real_escape_string(htmlspecialchars($equipe->getDescriptif()));
	$type=$this->mysqli->real_escape_string(htmlspecialchars($equipe->getType()));
	$statut=$this->mysqli->real_escape_string(htmlspecialchars($equipe->getStatut()));
	$datej=$this->mysqli->real_escape_string(htmlspecialchars($equipe->getDatej()));
	$idchef=$equipe->getChefequipe();
	$idphotoequipe=$equipe->getPhoto();
	$query=$this->mysqli->prepare("INSERT INTO `equipe`( `pseudo`, `niveau`, `exp`, `type`, `descriptif`, `statut`, `id_photoequipe`, `date_creation`, `id_chef`) VALUES (?,?,?,?,?,?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("siissiisi",$pseudo,$niveau,$exp,$type,$descriptif,$statut,$idphotoequipe,$datej,$idchef); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}

	function db_updateEquipe($id,$nom,$prenom,$email) {
	$id+=1-1;
	$nom=$this->mysqli->real_escape_string(htmlspecialchars($nom));
	$prenom=$this->mysqli->real_escape_string(htmlspecialchars($prenom));
	$email=$this->mysqli->real_escape_string(htmlspecialchars($email));
	$query=$this->mysqli->prepare("UPDATE `auteur` SET `nom`=?,`prenom`=?,`email`=? WHERE id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("sssi",$nom,$prenom,$email,$id); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}

	function db_getEquipePseudo($pseudo,$limit=0,$offset=0,$order="id asc") {	
	global $connexion;
	$pseudo=$connexion->real_escape_string(htmlspecialchars($pseudo));
	$stmt="select * from equipe where pseudo=?";
	$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("s",$pseudo);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
}
	function db_getEquipeId($id,$limit=0,$offset=0,$order="id asc") {	
	global $connexion;
	$id=$id;
	$stmt="select equipe.*,equipe.niveau as niveau,equipe.exp as exp, equipe.pseudo as pseudoequip,equipe.descriptif as descriptif,equipe.pseudo,media.chemin,utilisateur.pseudo as chefequipe from equipe,media,utilisateur where equipe.id=? and media.id_equipe = equipe.id and equipe.id_chef=utilisateur.id";
	$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("i",$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
}

function db_getEquipeName($id,$limit=0,$offset=0,$order="id asc") {	
	global $connexion;
	$id=$id;
	$stmt="select equipe.pseudo as pseudoequip,media.chemin from equipe,media where equipe.id=? and equipe.id_photoequipe=media.id";
	$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("i",$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
}

function db_getEquipeChef($id,$idchef,$limit=0,$offset=0,$order="id asc") {	
	global $connexion;
	$id=$id;
	$stmt="select equipe.id_chef,equipe.id from equipe where equipe.id=? and equipe.id_chef=?";
	$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("ii",$id,$idchef);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
}

function db_delEquipe($id,$limit=0,$offset=0,$order="id asc") {	
	global $connexion;
	$stmt="DELETE FROM `equipe` WHERE id=?";
	$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("i",$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
}

function db_delEquipeNull($id,$limit=0,$offset=0,$order="id asc") {	
	global $connexion;
	$stmt="UPDATE `equipe` SET `id_photoequipe`=null,`id_chef`=null WHERE id=?";
	$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("i",$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
}

function db_searchEquipe($search,$limit=0,$offset=0,$order="id asc") {	
	global $connexion;
	$param = "{$search}%";	
	$stmt="SELECT equipe.*,media.chemin FROM `equipe`,media WHERE media.id=equipe.id_photoequipe and pseudo like ?";
	$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("s", $param);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
}
	
}

?>