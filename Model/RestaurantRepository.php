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
			$restaurant->setPrixmoyen($res['prix_moyen']);
			$restaurant->setHoraires($repoHoraire->getHorairesByRestaurant($res['id']));
			$restaurants->append($restaurant);
		}
		$results->closeCursor();
		
		return $restaurants;
	}
}