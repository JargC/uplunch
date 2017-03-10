<?php

namespace Model;

use Model\Restaurant;
use Model\HoraireRepository;
 
class RestaurantRepository
{

	public function getRestaurantCampus() {
		$bdd = new \PDO('mysql:host=127.0.0.1;dbname=uplunch;charset=utf8', 'root', '');
		$results = $bdd->query('select * from restaurant where localisation="in" ');

		$restaurants = new \ArrayObject();
		$repoHoraire = new HoraireRepository();
		while ($res = $results->fetch()) {			
			$restaurant = new Restaurant();
			$restaurant->setId($res['id']);
			$restaurant->setNom($res['nom']);
			$restaurant->setAdresse($res['adresse']);
			$restaurant->setLocalisation($res['localisation']);
			$restaurant->setPhoto($res['photo']);
			$restaurant->setCapacite($res['capacite']);
			$restaurant->setAffluence($res['affluence']);
			$restaurant->setMenu($res['menu']);
			$restaurant->setWebsite($res['website']);
			$restaurant->setTelephone($res['telephone']);
			$restaurant->setKeyword($res['keyword']);
			$restaurant->setHoraires($repoHoraire->getHorairesByRestaurant($res['id']));
			$restaurants->append($restaurant);
		}
		$results->closeCursor();
		
		return $restaurants;
	}

	public function getRestaurantHorsCampus() {
		$bdd = new \PDO('mysql:host=127.0.0.1;dbname=uplunch;charset=utf8', 'root', '');
		$results = $bdd->query('select * from restaurant where localisation="out" ');

		$restaurants = new \ArrayObject();
		$repoHoraire = new HoraireRepository();
		while ($res = $results->fetch()) {			
			$restaurant = new Restaurant();
			$restaurant->setId($res['id']);
			$restaurant->setNom($res['nom']);
			$restaurant->setAdresse($res['adresse']);
			$restaurant->setLocalisation($res['localisation']);
			$restaurant->setPhoto($res['photo']);
			$restaurant->setCapacite($res['capacite']);
			$restaurant->setAffluence($res['affluence']);
			$restaurant->setMenu($res['menu']);
			$restaurant->setWebsite($res['website']);
			$restaurant->setTelephone($res['telephone']);
			$restaurant->setKeyword($res['keyword']);
			$restaurant->setHoraires($repoHoraire->getHorairesByRestaurant($res['id']));
			$restaurants->append($restaurant);
		}
		$results->closeCursor();
		
		return $restaurants;
	}
	
	public function getRestaurant($id) {
		$bdd = new \PDO('mysql:host=127.0.0.1;dbname=uplunch;charset=utf8', 'root', '');
		$req = $bdd->prepare('SELECT * FROM restaurant WHERE id = :id');
		$req->execute(array('id' => $id));
		
		$res = $req->fetch();
		
		$repoHoraire = new HoraireRepository();
		
		$restaurant = new Restaurant();
		$restaurant->setId($res['id']);
		$restaurant->setNom($res['nom']);
		$restaurant->setAdresse($res['adresse']);
		$restaurant->setLocalisation($res['localisation']);
		$restaurant->setPhoto($res['photo']);
		$restaurant->setCapacite($res['capacite']);
		$restaurant->setAffluence($res['affluence']);
		$restaurant->setMenu($res['menu']);
		$restaurant->setWebsite($res['website']);
		$restaurant->setTelephone($res['telephone']);
		$restaurant->setKeyword($res['keyword']);
		$restaurant->setRupture($res['rupture']);
		$restaurant->setHoraires($repoHoraire->getHorairesByRestaurant($res['id']));
		
		$req->closeCursor();
		
		return $restaurant;
		
	}
	
	public function addAffluence($id){
		$bdd = new \PDO('mysql:host=127.0.0.1;dbname=uplunch;charset=utf8', 'root', '');
		$req = $bdd->prepare('update restaurant set affluence=affluence+1 where id = :id');
		$req->execute(array('id' => $id));
	}
	
	public function deleteAffluence($id){
		$bdd = new \PDO('mysql:host=127.0.0.1;dbname=uplunch;charset=utf8', 'root', '');
		$req = $bdd->prepare('update restaurant set affluence=affluence-1 where id = :id');
		$req->execute(array('id' => $id));
	}
	
	public function voteAffluence($id,$affluence){
		$bdd = new \PDO('mysql:host=127.0.0.1;dbname=uplunch;charset=utf8', 'root', '');
		$req = $bdd->prepare('update restaurant set affluence = :affluence where id = :id');
		$req->execute(array('id' => $id, 'affluence'=> $affluence));
	}
	
	function getRestaurants() {
		$bdd = new \PDO('mysql:host=127.0.0.1;dbname=uplunch;charset=utf8', 'root', '');
		$req = $bdd->prepare('SELECT * FROM restaurant');
		$req->execute();
		$res = $req->fetchAll();
		$restaurants = array();
		$repoHoraire = new HoraireRepository();
		foreach ($res as $row) {
			$restaurant = new Restaurant();
			$restaurant->setId($row['id']);
			$restaurant->setNom($row['nom']);
			$restaurant->setAdresse($row['adresse']);
			$restaurant->setLocalisation($row['localisation']);
			$restaurant->setPhoto($row['photo']);
			$restaurant->setCapacite($row['capacite']);
			$restaurant->setAffluence($row['affluence']);
			$restaurant->setMenu($row['menu']);
			$restaurant->setWebsite($row['website']);
			$restaurant->setTelephone($row['telephone']);
			$restaurant->setKeyword($row['keyword']);
			$restaurant->setRupture($row['rupture']);
			$restaurant->setHoraires($repoHoraire->getHorairesByRestaurant($row['id']));
			array_push($restaurants, $restaurant);
		}
	
		return $restaurants;
	}
	
	function deleteRestaurantById($id){
		$bdd = new \PDO('mysql:host=127.0.0.1;dbname=uplunch;charset=utf8', 'root', '');
		$req = $bdd->prepare('DELETE FROM restaurant WHERE id='.$id);
		$req->execute();
	}
	
	function addRestaurant($restaurant){
	
		$bdd = new \PDO('mysql:host=127.0.0.1;dbname=uplunch;charset=utf8', 'root', '');
		$req = $bdd->prepare('INSERT INTO restaurant(nom, adresse, localisation, photo, capacite, affluence, menu, website, telephone, keyword, rupture)
					  VALUES(:nom, :adresse, :localisation, :photo, :capacite, :affluence, :menu, :website, :telephone, :keyword, :rupture)');
		$req->execute(array(
				'nom' => $restaurant->getNom(),
				'adresse' => $restaurant->getAdresse(),
				'localisation' => $restaurant->getLocalisation(),
				'photo' => $restaurant->getPhoto(),
				'capacite' => $restaurant->getCapacite(),
				'affluence' => $restaurant->getAffluence(),
				'menu' => $restaurant->getMenu(),
				'website' => $restaurant->getWebsite(),
				'telephone' => $restaurant->getTelephone(),
				'keyword' => $restaurant->getKeyword(),
				'rupture' => $restaurant->getRupture()));
	}
}