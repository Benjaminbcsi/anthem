<?php

class Utilisateur extends UtilisateurEquipe{
	//PROPRIETES
	private $idjoueur;
	private $id;
	private $mail;
	private $mdp;
	private $date;
	private $genre;
	private $chemin;
	private $statutjoueur;
	private $descjoueur;
	private $idequipe;
	private $id_rang;
	private $id_ville;
	private $niveauutil;
	private $exputil;
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
	public function setMail($var){
		$this->mail=$var;
	}
	public function getMail(){
		return $this->mail;
	}
	public function setIdjoueur($var){
		$this->idjoueur=$var;
	}
	public function getIdjoueur(){
		return $this->idjoueur;
	}
	public function setId($var){
		$this->id=$var;
	}
	public function getId(){
		return $this->id;
	}
	public function setStatutjoueur($var){
		$this->statutjoueur=$var;
	}
	public function getStatutjoueur(){
		return $this->statutjoueur;
	}
	public function setDescjoueur($var){
		$this->descjoueur=$var;
	}
	public function getDescjoueur(){
		return $this->descjoueur;
	}
	public function setMdp($var){
		$this->mdp=$var;
	}
	public function getMdp(){
		return $this->mdp;
	}
	public function setDate($var){
		$this->date=$var;
	}
	public function getDate(){
		return $this->date;
	}
	public function setGenre($var){
		$this->genre=$var;
	}
	public function getGenre(){
		return $this->genre;
	}
	public function setIdphoto($var){
		$this->id_photo=$var;
	}
	public function getIdphoto(){
		return $this->id_photo;
	}
	public function setIdequipe($var){
		$this->idequipe=$var;
	}
	public function getIdequipe(){
		return $this->idequipe;
	}
	public function setIdrang($var){
		$this->id_rang=$var;
	}
	public function getIdrang(){
		return $this->id_rang;
	}
	public function setIdville($var){
		$this->id_ville=$var;
	}
	public function getIdville(){
		return $this->id_ville;
	}
	public function setChemin($var){
		$this->chemin=$var;
	}
	public function getChemin(){
		return $this->chemin;
	}
	public function getNiveauutil(){
		return $this->niveauutil;
	}
	public function setNiveauutil($var){
		$this->niveauutil=$var;
	}
	public function getExputil(){
		return $this->exputil;
	}
	public function setExputil($var){
		$this->exputil=$var;
	}

}
?>