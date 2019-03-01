<?php

class Builds{
	//PROPRIETES
	private $id;
	private $nom;
	private $id_user;
	private $id_javelin;
	private $id_soutient;
	private $id_assaut;
	private $id_concentration;

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
		$this->id=$var;
	}
	public function getId(){
		return $this->id;
	}

	public function setNom($var){
		$this->nom=$var;
	}
	public function getNom(){
		return $this->nom;
	}

	public function setId_user($var){
		$this->id_user=$var;
	}
	public function getId_user(){
		return $this->id_user;
	}

	public function setId_javelin($var){
		$this->id_javelin=$var;
	}
	public function getId_javelin(){
		return $this->id_javelin;
	}

	public function setId_soutient($var){
		$this->id_soutient=$var;
	}
	public function getId_soutient(){
		return $this->id_soutient;
	}

	public function setId_assaut($var){
		$this->id_assaut=$var;
	}
	public function getId_assaut(){
		return $this->id_assaut;
	}

	public function setId_concentration($var){
		$this->id_concentration=$var;
	}
	public function getId_concentration(){
		return $this->id_concentration;
	}

}
?>
