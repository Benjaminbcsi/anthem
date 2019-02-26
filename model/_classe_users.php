<?php

class Users {
	//PROPRIETES
	private $id;
	private $pseudo;
	private $mdp;

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
	public function setPseudo($var){
		$this->pseudo=$var;
	}
	public function getPseudo(){
		return $this->pseudo;
	}
	public function setMdp($var){
		$this->mdp=$var;
	}
	public function getMdp(){
		return $this->mdp;
	}

}
?>
