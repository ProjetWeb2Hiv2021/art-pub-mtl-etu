<?php
	class Controller_GroupeMotopropulseur_AJAX extends BaseController {
	
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

					case "ajoutMotopropulseur":
						
						if (isset($_POST["nomMotoPropulseur"])){
							$nomgroupeMotopropulseur = $_POST["nomMotoPropulseur"];


							$modeleGmp = new  Model_GroupeMotopropulseur();
							
							$data["groupeMotopropulseur"] = $modeleGmp->ajouteGpm($nomgroupeMotopropulseur);
							
								
	
							echo json_encode($data["groupeMotopropulseur"]);

						} else {													
                            echo "ERROR";
                        }
						break;
					case "miseAJourMotopropulseur":

						
						//echo "ERROR1_".$_POST["nomMotoPropulseur"]." ".$_POST["idMotoPropulseur"];			
						if (  isset($_POST["nomMotoPropulseur"]) && isset($_POST["idMotoPropulseur"])){ 
							

							$idNomMotoPropulseur = $_POST["idMotoPropulseur"];
							$nomgroupeMotopropulseur = $_POST["nomMotoPropulseur"];

							$modeleGmp = new  Model_GroupeMotopropulseur();
							
							$data["groupeMotopropulseur"] = $modeleGmp->modifierGpm($idNomMotoPropulseur, $nomgroupeMotopropulseur);
								
							echo json_encode($data["groupeMotopropulseur"]);

						
						} else {													
                            echo "ERROR";
                        }
						break;
					case "supprimerMotopropulseur":
		
						if (isset($_POST["idMotoPropulseur"])){ 
						
						$idMotoPropulseur = $_POST["idMotoPropulseur"];

						$modeleGmp = new  Model_GroupeMotopropulseur();
						
						$data["groupeMotopropulseur"] = $modeleGmp->supprimerGpm($idMotoPropulseur);
						echo json_encode($data["groupeMotopropulseur"]);

					
						} 
						break;


				
				}			
            } else {
				echo "ERROR ACTION";					
			}
		}
	}
?>