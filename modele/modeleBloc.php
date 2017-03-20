<?php

class ModeleBloc{

	/* ELEMENTS BDD */
	private $idBloc;
	private $nomBloc;
	private $nombreExtensionsBloc;
	private $numeroBloc;


//----------------------------------------------------------------------------------------------------//

	private function __construct($nomBloc = null, $nombreExtensionsBloc = null, $numeroBloc = null){
		$this->nomBloc = $nomBloc;
		$this->nombreExtensionsBloc = $nombreExtensionsBloc;
		$this->numeroBloc = $numeroBloc;
	}

	public static function constructWithId($idBloc){
		$req = ConnexionBDD::instanceBDD()->prepare('SELECT * from bloc WHERE idBloc = :idBloc');
		$req->execute(['idBloc' => $idBloc]);
		$u = $req->fetch();
		$bloc = new ModeleBloc($u['nomBloc'], $u['nombreExtensionsBloc'],$u['numeroBloc']);
		return $bloc;
	}

//----------------------------------------------------------------------------------------------------//

	/* GETTERS & SETTERS */

	public function getIdBloc(){		
		return $this->idBloc;
	}

	public function getNomBloc(){		
		return $this->nomBloc;
	}

	public function getNombreExtensionsBloc(){		
		return $this->nombreExtensionsBloc;
	}

	public function getNumeroBloc(){		
		return $this->numeroBloc;
	}

	public function setNomBloc($nomBloc){		
		$this->nomBloc = $nomBloc;
	}

	public function setNombreExtensionsBloc($nombreExtensionsBloc){		
		$this->nombreExtensionsBloc = $nombreExtensionsBloc;
	}

	public function setNumeroBloc($numeroBloc){		
		$this->numeroBloc = $numeroBloc;
	}

//----------------------------------------------------------------------------------------------------//	

	/* METHODES */
	public static function ajouterBloc($nomBloc, $nombreExtensionsBloc, $numeroBloc){
		$req = ConnexionBDD::instanceBDD()->prepare('INSERT INTO bloc 
			VALUES(:nomBloc, :nombreExtensionsBloc, :numeroBloc)');
		$stmt->bindParam(':nomBloc' => $nomBloc);
		$stmt->bindParam(':nombreExtensionsBloc' => $nombreExtensionsBloc);
		$stmt->bindParam(':numeroBloc' => $numeroBloc);
		$stmt->execute() or die ("Il y a un problème dans votre requête");

	}


	public static function supprimerBloc($idBloc){
		$req = ConnexionBDD::instanceBDD()->prepare('DELETE FROM bloc WHERE idBloc = :idBloc');
		$req->bindParam(':idBloc', $idBloc);
		$req->execute() or die ("Il y a un problème dans votre requête");
	}