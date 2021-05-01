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
 

		public function obtenirRechercheVoiture($idModele, $idFabricant, $anneeMin, $anneeMax, $prixMin, $prixMax) {
			try {
				if(isset($idModele) && isset($idFabricant) && isset($anneeMin) && isset($anneeMax) && isset($prixMin) && isset($prixMax)){
					if($idModele == "NaN" && $idFabricant !== "NaN"){
						$stmt = $this->connexion->prepare("SELECT * from voiture 
														INNER JOIN groupemotopropulseur on groupemotopropulseur.idGroupemotopropulseur = voiture.idGroupemotopropulseur 
														INNER JOIN chassis on chassis.idChassis = voiture.idChassis 
														INNER JOIN statut on statut.idStatut = voiture.idStatut 
														INNER JOIN modele on modele.idModele = voiture.idModele 
														INNER JOIN marque on marque.idMarque = modele.idMarque 
														INNER JOIN fabricant on fabricant.idFabricant = marque.idFabricant 
														INNER JOIN listeimage on listeimage.idVoiture = voiture.idVoiture 
														WHERE listeimage.idVoiture = voiture.idVoiture AND listeimage.ordre = 1 
														AND marque.idFabricant = :fab AND voiture.annee BETWEEN :anmin AND :anmax AND voiture.idStatut = 3
														AND voiture.prixVente BETWEEN :primin AND :primax
														order by voiture.dateArrivee DESC");			
						$stmt->bindParam(":fab", $idFabricant);
						$stmt->bindParam(":anmin", $anneeMin);
						$stmt->bindParam(":anmax", $anneeMax);
						$stmt->bindParam(":primin", $prixMin);
						$stmt->bindParam(":primax", $prixMax);

						$stmt->execute();
						return $stmt->fetchAll();

					}else if($idModele == "NaN" && $idFabricant == "NaN"){
						$stmt = $this->connexion->prepare("SELECT * from voiture
														INNER JOIN groupemotopropulseur on groupemotopropulseur.idGroupemotopropulseur = voiture.idGroupemotopropulseur
														INNER JOIN chassis on chassis.idChassis = voiture.idChassis
														INNER JOIN statut on statut.idStatut = voiture.idStatut
														INNER JOIN modele on modele.idModele = voiture.idModele
														INNER JOIN marque on marque.idMarque = modele.idMarque
														INNER JOIN fabricant on fabricant.idFabricant = marque.idFabricant
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
														INNER JOIN groupemotopropulseur on groupemotopropulseur.idGroupemotopropulseur = voiture.idGroupemotopropulseur
														INNER JOIN chassis on chassis.idChassis = voiture.idChassis
														INNER JOIN statut on statut.idStatut = voiture.idStatut
														INNER JOIN modele on modele.idModele = voiture.idModele
														INNER JOIN marque on marque.idMarque = modele.idMarque
														INNER JOIN fabricant on fabricant.idFabricant = marque.idFabricant
														INNER JOIN listeimage on listeimage.idVoiture = voiture.idVoiture
														WHERE listeimage.idVoiture = voiture.idVoiture AND listeimage.ordre = 1 
														AND voiture.idModele = :mod AND marque.idFabricant = :fab AND voiture.annee BETWEEN :anmin AND :anmax AND voiture.idStatut = 3
														AND voiture.prixVente BETWEEN :primin AND :primax
														order by voiture.dateArrivee  DESC");
						$stmt->bindParam(":mod", $idModele);
						$stmt->bindParam(":fab", $idFabricant);
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
				var_dump($exc->getMessage());

				return 0;
			}
		}

		public function obtenirVoiture($id) {
			
			
			try {
				$sql = 	"SELECT * from voiture v 
												JOIN groupemotopropulseur gpm on gpm.idGroupemotopropulseur = v.idGroupemotopropulseur
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
				var_dump($exc->getMessage());

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
		
	}
?>