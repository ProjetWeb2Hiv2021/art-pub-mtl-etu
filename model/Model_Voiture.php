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
												INNER JOIN modele on modele.idModele = voiture.idModele
												INNER JOIN marque on marque.idMarque = modele.idMarque
												INNER JOIN fabricant on fabricant.idFabricant = marque.idFabricant
												order by voiture.dateArrivee");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
		
	}
?>