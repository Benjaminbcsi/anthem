<?php

class Typecombo {
	//PROPRIETES
	private $id;
	private $combo_data;

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
	public function setCombo_data($var){
		$this->combo_data=$var;
	}
	public function getCombo_data(){
		return $this->combo_data;
	}


}
?>
