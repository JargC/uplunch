<?php

namespace Model;

class Horaire
{
	private $id;
	private $debut;
	private $fin;
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getDebut() {
		return $this->debut;
	}
	public function setDebut($debut) {
		$this->debut = $debut;
		return $this;
	}
	public function getFin() {
		return $this->fin;
	}
	public function setFin($fin) {
		$this->fin = $fin;
		return $this;
	}
	
}