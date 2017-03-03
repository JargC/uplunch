<?php 
session_start();
if(isset($_GET['inscription']) && $_GET['inscription'] == 'failed'){echo
	'<script>
	alert("inscription failed");</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-icon" href=".png" />
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
	<link rel="stylesheet" href="../Views/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../Views/css/jquery-ui.min.css" type="text/css" />
	<link rel="stylesheet" href="../Views/css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="../Views/css/layoutstyle.css" type="text/css" />
	<script src="../Views/js/jquery-ui.min.js" ></script>
	<script src="../Views/js/jquery-1.12.1.min.js" ></script>	
	<script src="../Views/js/bootstrap.min.js" ></script>
	<script src="../Views/js/uplunch.js" ></script>
	<title><?= $titre ?></title>
</head>
<body>
 
	<div id="wrap">
		
		<!-- Header -->
		
		<div class="jumbotron">
			<div class="header-container">
				<div class="top-header-container">
					<div class="element-top-header-container">
						<div class="logo-container">
							<a class="logo-parameter-link">	
								<span class="logo-parameter">
								</span>
							</a>
						</div>
						<div class="user-element-container">
							<?php
							if(isset($_SESSION['id'])){
							?>
							<span><?= $_SESSION['nom'] ?> <?= $_SESSION['prenom'] ?></span>
							<a href="../Controller/deconnectionController.php">log out</a>
							<?php }
							else{ ?>
							<a id="loginButton" onclick="showLoginPanel()" class="logo-user-link">
								<span class="logo-user">
								</span>
							</a>
							<?php } ?>											
						</div>
						<div class="header-title-container">
							<span class="header-title">UP-LUNCH</span>					
						</div>					
					</div>
				</div>				
				<div class="nav-container">
					<a href="../Controller/indexController.php" class="link-nav"><span>Accueil</span></a>
					<a href="favoris.php" class="link-nav"><span>Favoris</span></a>					
				</div>
			</div>
		</div>

	
		<div style="display:none" id="loginPanel" class="panel panel-default col-xs-4 col-xs-offset-4 col-md-4 col-md-offset-4 login-panel">
  			<div class="panel-heading">
   			 <h2 class="panel-title">Connexion</h2>
  			</div>
	  		<div class="panel-body">
	    		<form action="../Controller/connectionController.php" method="post">
					<label style="color:black"> Adresse e-mail </label>
					<input class="form-control" type="text" name="mail">
					<br>
					<label style="color:black"> Mot de passe </label>
					<input class="form-control" type="password" name="password">
					<br>
					<input id="connectionButton" class="btn btn-default" type="submit" value="Se connecter"><br><br>
					<label style="color:black">Connexion via réseaux sociaux :</label><br>
					<a href="../Controller/hybridController.php?provider=Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i>acebook</a>
					&nbsp;
	    			<a href="../Controller/hybridController.php?provider=Google"><i class="fa fa-google" aria-hidden="true"></i><span style="color:red">o</span><span style="color:yellow">o</span><span style="color:bleu">g</span><span style="color:green">l</span><span style="color:red">e</span></a>
	    			
	    		</form>
	    		<br>
	    		<button onclick="showInscriptionPanel()" class="btn btn-default">S'inscrire</button>
	 	    </div>
		</div>

		<div style="display:none" id="inscriptionPanel" class="panel panel-default col-xs-4 col-xs-offset-4 col-md-4 col-md-offset-4 login-panel">
  			<div class="panel-heading">
   			 <h2 class="panel-title">Inscription</h2>
  			</div>
	  		<div class="panel-body">
	    		<form action="../Controller/inscriptionController.php" method="post" enctype="multipart/form-data">
	    			<label style="color:black"> Nom </label>
					<input class="form-control" type="text" name="nom">
					<label style="color:black"> Prénom </label>
					<input class="form-control" type="text" name="prenom">
					<label style="color:black"> Adresse </label>
					<input class="form-control" type="text" name="adresse">
					<label style="color:black"> Filiere </label>
					<input class="form-control" type="text" name="filiere">
					<label style="color:black"> Photo </label>
					<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
					<input class="form-control" type="file" accept="image/*" name="photo">
					<label style="color:black"> Adresse e-mail *</label>
					<input class="form-control" type="text" name="mail">
					<label style="color:black"> Mot de passe *</label>
					<input class="form-control" type="password" name="password">
					<br>
					<input class="btn btn-default" type="submit" value="S'inscrire">
	    		</form>
	 	    </div>
		</div>
		<div class="list-parameter">
			<div class="element-parameter"><a href="../Controller/indexController.php">Retour page d'accueil</a></div>
			<div class="element-parameter"><a href="">Mes favoris</a></div>
			<div class="element-parameter"><a href="../Controller/indexController.php?request=about">Qui sommes nous?</a></div>
			<div class="element-parameter"><a href="">Conditions d'utilisations</a></div>
			<span>Nous contacter</span>
			<a class="fb-contact" href=""></a>
			<a class="gm-contact" href=""></a>
		</div>
		
		<!-- Content -->
		
		<div class="container">
        		<?= $contenu ?>   <!-- Élément spécifique -->
        </div>
        
    </div>
        
		<!-- Footer -->
	
	<div class="footer">
		<div class="jumbotron">
			<div class="footer-container">
				<div class="top-footer-container">
					<a href="./index.php" class="logo-uplunch-link">	
						<span class="logo-uplunch">
						</span>
					</a>
				</div>
				<div class="bottom-footer-container">
					<div class="bottom-footer-container-primary">
						<a href="about.php" class="link-footer">À propos</a>
					</div>
					<div class="bottom-footer-container-secondary">
						<a href="terms.php" class="link-footer">Conditions d'utilisation</a>
						<span class="link-footer">© 2016 Uplunch</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	

</body>
</html>
