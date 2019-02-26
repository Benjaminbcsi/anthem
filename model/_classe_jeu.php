<?php

class Jeu extends Media {
	//PROPRIETES
	private $idjeu;
	private $nom;
	private $descjeu;
	private $idgenre;
	private $idmedia;
	
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
	public function setIdjeu($var){
		$this->idjeu=$var;
	}
	public function getIdjeu(){
		return $this->idjeu;
	}
	public function setNom($var){
		$this->nom=$var;
	}
	public function getNom(){
		return $this->nom;
	}
	public function setDescriptif($var){
		$this->descjeu=$var;
	}
	public function getDescriptif(){
		return $this->descjeu;
	}
	public function setId_genre($var){
		$this->idgenre=$var;
	}
	public function getId_genre(){
		return $this->idgenre;
	}
	public function setGenre($var){
		$this->idgenre=$var;
	}
	public function getGenre(){
		return $this->idgenre;
	}
	public function setId_media($var){
		$this->idmedia=$var;
	}
	public function getId_media(){
		return $this->idmedia;
	}
	


}
?>