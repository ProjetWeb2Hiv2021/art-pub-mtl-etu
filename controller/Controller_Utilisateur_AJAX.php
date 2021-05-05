<?php
	class Controller_Utilisateur_AJAX extends BaseController {
	
		// La fonction qui sera appelée par le routeur
		public function traite(array $params) {
			
			if (isset($params["action"])) {

				// Modèle et vue vides par défaut
				$data = array();
                $vue = "";
				
				// Switch en fonction de l'action qui nous est envoyée
				// Ce switch détermine la vue $vue et obtient le modèle $data
				switch ($params["action"]) {
                    /* Mettre des case selon les paramètres  
                    ne pas oublier le "default:"*/

					
					case "validerUsername":
                        if (isset($params["useurname"])) {
							$useurname = $params["useurname"];
							$modeleUtilisateur = new Model_Utilisateur();
                            $data["utilisateur"] = $modeleUtilisateur->obtenirListeUtilisateur($useurname);
							$data["useurname"] = true;
							
                            foreach ($data["utilisateur"] as $utilisateur) {
								if($utilisateur["nomUtilisateur"] == $useurname){
									$data["useurname"] = false;
									break;
								}
							}
                            
                            echo json_encode($data["useurname"]);
                            /* $vue = "Acceuil";
                            $this->afficheVue($vue, $data); */
                                                      
                        } else {													
                            echo "ERROR";
                        }
                        break;
					case "validerCourriel":
						if (isset($params["courriel"])) {
							$courriel = $params["courriel"];
							$modeleUtilisateur = new Model_Utilisateur();
							$data["utilisateur"] = $modeleUtilisateur->obtenirListeUtilisateur($courriel);
							$data["courriel"] = true;
							
							foreach ($data["utilisateur"] as $utilisateur) {
								if($utilisateur["courriel"] == $courriel){
									$data["courriel"] = false;
									break;
								}
							}
							
							echo json_encode($data["courriel"]);
							/* $vue = "Acceuil";
							$this->afficheVue($vue, $data); */
														
						} else {													
							echo "ERROR";
						}
						break;
					case "ajoutUtilisateur":
										
						if (isset($params["nomUtilisateur"]) && isset($params["motPasse"]) && isset($params["prenom"]) && isset($params["nomFamille"]) && isset($params["courriel"])
						&& isset($params["dateNaissance"]) && isset($params["noCivique"]) && isset($params["rue"]) && isset($params["codePostal"]) && isset($params["telephone"])
						&& isset($params["telephonePortable"]) && isset($params["idTypeUtilisateur"]) && isset($params["idVille"]) && isset($params["idProvince"])){
							$nomUtilisateur = $params["nomUtilisateur"];
							$motPasse = password_hash($params["motPasse"], PASSWORD_DEFAULT);
							$prenom = $params["prenom"];
							$nomFamille = $params["nomFamille"];
							$courriel = $params["courriel"];
							$dateNaissance = $params["dateNaissance"];
							$noCivique = $params["noCivique"];
							$rue = $params["rue"];
							$codePostal = $params["codePostal"];
							$telephone = $params["telephone"];
							$telephonePortable = $params["telephonePortable"];
							$idTypeUtilisateur = $params["idTypeUtilisateur"];
							$idVille = $params["idVille"];
							$idProvince = $params["idProvince"];

							$modeleUtilisateur = new Model_Utilisateur();
							
							$data["utilisateur"] = $modeleUtilisateur->ajouterUtilisateurAdmin($nomUtilisateur, $motPasse, $prenom, $nomFamille, $courriel, $dateNaissance, $noCivique, $rue, $codePostal, $telephone, $telephonePortable, $idTypeUtilisateur, $idVille, $idProvince);
							
								
	
							echo json_encode($data["utilisateur"]);

						}else {													
							

							$nomUtilisateur = $params["nomUtilisateur"];
							$motPasse = password_hash($params["motPasse"], PASSWORD_DEFAULT);
							$prenom = $params["prenom"];
							$nomFamille = $params["nomFamille"];
							$courriel = $params["courriel"];
							$dateNaissance = $params["dateNaissance"];
							$noCivique = $params["noCivique"];
							$rue = $params["rue"];
							$codePostal = $params["codePostal"];
							$telephone = $params["telephone"];
							$telephonePortable = $params["telephonePortable"];
							$idTypeUtilisateur = $params["idTypeUtilisateur"];
							$idVille = $params["idVille"];
							$idProvince = $params["idProvince"];

							$modeleUtilisateur = new Model_Utilisateur();
							
								/* $data["utilisateur"] = $modeleUtilisateur->ajouterUtilisateurAdmin($nomUtilisateur, $motPasse, $prenom, $nomFamille, $courriel, $dateNaissance, $noCivique, $rue, $codePostal, $telephone, $telephonePortable, $idTypeUtilisateur, $idVille, $idProvince); */
							
								$data["utilisateur"] = $modeleUtilisateur->ajouterUtilisateur($nomUtilisateur, $motPasse, $prenom, $nomFamille, $courriel, $dateNaissance, $telephone);
	
							echo json_encode($data["utilisateur"]);
							/* $vue = "Acceuil";
							$this->afficheVue($vue, $data); */
						}
						break;
					case "miseAJourUtilisateur":

						
									
						if (isset($params["idUtilisateur"]) && isset($params["nomUtilisateur"]) && isset($params["motPasse"]) && isset($params["prenom"]) && isset($params["nomFamille"]) && isset($params["courriel"])
						&& isset($params["dateNaissance"]) && isset($params["noCivique"]) && isset($params["rue"]) && isset($params["codePostal"]) && isset($params["telephone"])
						&& isset($params["telephonePortable"]) && isset($params["idTypeUtilisateur"]) && isset($params["idVille"]) && isset($params["idProvince"])){ 
							
							if($params["motPasse"] == "*******"){
								$motPasse = "";
							}else{
								$motPasse = password_hash($params["motPasse"], PASSWORD_DEFAULT);
							}
							$motPasse = password_hash($params["motPasse"], PASSWORD_DEFAULT);
							$prenom = $params["prenom"];
							$nomFamille = $params["nomFamille"];
							$courriel = $params["courriel"];
							$dateNaissance = $params["dateNaissance"];
							$noCivique = $params["noCivique"];
							$rue = $params["rue"];
							$codePostal = $params["codePostal"];
							$telephone = $params["telephone"];
							$telephonePortable = $params["telephonePortable"];
							$idTypeUtilisateur = $params["idTypeUtilisateur"];
							$idVille = $params["idVille"];
							$idProvince = $params["idProvince"];
							$nomUtilisateur = $params["nomUtilisateur"];
							$idUtilisateur = $params["idUtilisateur"];
							echo($nomFamille);
							$modeleUtilisateur = new Model_Utilisateur();
							
							$data["utilisateur"] = $modeleUtilisateur->modifierUtilisateur($idUtilisateur, $nomUtilisateur, $motPasse, $prenom, $nomFamille, $courriel, $dateNaissance, $noCivique, $rue, $codePostal, $telephone, $telephonePortable, $idTypeUtilisateur, $idVille, $idProvince);
								
							echo json_encode($data["utilisateur"]);

						
						 } 
						break;
						case "supprimerUtilisateur":
			
						if (isset($params["idUtilisateur"])){ 
							
							$idUtilisateur = $params["idUtilisateur"];

							$modeleUtilisateur = new Model_Utilisateur();
							
							$data["utilisateur"] = $modeleUtilisateur->supprimerUtilisateur($idUtilisateur);
							echo json_encode($data["utilisateur"]);

						
							} 
						break;
				
				}			
            } else {
				echo "ERROR ACTION";					
			}
		}
	}
?>