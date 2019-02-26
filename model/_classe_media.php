<?php

class Media extends Genre{
	//PROPRIETES
	private $id;
	private $type;
	private $nom;
	private $taille;
	private $chemin;
	private $idutilisateur;
	private $idequipe;
	private $idjeu;

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
	public function setType($var){
		$this->type=$var;
	}
	public function getType(){
		return $this->type;
	}
	public function setNom($var){
		$this->nom=$var;
	}
	public function getNom(){
		return $this->nom;
	}
	public function setTaille($var){
		$this->taille=$var;
	}
	public function getTaille(){
		return $this->taille;
	}
	public function setChemin($var){
		$this->chemin=$var;
	}
	public function getChemin(){
		return $this->chemin;
	}
	public function setIdequipe($var){
		$this->idequipe=$var;
	}
	public function getIdequipe(){
		return $this->idequipe;
	}
	public function setId_utilisateur($var){
		$this->idutilisateur=$var;
	}
	public function getId_utilisateur(){
		return $this->idutilisateur;
	}
	public function setIdjeu($var){
		$this->idjeu=$var;
	}
	public function getIdjeu(){
		return $this->idjeu;
	}




}
?>