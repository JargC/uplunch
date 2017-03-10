<?php

namespace Controller;

use Model\User;
use Model\UserRepository;

include '../Model/User.php';
include '../Model/UserRepository.php';

if(isset($_REQUEST["provider"]))
{

	//On appelle la librairie
	$config = $_SERVER['DOCUMENT_ROOT']."/uplunch/hybridauth/config.php";
	require_once( $_SERVER['DOCUMENT_ROOT']."/uplunch/hybridauth/Hybrid/Auth.php" );
	//Initialisation
	try{
		$hybridauth = new \Hybrid_Auth( $config );
		//On  affecte le provider
		$provider = @ trim( strip_tags( $_GET["provider"] ) );
		// On tente une authentification
		$adapter = $hybridauth->authenticate( $_GET["provider"] );
		$adapter = $hybridauth->getAdapter( $provider );
		//On récupère les informations du profile
		$user_data = $adapter->getUserProfile();
		/* les variables sont stockées dans $user_data.
		 On interroge notre base de données pour voir si l'adresse email($user_data->email) est déjà attachée à un compte*/
		$user = new User();
		$userRepository = new UserRepository();
		$user = $userRepository->connectionUser($user_data->email, $user_data->email);
		
		if($user->getId() == null){//Si le compte n'existe pas on enregistre l'utilisateur	
			//Création des variables de session
			$user->setNom($user_data->lastName);
			$user->setPrenom($user_data->firstName);
			$user->setMail($user_data->email);
			$user->setPassword($user_data->email);
			$user->setAdresse("Non inscrit");
			$user->setFiliere("Non inscrit");
			$user->setPhoto($user_data->photoURL);
				
			$userRepository->inscriptionUser($user);
			
			if($_GET["provider"]==="Facebook")header("Location: ./hybridController.php?provider=Facebook");
			else header("Location: ./hybridController.php?provider=Google");
			
		}
		else{	
			// on athentifie l'utilisateur
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
	}
	catch( Exception $e ){

		// In case we have errors 6 or 7, then we have to use Hybrid_Provider_Adapter::logout() to
		// let hybridauth forget all about the user so we can try to authenticate again.
		// Display the recived error,
		// to know more please refer to Exceptions handling section on the userguide
		switch( $e->getCode() ){
			case 0 : echo "Unspecified error."; break;
			case 1 : echo "Hybriauth configuration error."; break;
			case 2 : echo "Provider not properly configured."; break;
			case 3 : echo "Unknown or disabled provider."; break;
			case 4 : echo "Missing provider application credentials."; break;
			case 5 : echo "Authentication failed. "
					. "The user has canceled the authentication or the provider refused the connection.";
			case 6 : echo "User profile request failed. Most likely the user is not connected "
					. "to the provider and he should to authenticate again.";
					$adapter->logout();
					break;
			case 7 : echo "User not connected to the provider.";
			$adapter->logout();
			break;
		}
		echo "<br /><br /><b>Original error message:</b> " . $e->getMessage();
		echo "<hr /><h3>Trace</h3> <pre>" . $e->getTraceAsString() . "</pre>";
	}
}