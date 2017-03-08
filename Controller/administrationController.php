<?php

namespace Controller;

use Model\User;
use Model\UserRepository;
use Model\Restaurant;
use Model\RestaurantRepository;
use Model\HoraireRepository;
use Model\Horaire;

include '../Model/User.php';
include '../Model/UserRepository.php';
include '../Model/Restaurant.php';
include '../Model/RestaurantRepository.php';
include '../Model/HoraireRepository.php';
include '../Model/Horaire.php';

$restauRepo = new RestaurantRepository();
$userRepo = new UserRepository();


if(isset($_GET['manage']) && isset($_GET['type'])){

	if($_GET['manage'] == "restaurants"){

		$restauRepo = new RestaurantRepository();

		if(isset($_GET['num'])){

			if($_GET['type'] == "update"){

			}

			elseif($_GET['type'] == "delete"){
				$restauRepo->deleteRestaurantById($_GET['num']);
			}

		}

		if($_GET['type'] == "add"){
			$restaurant = new Restaurant();
			$restaurant->setNom($_POST['nom']);
			$restaurant->setAdresse($_POST['adresse']);
			$restaurant->setLocalisation($_POST['localisation']);
			$restaurant->setPhoto($_POST['photo']);
			$restaurant->setCapacite($_POST['capacite']);
			$restaurant->setAffluence($_POST['affluence']);
			$restaurant->setMenu($_POST['menu']);
			$restaurant->setWebsite($_POST['website']);
			$restaurant->setTelephone($_POST['telephone']);
			$restaurant->setKeyword($_POST['keyword']);
			$restaurant->setPrixmoyen($_POST['prixmoyen']);
			$restauRepo->addRestaurant($restaurant);
		}

	}

	elseif($_GET['manage'] == "users"){

		$userRepo = new UserRepository();

		if(isset($_GET['num'])){

			if($_GET['type'] == "update"){

			}

			elseif($_GET['type'] == "delete"){
				$userRepo->deleteUserById($_GET['num']);
			}

		}

	}

}

require '../Views/administrationView.php';

?>