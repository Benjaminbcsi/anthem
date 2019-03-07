<?php

class Soutient{
	//PROPRIETES
	private $id;
	private $nom;
	private $description;
	private $puissance;
	private $damagae;
	private $charges;
	private $recharge;
  private $rayon;
  private $duree;
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

	public function setPuissance($var){
		$this->puissance=$var;
	}
	public function getPuissance(){
		return $this->puissance;
	}

	public function setDamage($var){
		$this->damage=$var;
	}
	public function getDamage(){
		return $this->damage;
	}

	public function setCharges($var){
		$this->charges=$var;
	}
	public function getCharges(){
		return $this->charges;
	}

  public function setRecharge($var){
		$this->recharge=$var;
	}
	public function getRecharge(){
		return $this->recharge;
	}

  public function setRayon($var){
		$this->rayon=$var;
	}
	public function getRayon(){
		return $this->rayon;
	}

  public function setDuree($var){
		$this->duree=$var;
	}
	public function getDuree(){
		return $this->duree;
	}

  public function setId_javelin($var){
		$this->id_javelin=$var;
	}
	public function getId_javelin(){
		return $this->id_javelin;
	}

}
?>
