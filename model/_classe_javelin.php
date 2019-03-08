<?php

class Javelin{
	//PROPRIETES
	private $id;
	private $nom;

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

}
?>
