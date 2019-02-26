<?php

class Cardgamejoueur {
	//PROPRIETES
	private $id;
	private $num_card;
	private $color_card;
	private $id_joueur;
	private $id_game;

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
	public function setNum_card($var){
		$this->num_card=$var;
	}
	public function getNum_card(){
		return $this->num_card;
	}
	public function setColor_card($var){
		$this->color_card=$var;
	}
	public function getColor_card(){
		return $this->color_card;
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
	

}
?>
