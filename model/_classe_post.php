<?php

class Post{
	//PROPRIETES
	private $post_id;
	private $type;
	private $titre;
	private $contenu;
	private $date;
	private $etat;
	private $nombre_jaime;
	private $id_equipe;
	private $id_utilisateur;
	private $chemin;
	private $id_media;

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
	public function setPost_id($var){
		$this->post_id=$var;
	}
	public function getPost_id(){
		return $this->post_id;
	}
	public function setType($var){
		$this->type=$var;
	}
	public function getType(){
		return $this->type;
	}
	public function setChemin($var){
		$this->chemin=$var;
	}
	public function getChemin(){
		return $this->chemin;
	}
	public function setTitre($var){
		$this->titre=$var;
	}
	public function getTitre(){
		return $this->titre;
	}
	public function setContenu($var){
		$this->contenu=$var;
	}
	public function getContenu(){
		return $this->contenu;
	}
	public function setTaille($var){
		$this->taille=$var;
	}
	public function getTaille(){
		return $this->taille;
	}
	public function setDate($var){
		$this->date=$var;
	}
	public function getDate(){
		return $this->date;
	}
	public function setNombre_jaime($var){
		$this->nombre_jaime=$var;
	}
	public function getNombre_jaime(){
		return $this->nombre_jaime;
	}
	public function setIdequipe($var){
		$this->id_equipe=$var;
	}
	public function getIdequipe(){
		return $this->id_equipe;
	}
	public function setId_utilisateur($var){
		$this->id_utilisateur=$var;
	}
	public function getId_utilisateur(){
		return $this->id_utilisateur;
	}
	public function setId_media($var){
		$this->id_media=$var;
	}
	public function getId_media(){
		return $this->id_media;
	}
	




}
?>