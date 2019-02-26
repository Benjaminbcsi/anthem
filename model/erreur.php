function db_getPostEquipe($id,$id2,$id3) {
	$query=$this->mysqli->prepare("SELECT *,media.chemin,media.type 
	from post,media,utilisateur 
	where post.id_media = media.id and post.id_utilisateur 
	in ( select utilisateur_amis.id_utilisateur FROM projet2.utilisateur_amis WHERE utilisateur_amis.id_utilisateur2=? AND utilisateur_amis.etat=1 ) or post.id_utilisateur 
	in ( select utilisateur_amis.id_utilisateur2 FROM projet2.utilisateur_amis WHERE utilisateur_amis.id_utilisateur=? AND utilisateur_amis.etat=1 ) 
	and ( select equipe_utilisateur.id_utilisateur FROM projet2.equipe_utilisateur WHERE equipe_utilisateur.id_utilisateur=? AND equipe_utilisateur.etat=1 ) and post.id_media = media.id 
	group by post.titre order by post.date DESC") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("iii",$id,$id2,$id3);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}

		function db_getPost($id,$id2) {
	$query=$this->mysqli->prepare("SELECT *,media.chemin,media.type from post,media where post.id_media = media.id and post.id_utilisateur in ( select utilisateur_amis.id_utilisateur FROM projet2.utilisateur_amis WHERE utilisateur_amis.id_utilisateur2=? AND utilisateur_amis.etat=1 ) or post.id_utilisateur in ( select utilisateur_amis.id_utilisateur2 FROM projet2.utilisateur_amis WHERE utilisateur_amis.id_utilisateur=? AND utilisateur_amis.etat=1 )  and post.id_media = media.id group by post.titre order by post.date desc") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("ii",$id,$id2);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}



	function db_getPostLastId($id,$id2,$id3) {
	$query=$this->mysqli->prepare("SELECT * from post where post.id_utilisateur in ( select utilisateur_amis.id_utilisateur FROM projet2.utilisateur_amis WHERE utilisateur_amis.id_utilisateur2=? AND utilisateur_amis.etat=1 ) or post.id_utilisateur in ( select utilisateur_amis.id_utilisateur2 FROM projet2.utilisateur_amis WHERE utilisateur_amis.id_utilisateur=? AND utilisateur_amis.etat=1 ) and id>? order by post.date desc limit 1") or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("iii",$id,$id2,$id3);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
	}

		function db_insertPostEquipeNoMedia(Post $post) {
	$titre=$this->mysqli->real_escape_string(htmlspecialchars($post->getTitre()));
	$contenu=$this->mysqli->real_escape_string(htmlspecialchars($post->getContenu()));
	$date=$post->getDate();
	$etat=$post->getEtat();
	$jaime=$post->getJaime();
	$idequipe=$post->getIdequipe();
	$idutilisateur=null;
	$idmedia=null;
	$query=$this->mysqli->prepare("INSERT INTO `post`(`titre`, `contenu`, `date`, `etat`, `nombre_jaime`, `id_utilisateur`, `id_equipe`, `id_media`) VALUES (?,?,?,?,?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("sssiiiii",$titre,$contenu,$date,$etat,$jaime,$idequipe,$idutilisateur,$idmedia); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}

		function db_insertPostUtilisateurNoMedia(Post $post) {
	$titre=$this->mysqli->real_escape_string(htmlspecialchars($post->getTitre()));
	$contenu=$this->mysqli->real_escape_string(htmlspecialchars($post->getContenu()));
	$date=$post->getDate();
	$etat=$post->getEtat();
	$jaime=$post->getJaime();
	$idequipe=null;
	$idutilisateur=$post->getIdutilisateur();
	$idmedia=null;
	$query=$this->mysqli->prepare("INSERT INTO `post`(`titre`, `contenu`, `date`, `etat`, `nombre_jaime`, `id_utilisateur`, `id_equipe`, `id_media`) VALUES (?,?,?,?,?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("sssiiiii",$titre,$contenu,$date,$etat,$jaime,$idequipe,$idutilisateur,$idmedia); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}

		function db_insertPostUtilisateurMedia(Post $post) {
	$titre=$this->mysqli->real_escape_string(htmlspecialchars($post->getTitre()));
	$contenu=$this->mysqli->real_escape_string(htmlspecialchars($post->getContenu()));
	$date=$post->getDate();
	$etat=$post->getEtat();
	$jaime=$post->getJaime();
	$idequipe=null;
	$idutilisateur=$post->getIdutilisateur();
	$idmedia=$post->getIdmedia();
	$query=$this->mysqli->prepare("INSERT INTO `post`(`titre`, `contenu`, `date`, `etat`, `nombre_jaime`, `id_utilisateur`, `id_equipe`, `id_media`) VALUES (?,?,?,?,?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("sssiiiii",$titre,$contenu,$date,$etat,$jaime,$idequipe,$idutilisateur,$idmedia); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}

		function db_updatePostEquipeMedia(Post $post) {
	$titre=$this->mysqli->real_escape_string(htmlspecialchars($post->getTitre()));
	$contenu=$this->mysqli->real_escape_string(htmlspecialchars($post->getContenu()));
	$etat=$post->getEtat();
	$idmedia=$post->getIdmedia();
	$id=$post->getId();
	$query=$this->mysqli->prepare("UPDATE `post` SET `titre`=?,`contenu`=?,`etat`=?,`id_media`=? WHERE id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ssiii",$titre,$contenu,$etat,$idmedia,$id); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}

	function db_updatePostUtilisateurMedia(Post $post) {
	$titre=$this->mysqli->real_escape_string(htmlspecialchars($post->getTitre()));
	$contenu=$this->mysqli->real_escape_string(htmlspecialchars($post->getContenu()));
	$etat=$post->getEtat();
	$idmedia=$post->getIdmedia();
	$id=$post->getId();
	$query=$this->mysqli->prepare("UPDATE `post` SET `titre`=?,`contenu`=?,`etat`=?,`id_media`=? WHERE id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ssiii",$titre,$contenu,$etat,$idmedia,$id); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}

		function db_updatePostUtilisateurNoMedia(Post $post) {
	$titre=$this->mysqli->real_escape_string(htmlspecialchars($post->getTitre()));
	$contenu=$this->mysqli->real_escape_string(htmlspecialchars($post->getContenu()));
	$etat=$post->getEtat();
	$idmedia=null;
	$id=$post->getId();
	$query=$this->mysqli->prepare("UPDATE `post` SET `titre`=?,`contenu`=?,`etat`=?,`id_media`=? WHERE id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ssiii",$titre,$contenu,$etat,$idmedia,$id); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}