<?php
	class Model_TypeCarburant extends TemplateDAO {
		
		public function getTable() {
			return "typecarburant";
		}
		
		/* Differentes methodes CRUD  typeCarburant  */
		public function obtenirListeTypeCarburant() {
			
			try {
				$stmt = $this->connexion->query("SELECT * from typeCarburant where tcStatut = 1;");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}

		//Obtenir typeCarburant par Id
		public function obtenirTypeCarburant($id) {
			
			try {
				$stmt = $this->connexion->query("SELECT * from typeCarburant where idTypeCarburant=".$id);

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}

		// Ajouter un typeCarburant dans la BD
		public function ajouteTypeCarburant($nomTC) {		
			try {
				$stmt = $this->connexion->prepare("INSERT INTO typeCarburant (typeCarburantfr,typeCarburanten) VALUES (:nomTC,:nomTC)");
				$stmt->bindParam(":nomTC", $nomTC);
				$stmt->execute();
				//return $this->connexion->lastInsertId();
				return 1;
			}	
			catch(Exception $exc) {
				return 0;
			}
		}


				// Supprimer TypeCarburant dans la BD
		public function supprimerTypeCarburant($id) {		
			try {
				//Vérifier si typeCarburant existe dans la table voiture
				$existe = $this->chercherTypeCarburantdansVoiture($id) ;         
				if ($existe["cont"]  >= 1 )
				{					
					$stmt = $this->connexion->prepare("UPDATE typeCarburant SET tcStatut=0 WHERE idTypeCarburant=".$id);
					$stmt->execute();
				}
				else
				{	
						//$stmt = $this->connexion->prepare("DELETE FROM typeCarburant WHERE idtypeCarburant=" . $id);
						$stmt = $this->connexion->prepare("UPDATE typeCarburant SET tcStatut=0 WHERE idTypeCarburant=".$id);
						$stmt->execute();
				}
				//return $stmt->rowCount();
				return 1;
			}
			catch(Exception $exc) {
				return 0;
			}
		}

		// Modifier un typeCarburant dans la BD
		
		public function modifierTC($id,$nomTC) {		
			try {
				$stmt = $this->connexion->prepare("UPDATE typeCarburant SET typeCarburantfr=:nomTC,typeCarburanten=:nomTC WHERE idTypeCarburant=".$id);
				$stmt->bindParam(":nomTC", $nomTC);
				$stmt->execute();

				return 1;
			}	
			catch(Exception $exc) {
				return 0;
			}
		}

		//Chercher  typeCarburant dans la table voiture
		public function chercherTypeCarburantdansVoiture($id) {
			try {
				$stmt = $this->connexion->query("SELECT count(*) cont FROM voiture where idTypeCarburant='" . $id."'");
				$stmt->execute();
				//return 1;
				return $stmt->fetch();
				//return 1; 
			
			}
			catch(Exception $exc) {
				return 0;
			}
		}
	}
?>