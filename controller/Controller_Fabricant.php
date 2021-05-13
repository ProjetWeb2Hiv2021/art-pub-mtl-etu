<?php
	class Controller_Fabricant extends BaseController {
	
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
                        if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Employé") {
                            $vue="Fabricant";
                            $fabricant = new Model_Fabricant();							
				            $data["fabricant"] = $fabricant ->obtenirListeFabricant();							
                            $this->showView($vue, $data);
                        }else{
							echo "typeUtilisateur:  ".($_SESSION["typeUtilisateur"]=="Administrateur");
                            $vue = "ConnexionCRM";  						
						    $this->showView($vue);
                        }

                        break;
						case "ajoutFabricant":
							if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Employé") {
								$vue="FormulaireAjoutFabricant";
/* 								$groupeMotopropulseur = new Model_GroupeMotopropulseur();
								
								$data["groupeMotopropulseur"] = $groupeMotopropulseur ->obtenirListeGpm(); */
	
								
								$this->showView($vue);
	
							}else{
								$vue = "ConnexionCRM";  						
								$this->showView($vue);
							}
							
							break;
							case "misAjourFabricant":
								if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Employé") {
									$vue="FormulaireMisAjourFabricant";										  
									$id = $_GET["id"];
	 								$fabricant = new Model_Fabricant();
									
									$data["fabricant"] = $fabricant ->obtenirFabricant($id);
		
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