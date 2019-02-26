<?php

class Gameuser {
	//PROPRIETES
	private $id;
	private $id_game;
	private $id_joueur;
	private $is_tour;
	private $ordre;

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
	public function setId_game($var){
		$this->id_game=$var;
	}
	public function getId_game(){
		return $this->id_game;
	}
	public function setId_joueur($var){
		$this->id_joueur=$var;
	}
	public function getId_joueur(){
		return $this->id_joueur;
	}
	public function setIs_tour($var){
		$this->is_tour=$var;
	}
	public function getIs_tour(){
		return $this->is_tour;
	}
	public function setOrdre($var){
		$this->ordre=$var;
	}
	public function getOrdre(){
		return $this->ordre;
	}
}
?>
