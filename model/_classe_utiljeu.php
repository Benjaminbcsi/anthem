<?php

class UtilJeu{
	//PROPRIETES
	private $id;
	private $id_utilisateur;
	private $id_jeu;

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
	public function setId_utilisateur($var){
		$this->id_utilisateur=$var;
	}
	public function getId_utilisateur(){
		return $this->id_utilisateur;
	}
	public function setId_jeu($var){
		$this->id_jeu=$var;
	}
	public function getId_jeu(){
		return $this->id_jeu;
	}

}
?>