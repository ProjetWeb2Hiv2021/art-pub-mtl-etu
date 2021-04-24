<?php
	class Model_Transmission extends TemplateDAO {
		
		public function getTable() {
			return "transmission";
		}
		
		/* Differentes methodes CRUD transmission   */
		public function obtenirListeTransmission() {
			
			try {
				$stmt = $this->connexion->query("SELECT * from transmission;");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
	}
?>