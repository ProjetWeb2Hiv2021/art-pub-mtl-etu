<?php
	class Model_Lignecommande extends TemplateDAO {
		
		public function getTable() {
			return "lignecommande";
		}
		
		/* Differentes methodes CRUD commande */


		public function ajouterLignecommande($idCommande, $idVoiture) {	
			try {
				$stmt = $this->connexion->prepare("INSERT INTO lignecommande (idCommande, idVoiture, quantite) VALUES (:idCommande, :idVoiture, 1)");
				
				$stmt->bindParam(":idCommande", $idCommande);
				$stmt->bindParam(":idVoiture", $idVoiture);
				
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