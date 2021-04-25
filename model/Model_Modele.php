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
		public function obtenirFabricantModel($idModele){
			try {
				$stmt = $this->connexion->query("SELECT fabricant, fabricant.idFabricant FROM modele 
												INNER JOIN marque ON modele.idMarque = marque.idMarque 
												INNER JOIN fabricant on fabricant.idFabricant = marque.idFabricant 
												WHERE idModele = $idModele");
				
				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
		
	}
?>