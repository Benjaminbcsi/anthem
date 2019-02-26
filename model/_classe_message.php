<?php

class Message extends Media{
	//PROPRIETES
	private $id;
	private $id_utilisateur1;
	private $id_utilisateur2;
	private $date;
	private $data;
	private $pseudo;


	//METHODES
	public function __construct(array $tabData){
			$this->hydrate($tabData);
	}
	public function hydrate(array $tabData){
		foreach ($tabData as $index => $value) {
			$setter="set".ucfirst($index);
			if (method_exists($this,$setter)) {
				$this->$setter($value);
			}
		}
	}
	// METHODES SETERS ET GETERS
	public function setId($var){
		$this->type=$var;
	}
	public function getId(){
		return $this->type;
	}
	public function setId_utilisateur1($var){
		$this->id_utilisateur1=$var;
	}
	public function getId_utilisateur1(){
		return $this->id_utilisateur1;
	}
	public function setId_utilisateur2($var){
		$this->id_utilisateur2=$var;
	}
	public function getId_utilisateur2(){
		return $this->id_utilisateur2;
	}
	public function setData($var){
		$this->data=$var;
	}
	public function getData(){
		return $this->data;
	}
	public function setDate($var){
		$this->date=$var;
	}
	public function getDate(){
		return $this->date;
	}
	public function setPseudo($var){
		$this->pseudo=$var;
	}
	public function getPseudo(){
		return $this->pseudo;
	}


}
?>