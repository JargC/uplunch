<?php

namespace Model;

class Restaurant
{
	private $id;
	private $nom;	
	private $adresse;	
	private $localisation;	
	private $photo;	
	private $capacite;	
	private $affluence;	
	private $menu;	
	private $website;	
	private $telephone;	
	private $keyword;
	private $rupture;	
	private $horaires;
	
	public function setId($id){
		$this->id = $id;	
		return $this;
	}
	public function getId(){
		return $this->id;
	}
	public function getNom() {
		return $this->nom;
	}
	public function setNom($nom) {
		$this->nom = $nom;
		return $this;
	}
	public function getAdresse() {
		return $this->adresse;
	}
	public function setAdresse($adresse) {
		$this->adresse = $adresse;
		return $this;
	}
	public function getLocalisation() {
		return $this->localisation;
	}
	public function setLocalisation($localisation) {
		$this->localisation = $localisation;
		return $this;
	}
	public function getPhoto() {
		return $this->photo;
	}
	public function setPhoto($photo) {
		$this->photo = $photo;
		return $this;
	}
	public function getCapacite() {
		return $this->capacite;
	}
	public function setCapacite($capacite) {
		$this->capacite = $capacite;
		return $this;
	}
	public function getAffluence() {
		return $this->affluence;
	}
	public function setAffluence($affluence) {
		$this->affluence = $affluence;
		return $this;
	}
	public function getMenu() {
		return $this->menu;
	}
	public function setMenu($menu) {
		$this->menu = $menu;
		return $this;
	}
	public function getWebsite() {
		return $this->website;
	}
	public function setWebsite($website) {
		$this->website = $website;
		return $this;
	}
	public function getTelephone() {
		return $this->telephone;
	}
	public function setTelephone($telephone) {
		$this->telephone = $telephone;
		return $this;
	}
	public function getKeyword() {
		return $this->keyword;
	}
	public function setKeyword($keyword) {
		$this->keyword = $keyword;
		return $this;
	}
	public function getRupture() {
		return $this->rupture;
	}
	public function setRupture($rupture) {
		$this->rupture = $rupture;
		return $this;
	}
	public function getHoraires() {
		return $this->horaires;
	}
	public function setHoraires($horaires) {
		$this->horaires = $horaires;
		return $this;
	}
}
