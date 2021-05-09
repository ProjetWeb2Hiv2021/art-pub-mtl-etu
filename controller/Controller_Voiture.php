<?php
	class Controller_Voiture extends BaseController {
	
		//la fonction qui sera appelée par le routeur
		public function traite(array $params) {
			// Initialiser la vue et la session
            $vue = "";
            session_start();
			$data["systeme"]="SGC";
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
                    case "ajout":
                        if(isset($_SESSION["nomUtilisateur"])&&isset($_SESSION["typeUtilisateur"])&&$_SESSION["typeUtilisateur"]["typeUtilisateurfr"] ==="Administrateur"||$_SESSION["typeUtilisateur"]["typeUtilisateurfr"] ==="Employé"){
                            $vue="FormulaireAjoutVoiture";
							
							$modeleTypeCarburant = new Model_TypeCarburant();				
							$data["typeCarburant"] = $modeleTypeCarburant->obtenirListeTypeCarburant();		
							//var_dump("typeCarburant", $data["typeCarburant"]);
							$modeleModele = new Model_Modele();				
							$data["modele"] = $modeleModele->obtenirListeModele();
							//var_dump("modele", $data["modele"]);
							$modeleChassis = new Model_Chassis();				
							$data["chassis"] = $modeleChassis->obtenirListeChassis();	
							$modeleTransmission = new Model_Transmission();				
							$data["transmission"] = $modeleTransmission->obtenirListeTransmission();	
							//var_dump("transmission", $data["transmission"]);
							$modeleStatut = new Model_Statut();				
							$data["statut"] = $modeleStatut->obtenirListeStatut();
							//var_dump("statut", $data["statut"]);
							$modeleGpm = new Model_GroupeMotopropulseur();				
							$data["groupeMotopropulseur"] = $modeleGpm->obtenirListeGpm();	
							//var_dump("systeme", $data["systeme"]);
                            $this->showView($vue, $data);

                        }else{
                            $vue = "ConnexionSWT";  						
						    $this->showView($vue);
                        }
                        
                        break;
					case "modifier":
                        
						$vueMenuPrincipal = "MenuPrincipal";
						$this->showView($vueMenuPrincipal);
						$vueFiltreUn = "FiltrerUnCritere";
						$this->showView($vueFiltreUn);
						$vueFiltrePlusieurs = "FiltrerPlusieursCriteres";
						$modelModele = new Model_Modele();
						$data["modele"] = $modelModele ->obtenirListeModele();
						$modelMarque = new Model_Marque();
						$data["marque"] = $modelMarque ->obtenirListeMarque();
						$this->showView($vueFiltrePlusieurs, $data);						
						$vue="VoitureListeSGC";
						$modelVoiture = new Model_Voiture();
						$data["voiture"] = $modelVoiture ->getListeVoiture();		
						$this->showView($vue, $data);
						$data["nombrevoitures"] = $modelVoiture ->obtenirNombreVoitures();	
						$vuePlus = "VoirPlus";
						$this->showView($vuePlus, $data);
						
                        break;
					
					default:
					    // Retourner au formulaire de connexion
                        $vue = "ConnexionSWT";  						
  
                        $this->showView($vue, $data);
                        break;
    
			}			
			} else {
				// Retourner au formulaire de connexion
				$vue = "ConnexionSWT";  						
				$this->showView($vue, $data);

			}
			$this->showView("Footer");
		}
	}
?>