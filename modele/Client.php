<?php

class Client{
	
    /* ELEMENTS BDD */
    	private $idClient;
    	private $nomClient;
    	private $prenomClient;
    	private $civiliteClient;
    	private $dateNaissanceClient;
    	private $adresseMailClient;
    	private $listeAdresses = array();


    //----------------------------------------------------------------------------------------------------//

    	public function __construct($idClient = null, $nomClient = null, $prenomClient = null, $civiliteClient = null, $dateNaissanceClient = null, $adresseMailClient = null){
        	if($idClient === null){
                	return;
        	}
        	$this->idClient = $idClient;
        	$this->nomClient = $nomClient;
        	$this->prenomClient = $prenomClient;
        	$this->civiliteClient = $civiliteClient;
        	$this->dateNaissanceClient = $dateNaissanceClient;
        	$this->adresseMailClient = $adresseMailClient;
    	}

     	public static function constructWithId($idClient){
        	$req = ConnexionBDD::instanceBDD()->prepare('SELECT * from Client WHERE idClient = :idClient');
        	$req->execute(['idClient' => $idClient]);
        	$u = $req->fetch();
        	$client = new Client($u['idClient'], $u['nomClient'], $u['prenomClient'],$u['civiliteClient'],$u['dateNaissanceClient'],$u['adresseMailClient']);
        	
        	
        	$req = ConnexionBDD::instanceBDD()->prepare('SELECT idAdresse from Adresse WHERE fk_idClient = :idClient');
        	$req->execute(['idClient' => $idClient]);
		while($resultat = $req->fetch()){
			$adresse = Adresse.constructWithId($resultat[0]);
			$listeAdresses[] = $adresse;
		}
        	
        	return $client;
        	
    	}
    
     //----------------------------------------------------------------------------------------------------//
    
    /* GETTERS & SETTERS */
    
    	public function getIdClient(){		
        	return $this->idClient;
    	}

    	public function getNomClient(){		
        	return $this->nomClient;
    	}

    	public function getPrenomClient(){		
       		return $this->prenomClient;
    	}

    	public function getCiviliteClient(){		
        	return $this->civiliteClient;
    	}
    	
    	public function getDateNaissanceClient(){		
       		return $this->dateNaissanceClient;
    	}

    	public function getAdresseMailClient(){		
        	return $this->adresseMailClient;
    	}

	public function getListeAdresses(){		
        	return $this->listeAdresses;
    	}

    	public function setNomClient($nomClient){
		$this->nomClient = $nomClient;
    	}
	
    	public function setPrenomClient($prenomClient){
		$this->prenomClient = $prenomClient;
    	}
	
    	public function setCiviliteClient($civiliteClient){
		$this->civiliteClient = $civiliteClient;
    	}
    	
    	public function setAdresseMailClient($adresseMailClient){
		$this->adresseMailClient = $adresseMailClient;
    	}
	
    	public function setDateNaissanceClient($dateNaissanceClient){
		$this->dateNaissanceClient = $dateNaissanceClient;
    	}
    
    //----------------------------------------------------------------------------------------------------//	

	/* METHODES */
	
	public static function ajouterClient($nomClient,$prenomClient,$civiliteClient,$dateNaissanceClient,$adresseMailClient){
		$req = ConnexionBDD::instanceBDD()->prepare('INSERT INTO Client VALUES(:nomClient, :prenomClient, :civiliteClient, :dateNaissanceClient, :adresseMailClient)');
		$stmt->bindParam(':nomClient' => $nomClient);
		$stmt->bindParam(':prenomClient' => $prenomClient);
		$stmt->bindParam(':civiliteClient' => $civiliteClient);
		$stmt->bindParam(':dateNaissanceClient' => $dateNaissanceClient);
		$stmt->bindParam(':adresseMailClient' => $adresseMailClient);	
	
		$stmt->execute() or die ("Il y a un problème dans votre requête");

	}

	public static function supprimerClient($idClient){
		$req = ConnexionBDD::instanceBDD()->prepare('DELETE FROM Client WHERE idClient = :idClient');
		$req->bindParam(':idClient', $idClient);
		$req->execute() or die ("Il y a un problème dans votre requête");
	}
	
	public static function modifierClient($idClient,$nomClient,$prenomClient,$civiliteClient,$dateNaissanceClient,$adresseMailClient){
		$req = ConnexionBDD::instanceBDD()->prepare('UPDATE Client SET nomClient= :nomClient, prenomClient= :prenomClient, civiliteClient= :civiliteClient,dateNaissanceClient= :dateNaissanceClient, adresseMailClient= :adresseMailClient FROM Client WHERE idClient = :idClient');
		$req->bindParam(':idClient', $idClient);
		$req->bindParam(':nomClient', $nomClient);
		$req->bindParam(':prenomClient', $prenomClient);
		$req->bindParam(':civiliteClient', $civiliteClient);
		$req->bindParam(':dateNaissanceClient' => $dateNaissanceClient);
		$req->bindParam(':adresseMailClient' => $adresseMailClient);	
		$req->execute() or die ("Il y a un problème dans votre requête");
				
	}
	
