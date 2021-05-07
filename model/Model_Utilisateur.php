<?php
	class Model_Utilisateur extends TemplateDAO {
		
		public function getTable() {
			return "utilisateur";
		}
		function authentification($nomUtilisateur, $motPasse)
    	{	    
    
			//déterminer si la combinaison username / password est valide
			$requete = "SELECT motPasse FROM utilisateur WHERE nomUtilisateur=:nomUtilisateur";
			$requetePreparee = $this->connexion->prepare($requete);
			$requetePreparee->bindParam(":nomUtilisateur",$nomUtilisateur);
			$requetePreparee->execute();        
			$rangee = $requetePreparee->fetch();
			
			//y'a-t-il une rangée retournée (est-ce que l'usager avec ce username existe?)
			if($rangee)
			{
				
				//utiliser password_verify pour comparer le mot de passe tapé par l'usager avec le mot de passe encrypté contenu dans la base de données
				if(password_verify($motPasse, $rangee["motPasse"]))
					return true;
			}
			
			return false; 
    	}
		/* Differentes methodes CRUD utilisateur */
		public function obtenirListeUtilisateur() {
			
			try {
				$stmt = $this->connexion->query("SELECT * from utilisateur");

				$stmt->execute();
				return $stmt->fetchAll();

			}
			catch(Exception $exc) {
				return 0;
			}
		}

		public function ajouterUtilisateur($nomUtilisateur, $motPasse, $prenom, $nomFamille, $courriel, $dateNaissance, $telephone) {

			try {
				$stmt = $this->connexion->prepare("INSERT INTO utilisateur (nomUtilisateur, motPasse, prenom, nomFamille, courriel, dateNaissance, telephone) VALUES (:nomUtilisateur, :motPasse, :prenom, :nomFamille, :courriel, :dateNaissance, :telephone)");
				
				$stmt->bindParam(":nomUtilisateur", $nomUtilisateur);
				$stmt->bindParam(":motPasse", $motPasse);
				$stmt->bindParam(":prenom", $prenom);
				$stmt->bindParam(":nomFamille", $nomFamille);
				$stmt->bindParam(":courriel", $courriel);
				$stmt->bindParam(":dateNaissance", $dateNaissance);
				$stmt->bindParam(":telephone", $telephone);

				$stmt->execute();

				return 1;
			}	
			catch(Exception $exc) {
				return 0;
			}
		}
		public function ajouterUtilisateurAdmin($nomUtilisateur, $motPasse, $prenom, $nomFamille, $courriel, $dateNaissance, $noCivique,
		$rue, $codePostal, $telephone, $telephonePortable, $idTypeUtilisateur, $idVille, $idProvince) {

		   try {
			   $stmt = $this->connexion->prepare("INSERT INTO utilisateur (nomUtilisateur, motPasse, prenom, nomFamille, courriel, dateNaissance, noCivique, rue, codePostal, telephone, telephonePortable, idTypeUtilisateur, idVille, idProvince) VALUES (:nomUtilisateur, :motPasse, :prenom, :nomFamille, :courriel, :dateNaissance, :noCivique, :rue, :codePostal, :telephone, :telephonePortable, :idTypeUtilisateur, :idVille, :idProvince)");
			   
			   $stmt->bindParam(":nomUtilisateur", $nomUtilisateur);
			   $stmt->bindParam(":motPasse", $motPasse);
			   $stmt->bindParam(":prenom", $prenom);
			   $stmt->bindParam(":nomFamille", $nomFamille);
			   $stmt->bindParam(":courriel", $courriel);
			   $stmt->bindParam(":dateNaissance", $dateNaissance);
			   $stmt->bindParam(":noCivique", $noCivique);
			   $stmt->bindParam(":rue", $rue);
			   $stmt->bindParam(":codePostal", $codePostal);
			   $stmt->bindParam(":telephone", $telephone);
				$stmt->bindParam(":telephonePortable", $telephonePortable);
			   $stmt->bindParam(":idTypeUtilisateur", $idTypeUtilisateur);
			   $stmt->bindParam(":idVille", $idVille);
			   $stmt->bindParam(":idProvince", $idProvince);
		   
		   
			   $stmt->execute();

			   return 1;
		   }	
		   catch(Exception $exc) {
			   return 0;
		   }
	   }
	   public function obtenirUtilisateurNomUtilisateur($nomUtilisateur) {
		$lang =$_COOKIE['lang'];
			try {
				if(isset($nomUtilisateur)){
					$stmt = $this->connexion->prepare("SELECT * from utilisateur WHERE nomUtilisateur=:nomUtilisateur");
					$stmt->bindParam(":nomUtilisateur", $nomUtilisateur);
					$stmt->execute();
					return $stmt->fetchAll();
				}		
			}
			catch(Exception $exc) {
				return 0;
			}
		   
	   }

	   public function modifierUtilisateur($idUtilisateur, $nomUtilisateur, $motPasse, $prenom, $nomFamille, $courriel, $dateNaissance, $noCivique,
	   $rue, $codePostal, $telephone, $telephonePortable, $idTypeUtilisateur, $idVille, $idProvince) {

		  try {
			  if($motPasse != ""){
				$stmt = $this->connexion->prepare("UPDATE utilisateur SET nomUtilisateur = :nomUtilisateur, motPasse = :motPasse, prenom = :prenom, nomFamille =:nomFamille, courriel =:courriel, dateNaissance =:dateNaissance, noCivique =:noCivique, rue =:rue, codePostal =:codePostal, telephone =:telephone, telephonePortable =:telephonePortable, idTypeUtilisateur =:idTypeUtilisateur, idVille =:idVille, idProvince =:idProvince WHERE idUtilisateur =:idUtilisateur");
			  }else{
				$stmt = $this->connexion->prepare("UPDATE utilisateur SET nomUtilisateur = :nomUtilisateur, prenom = :prenom, nomFamille =:nomFamille, courriel =:courriel, dateNaissance =:dateNaissance, noCivique =:noCivique, rue =:rue, codePostal =:codePostal, telephone =:telephone, telephonePortable =:telephonePortable, idTypeUtilisateur =:idTypeUtilisateur, idVille =:idVille, idProvince =:idProvince WHERE idUtilisateur =:idUtilisateur");
			  }
			 
			  $stmt->bindParam(":idUtilisateur", $idUtilisateur);
			  $stmt->bindParam(":nomUtilisateur", $nomUtilisateur);
			  $stmt->bindParam(":motPasse", $motPasse);
			  $stmt->bindParam(":prenom", $prenom);
			  $stmt->bindParam(":nomFamille", $nomFamille);
			  $stmt->bindParam(":courriel", $courriel);
			  $stmt->bindParam(":dateNaissance", $dateNaissance);
			  $stmt->bindParam(":noCivique", $noCivique);
			  $stmt->bindParam(":rue", $rue);
			  $stmt->bindParam(":codePostal", $codePostal);
			  $stmt->bindParam(":telephone", $telephone);
				$stmt->bindParam(":telephonePortable", $telephonePortable);
			  $stmt->bindParam(":idTypeUtilisateur", $idTypeUtilisateur);
			  $stmt->bindParam(":idVille", $idVille);
			  $stmt->bindParam(":idProvince", $idProvince);
		  
		  
			  $stmt->execute();

			  return 1;
		  }	
		  catch(Exception $exc) {
			  return 0;
		  }
	  }
	  public function supprimerUtilisateur($idUtilisateur) {

		 try {

			$stmt = $this->connexion->prepare("DELETE FROM utilisateur WHERE idUtilisateur =:idUtilisateur");

			
			 $stmt->bindParam(":idUtilisateur", $idUtilisateur);

		 		 
			 $stmt->execute();

			 return 1;
		 }	
		 catch(Exception $exc) {
			 return 0;
		 }
	 }

	}


?>