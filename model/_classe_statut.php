<?php

class Statut {
	//PROPRIETES
	private $id;
	private $element;

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
	public function setElement($var){
		$this->element=$var;
	}
	public function getElement(){
		return $this->element;
	}


}
?>
