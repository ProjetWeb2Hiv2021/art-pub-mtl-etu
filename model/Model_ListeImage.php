<?php
	class Model_ListeImage extends TemplateDAO {
		
		public function getTable() {
			return "listeImage";
		}
		
		/* Differentes methodes CRUD transmission   */
		public function obtenirListeImage($idVoiture) {
			
			try {
				$stmt = $this->connexion->query("SELECT * from listeImage WHERE idVoiture=".$idVoiture.";");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
	}
?>