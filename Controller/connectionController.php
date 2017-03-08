<?php

namespace Controller;

use Model\User;
use Model\UserRepository;

include '../Model/User.php';
include '../Model/UserRepository.php';

$user = new User();
$userRepo = new UserRepository();

$user = $userRepo->connectionUser($_POST['mail'], $_POST['password']);

if($user->getId() != null){
	session_start();
	
	$_SESSION['id']=$user->getId();
	$_SESSION['nom']=$user->getNom();
	$_SESSION['prenom']=$user->getPrenom();
	$_SESSION['mail']=$user->getMail();
	$_SESSION['adresse']=$user->getAdresse();
	$_SESSION['filiere']=$user->getFiliere();
	$_SESSION['photo']=$user->getPhoto();
}

else {
	echo 'Identification impossible';
}

if(isset($_SESSION['mail']) && $_SESSION['mail'] == "admin@uplunch.fr"){
	$_SESSION['admin']="yes";
	header("Location: ../Controller/administrationController.php");
}
else {
	header("Location: ./indexController.php");
}