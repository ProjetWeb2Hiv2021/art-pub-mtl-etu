<?php
	class Model_Fabricant extends TemplateDAO {
		
		public function getTable() {
			return "fabricant";
		}
		
		/* Differentes methodes CRUD fabricant  */
		public function obtenirListeFabricant() { 
			try {
				$stmt = $this->connexion->query("SELECT * from fabricant where statut = 1;");

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

		//Obtenir fabricant pad Id
		public function obtenirFabricant($id) {
			
			try {
				$stmt = $this->connexion->query("SELECT * from fabricant where idFabricant=".$id);

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}

		// Ajouter un fabricant dans la BD
		public function ajouteFabricant($nomFabricant) {		
			try {
				$stmt = $this->connexion->prepare("INSERT INTO fabricant (fabricant) VALUES (:nomFabricant)");
				$stmt->bindParam(":nomFabricant", $nomFabricant);
				$stmt->execute();
				return 1;
			}	
			catch(Exception $exc) {
				return 0;
			}
		}


		// Supprimer Fabricant dans la BD
		public function supprimerFabricant($id) {
			try {
				//Vérifier si GroupeMotopropulseur existe dans la table voiture
				$existe = $this->chercherFabricantdansMarque($id) ;         
				if ($existe["cont"]  >= 1 )
				{					
					$stmt = $this->connexion->prepare("UPDATE fabricant SET statut=0 WHERE idFabricant=".$id);
					$stmt->execute();
				}
				else
				{	
						//$stmt = $this->connexion->prepare("DELETE FROM fabricant WHERE idFabricant=" . $id);
						$stmt = $this->connexion->prepare("UPDATE fabricant SET statut=0 WHERE idFabricant=".$id);
						$stmt->execute();
				}

				return 1;
			}
			catch(Exception $exc) {
				return 0;
			}
		}

		// Modifier un fabricant dans la BD
		
		public function modifierFabricant($id,$nomFabricant) {		
			try {
				$stmt = $this->connexion->prepare("UPDATE fabricant SET fabricant=:nomFabricant WHERE idFabricant=".$id);
				$stmt->bindParam(":nomFabricant", $nomFabricant);
				$stmt->execute();

				return 1;
			}	
			catch(Exception $exc) {
				return 0;
			}
		}

		//Chercher  fabricant dans la table marque
		public function chercherFabricantdansMarque($id) {
			try {
				$stmt = $this->connexion->query("SELECT count(*) cont FROM fabricant where idFabricant='" . $id."'");
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