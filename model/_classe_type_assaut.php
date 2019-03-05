<?php

class Typeassaut {
	//PROPRIETES
	private $id;
	private $designation;

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
	public function setDesignation($var){
		$this->designation=$var;
	}
	public function getDesignation(){
		return $this->designation;
	}


}
?>
