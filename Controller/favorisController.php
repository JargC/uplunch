<?php

namespace Controller;

use Model\FavorisRepository;
use Model\Favoris;

include '../Model/FavorisRepository.php';
include '../Model/Favoris.php';

$repo = new FavorisRepository();
$favoris = $repo->getFavoris();

require '../Views/favorisView.php';