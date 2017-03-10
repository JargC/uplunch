<?php $titre = 'Campus'; ?>
<?php session_start(); ?>
<?php ob_start(); ?>
	<div class="out-list-container">
		<div class="search-container">
		</div>
		<div class="path">
		</div>
		<div class="list-restaurant-container container">
			<?php foreach($restaurants as $restaurant){?>
				<div class="restaurant-container">
					<a href="../Controller/restaurantController.php?id=<?= $restaurant->getId() ?>">
						<img class="picture" src="../Views/css/images/<?= $restaurant->getPhoto() ?>">
					</a>
					<div class="description-restaurant">
						<p class="restaurant-name"><?= $restaurant->getNom() ?></p>
						<?php foreach($restaurant->getHoraires() as $horaire){ ?>
						<p class="horaires">
							<span class="debut">Horaires : <?= $horaire->getDebut() ?>h -</span>
							<span class="fin"><?= $horaire->getFin() ?>h</span>
						</p>
						<?php } ?>
						<p class="restaurant-keyword">Mots clés : #<?= $restaurant->getKeyword() ?></p>
						<p class="restaurant-affluence">Affluence : <?php if($restaurant->getAffluence() >= 0 && $restaurant->getAffluence() <= 5){?>
																	<span class="btn btn-success">FAIBLE</span>
																	<?php }elseif($restaurant->getAffluence() > 5 && $restaurant->getAffluence() <= 15){ ?>
																	<span class="btn btn-warning">MOYEN</span>
																	<?php }else{ ?>
																	<span class="btn btn-danger">HAUTE</span>
																	<?php } ?></p>							
					</div>
					
					<?php if(isset($_SESSION['id'])){ ?>					
						<?php if($_SESSION['id_restaurant']==$restaurant->getId()){ ?>
						<a class="go btn btn-warning" href="../Controller/affluenceController.php?id=<?= $restaurant->getId() ?>&user=<?= $_SESSION['id']?>&move=out">JE SORS</a>
						<?php }else{ ?>
						<a class="go btn btn-warning" href="../Controller/affluenceController.php?id=<?= $restaurant->getId() ?>&user=<?= $_SESSION['id'] ?>&move=in">J'Y VAIS !</a>					
						<?php } ?>
					<?php } ?>
				</div>
			<?php } ?>	
		</div>
	</div>
<?php $contenu = ob_get_clean(); ?>
<?php require 'layout.php'; ?>