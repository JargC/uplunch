<?php $titre = 'Accueil'; ?>

<?php ob_start(); 
	if(isset($_GET['request']) && $_GET['request'] == 'about') 
		echo '<div class="in-container">
		<h2>Qui sommes nous ?</h2>
		<p>Nous sommes un groupe de 5 étudiants : Malorie Lemaire, Fanny Ferreira, Léa Michalek, Estelle Bontet et Riad Padilla. Ensemble, nous avons eu l’idée de créer UP-LUNCH, un site optimisé pour mobile donnant accès aux informations concernant les différents modes de restauration sur le campus de Nanterre Université et aux alentours. Notre objectif : faciliter votre expérience lors du déjeuner en vous renseignant sur les menus proposés, les horaires d’ouverture et de fermeture, l’affluence au sein du restaurant que vous avez choisi, les ruptures de stocks et sur la qualité des menus proposé. 
		Désormais grâce à UP-LUNCH vous ne mangerez plus vous déjeunerez ;)   </p>
	</div>';
	else
		echo 
	'<div class="in-container">
		<a href="../Controller/campusController.php" class="in-link">Déjeuner au campus
		</a>
	</div>
	<div class="out-container">
		<a href="../Controller/restaurantController.php" class="out-link">Déjeuner aux alentours
		</a>
	</div>';	
$contenu = ob_get_clean();
require 'layout.php'; ?>