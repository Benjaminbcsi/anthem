<?php
class RangManager{
		private $mysqli;

		public function __construct($mysqli){
			$this->setDatabaseLink($mysqli);
		}
		public function setDatabaseLink(mysqli $mysqli){
			$this->mysqli=$mysqli;
		}
	function db_getRang($condition="1=1",$limit=0,$offset=0,$order="id asc") {	
	$condition=$this->mysqli->real_escape_string(htmlspecialchars($condition));
	$limit+=1-1;
	$offset+=1-1;
	$order=$this->mysqli->real_escape_string(htmlspecialchars($order));
	$query="select * from rang where ".$condition; 
	$query.=" order by ".$order;	
	if($limit>0) {$query.=" limit ".$limit;}
	if($offset>0) {$query.=" offset ".$offset;}
	$result=$this->mysqli->query($query) or trace("Erreur sur la requête :".$query.":".$this->mysqli->error);
	return $result;	
	}

	function db_updateRang(Titre $titre) {
	$id=$this->mysqli->$titre->getId();
	$nom=$this->mysqli->real_escape_string(htmlspecialchars($titre->getTitre()));
	$query=$this->mysqli->prepare("UPDATE `rang` SET `titre`=? WHERE id=?") or trace("Erreur sur la requête :".$query.":".$query->error);
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