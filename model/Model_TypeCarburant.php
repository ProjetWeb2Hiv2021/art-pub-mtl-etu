<?php
	class Model_TypeCarburant extends TemplateDAO {
		
		public function getTable() {
			return "typecarburant";
		}
		
		/* Differentes methodes CRUD  typeCarburant  */
		public function obtenirListeTypeCarburant() {
			
			try {
				$stmt = $this->connexion->query("SELECT * from typecarburant;");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
	}
?>