<?php
	class Model_Modele extends TemplateDAO {
		
		public function getTable() {
			return "modele";
		}

		/* Differentes methodes CRUD modele   */
		public function obtenirListeModele() { 
			try {
				$stmt = $this->connexion->query("SELECT * from modele");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
		public function obtenirModelesFabricant($idFabricant){
			try {
				$stmt = $this->connexion->query("SELECT modele, idModele FROM fabricant 
												INNER JOIN marque ON marque.idFabricant = fabricant.idFabricant
												INNER JOIN modele on modele.idMarque = marque.idMarque
												WHERE fabricant.idFabricant = $idFabricant");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
		
	}
?>