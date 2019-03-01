<?php

class Armes {
	//PROPRIETES
	private $id;
	private $id_type;
	private $nom;
	private $description;
	private $effet;
	private $degat;
	private $degat_explosion;
	private $cpm;
	private $munitions;
	private $porte;


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

	public function setId_type($var){
		$this->id_type=$var;
	}
	public function getId_type(){
		return $this->id_type;
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

	public function setDegat($var){
		$this->degat=$var;
	}
	public function getDegat(){
		return $this->degat;
	}

	public function setDegat_explosion($var){
		$this->degat_explosion=$var;
	}
	public function getDegat_explosion(){
		return $this->degat_explosion;
	}

	public function setCpm($var){
		$this->cpm=$var;
	}
	public function getCpm(){
		return $this->cpm;
	}

	public function setMunitions($var){
		$this->munitions=$var;
	}
	public function getMunitions(){
		return $this->munitions;
	}

	public function setPorte($var){
		$this->porte=$var;
	}
	public function getPorte(){
		return $this->porte;
	}




}
?>
