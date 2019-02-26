<?php

class Game {
	//PROPRIETES
	private $id;
	private $nom;
	private $nb_joueur;
	private $etat;
	private $id_joueur_victorieux;

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
	public function setNom($var){
		$this->nom=$var;
	}
	public function getNom(){
		return $this->nom;
	}
	public function setNb_joueur($var){
		$this->nb_joueur=$var;
	}
	public function getNb_joueur(){
		return $this->nb_joueur;
	}
	public function setEtat($var){
		$this->etat=$var;
	}
	public function getEtat(){
		return $this->etat;
	}
	public function setId_joueur_victorieux($var){
		$this->id_joueur_victorieux=$var;
	}
	public function getId_joueur_victorieux(){
		return $this->id_joueur_victorieux;
	}

}
?>
