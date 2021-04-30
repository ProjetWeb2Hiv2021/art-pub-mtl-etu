<?php
	class Model_Marque extends TemplateDAO {
		
		public function getTable() {
			return "marque";
		}
		
		/* Differentes methodes CRUD marque */
		public function obtenirListeMarque() { 
			try {
				$stmt = $this->connexion->query("SELECT * from marque");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
		public function obtenirModelesMarque($idMarque){
			try {
				$stmt = $this->connexion->query("SELECT modele, idModele FROM marque 
												INNER JOIN modele on modele.idMarque = marque.idMarque
												WHERE marque.idMarque = $idMarque");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
		
	}
?>