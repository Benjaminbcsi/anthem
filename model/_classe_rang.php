<?php

class Rang extends UtilisateurEquipe {
	//PROPRIETES
	private $titre;

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
	public function setTitre($var){
		$this->titre=$var;
	}
	public function getTitre(){
		return $this->titre;
	}

}
?>