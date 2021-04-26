<?php
	class Model_Modele extends TemplateDAO {
		
		public function getTable() {
			return "modele";
		}

		/* Differentes methodes CRUD modele   */
		public function obtenirListeModele() { 
			try {
				$stmt = $this->connexion->query("SELECT m.idModele as idModele, m.modele as modele, ma.marque as marque from modele m JOIN marque ma on m.idMarque = ma.idMarque");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
		public function obtenirFabricantModel($idModele){
			try {
				$stmt = $this->connexion->query("SELECT fabricant, idModele FROM modele 
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

		//Chercher  modèle par idMarque
		public function getListeModeleByMarque($idMarque) {
			try {
							$stmt = $this->connexion->query("SELECT idModele, idMarque,modele FROM modele where idMarque='" . $idMarque."'");
							$stmt->execute();
							return $stmt->fetchAll();
							//return 1; //L'utilisateur existe dans la BD
			
			}
						catch(Exception $exc) {
							return 0;
						}
			}

		// Ajouter un modèle dans la BD
		public function ajouteModele($idMarque, $model) {		
			try {
				$stmt = $this->connexion->prepare("INSERT INTO modele (idMarque,modele) VALUES (:idMarque, :model)");
				$stmt->bindParam(":idMarque", $idMarque);
				$stmt->bindParam(":model", $model);
				$stmt->execute();
				return $this->connexion->lastInsertId();
				//return 1;
			}	
			catch(Exception $exc) {
				return 0;
			}
		}


				// Supprimer modele dans la BD
		public function supprimerModele($id) {		
			try {
				$stmt = $this->connexion->prepare("DELETE FROM modele WHERE idModele=" . $id);
				$stmt->execute();
				return $stmt->rowCount();

			}
			catch(Exception $exc) {
				return 0;
			}
		}

		// Modifier un modèle dans la BD
		
		public function modifierModele($idModele,$idMarque,$model) {		
			try {
				$stmt = $this->connexion->prepare("UPDATE modele SET idMarque=:idMarque,modele=:model WHERE idModele=" . $idModele);
				$stmt->bindParam(":idMarque", $idMarque);
				$stmt->bindParam(":model", $model);
				$stmt->execute();

				return 1;
			}	
			catch(Exception $exc) {
				return 0;
			}
		}		









	}
?>