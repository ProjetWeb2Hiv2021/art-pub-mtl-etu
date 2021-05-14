<?php
	class Model_Marque extends TemplateDAO {
		
		public function getTable() {
			return "marque";
		}
		
		/* Differentes methodes CRUD marque */
		public function obtenirListeMarque() {
			try {
				
				$stmt = $this->connexion->query("SELECT * FROM marque");
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

		public function miseAJourMarque($idMarque, $nouvelleValeurMarque, $idFabricant, $statut){
			try {
				$stmt = $this->connexion->prepare("UPDATE marque SET idFabricant=:idFabricant,marque=:nouvelleValeurMarque,marqueStatut=:statut WHERE idMarque=:idMarque");
				$stmt->bindParam(":idMarque", $idMarque);
				$stmt->bindParam(":idFabricant", $idFabricant);
				$stmt->bindParam(":nouvelleValeurMarque", $nouvelleValeurMarque);
				$stmt->bindParam(":statut", $statut);
				$stmt->execute();

				return 1;
			}	
			catch(Exception $exc) {
				return 0;
			}
		}
		
		public function ajouterMarque($marque, $idFabricant, $statut){
			try {
				$stmt = $this->connexion->prepare("INSERT INTO marque (marque, idFabricant, marqueStatut) VALUES (:marque, :idFabricant, :statut)");
				$stmt->bindParam(":marque", $marque);
				$stmt->bindParam(":idFabricant", $idFabricant);
				$stmt->bindParam(":statut", $statut);
				$stmt->execute();
				/* return $this->connexion->lastInsertId(); */
				return 1;
			}	
			catch(Exception $exc) {
				return 0;
			}
		}
		
	}
?>