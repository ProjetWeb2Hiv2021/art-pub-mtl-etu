<?php
	class Model_Province extends TemplateDAO {
		
		public function getTable() {
			return "province";
		}
		
		/* Differentes methodes CRUD  Province  */
		public function obtenirListeProvince() {
			
			try {
				$stmt = $this->connexion->query("SELECT * from province");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
	}
?>