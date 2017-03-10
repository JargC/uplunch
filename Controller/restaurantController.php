<?php

namespace Controller;

use Model\RestaurantRepository;
use Model\Restaurant;
use Model\HoraireRepository;
use Model\Horaire;

include '../Model/RestaurantRepository.php';
include '../Model/Restaurant.php';
include '../Model/HoraireRepository.php';
include '../Model/Horaire.php';

$repo = new RestaurantRepository();
$restaurants = $repo->getRestaurantHorsCampus();

require '../Views/restaurantView.php';