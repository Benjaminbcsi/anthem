<?php

class Assaut {
	//PROPRIETES
	private $id;
	private $nom;
  private $description;
	private $effet;
	private $degat;
	private $statut;
	private $rayon;
	private $degat_statut;
	private $recharge;
	private $charges;
	private $id_combo;
	private $id_type;
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

	public function setId_type_degat($var){
		$this->id_type_degat=$var;
	}

	public function getId_type_degat(){
		return $this->id_type_degat;
	}

	public function setRayon($var){
		$this->rayon=$var;
	}
	public function getRayon(){
		return $this->rayon;
	}

	public function setDegat_statut($var){
		$this->degat_statut=$var;
	}
	public function getDegat_statut(){
		return $this->degat_statut;
	}

	public function setRecharge($var){
		$this->recharge=$var;
	}
	public function getRecharge(){
		return $this->recharge;
	}

	public function setCharges($var){
		$this->charges=$var;
	}
	public function getCharges(){
		return $this->charges;
	}

	public function setId_combo($var){
		$this->id_combo=$var;
	}

	public function getId_combo(){
		return $this->id_combo;
	}

	public function setId_javelin($var){
		$this->id_javelin=$var;
	}
	public function getId_javelin(){
		return $this->id_javelin;
	}


}
?>
