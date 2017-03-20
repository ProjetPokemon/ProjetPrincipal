<?php

class Type{
	
    /* ELEMENTS BDD */
    	private $idType;
    	private $selectionType;
    	private $illustrationType;
    	private $libelleType;


    //----------------------------------------------------------------------------------------------------//

    	public function __construct($idType = null, $selectionType = null, $illustrationType = null, $libelleType = null){
        	if($idType === null){
                	return;
        	}
        	$this->idType = $idType;
        	$this->selectionType = $selectionType;
        	$this->illustrationType = $illustrationType;
        	$this->libelleType = $libelleType;
    	}

     	public static function constructWithId($idType){
        	$req = ConnexionBDD::instanceBDD()->prepare('SELECT * from Type WHERE idType = :idType');
        	$req->execute(['idType' => $idType]);
        	$u = $req->fetch();
        	$type = new Type($u['idType'], $u['selectionType'], $u['illustrationType'],$u['libelleType']);
        	return $type;
    	}
    
     //----------------------------------------------------------------------------------------------------//
    
    /* GETTERS & SETTERS */
    
    	public function getIdType(){		
        	return $this->idType;
    	}

    	public function getSelectionType(){		
        	return $this->selectionType;
    	}

    	public function getIllustrationType(){		
       		return $this->illustrationType;
    	}

    	public function getLibelleType(){		
        	return $this->libelleType;
    	}

    	public function setSelectionType($selectionType){
		$this->selectionType = $selectionType;
    	}
	
    	public function setIllustrationType($illustrationType){
		$this->illustrationType = $illustrationType;
    	}
	
    	public function setLibelleType($libelleType){
		$this->libelleType = $libelleType;
    	}
    
    //----------------------------------------------------------------------------------------------------//	

	/* METHODES */
	
	public static function ajouterType($selectionType,$illustrationType,$libelleType ){
		$req = ConnexionBDD::instanceBDD()->prepare('INSERT INTO Type VALUES(:selectionType, :illustrationType, :libelleType)');
		$stmt->bindParam(':selectionType' => $selectionType);
		$stmt->bindParam(':illustrationType' => $illustrationType);
		$stmt->bindParam(':libelleType' => $libelleType);
		$stmt->execute() or die ("Il y a un problème dans votre requête");

	}

	public static function supprimerType($idType){
		$req = ConnexionBDD::instanceBDD()->prepare('DELETE FROM Type WHERE idType = :idType');
		$req->bindParam(':idType', $idType);
		$req->execute() or die ("Il y a un problème dans votre requête");
	}
	
	public static function modifierType($idType,$selectionType,$illustrationType,$libelleType){
		$req = ConnexionBDD::instanceBDD()->prepare('UPDATE Type SET selectionType= :selectionType, illustrationType= :illustrationType, libelleType= :libelleType FROM Type WHERE idType = :idType');
		$req->bindParam(':idType', $idType);
		$req->bindParam(':selectionType', $selectionType);
		$req->bindParam(':illustrationType', $illustrationType);
		$req->bindParam(':libelleType', $libelleType);
		$req->execute() or die ("Il y a un problème dans votre requête");
				
	}
	
