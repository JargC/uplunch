<?php
function connect(){
$base = mysql_connect ('localhost', 'root', 'root'); 
mysql_select_db ('mabase', $base); 

}

/*function connect-pdo(){
	
$bdd = new PDO('mysql:host=localhost;dbname= mabase ','root','root');
/*try {
    $connexion = new PDO('mysql:host=localhost;dbname=mabase','root','root');
}
catch(Exception $e) {
    echo 'Erreur : '.$e->getMessage().'<br />';
    echo 'N° : '.$e->getCode();
}*/
//}

?>