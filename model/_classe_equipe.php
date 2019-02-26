<?php

class Equipe extends UtilisateurEquipe{
	//PROPRIETES
	private $descequipe;
	private $type;
	private $chefequipe;
	private $chemin;
	private $niveauequip;
	private $expequip;
	private $pseudoequip;
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
	public function setType($var){
		$this->type=$var;
	}
	public function getType(){
		return $this->type;
	}
	public function setDescriptif($var){
		$this->descequipe=$var;
	}
	public function getDescriptif(){
		return $this->descequipe;
	}
	public function setChefequipe($var){
		$this->chefequipe=$var;
	}
	public function getChefequipe(){
		return $this->chefequipe;
	}
	public function setChemin($var){
		$this->chemin=$var;
	}
	public function getChemin(){
		return $this->chemin;
	}
	public function getNiveau(){
		return $this->niveauequip;
	}
	public function setNiveau($var){
		$this->niveauequip=$var;
	}
	public function getExp(){
		return $this->expequip;
	}
	public function setExp($var){
		$this->expequip=$var;
	}
	public function getPseudoequip(){
		return $this->pseudoequip;
	}
	public function setPseudoequip($var){
		$this->pseudoequip=$var;
	}


}
?>