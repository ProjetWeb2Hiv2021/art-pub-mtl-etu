<?php
	class Model_Fabricant extends TemplateDAO {
		
		public function getTable() {
			return "fabricant";
		}
		
		/* Differentes methodes CRUD fabricant  */
		public function obtenirListeFabricant() { 
			try {
				$stmt = $this->connexion->query("SELECT * from fabricant");

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