<?php

namespace Model;

class Favoris
{
	private $id;
	private $id_user;	
	private $id_restaurant;
	
	public function setId($id){
		$this->id = $id;	
		return $this;
	}
	public function getId(){
		return $this->id;
	}
	public function getIdUser() {
		return $this->id_user;
	}
	public function setIdUser($id_user) {
		$this->id_user = $id_user;
		return $this;
	}
	public function getIdRestaurant() {
		return $this->id_restaurant;
	}
	public function setIdRestaurant($id_restaurant) {
		$this->id_restaurant = $id_restaurant;
		return $this;
	}
}
