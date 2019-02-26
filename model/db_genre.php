<?php
class GenreManager{
		private $mysqli;

		public function __construct($mysqli){
			$this->setDatabaseLink($mysqli);
		}
		public function setDatabaseLink(mysqli $mysqli){
			$this->mysqli=$mysqli;
		}
	function db_getGenre() {	
	$result=$this->mysqli->query("SELECT * FROM `genre` WHERE 1") or trace("Erreur sur la requête :".$query.":".$this->mysqli->error);
	return $result;	
	}

	function db_getGenreId($id,$limit=0,$offset=0,$order="id asc") {	
	global $connexion;
	$stmt="SELECT * FROM genre WHERE id=?";
	$query=$connexion->prepare($stmt) or trace("Probleme avec ".$query->error);	
	if ($query) {
		$query->bind_param("i",$id);
		$query->execute();		
		return $query->get_result();
	} else {
		return 0;
	}
}

	function db_insertGenre(Genre $genre) {
	$genre=$this->mysqli->real_escape_string(htmlspecialchars($genre->getGenre()));
	$query=$this->mysqli->prepare("INSERT INTO `genre`(`genre`) VALUES (?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("s",$genre); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}

	function db_updateGenre(Genre $genre) {
	$genre=$this->mysqli->real_escape_string(htmlspecialchars($genre->getGenre()));
	$id=$genre->getId();
	$query=$this->mysqli->prepare("UPDATE `genre` SET `genre`=? WHERE id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("si",$nom,$id); 
		$query->execute();
		return 1;
	} else {
		return 0;
	}
	}

}

?>