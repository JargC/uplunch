<?php

// Chargement de la classe de modele generique
require('../core/Model.php');

?>

<?php $titre = 'Accueil'; ?>

<?php ob_start(); ?>
	<div class="in-container">
		<a href="../Controller/campusController.php" class="in-link">Déjeuner au campus
		</a>
	</div>
	<div class="out-container">
		<a href="" class="out-link">Déjeuner aux alentours
		</a>
	</div>
<?php $contenu = ob_get_clean(); ?>
<?php require 'layout.php'; ?>