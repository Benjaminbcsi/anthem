<?php

abstract class UtilisateurEquipe{
	private $pseudoequipe;
	private $id;
	private $pseudo;
	private $statut;
	private $datej;
	private $id_photo;
	private $id_equipe;


	public function getId(){
		return $this->id;
	}
	public function setId($var){
		$this->id=$var;
	}
	public function getPseudo(){
		return $this->pseudo;
	}
	public function setPseudo($var){
		$this->pseudo=$var;
	}
	public function getPseudoequipe(){
		return $this->pseudoequipe;
	}
	public function setPseudoequipe($var){
		$this->pseudoequipe=$var;
	}
	
	public function getDescriptif(){
		return $this->descriptif;
	}
	public function setDescriptif($var){
		$this->descriptif=$var;
	}
	public function getStatut(){
		return $this->statut;
	}
	public function setStatut($var){
		$this->statut=$var;
	}
	public function getDatej(){
		return $this->datej;
	}
	public function setDatej($var){
		$this->datej=$var;
	}
	public function getPhoto(){
		return $this->id_photo;
	}
	public function setPhoto($var){
		$this->id_photo=$var;
	}
	public function getId_equipe(){
		return $this->id_equipe;
	}
	public function setId_equipe($var){
		$this->id_equipe=$var;
	}
	
}

?>