<?php

class Catalogue{
	
    /* ELEMENTS BDD */
    	private $idCatalogue;
    	private $libelleCatalogue;

    //----------------------------------------------------------------------------------------------------//

    	public function __construct($idCatalogue = null, $libelleCatalogue = null){
        	if($idCatalogue === null){
                	return;
        	}
        	$this->idCatalogue = $idCatalogue;
        	$this->libelleCatalogue = $libelleCatalogue;
    	}

     	public static function constructWithId($idCatalogue){
        	$req = ConnexionBDD::instanceBDD()->prepare('SELECT * from Catalogue WHERE idCatalogue = :idCatalogue');
        	$req->execute(['idCatalogue' => $idCatalogue]);
        	$u = $req->fetch();
        	$Catalogue = new Catalogue($u['idCatalogue'], $u['libelleCatalogue']);
        	return $Catalogue;
    	}
    
     //----------------------------------------------------------------------------------------------------//
    
    /* GETTERS & SETTERS */
    
    	public function getIdCatalogue(){		
        	return $this->idCatalogue;
    	}

    	public function getLibelleCatalogue(){		
        	return $this->libelleCatalogue;
    	}

    	public function setLibelleCatalogue($libelleCatalogue){
		$this->libelleCatalogue = $libelleCatalogue;
    	}
    
    //----------------------------------------------------------------------------------------------------//	

	/* METHODES */
	
	public static function ajouterCatalogue($libelleCatalogue){
		$req = ConnexionBDD::instanceBDD()->prepare('INSERT INTO Catalogue VALUES(:libelleCatalogue)');
		$stmt->bindParam(':libelleCatalogue' => $libelleCatalogue);
		$stmt->execute() or die ("Il y a un problème dans votre requête");
	}

	public static function supprimerCatalogue($idCatalogue){
		$req = ConnexionBDD::instanceBDD()->prepare('DELETE FROM Catalogue WHERE idCatalogue = :idCatalogue');
		$req->bindParam(':idCatalogue', $idCatalogue);
		$req->execute() or die ("Il y a un problème dans votre requête");
	}
	
	public static function modifierCatalogue($libelleCatalogue){
		$req = ConnexionBDD::instanceBDD()->prepare('UPDATE Catalogue SET libelleCatalogue= :libelleCatalogue FROM Catalogue WHERE idCatalogue = :idCatalogue');
		$req->bindParam(':idCatalogue', $idCatalogue);
		$req->bindParam(':libelleCatalogue', $libelleCatalogue);	
		$req->execute() or die ("Il y a un problème dans votre requête")			
	}
	
