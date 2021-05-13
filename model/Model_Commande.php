<?php
	class Model_Commande extends TemplateDAO {
		
		public function getTable() {
			return "commande";
		}
		
		/* Differentes methodes CRUD commande */


		
		public function modifierStatutPayment($idCommande) {		
			try {
				$stmt = $this->connexion->prepare("UPDATE commande SET statutPayment=1 WHERE idModele=" . $idCommande);
				$stmt->execute();

				return 1;
			}	
			catch(Exception $exc) {
				return 0;
			}
		}
		public function ajouterCommande($idUtilisateur, $idModePaiement, $idExpedition, $dateCommande) {	
			try {
				$stmt = $this->connexion->prepare("INSERT INTO commande (idUtilisateur, idModePaiement, idExpedition, dateCommande, idStatut) VALUES (:idUtilisateur, :idModePaiement, :idExpedition, :dateCommande, 1)");
				
				$stmt->bindParam(":idUtilisateur", $idUtilisateur);
				$stmt->bindParam(":idModePaiement", $idModePaiement);
				$stmt->bindParam(":idExpedition", $idExpedition);
				$stmt->bindParam(":dateCommande", $dateCommande);
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