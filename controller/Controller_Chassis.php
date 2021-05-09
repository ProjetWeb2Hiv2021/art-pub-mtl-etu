<?php
	class Controller_Chassis extends BaseController {
	
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
                            $vue="Chassis";
                            $chassis = new Model_Chassis();							
				            $data["chassis"] = $chassis ->obtenirListeChassis();							
                            $this->showView($vue, $data);
                        }else{
							echo "typeUtilisateur:  ".($_SESSION["typeUtilisateur"]=="Administrateur");
                            $vue = "ConnexionCRM";  						
						    $this->showView($vue);
                        }

                        break;
						case "ajoutChassis":
							if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Employé"){
								$vue="FormulaireAjoutChassis";
/* 								$groupeMotopropulseur = new Model_GroupeMotopropulseur();
								
								$data["groupeMotopropulseur"] = $groupeMotopropulseur ->obtenirListeGpm(); */
	
								
								$this->showView($vue);
	
							}else{
								$vue = "ConnexionCRM";  						
								$this->showView($vue);
							}
							
							break;
							case "misAjourChassis":
								if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Employé"){
									$vue="FormulaireMisAjourChassis";										  
									$id = $_GET["id"];
	 								$chassis = new Model_Chassis();
									
									$data["chassis"] = $chassis ->obtenirChassis($id);
		
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