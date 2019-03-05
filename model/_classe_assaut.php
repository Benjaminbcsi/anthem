<?php

class Assaut {
	//PROPRIETES
	private $id;
	private $id_type;
  private $description;
	private $nom;
	private $effet;


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








}
?>
