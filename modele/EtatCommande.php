<?php

class EtatCommande{
	
    /* ELEMENTS BDD */
    	private $idEtatCommande;
    	private $libelleEtatCommande;

    //----------------------------------------------------------------------------------------------------//

    	public function __construct($idEtatCommande = null, $libelleEtatCommande = null){
        	if($idEtatCommande === null){
                	return;
        	}
        	$this->idEtatCommande = $idEtatCommande;
        	$this->libelleEtatCommande = $libelleEtatCommande;
    	}

     	public static function constructWithId($idEtatCommande){
        	$req = ConnexionBDD::instanceBDD()->prepare('SELECT * from EtatCommande WHERE idEtatCommande = :idEtatCommande');
        	$req->execute(['idEtatCommande' => $idEtatCommande]);
        	$u = $req->fetch();
        	$etatCommande = new EtatCommande($u['idEtatCommande'], $u['libelleEtatCommande']);
        	return $etatCommande;
    	}
    
     //----------------------------------------------------------------------------------------------------//
    
    /* GETTERS & SETTERS */
    
    	public function getIdEtatCommande(){		
        	return $this->idEtatCommande;
    	}

    	public function getLibelleEtatCommande(){		
        	return $this->libelleEtatCommande;
    	}

    	public function setLibelleEtatCommande($libelleEtatCommande){
		$this->libelleEtatCommande = $libelleEtatCommande;
    	}
    
    //----------------------------------------------------------------------------------------------------//	

	/* METHODES */
	
	public static function ajouterEtatCommande($libelleEtatCommande){
		$req = ConnexionBDD::instanceBDD()->prepare('INSERT INTO EtatCommande VALUES(:libelleEtatCommande)');
		$stmt->bindParam(':libelleEtatCommande' => $libelleEtatCommande);
		$stmt->execute() or die ("Il y a un problème dans votre requête");
	}

	public static function supprimerEtatCommande($idEtatCommande){
		$req = ConnexionBDD::instanceBDD()->prepare('DELETE FROM EtatCommande WHERE idEtatCommande = :idEtatCommande');
		$req->bindParam(':idEtatCommande', $idEtatCommande);
		$req->execute() or die ("Il y a un problème dans votre requête");
	}
	
	public static function modifierEtatCommande($idEtatCommande,$libelleEtatCommande){
		$req = ConnexionBDD::instanceBDD()->prepare('UPDATE EtatCommande SET libelleEtatCommande= :libelleEtatCommande FROM EtatCommande WHERE idEtatCommande = :idEtatCommande');
		$req->bindParam(':idEtatCommande', $idEtatCommande);
		$req->bindParam(':libelleEtatCommande', $libelleEtatCommande);	
		$req->execute() or die ("Il y a un problème dans votre requête")			
	}
	
