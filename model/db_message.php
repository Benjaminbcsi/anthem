<?php
class MessageManager{
		private $mysqli;

		public function __construct($mysqli){
			$this->setDatabaseLink($mysqli);
		}
		public function setDatabaseLink(mysqli $mysqli){
			$this->mysqli=$mysqli;
		}

	function db_getMyInterlocuteurs($id) {
		
		$stmt="SELECT * FROM `message` WHERE (`id_utilisateur1`=? or id_utilisateur2=?)";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("ii",$id,$id);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}
	function db_getMessage($id,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT message.* FROM `message` WHERE (`id_utilisateur1`=? or id_utilisateur2=?) ";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("ii",$id,$id);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}
	function db_getMessageDate($id,$date,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT message.* FROM `message` WHERE (`id_utilisateur1`=? or id_utilisateur2=?) and message.date > (?) ";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("iis",$id,$id,$date);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}



	function db_getMessageLast($id,$id2,$limit=0,$offset=0,$order="id asc") {
		$stmt="SELECT message.* FROM `message` WHERE  (`id_utilisateur1`=? and id_utilisateur2=?) or (`id_utilisateur1`=? and id_utilisateur2=?) order by message.date asc";
		$query=$this->mysqli->prepare($stmt) or trace("Probleme avec ".$query->error);	
		if ($query) {
			$query->bind_param("iiii",$id,$id2,$id2,$id);
			$query->execute();		
			return $query->get_result();
		} else {
			return 0;
		}
	}

	function db_insertMessage($idutil,$idutil2,$data) {
	$date = date('Y-m-d H:i:s');
	$query=$this->mysqli->prepare("INSERT INTO `message` (`date`,`data`, `id_utilisateur1`, `id_utilisateur2`) VALUES (?,?,?,?)") or trace("Erreur sur la requête :".$query.":".$query->error);
	if ($query) {
		$query->bind_param("ssii",$date,$data,$idutil,$idutil2); 
		$query->execute();
		return $this->mysqli->insert_id;
	} else {
		return 0;
	}
	}
	

	
}

?>