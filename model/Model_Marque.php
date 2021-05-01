<?php
	class Model_Marque extends TemplateDAO {
		
		public function getTable() {
			return "marque";
		}
		
		/* Differentes methodes CRUD marque */
		public function obtenirListeMarque() {
			try {
				
				$stmt = $this->connexion->query("SELECT * FROM marque");
				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
		public function obtenirMarque() {
			try {
				
				$stmt = $this->connexion->query("SELECT * FROM marque");
				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
		
	}
?>