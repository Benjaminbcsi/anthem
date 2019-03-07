<?php

class Composant{
	//PROPRIETES
	private $id;
	private $nom;
	private $armure;
	private $bouclier;
	private $description;
	private $effet;
  private $id_javelin;

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

	public function setDescription($var){
		$this->description=$var;
	}
	public function getDescription(){
		return $this->description;
	}

  public function setEffet($var){
		$this->effet=$var;
	}
	public function getEffet(){
		return $this->effet;
	}

	public function setArmure($var){
		$this->armure=$var;
	}
	public function getArmure(){
		return $this->armure;
	}

	public function setBouclier($var){
		$this->bouclier=$var;
	}
	public function getBouclier(){
		return $this->bouclier;
	}


  public function setId_javelin($var){
		$this->id_javelin=$var;
	}
	public function getId_javelin(){
		return $this->id_javelin;
	}

}
?>
