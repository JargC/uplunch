<?php
session_start();

if(isset($_SESSION['admin']) && $_SESSION['admin']=="yes")
{
	$titre = "Administration";
	ob_start();
	echo '<div class="list-group admin-panel">
	<a href="./administrationController.php?manage=restaurants" class="list-group-item">Gestion des restaurants</a>
	  <a href="./administrationController.php?manage=users" class="list-group-item">Gestion des utilisateurs</a>
	</div>';
	if(isset($_GET['manage'])){

		switch($_GET['manage']){
			case "restaurants": echo '
			<div class="panel panel-default manage-panel">
			  <!-- Default panel contents -->
			  <div class="panel-heading">Restaurants<a href="./administrationController.php?manage=restaurants&req=add" style="float:right;text-decoration:underline;font-weight:bold;color:orange;">Ajouter</a></div>

			  <!-- Table -->
			  <table class="table table-striped" style="table-layout:fixed;width:100%;">
			    <thead>
					<tr><th> # </th><th> Nom </th><th> Adresse </th><th> Localisation </th><th> Photo </th><th> Capacité </th><th>Affluence</th><th>Menu</th><th>Site web</th><th>Telephone</th><th>Mots clés</th><th>Prix moyen</th><th>Horaires</th><th>Modifier</th><th>Supprimer</th></tr>';
					if(isset($_GET['req']) && $_GET['req'] == "add")
					{
						echo '<form method="post" action="./administrationController.php?manage=restaurants&type=add">
								<tr>
									<td></td>
									<td><input class="form-control" type="text" name="nom"></td>
									<td><input class="form-control" type="text" name="adresse"></td>
									<td><input class="form-control" type="text" name="localisation"></td>
									<td><input class="form-control" type="file" name="photo"></td>
									<td><input class="form-control" type="text" name="capacite"></td>
									<td><input class="form-control" type="text" name="affluence"></td>
									<td><input class="form-control" type="text" name="menu"></td>
									<td><input class="form-control" type="text" name="website"></td>
									<td><input class="form-control" type="text" name="telephone"></td>
									<td><input class="form-control" type="text" name="keyword"></td>
									<td><input class="form-control" type="text" name="prixmoyen"></td>
									<td><!--<input class="form-control" type="text" name="horairedebut">--></td>
									<td><input class="btn btn-default" type="submit" name="" value="Ajouter"></td>
								</tr>
							</form>';
					}
					$restaurants = $restauRepo->getRestaurants();
					foreach ($restaurants as $restaurant) {
						$horaires = $restaurant->getHoraires();
						if(empty($horaires[0])){$horaire_debut = '';$horaire_fin = '';}
						else{$horaire_debut = $horaires[0]->getDebut(); $horaire_fin = $horaires[0]->getFin();}
						echo '<tr><td>'.$restaurant->getId().'</td><td>'.$restaurant->getNom().'</td><td>'.$restaurant->getAdresse().'</td><td>'.$restaurant->getLocalisation().'</td><td>'.$restaurant->getPhoto().'</td><td>'.$restaurant->getCapacite().'</td><td>'.$restaurant->getAffluence().'</td><td>'.$restaurant->getMenu().'</td><td>'.$restaurant->getWebsite().'</td><td>'.$restaurant->getTelephone().'</td><td>'.$restaurant->getKeyword().'</td><td>'.$restaurant->getPrixmoyen().'</td><td>'.$horaire_debut.'-'.$horaire_fin.'</td><td><a href="../Controller/administrationController.php?manage=restaurants&type=update&num='.$restaurant->getId().'"><img style="width:20px; height:20px;" src="../Views/css/images/modif.png"/></a></td><td><a href="../Controller/administrationController.php?manage=restaurants&type=delete&num='.$restaurant->getId().'"><img style="width:20px; height:20px;" src="../Views/css/images/delete.png"/></a></td></td>';
					}
					echo '
				</thead>
			  </table>
			</div>'; 
				break;
			case "users": echo '
			<div class="panel panel-default manage-panel">
			  <!-- Default panel contents -->
			  <div class="panel-heading">Utilisateurs<!--<a href="./administrationController.php?manage=users&req=add" style="float:right;text-decoration:underline;font-weight:bold;color:orange;">Ajouter</a>--></div>

			  <!-- Table -->
			  <table class="table table-striped">
			    <thead>
					<tr><th> # </th><th> Nom </th><th> Prénom </th><th> Mail </th><th> Adresse </th><th> Date création </th> <th>Filiere</th><th>Photo</th><th>Modifier</th><th>Supprimer</th></tr>';
					// if(isset($_GET['req']) && $_GET['req'] == "add")
					// {
					// 	echo '<form method="post" action="./administrationController.php?manage=users&type=add">
					// 			<tr>
					// 				<td></td>
					// 				<td><input class="form-control" type="text" name="nom"></td>
					// 				<td><input class="form-control" type="text" name="prenom"></td>
					// 				<td><input class="form-control" type="text" name="mail"></td>
					// 				<td><input class="form-control" type="text" name="adresse"></td>
					// 				<td></td>
					// 				<td><input class="form-control" type="text" name="filiere"></td>
					// 				<td><input class="form-control" type="file" name="photo"></td>
					// 				<td><input class="btn btn-default" type="submit" name="" value="Ajouter"></td>
					// 			</tr>
					// 		</form>';
					// }
					$users = $userRepo->getUsers();
					foreach ($users as $user) {
						echo '<tr><td>'.$user->getId().'</td><td>'.$user->getNom().'</td><td>'.$user->getPrenom().'</td><td>'.$user->getMail().'</td><td>'.$user->getAdresse().'</td><td>'.$user->getCreationDate().'</td><td>'.$user->getFiliere().'</td><td>'.$user->getPhoto().'</td><td><a href="../Controller/administrationController.php?manage=users&type=update&num='.$user->getId().'"><img style="width:20px; height:20px;" src="../Views/css/images/modif.png"/></a></td><td><a href="../Controller/administrationController.php?manage=users&type=delete&num='.$user->getId().'"><img style="width:20px; height:20px;" src="../Views/css/images/delete.png"/></a></td></td>';
					}
					echo '
				</thead>
			  </table>
			</div>';
			break;
		}
	}

	$contenu = ob_get_clean();
	require 'layout.php';
	}
else
	header("Location: ../Controller/indexController.php");
?>