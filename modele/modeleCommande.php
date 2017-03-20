<?php

class ModeleBloc{

	/* ELEMENTS BDD */
	private $idCommande;
	private $dateCommande;
	private $referenceCommande;
	private $infosAdresseFacturationCommande;
	private $infosAdresseLivraisonCommande;
	private $prixHTCommande;
	private $tvaCommande;
	private $prixTTCCommande;
	private $fraisPortCommande;
	private $montantRemiseCommande;
	private $libelleRemiseCommande;
	private $fk_idClient;
	private $listeCarteCommande;



//----------------------------------------------------------------------------------------------------//

	public function __construct($dateCommande = null, $referenceCommande = null, $infosAdresseFacturationCommande = null, $infosAdresseLivraisonCommande = null, $prixHTCommande = null, $tvaCommande = null, $prixTTCCommande = null, $fraisPortCommande = null, $montantRemiseCommande = null, $libelleRemiseCommande = null, $fk_idClient = null, $listeCarteCommande = null){
		$this->dateCommande = $dateCommande;
		$this->referenceCommande = $referenceCommande;
		$this->infosAdresseFacturationCommande = $infosAdresseFacturationCommande;
		$this->infosAdresseLivraisonCommande = $infosAdresseLivraisonCommande;
		$this->prixHTCommande = $prixHTCommande;
		$this->tvaCommande = $tvaCommande;
		$this->prixTTCCommande = $prixTTCCommande;
		$this->fraisPortCommande = $fraisPortCommande;
		$this->montantRemiseCommande = $montantRemiseCommande;	
		$this->libelleRemiseCommande = $libelleRemiseCommande;	
		$this->fk_idClient = $fk_idClient;			
		$this->listeCarteCommande = $listeCarteCommande;	
	}

//----------------------------------------------------------------------------------------------------//

	/* GETTERS & SETTERS */

	public function getIdCommande(){		
		return $this->idCommande;
	}

	public function getDateCommande(){		
		return $this->dateCommande;
	}

	public function getReferenceCommande(){		
		return $this->referenceCommande;
	}

	public function getInfosAdresseFacturationCommande(){		
		return $this->infosAdresseFacturationCommande;
	}

	public function getInfosAdresseLivraisonCommande(){		
		return $this->infosAdresseLivraisonCommande;
	}

	public function getPrixHTCommande(){		
		return $this->prixHTCommande;
	}

	public function getTvaCommande(){		
		return $this->tvaCommande;
	}

	public function getPrixTTCCommande(){		
		return $this->prixTTCCommande;
	}

	public function getFraisPortCommande(){		
		return $this->fraisPortCommande;
	}

	public function getMontantRemiseCommande(){		
		return $this->montantRemiseCommande;
	}	

	public function getLibelleRemiseCommande(){		
		return $this->libelleRemiseCommande;
	}	


	public function getFk_idClient(){		
		return $this->fk_idClient;
	}	


	public function getListeCarteCommande(){		
		return $this->listeCarteCommande;
	}	

	public function setIdCommande($idCommande){		
		$this->idCommande = $idCommande;
	}

	public function setDateCommande($dateCommande){		
		$this->dateCommande = $dateCommande;
	}

	public function setReferenceCommande($referenceCommande){		
		$this->referenceCommande = $referenceCommande;
	}

	public function setInfosAdresseFacturationCommande($infosAdresseFacturationCommande){		
		$this->infosAdresseFacturationCommande = $infosAdresseFacturationCommande;
	}

	public function setInfosAdresseLivraisonCommande($infosAdresseLivraisonCommande){		
		$this->infosAdresseLivraisonCommande = $infosAdresseLivraisonCommande;
	}

	public function setPrixHTCommande($prixHTCommande){		
		$this->prixHTCommande = $prixHTCommande;
	}

	public function setTvaCommande($tvaCommande){		
		$this->tvaCommande = $tvaCommande;
	}

	public function setPrixTTCCommande($prixTTCCommande){		
		$this->prixTTCCommande = $prixTTCCommande;
	}

	public function setFraisPortCommande($fraisPortCommande){		
		$this->fraisPortCommande = $fraisPortCommande;
	}

	public function setMontantRemiseCommande($montantRemiseCommande){		
		$this->montantRemiseCommande = $montantRemiseCommande;
	}

	public function setLibelleRemiseCommande($libelleRemiseCommande){		
		$this->libelleRemiseCommande = $libelleRemiseCommande;
	}

	public function setFk_idClient($fk_idClient){		
		$this->fk_idClient = $fk_idClient;
	}

	public function setListeCarteCommande($listeCarteCommande){		
		$this->listeCarteCommande = $listeCarteCommande;
	}

//----------------------------------------------------------------------------------------------------//	

	/* METHODES */
	public static function ajouterCommande($dateCommande, $referenceCommande, $infosAdresseFacturationCommande, $infosAdresseLivraisonCommande, $prixHTCommande, $tvaCommande, $prixTTCCommande, $fraisPortCommande, $montantRemiseCommande, $libelleRemiseCommande, $fk_idClient, $listeCarteCommande){
		$req = ConnexionBDD::instanceBDD()->prepare('INSERT INTO commande 
													 VALUES(:dateCommande, :referenceCommande, :infosAdresseFacturationCommande, :infosAdresseLivraisonCommande, :prixHTCommande, :tvaCommande, :prixTTCCommande, :fraisPortCommande, :montantRemiseCommande, :libelleRemiseCommande, :fk_idClient, :listeCarteCommande)');
		$stmt->bindParam(':dateCommande' => $dateCommande);
		$stmt->bindParam(':referenceCommande' => $referenceCommande);
		$stmt->bindParam(':infosAdresseFacturationCommande' => $infosAdresseFacturationCommande);
		$stmt->bindParam(':infosAdresseLivraisonCommande' => $infosAdresseLivraisonCommande);
		$stmt->bindParam(':prixHTCommande' => $prixHTCommande);
		$stmt->bindParam(':tvaCommande' => $tvaCommande);
		$stmt->bindParam(':prixTTCCommande' => $prixTTCCommande);
		$stmt->bindParam(':fraisPortCommande' => $fraisPortCommande);
		$stmt->bindParam(':montantRemiseCommande' => $montantRemiseCommande);
		$stmt->bindParam(':libelleRemiseCommande' => $libelleRemiseCommande);
		$stmt->bindParam(':fk_idClient' => $fk_idClient);
		$stmt->bindParam(':listeCarteCommande' => $listeCarteCommande);
		$stmt->execute() or die ("Il y a un problème dans votre requête");
	}


	public static function supprimerCommande($idCommande){
		$req = ConnexionBDD::instanceBDD()->prepare('DELETE FROM commande WHERE idCommande = :idCommande');
		$req->bindParam(':idCommande', $idCommande);
		$req->execute() or die ("Il y a un problème dans votre requête");
	}
}