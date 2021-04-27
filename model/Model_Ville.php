<?php
	class Model_Ville extends TemplateDAO {
		
		public function getTable() {
			return "ville";
		}
		
		/* Differentes methodes CRUD  Ville  */
		public function obtenirListeVille() {
			
			try {
				$stmt = $this->connexion->query("SELECT * from ville");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}

	}
?>