<?php

class EquipeUtil extends Utilisateur{
	//PROPRIETES
	private $id;
	private $id_utilisateur;
	private $id_equipe;
	private $etat;
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
	public function setId_utilisateur($var){
		$this->id_utilisateur=$var;
	}
	public function getId_utilisateur(){
		return $this->id_utilisateur;
	}
	public function setId_equipe($var){
		$this->id_equipe=$var;
	}
	public function getId_equipe(){
		return $this->id_equipe;
	}
	public function setEtat($var){
		$this->etat=$var;
	}
	public function getEtat(){
		return $this->etat;
	}


}
?>