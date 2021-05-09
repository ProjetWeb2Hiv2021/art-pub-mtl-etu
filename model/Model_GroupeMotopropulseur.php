<?php
	class Model_GroupeMotopropulseur extends TemplateDAO {
		
		public function getTable() {
			return "groupeMotopropulseur";
		}
		
		/* Differentes methodes CRUD GroupeMotopropulseur   */
		public function obtenirListeGpm() {
			
			try {
				$stmt = $this->connexion->query("SELECT * from groupeMotopropulseur where statut = 1");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}

		//Obtenir groupeMotopropulseur par Id
		public function obtenirGpm($id) {
			
			try {
				$stmt = $this->connexion->query("SELECT * from groupeMotopropulseur where idGroupeMotopropulseur=".$id);

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}

		// Ajouter un groupeMotoPropulseur dans la BD
		public function ajouteGpm($nomGpm) {		
			try {
				$stmt = $this->connexion->prepare("INSERT INTO groupeMotopropulseur (groupeMotopropulseur) VALUES (:nomGpm)");
				$stmt->bindParam(":nomGpm", $nomGpm);
				$stmt->execute();
				//return $this->connexion->lastInsertId();
				return 1;
			}	
			catch(Exception $exc) {
				return 0;
			}
		}


				// Supprimer modele dans la BD
		public function supprimerGpm($id) {		
			try {
				//Vérifier si GroupeMotopropulseur existe dans la table voiture
				$existe = $this->chercherGroupeMotopropulseurdansVoiture($id) ;         
				if ($existe["cont"]  >= 1 )
				{					
					$stmt = $this->connexion->prepare("UPDATE groupeMotopropulseur SET statut=0 WHERE idGroupeMotopropulseur=".$id);
					$stmt->execute();
				}
				else
				{	
						//$stmt = $this->connexion->prepare("DELETE FROM groupeMotopropulseur WHERE idGroupeMotopropulseur=" . $id);
						$stmt = $this->connexion->prepare("UPDATE groupeMotopropulseur SET statut=0 WHERE idGroupeMotopropulseur=".$id);
						$stmt->execute();
				}
				//return $stmt->rowCount();
				return 1;
			}
			catch(Exception $exc) {
				return 0;
			}
		}

		// Modifier un GroupeMotopropulseurèle dans la BD
		
		public function modifierGpm($id,$nomGpm) {		
			try {
				$stmt = $this->connexion->prepare("UPDATE groupeMotopropulseur SET groupeMotopropulseur=:nomGpm WHERE idGroupeMotopropulseur=".$id);
				//$stmt->bindParam(":idGpm", $id);
				$stmt->bindParam(":nomGpm", $nomGpm);
				$stmt->execute();

				return 1;
			}	
			catch(Exception $exc) {
				return 0;
			}
		}

		//Chercher  GroupeMotopropulseur dans la table voiture
		public function chercherGroupeMotopropulseurdansVoiture($id) {
			try {
				$stmt = $this->connexion->query("SELECT count(*) cont FROM voiture where idGroupeMotopropulseur='" . $id."'");
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