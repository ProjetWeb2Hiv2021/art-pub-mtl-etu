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
						
				
				}			
            } else {
				echo "ERROR ACTION";					
			}
		}
	}
?>