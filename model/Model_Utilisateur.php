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
		
	}
?>