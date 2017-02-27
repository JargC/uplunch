<?php

namespace Model;

class User
{
	private $id;
	private $google_id;
	private $facebook_id;
	private $nom;
	private $prenom;
	private $mail;
	private $password;
	private $adresse;
	private $creation_date;
	private $filiere;
	private $photo;
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getGoogleId() {
		return $this->google_id;
	}
	public function setGoogleId($google_id) {
		$this->google_id = $google_id;
		return $this;
	}
	public function getFacebookId() {
		return $this->facebook_id;
	}
	public function setFacebookId($facebook_id) {
		$this->facebook_id = $facebook_id;
		return $this;
	}
	public function getNom() {
		return $this->nom;
	}
	public function setNom($nom) {
		$this->nom = $nom;
		return $this;
	}
	public function getPrenom() {
		return $this->prenom;
	}
	public function setPrenom($prenom) {
		$this->prenom = $prenom;
		return $this;
	}
	public function getMail() {
		return $this->mail;
	}
	public function setMail($mail) {
		$this->mail = $mail;
		return $this;
	}
	public function getPassword() {
		return $this->password;
	}
	public function setPassword($password) {
		$this->password = $password;
		return $this;
	}
	public function getAdresse() {
		return $this->adresse;
	}
	public function setAdresse($adresse) {
		$this->adresse = $adresse;
		return $this;
	}
	public function getCreationDate() {
		return $this->creation_date;
	}
	public function setCreationDate($creation_date) {
		$this->creation_date = $creation_date;
		return $this;
	}
	public function getFiliere() {
		return $this->filiere;
	}
	public function setFiliere($filiere) {
		$this->filiere = $filiere;
		return $this;
	}
	public function getPhoto() {
		return $this->photo;
	}
	public function setPhoto($photo) {
		$this->photo = $photo;
		return $this;
	}
	

}
