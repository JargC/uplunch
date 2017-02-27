<?php

namespace Controller;

use Model\User;
use Model\UserRepository;

include '../Model/User.php';
include '../Model/UserRepository.php';

$user = new User();
$userRepo = new UserRepository();

$uploaddir = '../Views/css/images/';
$uploadfile = $uploaddir . basename($_FILES['photo']['name']);

move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);

$user->setNom($_POST['nom']);
$user->setPrenom($_POST['prenom']);
$user->setMail($_POST['mail']);
$user->setPassword(sha1($_POST['password']));
$user->setAdresse($_POST['adresse']);
$user->setFiliere($_POST['filiere']);
$user->setPhoto($_FILES['photo']['name']);

$userRepo->inscriptionUser($user);

header("Location: ./indexController.php");


