<?php
require_once '../Model/User.php';


   function recupPostParam($nom){
        // Initialisation de la valeur de retour
        $retour = '';
        if($nom != NULL || $nom !='' ){
            $retour = ((isset($_POST[$nom]))?($_POST[$nom]):(''));
        }
        return $retour;
    }

    function inscription_check(){
		// Declaration et initialisation de la variable pour savoir si la saisie est OK
        $isOk = TRUE;

        $user = new User();

         // Controle du nom
        $mot = 'nom';
        if ($user->setNom(recupPostParam($mot))) {
            $saisie[$mot] = $user->getNom();   			
        } else {
            $saisie[$mot] = $_POST[$mot];
			$erreur[$mot] = TRUE;
			$isOk = FALSE;
        } 

         // Controle du prénom
        $mot = 'prenom';
        if ($user ->setPrenom(recupPostParam($mot))) {
            $saisie[$mot] = $user->getPrenom();   			
        } else {
            $saisie[$mot] = $_POST[$mot];
			$erreur[$mot] = TRUE;
			$isOk = FALSE;
        } 

         // Controle de l'adresse
        $mot = 'adresse';
        if ($user ->setAdresse(recupPostParam($mot))) {
            $saisie[$mot] = $user->getAdresse();   			
        } else {
            $saisie[$mot] = $_POST[$mot];;
        } 

		 // Controle de la filiere
        $mot = 'filiere';
        if ($user ->setFiliere(recupPostParam($mot))) {
            $saisie[$mot] = $user->getFiliere();   			
        } else {
            $saisie[$mot] = $_POST[$mot];
			$erreur[$mot] = TRUE;
			$isOk = FALSE;
        } 

         // Controle de la photo
        $mot = 'photo';
        if ($user ->setPhoto(recupPostParam($mot))) {
            $saisie[$mot] = $user->getPhoto();   			
        } else {
            $saisie[$mot] = $_POST[$mot];
        } 

         // Controle du mail
        $mot = 'mail';
        if(recupPostParam($mot)!=''){
            if ($user ->setMail(recupPostParam($mot))) {
            $saisie[$mot] = $user->getMail();               
            }
        } else {
            $saisie[$mot] = $_POST[$mot];
			$erreur[$mot] = TRUE;
			$isOk = FALSE;
        } 


         // Controle du mdp
        $mot = 'password';
        if(recupPostParam($mot)!=''){
             if ($user ->setPassword(recupPostParam($mot))) {
            $saisie[$mot] = $user->getPassword();               
             }
        } else {
            $saisie[$mot] = $_POST[$mot];
			$erreur[$mot] = TRUE;
			$isOk = FALSE;
        } 

         if (!$isOk) {
            // S'il y a des erreurs de saisie, je reviens sur le formulaire d'inscription
            $saisie['password'] = '';
            $_SESSION['saisie'] = $saisie;
            $_SESSION['erreur'] = $erreur;
            // Retour au formulaire d'inscription
            header('Location: ../Views/index.php');
        } else {
        	   //Enregistrement du membre
            $data = NULL;
            $data['fields'] = $saisie;
            // Execution de la requete et recuperation de l'id du membre inserre
            $id_membre = $user->insert($data);
            if ($id_membre) {
            	$message = 'Votre compte a &eacute;t&eacute; cr&eacute;&eacute;<br />';
            	if(isset($_SESSION['saisie'])) unset($_SESSION['saisie']);
                if(isset($_SESSION['erreur'])) unset($_SESSION['erreur']);
                header('Location: ../Views/index.php');
            }else{
                 $message = 'L\'enregistrement a &eacute;chou&eacute;';
                 $param = 'error';
                 header('Location: ../Views/index.php');
            }
    	}

}

    function connexion_check(){

        if(isset($_POST['mail']) && isset($_POST['password']))
        {
            $dbh = new PDO('mysql:host=localhost;dbname=uplunch', 'root', '');
            $result = $dbh->query("SELECT password FROM user WHERE mail='".$_POST['mail']."'");
            var_dump($result);
            $dbh = NULL;
        }

    }


if(isset($_GET['method'])){
    switch($_GET['method']){
        case 'inscription': inscription_check();
        case 'connexion': connexion_check();
        break;
        default:;}
}