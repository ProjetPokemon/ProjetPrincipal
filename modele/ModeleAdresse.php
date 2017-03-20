<?php

class ModeleAdresse{

	/* ELEMENTS BDD */
	private $idAdresse;
	private $designationAdresse;
	private $numeroRueAdresse;
	private $villeAdresse;
	private $codePostalAdresse;
	private $lieuDitAdresse;
	private $completementAdresse;
	private $typeAdresse;
	private $idClient;



//----------------------------------------------------------------------------------------------------//

	public function __construct($designationAdresse = null, $numeroRueAdresse = null, $villeAdresse = null, $codePostalAdresse = null, $lieuDitAdresse = null, $completementAdresse = null, $typeAdresse = null, $idClient = null){
		$this->designationAdresse = $designationAdresse;
		$this->numeroRueAdresse = $numeroRueAdresse;
		$this->villeAdresse = $villeAdresse;
		$this->codePostalAdresse = $codePostalAdresse;
		$this->lieuDitAdresse = $lieuDitAdresse;
		$this->completementAdresse = $completementAdresse;
		$this->typeAdresse = $typeAdresse;
		$this->idClient = $idClient;		
	}

	public static function constructWithId($idAdresse){
        $req = ConnexionBDD::instanceBDD()->prepare('SELECT * from adresse WHERE idAdresse = :idAdresse');
        $req->execute(['idAdresse' => $idAdresse]);
        $u = $req->fetch();
        $adresse = new ModeleAdresse($u['designationAdresse'], $u['numeroRueAdresse'],$u['villeAdresse'] , $u['codePostalAdresse'], $u['lieuDitAdresse'], $u['typeAdresse'], $u['idClient']);
        return $adresse;
    }

//----------------------------------------------------------------------------------------------------//

	/* GETTERS & SETTERS */

	public function getIdAdresse(){		
		return $this->idAdresse;
	}

	public function getDesignationAdresse(){		
		return $this->designationAdresse;
	}

	public function getNumeroRueAdresse(){		
		return $this->numeroRueAdresse;
	}

	public function getVilleAdresse(){		
		return $this->villeAdresse;
	}

	public function getCodePostalAdresse(){		
		return $this->codePostalAdresse;
	}

	public function getLieuDitAdresse(){		
		return $this->lieuDitAdresse;
	}

	public function getCompletementAdresse(){		
		return $this->completementAdresse;
	}

	public function getTypeAdresse(){		
		return $this->typeAdresse;
	}

	public function getIdClient(){		
		return $this->idClient;
	}	

	public function setDesignationAdresse($designationAdresse){		
		$this->designationAdresse = $designationAdresse;
	}

	public function setNumeroRueAdresse($numeroRueAdresse){		
		$this->numeroRueAdresse = $numeroRueAdresse;
	}

	public function setVilleAdresse($villeAdresse){		
		$this->villeAdresse = $villeAdresse;
	}

	public function setCodePostalAdresse($codePostalAdresse){		
		$this->codePostalAdresse = $codePostalAdresse;
	}

	public function setLieuDitAdresse($lieuDitAdresse){		
		$this->lieuDitAdresse = $lieuDitAdresse;
	}

	public function setCompletementAdresse($completementAdresse){		
		$this->completementAdresse = $completementAdresse;
	}

	public function setTypeAdresse($typeAdresse){		
		$this->typeAdresse = $typeAdresse;
	}

	public function setIdClient(){		
		$this->idClient = $idClient;
	}

//----------------------------------------------------------------------------------------------------//	

	/* METHODES */
	public static function ajouterAdresse($designationAdresse, $numeroRueAdresse, $villeAdresse, $codePostalAdresse, $lieuDitAdresse, $completementAdresse, $typeAdresse, $idClient){
		$req = ConnexionBDD::instanceBDD()->prepare('INSERT INTO adresse 
													 VALUES(:designationAdresse, :numeroRueAdresse, :villeAdresse, :codePostalAdresse, :lieuDitAdresse, :completementAdresse, :typeAdresse, :idClient)');
		$stmt->bindParam(':designationAdresse' => $designationAdresse);
		$stmt->bindParam(':numeroRueAdresse' => $numeroRueAdresse);
		$stmt->bindParam(':villeAdresse' => $villeAdresse);
		$stmt->bindParam(':codePostalAdresse' => $codePostalAdresse);
		$stmt->bindParam(':lieuDitAdresse' => $lieuDitAdresse);
		$stmt->bindParam(':completementAdresse' => $completementAdresse);
		$stmt->bindParam(':typeAdresse' => $typeAdresse);
		$stmt->bindParam(':idClient' => $idClient);
		$stmt->execute() or die ("Il y a un problème dans votre requête");

	}


	public static function supprimerBloc($idAdresse){
		$req = ConnexionBDD::instanceBDD()->prepare('DELETE FROM adresse WHERE idAdresse = :idAdresse');
		$req->bindParam(':idAdresse', $idAdresse);
		$req->execute() or die ("Il y a un problème dans votre requête");
	}
}

