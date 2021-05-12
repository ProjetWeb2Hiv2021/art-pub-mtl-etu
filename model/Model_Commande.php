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

	}
?>