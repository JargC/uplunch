<html>
    <head>
        <title>Ma page d'accueil </title>
    </head>
    <body>
        <h1>Bienvenue sur mon site  </h1>
        <h2>Commencez-donc par vous inscrire :</h2>
        <form name="inscription" method="post" action="test.php">
            Entrez votre pseudo : <input type="text" name="pseudo"/> <br/>
            Entrez votre ville : <input type="text" name="ville"/><br/>
            <input type="submit" name="valider" value="OK"/>
        </form>
                <p> Date du jour :</p>
        <?php
        echo '<p> aujourd hui nous sommes le '.date('d/m/Y').' !</p>';
        
		$age=18;
		echo'J\'ai '.$age.' ans.';
		
		 

       //Exemple formulaire
       
        if(isset($_POST['valider'])){
            $pseudo=$_POST['pseudo'];
            $ville=$_POST['ville'];
            echo '<br/>Salut '. $pseudo.' de '. $ville.'<br/>Bienvenue sur mon site !';
        }
        
        //Exemple tableau
        $semaine=array('lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche');
        echo '<br/> Nous sommes le '.$semaine[0]; 
        
        //Exemple de tableau associatif:
        $adresse4 = array(); 
		//on le remplit
		$adresse4 ['nom']='DUPONT';
		$adresse4 ['prenom']='Michel';
		$adresse4 ['num'] = 12; 
		$adresse4 ['rue']  = 'rue des églantines'; 
		$adresse4 ['cp']  = 75000;
		$adresse4 ['ville'] = 'Paris';
		
		echo '<br/> la ville est: '.$adresse4['ville']; 
		
		
		//Exemple foreach
		$semaine=array('lundi','mardi','mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
 
			//parcours du tableau
		 
		foreach($semaine as $jour){
		    echo'<br/> - '.$jour;
		}
		
		// Exemple de fonction:
		function colore($nombre){
		    if($nombre<10){
		        echo'<font color="red">'.$nombre.'</font>';
		    }
		    elseif($nombre>=15){
		        echo'<font color="green">'.$nombre.'</font>';
		    }
		    //cas par défaut(noir)
		    else{
		        echo $nombre;
		    }
		}
		$notes=array(2,5,7,10,11,13,15,17,18);
 
 
		echo '<br/> Vos notes du trimestre :<br/>';
		foreach($notes as $note){
		    echo '- '.colore($note).'<br/>';
		}
		
		//Fonction retournant une valeur
		function parite($nombre){
            //si le reste de la division est zéro, c'est pair
            if (($nombre%2)==0){
                //on initialise les deux valeurs de verdict
                $verdict='pair';
            }
            else{
                $verdict='impair';
            }
            //on renvoie le verdict, tout à la fin
            return $verdict;
        }
        
        ?>
        <form method="POST" action="test.php">
            Entrez votre nombre<input type="text" name="num"/>
            <input type="submit" name="valider" value="OK"/>
        </form>
        <?php
        //si user a cliqué OK
        if(isset($_POST['valider'])){
            //récupère la valeur entrée
            $nombre=$_POST['num'];
            //place dans $toto la valeur de retour de ma fonction
            $toto=parite($nombre);
            //affiche le verdict entier
            echo 'Ce nombre est '.$toto.'.';
        }
        ?>

       
       
    </body>
</html>