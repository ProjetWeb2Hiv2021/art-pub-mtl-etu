<?php
	class Model_ListeImage extends TemplateDAO {
		
		public function getTable() {
			return "listeImage";
		}
		
		/* Differentes methodes CRUD listeImage   */
		public function obtenirListeImage($idVoiture) {
			
			try {
				$stmt = $this->connexion->query("SELECT * from listeImage WHERE idVoiture=".$idVoiture.";");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
				// Ajouter un typeCarburant dans la BD
		public function ajouteListeImage($chemin, $id, $ordre) {		
			try {
				$stmt = $this->connexion->prepare("INSERT INTO listeImage (cheminFichier, idVoiture, ordre) VALUES (:cheminFichier, :idVoiture, :ordre)");
				$stmt->bindParam(":cheminFichier", $chemin);
				$stmt->bindParam(":idVoiture", $id);
				$stmt->bindParam(":ordre", $ordre);
				$stmt->execute();
				//return $this->connexion->lastInsertId();
				return 1;
			}	
			catch(Exception $exc) {
				return 0;
			}
		}
	}
?>