<?php

namespace Model;

use Model\User;

class UserRepository
{
	function inscriptionUser($user){
		$bdd = new \PDO('mysql:host=127.0.0.1;dbname=uplunch;charset=utf8', 'root', '');
		$req = $bdd->prepare('INSERT INTO user(nom, prenom, mail, password, adresse, date_creation, filiere, photo)
					  VALUES(:nom, :prenom, :mail, :password, :adresse, CURDATE(), :filiere, :photo)');
		$req->execute(array(
				'nom' => $user->getNom(),
				'prenom' => $user->getPrenom(),
				'mail' => $user->getMail(),
				'password' => $user->getPassword(),
				'adresse' => $user->getAdresse(),
				'filiere' => $user->getFiliere(),
				'photo' => $user->getPhoto()));
	}
	
	function connectionUser($mail,$password){
		$bdd = new \PDO('mysql:host=127.0.0.1;dbname=uplunch;charset=utf8', 'root', '');
		$req = $bdd->prepare('SELECT * FROM user 
							  WHERE mail = :mail AND password = :password');
		$req->execute(array(
				'mail' => $mail,
				'password' => sha1($password)));
		$res = $req->fetch();

		$user = new User();
		$user->setId($res['id']);
		$user->setNom($res['nom']);
		$user->setPrenom($res['prenom']);
		$user->setMail($res['mail']);
		$user->setAdresse($res['adresse']);
		$user->setFiliere($res['filiere']);
		$user->setPhoto($res['photo']);
		$user->setCreationDate($res['date_creation']);
		
		$req->closeCursor();

		return $user;		
	}

	function getUsers(){
		$bdd = new \PDO('mysql:host=127.0.0.1;dbname=uplunch;charset=utf8', 'root', '');
		$req = $bdd->prepare('SELECT * FROM user WHERE mail != "admin@uplunch.fr"');
		$req->execute();
		$res = $req->fetchAll();
		$users = array();

		foreach ($res as $row) {
			$user = new User();
			$user->setId($row['id']);
			$user->setNom($row['nom']);
			$user->setPrenom($row['prenom']);
			$user->setMail($row['mail']);
			$user->setAdresse($row['adresse']);
			$user->setFiliere($row['filiere']);
			$user->setPhoto($row['photo']);
			$user->setCreationDate($row['date_creation']);
			array_push($users, $user);
		}

		return $users;
	}

	function deleteUserById($id){
		$bdd = new \PDO('mysql:host=127.0.0.1;dbname=uplunch;charset=utf8', 'root', '');
		$req = $bdd->prepare('DELETE FROM user WHERE id='.$id);
		$req->execute();
	}
}