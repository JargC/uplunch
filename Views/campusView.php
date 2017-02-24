<?php $titre = 'Campus'; ?>

<?php ob_start(); ?>
	<div class="in-container">
		<div class="search-container">
		</div>
		<div class="path">
		</div>
		<div class="list-restaurant-container">
			<?php foreach($restaurants as $restaurant){?>
				<div class="restaurant-container">
					<img class="picture" src="<?= $restaurant->getPhoto() ?>">
					<div class="description-restaurant">
						<span class="restaurant-name"><?= $restaurant->getNom() ?></span>
							<?php foreach($restaurant->getHoraires() as $horaire){ ?>
								<span class="horaire"><?= $horaire->getDebut() ?></span>
								<span class="horaire"><?= $horaire->getFin() ?></span>
							<?php } ?>
						<span class="restaurant-keyword"><?= $restaurant->getKeyword() ?></span>
						<span class="restaurant-affluence"><?= $restaurant->getAffluence() ?></span>							
					</div>
					<a class="go-validation" href="govalidation.php">J'Y VAIS !</a>
				</div>
			<?php } ?>	
		</div>
	</div>
<?php $contenu = ob_get_clean(); ?>
<?php require 'layout.php'; ?>