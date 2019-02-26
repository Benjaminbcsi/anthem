<?php
class UtilisateurManager{
		private $mysqli;

		public function __construct($mysqli){
			$this->setDatabaseLink($mysqli);
		}
		public function setDatabaseLink(mysqli $mysqli){
			$this->mysqli=$mysqli;
		}
		function db_getUtilisateurModo($condition="1=1",$limit=0,$offset=0,$order="id asc") {	
			$query=$this->mysqli->prepare("select * from utilisateur") or trace("Probleme avec ".$query->error);	
			if ($query) {
				$query->execute();		
				return $query->get_result();
			} else {
				return 0;
			}
			}
	function db_getUtilisateur($condition="1=1",$limit=0,$offset=0,$order="id asc") {	
	$query=$this->mysqli->prepare("select *,utilisateur.exp as exputil,utilisateur.niveau as niveauutil,equipe.id as id,utilisateur.id as idjoueur,utilisateur.descriptif as descjoueur,utilisateur.pseudo as pseudo,utilisateur.statut as statutjoueur,media.chemin,ville.ville_nom_simple,equipe.pseudo as pseudoequipe from utilisateur,media,ville,equipe where media.id = utilisateur.id_photo and ville.ville_id = utilisateur.id_ville and equipe.id = utilisateur.id_equipe") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}

	function db_getUtilisateur1($condition="1=1",$limit=0,$offset=0,$order="id asc") {	
	$query=$this->mysqli->prepare("select utilisateur.*,utilisateur.id_equipe as idequipe,utilisateur.exp as exputil,utilisateur.niveau as niveauutil ,utilisateur.id as idjoueur,utilisateur.descriptif as descjoueur,utilisateur.pseudo as pseudo,utilisateur.statut as statutjoueur,media.chemin,ville.ville_nom_simple from utilisateur,media,ville where media.id = utilisateur.id_photo and ville.ville_id = utilisateur.id_ville ") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}
	
	function db_getUtilisateur2($condition="1=1",$limit=0,$offset=0,$order="id asc") {	
	$query=$this->mysqli->prepare("select utilisateur.*,utilisateur.id_equipe as idequipe,utilisateur.exp as exputil,utilisateur.niveau as niveauutil ,utilisateur.id as idjoueur,utilisateur.descriptif as descjoueur,utilisateur.pseudo as pseudo,utilisateur.statut as statutjoueur,media.chemin,ville.ville_nom_simple from utilisateur,media,ville where media.id = utilisateur.id_photo and ville.ville_id = utilisateur.id_ville order by utilisateur.date_inscription asc ") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}
	function db_getUtilisateur3($condition="1=1",$limit=0,$offset=0,$order="id asc") {	
	$query=$this->mysqli->prepare("select utilisateur.*,utilisateur.id_equipe as idequipe,utilisateur.exp as exputil,utilisateur.niveau as niveauutil ,utilisateur.id as idjoueur,utilisateur.descriptif as descjoueur,utilisateur.pseudo as pseudo,utilisateur.statut as statutjoueur,media.chemin,ville.ville_nom_simple from utilisateur,media,ville where media.id = utilisateur.id_photo and ville.ville_id = utilisateur.id_ville order by utilisateur.pseudo asc ") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}

	function db_getUtilisateurId($id) {
	$query=$this->mysqli->prepare("select *,utilisateur.exp as exputil,utilisateur.niveau as niveauutil,equipe.id as id,utilisateur.id as idjoueur,utilisateur.descriptif as descjoueur,utilisateur.pseudo as pseudo,utilisateur.statut as statutjoueur,media.chemin,ville.ville_nom_simple,equipe.pseudo as pseudoequipe from utilisateur,media,ville,equipe where media.id = utilisateur.id_photo and ville.ville_id = utilisateur.id_ville and equipe.id = utilisateur.id_equipe and utilisateur.id=? ") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("i",$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}
	
	function db_getUtilisateurIdAmis($id) {
	$query=$this->mysqli->prepare("SELECT * FROM `utilisateur` WHERE id=? ") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("i",$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}
	
	function db_getUtilisateurIdPost($id) {
	$query=$this->mysqli->prepare("select *,utilisateur.exp as exputil,utilisateur.niveau as niveauutil,utilisateur.id as idjoueur,utilisateur.descriptif as descjoueur,utilisateur.pseudo as pseudo,utilisateur.statut as statutjoueur,media.chemin,ville.ville_nom_simple from utilisateur,media,ville where media.id = utilisateur.id_photo and ville.ville_id = utilisateur.id_ville and  utilisateur.id=?") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("i",$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}
	function db_getUtilisateurId1($id) {	
	$query=$this->mysqli->prepare("select utilisateur.*,utilisateur.exp as exputil,utilisateur.niveau as niveauutil,utilisateur.id as idjoueur,utilisateur.descriptif as descjoueur,utilisateur.pseudo as pseudo,utilisateur.statut as statutjoueur,media.chemin,ville.ville_nom_simple from utilisateur,media,ville where media.id = utilisateur.id_photo and ville.ville_id = utilisateur.id_ville and utilisateur.id=? ") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("i",$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}
	function db_getUtilisateurEquipe($idequipe) {	
		global $connexion;
		$id=$idequipe;
		$stmt="SELECT utilisateur.pseudo,media.chemin FROM utilisateur,media WHERE utilisateur.id_equipe=? and utilisateur.id_photo=media.id";
		$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("i",$id);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_getUtilisateurById($id) {	
		global $connexion;
		$stmt="SELECT utilisateur.pseudo,media.chemin,utilisateur.id FROM utilisateur,media WHERE utilisateur.id=? and utilisateur.id_photo=media.id";
		$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("i",$id);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_getUtilisateurByIdEquipe($id) {	
		global $connexion;
		$stmt="SELECT utilisateur.id_equipe FROM utilisateur WHERE id=? and utilisateur.id_equipe!=null";
		$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("i",$id);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_insertUtilisateur(Utilisateur $utilisateur) {
	$pseudo=$this->mysqli->real_escape_string(htmlspecialchars($utilisateur->getPseudo()));
	$niveau=$this->mysqli->real_escape_string(htmlspecialchars($utilisateur->getNiveauutil()));
	$exp=$this->mysqli->real_escape_string(htmlspecialchars($utilisateur->getExputil()));
	$descriptif=$this->mysqli->real_escape_string(htmlspecialchars($utilisateur->getDescriptif()));
	$genre=$this->mysqli->real_escape_string(htmlspecialchars($utilisateur->getGenre()));
	$statut=$this->mysqli->real_escape_string(htmlspecialchars($utilisateur->getStatut()));
	$date=$this->mysqli->real_escape_string(htmlspecialchars($utilisateur->getDate()));
	$datej=$this->mysqli->real_escape_string(htmlspecialchars($utilisateur->getDatej()));
	$pseudo=$this->mysqli->real_escape_string(htmlspecialchars($utilisateur->getPseudo()));
	$mdp=$this->mysqli->real_escape_string(htmlspecialchars($utilisateur->getMdp()));
	$mail=$this->mysqli->real_escape_string(htmlspecialchars($utilisateur->getMail()));
	$idequipe=null;
	$idphoto=$this->mysqli->real_escape_string(htmlspecialchars($utilisateur->getPhoto()));
	$idrang=$this->mysqli->real_escape_string(htmlspecialchars($utilisateur->getIdrang()));
	$idville=$this->mysqli->real_escape_string(htmlspecialchars($utilisateur->getIdville()));
	$query=$this->mysqli->prepare("INSERT INTO `utilisateur`( `pseudo`, `mail`, `mdp`, `date`, `niveau`, `exp`, `genre`, `descriptif`, `statut`, `date_inscription`,`id_photo`, `id_equipe`, `id_rang`, `id_ville`) VALUES (?,?,password(?),?,?,?,?,?,?,?,?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ssssiiisisiiii",$pseudo,$mail,$mdp,$date,$niveau,$exp,$genre,$descriptif,$statut,$datej,$idphoto,$idequipe,$idrang,$idville); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}
	function db_updateUtilisateurRole(Utilisateur $utilisateur) {
	$id=$utilisateur->getId();
	$rang=$utilisateur->getIdrang();
	$query=$this->mysqli->prepare("UPDATE `utilisateur` SET `id_rang`=? WHERE id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ii",$rang,$id); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}

	function db_updateUtilisateur($id,$nom,$prenom,$email) {
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

	function db_getUtilisateurLoginEmail($login,$email,$limit=0,$offset=0,$order="id asc") {	
		$login=$this->mysqli->real_escape_string(htmlspecialchars($login));
		$email=$this->mysqli->real_escape_string(htmlspecialchars($email));
		$limit+=1-1;
		$offset+=1-1;
		$order=$this->mysqli->real_escape_string(htmlspecialchars($order));
		$stmt="select * from utilisateur where pseudo=? and mail=?";
		if($limit>0) {$stmt.=" limit ".$limit;}
		if($offset>0) {$stmt.=" offset ".$offset;}
		$stmt.=" order by ".$order;	
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("ss",$login,$email);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}
	function db_getUtilisateurLoginPassword($login,$password,$limit=0,$offset=0,$order="id asc") {	
		$login=$this->mysqli->real_escape_string(htmlspecialchars($login));
		$password=$this->mysqli->real_escape_string(htmlspecialchars($password));
		$limit+=1-1;
		$offset+=1-1;
		$order=$this->mysqli->real_escape_string(htmlspecialchars($order));
		$stmt="select * from utilisateur where pseudo=? and mdp=?";
		if($limit>0) {$stmt.=" limit ".$limit;}
		if($offset>0) {$stmt.=" offset ".$offset;}
		$stmt.=" order by ".$order;	
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("ss",$login,$password);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_getUtilisateurVille($ville,$limit=0,$offset=0,$order="ville_id asc") {
		$ville=mb_strtolower($ville);
		$limit+=1-1; // $limit=$limit+1-1
		$offset+=1-1;
		$order=$this->mysqli->real_escape_string(htmlspecialchars($order));	
		$stmt="select * from ville where ville_nom_simple=?";
		if($limit>0) {$stmt.=" limit ".$limit;}
		if($offset>0) {$stmt.=" offset ".$offset;}
		$stmt.=" order by ".$order;	
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("s",$ville);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_getUtilisateurRole($login,$password) {	
		$login=$this->mysqli->real_escape_string(htmlspecialchars($login));
		$password=$this->mysqli->real_escape_string(htmlspecialchars($password));
		$stmt="select *,utilisateur.id as idutilisateur,titre from utilisateur,rang where pseudo=? and mdp=password(?) and utilisateur.id_rang=rang.id";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("ss",$login,$password);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}
	

	function db_getUtilisateurPseudo($id) {	
	$query=$this->mysqli->prepare("select pseudo,id as idjoueur from utilisateur where utilisateur.id=?") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("i",$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}

	function db_updateUtilisateurEquipe($idequipe,$id) {
	$query=$this->mysqli->prepare("UPDATE `utilisateur` SET `id_equipe`=? WHERE id=?") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("ii",$idequipe,$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}

	function db_delUtilisateurEquipe($idequipe) {
	$query=$this->mysqli->prepare("UPDATE `utilisateur` SET `id_equipe`=null WHERE id_equipe=? ") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("i",$idequipe);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}

	function db_delUtilisateurEquipeQuit($idequipe,$id) {
	$query=$this->mysqli->prepare("UPDATE `utilisateur` SET `id_equipe`=null WHERE id_equipe=? and  id=?") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("ii",$idequipe,$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}



	function db_testUtilisateurById($id) {	
		global $connexion;
		$stmt="SELECT id_equipe FROM `utilisateur` WHERE id=? and id_equipe>=0";
		$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("i",$id);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}


	function db_updateUtilisateurProfilMedia(Utilisateur $utilisateur) {
	$descriptif=$utilisateur->getDescjoueur();
	$statut=$utilisateur->getStatutJoueur();
	$photo=$utilisateur->getIdphoto();
	$id=$utilisateur->getId();
	$query=$this->mysqli->prepare("UPDATE `utilisateur` SET `descriptif`=?,`statut`=?,`id_photo`=? WHERE id=?") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("siii",$descriptif,$statut,$photo,$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}
	function db_updateUtilisateurProfil(Utilisateur $utilisateur) {
	$descriptif=$utilisateur->getDescjoueur();
	$statut=$utilisateur->getStatutJoueur();
	$id=$utilisateur->getId();
	$query=$this->mysqli->prepare("UPDATE `utilisateur` SET `descriptif`=?,`statut`=? WHERE id=?") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("sii",$descriptif,$statut,$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}
	function db_searchUtilisateur($search,$condition="1=1",$limit=0,$offset=0,$order="id asc") {
    $param = "{$search}%";	
	$query=$this->mysqli->prepare("select utilisateur.*,utilisateur.id_equipe as idequipe,utilisateur.exp as exputil,utilisateur.niveau as niveauutil ,utilisateur.id as idjoueur,utilisateur.descriptif as descjoueur,utilisateur.pseudo as pseudo,utilisateur.statut as statutjoueur,media.chemin,ville.ville_nom_simple from utilisateur,media,ville where media.id = utilisateur.id_photo and ville.ville_id = utilisateur.id_ville and pseudo like ?") or trace("Probleme avec ".$query->error);	
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