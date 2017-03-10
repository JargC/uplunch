<?php

namespace Controller;

use Model\User;
use Model\UserRepository;

include '../Model/User.php';
include '../Model/UserRepository.php';

 function verifMail($mail) { 
       $exp = '/^[[:alnum:]][[:alnum:]_.-]*@[[:alnum:]][[:alnum:]_.-]*\.[a-z]{2,6}$/'; 
        // J'elimine les blancs avant et apres et je passe en minuscules 
        $mail = strtolower(trim($_POST['mail']));
        // Je controle que le mail est valide 
        if(preg_match($exp,$mail))
    		return TRUE; 

    	return FALSE;
  } 

if(trim($_POST['password'] == '' || !verifMail($_POST['mail']))){
	header("Location: ./indexController.php?inscription=failed");
}
else
{
$user = new User();
$userRepo = new UserRepository();

$uploaddir = '../Views/css/images/';
$uploadfile = $uploaddir . basename($_FILES['photo']['name']);

move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);

$user->setNom($_POST['nom']);
$user->setPrenom($_POST['prenom']);
$user->setMail($_POST['mail']);
$user->setPassword(trim($_POST['password']));
$user->setAdresse($_POST['adresse']);
$user->setFiliere($_POST['filiere']);
$user->setPhoto($_FILES['photo']['name']);

$userRepo->inscriptionUser($user);

$user = $userRepo->connectionUser($_POST['mail'], $_POST['password']);

session_start();
	
$_SESSION['id']=$user->getId();
$_SESSION['nom']=$user->getNom();
$_SESSION['prenom']=$user->getPrenom();
$_SESSION['mail']=$user->getMail();
$_SESSION['adresse']=$user->getAdresse();
$_SESSION['filiere']=$user->getFiliere();
$_SESSION['photo']=$user->getPhoto();
$_SESSION['id_restaurant']=$user->getIdRestaurant();
$_SESSION['date_restaurant']=$user->getDateRestaurant();

header("Location: ./indexController.php");
}


