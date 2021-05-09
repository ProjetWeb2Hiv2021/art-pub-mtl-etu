<?php
	class Controller_GroupeMotopropulseur extends BaseController {
	
		//la fonction qui sera appelée par le routeur
		public function traite(array $params) {
			// Initialiser la vue et la session
            $vue = "";
            session_start();

			$this->showView("Head");
			$this->showView("Header");
			
			if (isset($params["action"])) {
				// Modèle et vue vides par défaut
				$data = array();
				
				// Switch en fonction de l'action qui nous est envoyée
				// Ce switch détermine la vue $vue et obtient le modèle $data
				switch($params["action"]) {
					 /* Mettre des case selon les paramètres  
                    ne pas oublier le "default:"*/
                    case "connexion":
                        if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Employé"){
                            $vue="GroupeMotopropulseur";
                            $groupeMotopropulseur = new Model_GroupeMotopropulseur();
							
				            $data["groupeMotopropulseur"] = $groupeMotopropulseur ->obtenirListeGpm();

							
                            $this->showView($vue, $data);

                        }else{
                            $vue = "ConnexionCRM";  						
						    $this->showView($vue);
                        }
                        
                        break;
						case "ajoutMotopropulseur":
							if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Employé"){
								$vue="FormulaireAjoutPropulseur";
/* 								$groupeMotopropulseur = new Model_GroupeMotopropulseur();
								
								$data["groupeMotopropulseur"] = $groupeMotopropulseur ->obtenirListeGpm(); */
	
								
								$this->showView($vue);
	
							}else{
								$vue = "ConnexionCRM";  						
								$this->showView($vue);
							}
							
							break;
							case "misAjourMotopropulseur":
								if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Employé"){
									$vue="FormulaireMisAjourPropulseur";
									$id = $_GET["id"];
	 								$groupeMotopropulseur = new Model_GroupeMotopropulseur();
									
									$data["groupeMotopropulseur"] = $groupeMotopropulseur ->obtenirGpm($id);
		
									//echo json_encode($data["groupeMotopropulseur"]);
									//echo $data["groupeMotopropulseur"];
									$this->showView($vue,$data);
		
								}else{
									$vue = "ConnexionCRM";  						
									$this->showView($vue);
								}
								
								break;
					default:
					// Retourner au formulaire de connexion
								$vue = "ConnexionCRM";  						
								$this->showView($vue, $data);
								break;
			
			}			
			} else {
				// Retourner au formulaire de connexion
				$vue = "ConnexionCRM";  						
				$this->showView($vue, $data);

			}
			$this->showView("Footer");
		}
	}
?>