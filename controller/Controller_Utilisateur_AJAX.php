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
					case "ajoutUtilisateur":
						if (isset($params["nomUtilisateur"]) && isset($params["motPasse"]) && isset($params["prenom"]) && isset($params["nomFamille"]) && isset($params["courriel"])
						&& isset($params["dateNaissance"]) && isset($params["noCivique"]) && isset($params["rue"]) && isset($params["codePostal"]) && isset($params["telephone"])
						&& isset($params["telephonePortable"]) && isset($params["idTypeUtilisateur"]) && isset($params["idVille"]) && isset($params["idProvince"])) {

							$nomUtilisateur = $params["nomUtilisateur"];
							$motPasse = $params["motPasse"];
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
							$data["utilisateur"] = $modeleUtilisateur->ajouterUtilisateur($nomUtilisateur, $motPasse, $prenom,
																		$nomFamille, $courriel, $dateNaissance, $noCivique, $rue, $codePostal, $telephone, $telephonePortable, $idTypeUtilisateur, $idVille, $idProvince);

							

							
							echo json_encode($data["utilisateur"]);
							/* $vue = "Acceuil";
							$this->afficheVue($vue, $data); */
														
						} else {													
							echo "ERROR";
						}
						
				
				}			
            } else {
				echo "ERROR ACTION";					
			}
		}
	}
?>