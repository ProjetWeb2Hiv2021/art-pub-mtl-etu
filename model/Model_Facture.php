<?php
	class Model_Facture extends TemplateDAO {
		
		public function getTable() {
			return "facture";
		}
		
		/* Differentes methodes CRUD facture */
		public function ajouterFacture($idCommande) {	
			try {
				$stmt = $this->connexion->prepare("INSERT INTO facture (idCommande) VALUES (:idCommande)");
				
				$stmt->bindParam(":idCommande", $idCommande);

				
				$stmt->execute();
				$idCommande = $this->connexion->lastInsertId();
				return $idCommande;
				
			}	
			catch(Exception $exc) {
				return 0;
			}
		}
	}
?>