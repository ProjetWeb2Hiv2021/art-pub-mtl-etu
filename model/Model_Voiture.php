<?php
	class Model_Voiture extends TemplateDAO {
		
		public function getTable() {
			return "voiture";
		}
		
		/* Differentes methodes CRUD voiture */
		public function getListeVoiture() {
			
			try {
				$stmt = $this->connexion->query("SELECT * from voiture
												INNER JOIN groupemotopropulseur on groupemotopropulseur.idGroupemotopropulseur = voiture.idGroupemotopropulseur
												INNER JOIN chassis on chassis.idChassis = voiture.idChassis
												INNER JOIN statut on statut.idStatut = voiture.idStatut
												INNER JOIN modele on modele.idModele = voiture.idModele
												INNER JOIN marque on marque.idMarque = modele.idMarque
												INNER JOIN fabricant on fabricant.idFabricant = marque.idFabricant
												INNER JOIN listeimage on listeimage.idVoiture = voiture.idVoiture
												WHERE listeimage.idVoiture = voiture.idVoiture AND listeimage.ordre = 1
												order by voiture.dateArrivee");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
		public function obtenirRechercheVoiture($idModele, $idFabricant, $anneeMin, $anneeMax, $prixMin, $prixMax) {
			try {
				$stmt = $this->connexion->query("SELECT * from voiture
												INNER JOIN groupemotopropulseur on groupemotopropulseur.idGroupemotopropulseur = voiture.idGroupemotopropulseur
												INNER JOIN chassis on chassis.idChassis = voiture.idChassis
												INNER JOIN statut on statut.idStatut = voiture.idStatut
												INNER JOIN modele on modele.idModele = voiture.idModele
												INNER JOIN marque on marque.idMarque = modele.idMarque
												INNER JOIN fabricant on fabricant.idFabricant = marque.idFabricant
												INNER JOIN listeimage on listeimage.idVoiture = voiture.idVoiture
												WHERE listeimage.idVoiture = voiture.idVoiture AND listeimage.ordre = 1 
												AND voiture.idModele = $idModele AND marque.idFabricant = $idFabricant AND voiture.annee BETWEEN $anneeMin AND $anneeMax
												AND voiture.prixVente BETWEEN $prixMin AND $prixMax
												order by voiture.dateArrivee");
				/* $stmt->bindParam(":mod", $idModele);
				$stmt->bindParam(":fab", $idFabricant);
				$stmt->bindParam(":anmin", $anneeMin);
				$stmt->bindParam(":anmax", $anneeMax);
				$stmt->bindParam(":primin", $prixMin);
				$stmt->bindParam(":primax", $prixMax); */

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
		
	}
?>