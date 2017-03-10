<?php

namespace Controller;

use Model\RestaurantRepository;
use Model\Restaurant;
use Model\UserRepository;
use Model\User;

include '../Model/RestaurantRepository.php';
include '../Model/Restaurant.php';
include '../Model/UserRepository.php';
include '../Model/User.php';

session_start();

$restaurantRepo = new RestaurantRepository();
$userRepo = new UserRepository();

if($_GET['move']==="in"){
	$restaurantRepo->addAffluence($_GET['id']);
	$userRepo->go($_GET['user'],$_GET['id']);
	$_SESSION['id_restaurant']=$_GET['id'];
}

else if($_GET['move']==="out"){
	$restaurantRepo->deleteAffluence($_GET['id']);
	$userRepo->goBack($_GET['user']);
	$_SESSION['id_restaurant']="NULL";
}

elseif($_GET['affluence']!=""){
	if($_GET['affluence']=="faible"){
		$restaurantRepo->voteAffluence($_GET['id'],5);
	}
	elseif($_GET['affluence']=="moyen"){
		$restaurantRepo->voteAffluence($_GET['id'],10);
	}
	else{
		$restaurantRepo->voteAffluence($_GET['id'],20);
	}
	header('Location: ./restaurantController.php?id='.$_GET['id'].'');
	die;
}

header("Location: ./campusController.php");

