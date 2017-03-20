<?php

	class ModeleCarte{
		private $idCarte ;
		private $nomCarte ;
		private $illustrationDevantCarte ;
		private $numeroCarte ;
		private $pvCarte ;
		private $qualiteCarte ;
		private $descriptionCarte ;
		private $estReverseCarte ;
		private $coteCarte ;
		private $prixVenteCarte ;
		private $fk_idCatalogue;
		private $fk_idExtension;
		private $dateAjoutCarte ;
		private $disponibiliteCarte ;
		private $fk_idType;
		private $rareteCarte ;
		private $illustrationDosCarte;
		private $quantiteCarte ;


		public function __toString(){
			return "idcarte : ".this->getIdCarte()."<br>
			        nomcarte : ".this->getNomCarte()."<br> 
					illustrationDevantCarte : ".this->getIllustrationDevantCarte()."<br> 
					numeroCarte : ".this->getNumeroCarte()."<br> 
					pvCarte : ".this->getPvCarte()."<br> 
					qualiteCarte : ".this->getQualiteCarte()."<br> 
					descriptionCarte : ".this->getDescriptionCarte()."<br> 
					estReverseCarte : ".this->getEstReverseCarte()."<br> 
					coteCarte : ".this->getCoteCarte()."<br> 
					prixVenteCarte : ".this->getPrixVenteCarte()."<br> 
					fk_idCatalogue : ".this->getFk_idCatalogue()."<br> 
					fk_idExtension : ".this->getFk_idExtension()."<br> 
					dateAjoutCarte : ".this->getDateAjoutCarte()."<br> 
					disponibiliteCarte : ".this->getDisponibiliteCarte()."<br> 
					fk_idType : ".this->getFk_idType()."<br> 
					rareteCarte : "this->getRareteCarte()."<br> 
					illustrationDosCarte : ".this->getIllustrationDosCarte()."<br> 
					quantiteCarte : ".this->getQuantiteCarte();
		}
               

                public static function constructWithID($idCarte){
			$req = ConnexionBDD::instanceBDD()->prepare('SELECT nomCarte, illustrationDevantCarte, 
                        numeroCarte , pvCarte, qualiteCarte, descriptionCarte, estReverseCarte, coteCarte, 
                        prixVenteCarte, fk_idCatalogue, fk_idExtension, dateAjoutCarte,disponibiliteCarte, 
                        fk_idType, rareteCarte, illustrationDosCarte, quantiteCarte
			FROM Carte 
			WHERE idCarte = :idCarte');
			$req->execute(array('idCarte' => $idCarte));
			$data = $req->fetch();
			$carte = new Carte($idCarte, $data['nomCarte'], $data['illustrationDevantCarte'], $data['numeroCarte'], $data['pvCarte'], $data['qualiteCarte'], $data['descriptionCarte'], $data['estReverseCarte'], $data['coteCarte'], $data['prixVenteCarte'], $data['fk_idCatalogue'], $data["fk_idExtension"], $data['dateAjoutCarte'], $data['disponibiliteCarte'], $data['fk_idType'], $data['rareteCarte'], $data['illustrationDosCarte'], $data['quantiteCarte']);
			return $carte ;

		}

		public function __construct($idCarte = null , $nomCarte = null,$illustrationDevantCarte = null, $numeroCarte = null, $pvCarte = null, $qualiteCarte = null, $descriptionCarte = null, $estReverseCarte = null, $coteCarte = null, $prixVenteCarte = null, $fk_idCatalogue = null, $fk_idExtension = null, $dateAjoutCarte = null, $disponibiliteCarte = null, $fk_idType = null, $rareteCarte = null, $illustrationDosCarte = null, $quantiteCarte = null){
			if($idCarte == null){
				return null;
			}
			$this->idCarte = $idCarte;
			$this->nomCarte = $nomCarte;
			$this->illustrationDevantCarte = $illustrationDevantCarte;
			$this->numeroCarte = $numeroCarte;
			$this->pvCarte = $pvCarte;
			$this->qualiteCarte = $qualiteCarte;
			$this->descriptionCarte  = $descriptionCarte;
			$this->estReverseCarte = $estReverseCarte;
			$this->coteCarte = $coteCarte;
			$this->prixVenteCarte = $prixVenteCarte;
			$this->fk_idCatalogue = $fk_idCatalogue;
			$this->fk_idExtension = $fk_idExtension;
			$this->dateAjoutCarte = $dateAjoutCarte;
			$this->disponibiliteCarte = $disponibiliteCarte;
			$this->fk_idType = $fk_idType;
			$this->rareteCarte  = $rareteCarte;
			$this->illustrationDosCarte = $illustrationDosCarte;
			$this->quantiteCarte = $quantiteCarte ;
		}



		public static function ajouterCarte($nomCarte = null,$illustrationDevantCarte = null, $numeroCarte = null, $pvCarte = null, $qualiteCarte = null, $descriptionCarte = null, $estReverseCarte = null, $coteCarte = null, $prixVenteCarte = null, $fk_idCatalogue = null, $fk_idExtension = null, $dateAjoutCarte = null, $disponibiliteCarte = null, $fk_idType = null, $rareteCarte = null, $illustrationDosCarte = null, $quantiteCarte = null){

			$idCarte = ModeleCarte::generateId($fk_idExtension, $numeroCarte, $estReverseCarte);

			$existeCarte = ConnexionBDD::instanceBDD()->prepare('SELECT nomCarte 
																FROM Carte
																WHERE idCarte = :idCarte');
			$existeCarte -> execute(array('idCarte' =>$idCarte));

			if($existeCarte->rowCount()==0){
				$req = ConnexionBDD::instanceBDD()->prepare('INSERT INTO Carte (idCarte, nomCarte, illustrationDevantCarte, numeroCarte, pvCarte, qualiteCarte, descriptionCarte, estReverseCarte, coteCarte, prixVenteCarte, fk_idCatalogue, fk_idExtension, dateAjoutCarte, disponibiliteCarte, fk_idType, rareteCarte, illustrationDosCarte, quantiteCarte) 
															VALUES (:idCarte, :nomCarte, :illustrationDevantCarte, :numeroCarte, :pvCarte, :qualiteCarte, :descriptionCarte, :estReverseCarte, :coteCarte, :prixVenteCarte, :fk_idCatalogue, :fk_idExtension, :dateAjoutCarte, :disponibiliteCarte, :fk_idType, :rareteCarte, :illustrationDosCarte, :quantiteCarte)');

				$req -> execute ( array( 'idCarte' => $idCarte,
											'nomCarte' => $nomCarte, 
											'illustrationDevantCarte' => $illustrationDevantCarte, 
											'numeroCarte' => $numeroCarte,
											'pvCarte' => $pvCarte, 
											'qualiteCarte'=> $qualiteCarte,
											'descriptionCarte' => $descriptionCarte,
											'estReverseCarte' => $estReverseCarte,
											'coteCarte' => $coteCarte,
											'prixVenteCarte' => $prixVenteCarte,
											'fk_idCatalogue' => $fk_idCatalogue,
											'fk_idExtension' => $fk_idExtension,
											'dateAjoutCarte' => $dateAjoutCarte,
											'disponibiliteCarte' => $disponibiliteCarte, 
											'fk_idType' => $fk_idType,
											'rareteCarte' => $rareteCarte,
											'illustrationDosCarte' => $illustrationDosCarte,
											'quantiteCarte' => $quantiteCarte	));
				
			}else{
                    $carte = Carte::constructWithID($idCarte);
					$carte->incrementerQuantiteCarte($quantiteCarte);
			}

			
		}

		private function incrementerQuantiteCarte($quantiteAjoutee = 1){
			$req = ConnexionBDD::instanceBDD()->prepare('UPDATE Carte SET quantiteCarte = quantiteCarte+:quantiteAjoutee  WHERE idCarte = :idCarte ');
			$req -> execute(array( 'quantiteAjoutee' => $quantiteAjoutee,
								   'idCarte' => $this->idCarte ));
		}

		private function decrementerQuantiteCarte($quantiteEnlevee = 1){
			$req = ConnexionBDD::instanceBDD()->prepare('UPDATE Carte SET quantiteCarte = quantiteCarte-:quantiteEnlevee  WHERE idCarte = :idCarte ');
			$req -> execute(array( 'quantiteEnlevee' => $quantiteEnlevee,
								   'idCarte' => $this->idCarte ));
		}



		public static function generateId($idExtension, $numeroCarte, $estReverseCarte){
			return $idExtension."-".$numeroCarte."-".$estReverseCarte;
		}
                

		//SUPPRESSION VIA ID
		public static function deleteCarte($idCarte){
			$req = ConnexionBDD::instanceBDD()->prepare('DELETE FROM Carte WHERE idCarte = :idCarte');
			$req -> execute(array('idCarte' => $idCarte));
		}
                
                 function getIdCarte() {
                    return $this->idCarte;
                }

                function getNomCarte() {
                    return $this->nomCarte;
                }

                function getIllustrationDevantCarte() {
                    return $this->illustrationDevantCarte;
                }

                function getNumeroCarte() {
                    return $this->numeroCarte;
                }

                function getPvCarte() {
                    return $this->pvCarte;
                }

                function getQualiteCarte() {
                    return $this->qualiteCarte;
                }

                function getDescriptionCarte() {
                    return $this->descriptionCarte;
                }

                function getEstReverseCarte() {
                    return $this->estReverseCarte;
                }

                function getCoteCarte() {
                    return $this->coteCarte;
                }

                function getPrixVenteCarte() {
                    return $this->prixVenteCarte;
                }

                function getFk_idCatalogue() {
                    return $this->fk_idCatalogue;
                }

                function getFk_idExtension() {
                    return $this->fk_idExtension;
                }

                function getDateAjoutCarte() {
                    return $this->dateAjoutCarte;
                }

                function getDisponibiliteCarte() {
                    return $this->disponibiliteCarte;
                }

                function getFk_idType() {
                    return $this->fk_idType;
                }

                function getRareteCarte() {
                    return $this->rareteCarte;
                }

                function getIllustrationDosCarte() {
                    return $this->illustrationDosCarte;
                }

                function getQuantiteCarte() {
                    return $this->quantiteCarte;
                }


                function setNomCarte($nomCarte) {
                    $this->nomCarte = $nomCarte;
                }

                function setIllustrationDevantCarte($illustrationDevantCarte) {
                    $this->illustrationDevantCarte = $illustrationDevantCarte;
                }

                function setNumeroCarte($numeroCarte) {
                    $this->numeroCarte = $numeroCarte;
                }

                function setPvCarte($pvCarte) {
                    $this->pvCarte = $pvCarte;
                }

                function setQualiteCarte($qualiteCarte) {
                    $this->qualiteCarte = $qualiteCarte;
                }

                function setDescriptionCarte($descriptionCarte) {
                    $this->descriptionCarte = $descriptionCarte;
                }

                function setEstReverseCarte($estReverseCarte) {
                    $this->estReverseCarte = $estReverseCarte;
                }

                function setCoteCarte($coteCarte) {
                    $this->coteCarte = $coteCarte;
                }

                function setPrixVenteCarte($prixVenteCarte) {
                    $this->prixVenteCarte = $prixVenteCarte;
                }

                function setFk_idCatalogue($fk_idCatalogue) {
                    $this->fk_idCatalogue = $fk_idCatalogue;
                }

                function setFk_idExtension($fk_idExtension) {
                    $this->fk_idExtension = $fk_idExtension;
                }

                function setDateAjoutCarte($dateAjoutCarte) {
                    $this->dateAjoutCarte = $dateAjoutCarte;
                }

                function setDisponibiliteCarte($disponibiliteCarte) {
                    $this->disponibiliteCarte = $disponibiliteCarte;
                }

                function setFk_idType($fk_idType) {
                    $this->fk_idType = $fk_idType;
                }

                function setRareteCarte($rareteCarte) {
                    $this->rareteCarte = $rareteCarte;
                }

                function setIllustrationDosCarte($illustrationDosCarte) {
                    $this->illustrationDosCarte = $illustrationDosCarte;
                }

                function setQuantiteCarte($quantiteCarte) {
                    $this->quantiteCarte = $quantiteCarte;
                }
	}

?>