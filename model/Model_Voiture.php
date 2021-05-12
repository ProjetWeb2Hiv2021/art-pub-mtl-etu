<?php
	class Model_Voiture extends TemplateDAO {
		
		public function getTable() {
			return "voiture";
		}
		
		/* Differentes methodes CRUD voiture */
		public function getListeVoiture() {
			
			try {
				$stmt = $this->connexion->query("SELECT * from voiture
												INNER JOIN groupeMotopropulseur on groupeMotopropulseur.idGroupemotopropulseur = voiture.idGroupemotopropulseur
												INNER JOIN chassis on chassis.idChassis = voiture.idChassis
												INNER JOIN statut on statut.idStatut = voiture.idStatut
												INNER JOIN modele on modele.idModele = voiture.idModele
												INNER JOIN marque on marque.idMarque = modele.idMarque
												INNER JOIN fabricant on fabricant.idFabricant = marque.idFabricant
												INNER JOIN listeImage on listeImage.idVoiture = voiture.idVoiture
												WHERE listeImage.idVoiture = voiture.idVoiture AND listeImage.ordre = 1 AND voiture.idStatut = 3
												order by voiture.dateArrivee DESC LIMIT 12");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}

		public function obtenirPlusDeVoitures($offset) {
			
			try {
				$stmt = $this->connexion->query("SELECT * from voiture
												INNER JOIN groupeMotopropulseur on groupeMotopropulseur.idGroupemotopropulseur = voiture.idGroupemotopropulseur
												INNER JOIN chassis on chassis.idChassis = voiture.idChassis
												INNER JOIN statut on statut.idStatut = voiture.idStatut
												INNER JOIN modele on modele.idModele = voiture.idModele
												INNER JOIN marque on marque.idMarque = modele.idMarque
												INNER JOIN fabricant on fabricant.idFabricant = marque.idFabricant
												INNER JOIN listeImage on listeImage.idVoiture = voiture.idVoiture
												WHERE listeImage.idVoiture = voiture.idVoiture AND listeImage.ordre = 1 AND voiture.idStatut = 3
												order by voiture.dateArrivee DESC LIMIT 12 OFFSET $offset");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				
				return 0;
			}
		}
 

		public function obtenirRechercheVoiture($idModele, $idMarque, $anneeMin, $anneeMax, $prixMin, $prixMax) {
			try {
				if(isset($idModele) && isset($idMarque) && isset($anneeMin) && isset($anneeMax) && isset($prixMin) && isset($prixMax)){
					if($idModele == "NaN" && $idMarque !== "NaN"){
						$stmt = $this->connexion->prepare("SELECT * from voiture 
														INNER JOIN groupeMotopropulseur on groupeMotopropulseur.idGroupemotopropulseur = voiture.idGroupemotopropulseur 
														INNER JOIN chassis on chassis.idChassis = voiture.idChassis 
														INNER JOIN statut on statut.idStatut = voiture.idStatut 
														INNER JOIN modele on modele.idModele = voiture.idModele 
														INNER JOIN marque on marque.idMarque = modele.idMarque 

														INNER JOIN listeimage on listeimage.idVoiture = voiture.idVoiture 
														WHERE listeimage.idVoiture = voiture.idVoiture AND listeimage.ordre = 1 
														AND marque.idMarque = :mar AND voiture.annee BETWEEN :anmin AND :anmax AND voiture.idStatut = 3

														AND voiture.prixVente BETWEEN :primin AND :primax
														order by voiture.dateArrivee DESC");			

						$stmt->bindParam(":mar", $idMarque);
						$stmt->bindParam(":anmin", $anneeMin);
						$stmt->bindParam(":anmax", $anneeMax);
						$stmt->bindParam(":primin", $prixMin);
						$stmt->bindParam(":primax", $prixMax);

						$stmt->execute();
						return $stmt->fetchAll();

					}else if($idModele == "NaN" && $idMarque == "NaN"){
						$stmt = $this->connexion->prepare("SELECT * from voiture
														INNER JOIN groupeMotopropulseur on groupeMotopropulseur.idGroupemotopropulseur = voiture.idGroupemotopropulseur
														INNER JOIN chassis on chassis.idChassis = voiture.idChassis
														INNER JOIN statut on statut.idStatut = voiture.idStatut
														INNER JOIN modele on modele.idModele = voiture.idModele
														INNER JOIN marque on marque.idMarque = modele.idMarque

														INNER JOIN listeimage on listeimage.idVoiture = voiture.idVoiture

														WHERE listeimage.idVoiture = voiture.idVoiture AND listeimage.ordre = 1 AND voiture.idStatut = 3

														AND voiture.annee BETWEEN :anmin AND :anmax
														AND voiture.prixVente BETWEEN :primin AND :primax
														order by voiture.dateArrivee  DESC");
						
															
						$stmt->bindParam(":anmin", $anneeMin);
						$stmt->bindParam(":anmax", $anneeMax);
						$stmt->bindParam(":primin", $prixMin);
						$stmt->bindParam(":primax", $prixMax);
						$stmt->execute();
						return $stmt->fetchAll();

					}
					else{
						$stmt = $this->connexion->prepare("SELECT * from voiture
														INNER JOIN groupeMotopropulseur on groupeMotopropulseur.idGroupemotopropulseur = voiture.idGroupemotopropulseur
														INNER JOIN chassis on chassis.idChassis = voiture.idChassis
														INNER JOIN statut on statut.idStatut = voiture.idStatut
														INNER JOIN modele on modele.idModele = voiture.idModele
														INNER JOIN marque on marque.idMarque = modele.idMarque

														INNER JOIN listeimage on listeimage.idVoiture = voiture.idVoiture

														WHERE listeimage.idVoiture = voiture.idVoiture AND listeimage.ordre = 1 
														AND voiture.idModele = :mod AND voiture.annee BETWEEN :anmin AND :anmax AND voiture.idStatut = 3

														AND voiture.prixVente BETWEEN :primin AND :primax
														order by voiture.dateArrivee  DESC");
						$stmt->bindParam(":mod", $idModele);
						$stmt->bindParam(":anmin", $anneeMin);
						$stmt->bindParam(":anmax", $anneeMax);
						$stmt->bindParam(":primin", $prixMin);
						$stmt->bindParam(":primax", $prixMax);

						$stmt->execute();
						return $stmt->fetchAll();

					}
				}
			}
			catch(Exception $exc) {
				

				return 0;
			}
		}

		public function obtenirVoiture($id) {
			
			
			try {
				$sql = 	"SELECT * from voiture v 
												JOIN groupeMotopropulseur gpm on gpm.idGroupemotopropulseur = v.idGroupemotopropulseur
												JOIN chassis c on c.idChassis = v.idChassis
												JOIN typeCarburant t on t.idTypeCarburant = v.idTypeCarburant
												JOIN statut s on s.idStatut = v.idStatut												
												JOIN transmission tr on tr.idtransmission = v.idtransmission																								
												JOIN modele m on m.idModele = v.idModele
												JOIN marque ma on ma.idMarque = m.idMarque
												JOIN fabricant f on f.idFabricant = ma.idFabricant
												WHERE v.idVoiture =" .$id.";";
				
												
				$stmt = $this->connexion->prepare($sql);																
				
				$stmt->execute();
				
				return $stmt->fetch();

			}
			catch(Exception $exc) {			

				return 0;
			}
		}
		public function obtenirListeVoitureVedette() {
			
			try {
				$stmt = $this->connexion->query("SELECT * from voiture
												INNER JOIN groupeMotopropulseur on groupeMotopropulseur.idGroupemotopropulseur = voiture.idGroupemotopropulseur
												INNER JOIN chassis on chassis.idChassis = voiture.idChassis
												INNER JOIN statut on statut.idStatut = voiture.idStatut
												INNER JOIN modele on modele.idModele = voiture.idModele
												INNER JOIN marque on marque.idMarque = modele.idMarque
												INNER JOIN fabricant on fabricant.idFabricant = marque.idFabricant
												INNER JOIN listeImage on listeImage.idVoiture = voiture.idVoiture
												WHERE listeImage.idVoiture = voiture.idVoiture AND listeImage.ordre = 1 AND voiture.vedette = 1 AND voiture.idStatut = 3
												order by voiture.dateArrivee");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
		public function obtenirNombreVoitures() {
			try {
				$stmt = $this->connexion->prepare("SELECT COUNT(*) as nombrevoitures FROM voiture");
				$stmt->execute();
				return $stmt->fetch();
			}	
			catch (Exception $exc) {
				return 0;
			}
		}
		public function obtenirVoituresParAnnee() {
			$stmt = $this->connexion->query("SELECT * from voiture
												INNER JOIN groupeMotopropulseur on groupeMotopropulseur.idGroupemotopropulseur = voiture.idGroupemotopropulseur
												INNER JOIN chassis on chassis.idChassis = voiture.idChassis
												INNER JOIN statut on statut.idStatut = voiture.idStatut
												INNER JOIN modele on modele.idModele = voiture.idModele
												INNER JOIN marque on marque.idMarque = modele.idMarque
												INNER JOIN fabricant on fabricant.idFabricant = marque.idFabricant
												INNER JOIN listeImage on listeImage.idVoiture = voiture.idVoiture
												WHERE listeImage.idVoiture = voiture.idVoiture AND listeImage.ordre = 1 AND voiture.idStatut = 3
												order by voiture.annee DESC");
				$stmt->execute();
				return $stmt->fetchAll();
		}
		public function obtenirVoituresParMarque() {
			$stmt = $this->connexion->query("SELECT * from voiture
												INNER JOIN groupeMotopropulseur on groupeMotopropulseur.idGroupemotopropulseur = voiture.idGroupemotopropulseur
												INNER JOIN chassis on chassis.idChassis = voiture.idChassis
												INNER JOIN statut on statut.idStatut = voiture.idStatut
												INNER JOIN modele on modele.idModele = voiture.idModele
												INNER JOIN marque on marque.idMarque = modele.idMarque
												INNER JOIN fabricant on fabricant.idFabricant = marque.idFabricant
												INNER JOIN listeImage on listeImage.idVoiture = voiture.idVoiture
												WHERE listeImage.idVoiture = voiture.idVoiture AND listeImage.ordre = 1 AND voiture.idStatut = 3
												order by marque.marque ASC");
				$stmt->execute();
				return $stmt->fetchAll();
		}
		public function obtenirVoituresParModele() {
			$stmt = $this->connexion->query("SELECT * from voiture
												INNER JOIN groupeMotopropulseur on groupeMotopropulseur.idGroupemotopropulseur = voiture.idGroupemotopropulseur
												INNER JOIN chassis on chassis.idChassis = voiture.idChassis
												INNER JOIN statut on statut.idStatut = voiture.idStatut
												INNER JOIN modele on modele.idModele = voiture.idModele
												INNER JOIN marque on marque.idMarque = modele.idMarque
												INNER JOIN fabricant on fabricant.idFabricant = marque.idFabricant
												INNER JOIN listeImage on listeImage.idVoiture = voiture.idVoiture
												WHERE listeImage.idVoiture = voiture.idVoiture AND listeImage.ordre = 1 AND voiture.idStatut = 3
												order by modele.modele ASC");
				$stmt->execute();
				return $stmt->fetchAll();
		}
		public function ajouterVoiture(	$vin, 
										$prixVente, 
										$annee, 
										$dateArrivee, 
										$prixPaye, 
										$km, 
										$couleurfr, 
										$couleuren, 
										$vedette, 
										$idGroupeMotopropulseur,
										$idTypeCarburant,
										$idChassis, 
                            			$idModele, 										
										$idTransmission, 										 
										$idStatut) {

			try {
				$stmt = $this->connexion->prepare("INSERT INTO voiture (
										vin, 
										prixVente, 
										annee, 
										dateArrivee, 
										prixPaye, 
										km, 
										couleurfr, 
										couleuren, 
										vedette,
										idGroupeMotopropulseur, 
                    					idTypeCarburant, 
										idChassis, 
										idModele, 										
										idTransmission, 										
										idStatut) 
					VALUES (			:vin, 
										:prixVente, 
										:annee, 
										:dateArrivee, 
										:prixPaye, 
										:km, 
										:couleurfr, 
										:couleuren, 
										:vedette,
										:idGroupeMotopropulseur, 
                    					:idTypeCarburant, 
										:idChassis, 
										:idModele, 										
										:idTransmission, 										
										:idStatut)");
				
				$stmt->bindParam(":vin", $vin);
				$stmt->bindParam(":prixVente", $prixVente);
				$stmt->bindParam(":annee", $annee);
				$stmt->bindParam(":dateArrivee", $dateArrivee);
				$stmt->bindParam(":prixPaye", $prixPaye);
				$stmt->bindParam(":km", $km);
				$stmt->bindParam(":couleurfr", $couleurfr);
				$stmt->bindParam(":couleuren", $couleuren);
				$stmt->bindParam(":vedette", $vedette);
				$stmt->bindParam(":idGroupeMotopropulseur", $idGroupeMotopropulseur);
				$stmt->bindParam(":idTypeCarburant", $idTypeCarburant);
				$stmt->bindParam(":idChassis", $idChassis);
				$stmt->bindParam(":idModele", $idModele);				
				$stmt->bindParam(":idTransmission", $idTransmission);				
				$stmt->bindParam(":idStatut", $idStatut);				
				 /* var_dump($stmt, "vin ". $vin, 
								"; prixVente ". $prixVente, 
								"; annee ".$annee, 
								"; dateArrivee ".$dateArrivee, 
								"; prixPaye ".$prixPaye, 
								"; km ".$km, 
								"; couleurfr ".$couleurfr,
								"; couleuren ". $couleuren,
								"; vedette ". $vedette, 
								"; idGroupeMotopropulseur ".$idGroupeMotopropulseur,
								"; idTypeCarburant ".$idTypeCarburant,
								"; idChassis ". $idChassis, 
                            	"; idModele ". $idModele, 								
								"; idTransmission ".$idTransmission, 
								"; idStatut ". $idStatut);  */
				$stmt->execute();
				$dernier = $this->connexion->lastInsertId();
				return $dernier;
			}	
			catch(Exception $exc) {
				 /* echo $exc->getMessage();  */ 
				return 0;
			}
		}
		public function modifierVoiture($vin, $prixVente, $annee, $dateArrivee, $prixPaye, $km, $couleurfr, $couleuren, $vedette, $idTypeCarburant,
                            $idModele, $idChassis, $idTransmission, $idGroupeMotopropulseur, $idStatut, $id) {

			try {
				$stmt = $this->connexion->prepare("	 UPDATE voiture 
														SET vin=:vin, 
															prixVente=:prixVente, 
															annee=:annee, 
															dateArrivee=:dateArrivee, 
															prixPaye=:prixPaye, 
															km=:km, 
															couleurfr=:couleurfr, 
															couleuren=:couleuren, 
															vedette=:vedette,
                    										idTypeCarburant=:idTypeCarburant, 
															idModele=:idModele, 
															idChassis=:idChassis, 
															idTransmission=:idTransmission, 
															idGroupeMotopropulseur=:idGroupeMotopropulseur, 
															idStatut=:idStatut 
													  WHERE idVoiture=".$id.";");
				
				$stmt->bindParam(":vin", $vin);
				$stmt->bindParam(":prixVente", $prixVente);
				$stmt->bindParam(":annee", $annee);
				$stmt->bindParam(":dateArrivee", $dateArrivee);
				$stmt->bindParam(":prixPaye", $prixPaye);
				$stmt->bindParam(":km", $km);
				$stmt->bindParam(":couleurfr", $couleurfr);
				$stmt->bindParam(":couleuren", $couleuren);
				$stmt->bindParam(":vedette", $vedette);
				$stmt->bindParam(":idTypeCarburant", $idTypeCarburant);
				$stmt->bindParam(":idModele", $idModele);
				$stmt->bindParam(":idChassis", $idChassis);
				$stmt->bindParam(":idTransmission", $idTransmission);
				$stmt->bindParam(":idGroupeMotopropulseur", $idGroupeMotopropulseur);
				$stmt->bindParam(":idStatut", $idStatut);				
				
				$stmt->execute();

				return 1;
			}	
			catch(Exception $exc) {
				 
				return 0;
			}
		}
		
	}
?>