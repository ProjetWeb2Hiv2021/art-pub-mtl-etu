<<?php
	class Model_Expedition extends TemplateDAO {
		
		public function getTable() {
			return "expedition";
		}
		
		/* Differentes methodes CRUD  Ville  */
		public function obtenirListeExpedition() {
			
			try {
				$stmt = $this->connexion->query("SELECT * from expedition");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}

	}
?>