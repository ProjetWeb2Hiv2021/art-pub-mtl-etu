<?php
	class Model_Chassis extends TemplateDAO {
		
		public function getTable() {
			return "chassis";
		}
		
		/* Differentes methodes CRUD chassis   */
		public function obtenirListeChassis() {
			
			try {
				$stmt = $this->connexion->query("SELECT * from chassis where chassisStatut = 1;");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}

		//Obtenir chassis pad Id
		public function obtenirChassis($id) {
			
			try {
				$stmt = $this->connexion->query("SELECT * from chassis where idchassis=".$id);

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}

		// Ajouter un chassis dans la BD
		public function ajouteChassis($nomChassis) {		
			try {
				$stmt = $this->connexion->prepare("INSERT INTO chassis (chassisfr,chassisen) VALUES (:nomChassis,:nomChassis)");
				$stmt->bindParam(":nomChassis", $nomChassis);
				$stmt->execute();
				return 1;
			}	
			catch(Exception $exc) {
				return 0;
			}
		}


		// Supprimer Chassis dans la BD
		public function supprimerChassis($id) {
			try {
				//Vérifier si GroupeMotopropulseur existe dans la table voiture
				$existe = $this->chercherChassisdansVoiture($id) ;         
				if ($existe["cont"]  >= 1 )
				{					
					$stmt = $this->connexion->prepare("UPDATE chassis SET chassisStatut=0 WHERE idChassis=".$id);
					$stmt->execute();
				}
				else
				{	
						//$stmt = $this->connexion->prepare("DELETE FROM groupeMotopropulseur WHERE idGroupeMotopropulseur=" . $id);
						$stmt = $this->connexion->prepare("UPDATE chassis SET chassisStatut=0 WHERE idChassis=".$id);
						$stmt->execute();
				}

				return 1;
			}
			catch(Exception $exc) {
				return 0;
			}
		}

		// Modifier un chassis dans la BD
		
		public function modifierChassis($id,$nomChassis) {		
			try {
				$stmt = $this->connexion->prepare("UPDATE chassis SET chassisfr=:nomChassis,chassisen=:nomChassis WHERE idChassis=".$id);
				$stmt->bindParam(":nomChassis", $nomChassis);
				$stmt->execute();

				return 1;
			}	
			catch(Exception $exc) {
				return 0;
			}
		}

		//Chercher  chassis dans la table voiture
		public function chercherChassisdansVoiture($id) {
			try {
				$stmt = $this->connexion->query("SELECT count(*) cont FROM voiture where idChassis='" . $id."'");
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