<?php $titre = 'Campus'; ?>

<?php ob_start(); ?>
	<div class="in-container">
		<a href="" class="in-link">Déjeuner au campus
		</a>
	</div>
	<div class="out-container">
		<a href="" class="out-link">Déjeuner aux alentours
		</a>
	</div>
<?php $contenu = ob_get_clean(); ?>
<?php require 'Views/layout.php'; ?>