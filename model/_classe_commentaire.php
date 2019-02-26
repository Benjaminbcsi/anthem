<?php

class Commentaire{
	//PROPRIETES
	private $id;
	private $data;
	private $pseudo;
	private $nombre_jaime;
	private $id_post;
	private $id_utilisateur;
	private $chemin;

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
	public function setData($var){
		$this->data=$var;
	}
	public function getData(){
		return $this->data;
	}
	public function setPseudo($var){
		$this->pseudo=$var;
	}
	public function getPseudo(){
		return $this->pseudo;
	}
	public function setNombre_jaime($var){
		$this->nombre_jaime=$var;
	}
	public function getNombre_jaime(){
		return $this->nombre_jaime;
	}
	public function setId_post($var){
		$this->id_post=$var;
	}
	public function getId_post(){
		return $this->id_post;
	}
	public function setId_utilisateur($var){
		$this->id_utilisateur=$var;
	}
	public function getId_utilisateur(){
		return $this->id_utilisateur;
	}
	public function setChemin($var){
		$this->chemin=$var;
	}
	public function getChemin(){
		return $this->chemin;
	}

}
?>