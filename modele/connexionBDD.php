<?php
	try{
		$bdd = 'pokemon_bdd' ;
		$loginBDD = 'pokemon';
		$mdpBDD = 'pokemon';
		
		
		$linkpdo = new PDO("mysql:host=mysql2.paris1.alwaysdata.com;dbname=$bdd", $loginBDD, $mdpBDD);
	}catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}
?>
