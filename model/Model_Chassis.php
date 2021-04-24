<?php
	class Model_Chassis extends TemplateDAO {
		
		public function getTable() {
			return "chassis";
		}
		
		/* Differentes methodes CRUD chassis   */
		public function obtenirListeChassis() {
			
			try {
				$stmt = $this->connexion->query("SELECT * from chassis;");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
	}
?>