<?php
	class Model_TypeUtilisateur extends TemplateDAO {
		
		public function getTable() {
			return "typeutilisateur";
		}
		
		/* Differentes methodes CRUD  typeUtilisateur  */
		public function obtenirListeTypeUtilisateur() {
			
			try {
				$stmt = $this->connexion->query("SELECT * from typeUtilisateur;");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
        public function obtenirTypeUtilisateur($nomUtilisateur) {
			
			try {
				$stmt = $this->connexion->prepare("SELECT t.typeUtilisateur from typeUtilisateur t JOIN utilisateur u ON t.idTypeUtilisateur = u.idUtilisateur WHERE u.nomUtilisateur =:nomUtilisateur;");
                $stmt->bindParam(":nomUtilisateur",$nomUtilisateur);
				$stmt->execute();
				return $stmt->fetch();

			}
			catch(Exception $exc) {
				return 0;
			}
		}
	}
?>