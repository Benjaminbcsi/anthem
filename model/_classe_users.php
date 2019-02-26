<?php

class Users {
	//PROPRIETES
	private $id;
	private $pseudo;
	private $mdp;
	private $email;
	private $gamertag;
	private $playstation_network;
	private $origin_pc;

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
	public function setEmail($var){
		$this->email=$var;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setGamertag($var){
		$this->gamertag=$var;
	}
	public function getGamertag(){
		return $this->gamertag;
	}
	public function setPlaystation_network($var){
		$this->playstation_network=$var;
	}
	public function getPlaystation_network(){
		return $this->playstation_network;
	}
	public function setOrigin_pc($var){
		$this->origin_pc=$var;
	}
	public function getOrigin_pc(){
		return $this->origin_pc;
	}

}
?>
