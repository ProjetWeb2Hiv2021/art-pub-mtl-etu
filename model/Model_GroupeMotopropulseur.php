<?php
	class Model_GroupeMotopropulseur extends TemplateDAO {
		
		public function getTable() {
			return "groupeMotopropulseur";
		}
		
		/* Differentes methodes CRUD GroupeMotopropulseur   */
		public function obtenirListeGpm() {
			
			try {
				$stmt = $this->connexion->query("SELECT * from groupeMotopropulseur;");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
	}
?>