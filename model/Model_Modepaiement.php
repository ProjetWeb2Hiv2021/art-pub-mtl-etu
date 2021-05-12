<?php
	class Model_Modepaiement extends TemplateDAO {
		
		public function getTable() {
			return "modepaiement";
		}
		
		/* Differentes methodes CRUD  Ville  */
		public function obtenirListeModepaiement() {
			
			try {
				$stmt = $this->connexion->query("SELECT * from modepaiement");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}

	}
?>