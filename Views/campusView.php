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
					<img class="picture" src="../Views/css/images/<?= $restaurant->getPhoto() ?>">
					<div class="description-restaurant">
						<p class="restaurant-name"><?= $restaurant->getNom() ?></p>
						<?php foreach($restaurant->getHoraires() as $horaire){ ?>
						<p class="horaires">
							<span class="debut">Horaires : <?= $horaire->getDebut() ?>h -</span>
							<span class="fin"><?= $horaire->getFin() ?>h</span>
						</p>
						<?php } ?>
						<p class="restaurant-keyword">Mots clés : #<?= $restaurant->getKeyword() ?></p>
						<p class="restaurant-affluence">Affluence : <?= $restaurant->getAffluence() ?></p>							
					</div>
					<a class="go-validation btn btn-warning" href="govalidation.php">J'Y VAIS !</a>
				</div>
			<?php } ?>	
		</div>
	</div>
<?php $contenu = ob_get_clean(); ?>
<?php require 'layout.php'; ?>