<?php

$bdd = new \PDO('mysql:host=127.0.0.1;dbname=uplunch;charset=utf8', 'root', '');
$results = $bdd->query('update user,restaurant set id_restaurant=NULL ,affluence=affluence-1 
						where DATEDIFF(MINUTE, CURDATE() , user.date_restaurant)>30
						and restaurant.id=user.id_restaurant');
