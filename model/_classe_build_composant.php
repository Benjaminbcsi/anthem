<?php

class Buildcomposant {
	//PROPRIETES
	private $id;
	private $id_build;
	private $id_composant;


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
	public function setId_build($var){
		$this->id_build=$var;
	}
	public function getId_build(){
		return $this->id_build;
	}
	public function setId_composant($var){
		$this->id_composant=$var;
	}
	public function getId_composant(){
		return $this->id_composant;
	}

}
?>
