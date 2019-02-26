<?php

class Amis {
	//PROPRIETES
	private $id;
	private $id_utilisateur;
	private $id_utilisateur2;
	private $pseudoamis;
	private $etat;
	private $chemin;


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
	public function setId_utilisateur($var){
		$this->id_utilisateur=$var;
	}
	public function getId_utilisateur(){
		return $this->id_utilisateur;
	}
	public function setId_utilisateur2($var){
		$this->id_utilisateur2=$var;
	}
	public function getId_utilisateur2(){
		return $this->id_utilisateur2;
	}
	public function setPseudoamis($var){
		$this->pseudoamis=$var;
	}
	public function getPseudoamis(){
		return $this->pseudoamis;
	}
	public function setEtat($var){
		$this->etat=$var;
	}
	public function getEtat(){
		return $this->etat;
	}
	public function setChemin($var){
		$this->chemin=$var;
	}
	public function getChemin(){
		return $this->chemin;
	}


}
?>