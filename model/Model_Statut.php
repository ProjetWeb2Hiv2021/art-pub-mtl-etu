<?php
	class Model_Statut extends TemplateDAO {
		
		public function getTable() {
			return "statut";
		}
		
		/* Differentes methodes CRUD statut  */
		public function obtenirListeStatut() {
			
			try {
				$stmt = $this->connexion->query("SELECT * from statut;");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
	}
?>