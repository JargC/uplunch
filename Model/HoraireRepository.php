<?php

namespace Model;

use Model\Horaire;

class HoraireRepository
{
	public function getHorairesByRestaurant($id){
		$bdd = new \PDO('mysql:host=127.0.0.1;dbname=uplunch;charset=utf8', 'root', '');
		$results = $bdd->prepare('select * from horaire where id_restaurant = :id ');
		$results->execute(array('id' => $id));
		$horaires = new \ArrayObject();
		
		while ($res = $results->fetch()) {
			$horaire = new Horaire();
			$horaire->setDebut($res['debut']);
			$horaire->setFin($res['fin']);
			$horaires->append($horaire);
		}
		$results->closeCursor();
		
		return $horaires;
	}
}