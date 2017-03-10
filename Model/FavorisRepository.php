<?php

namespace Model;

use Model\Favoris;
use Model\Restaurant;
 
class FavorisRepository
{

	function getFavoris() {
		$bdd = new \PDO('mysql:host=127.0.0.1;dbname=uplunch;charset=utf8', 'root', '');
		$results = $bdd->query('SELECT * FROM favoris');
		$favoris = new \ArrayObject();
		while ($res = $results->fetch()) {			
			$favoris = new Favoris();
			$favoris->setId($row['id']);
			$favoris->setIdUser($res['id_user']);
			$favoris->setIdRestaurant($res['id_restaurant']);
			
			$favoris->append($favoris);
		}
		$results->closeCursor();
		
		return $favoris;
	}

	function deleteFavorisById($id){
		$bdd = new \PDO('mysql:host=127.0.0.1;dbname=uplunch;charset=utf8', 'root', '');
		$req = $bdd->prepare('DELETE FROM favoris WHERE id='.$id);
		$req->execute();
	}

	function addFavoris($favoris){
		$bdd = new \PDO('mysql:host=127.0.0.1;dbname=uplunch;charset=utf8', 'root', '');
		$req = $bdd->prepare('INSERT INTO favoris(id_user, id_restaurant)
					  VALUES(:id_user, :id_restaurant)');
		if(isset($_GET['fav-btn-hit'])){
			
		}
		$req->execute(array(
				'id_user' => $favoris->getIdUser(),
			    'id_restaurant' => $favoris->getIdRestaurant()));
	}

}