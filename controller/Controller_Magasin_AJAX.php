<?php
	class Controller_Magasin_AJAX extends BaseController {
	
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
                    case "afficheVoiture":	
						$modeleVoiture = new Model_Voiture();						
                        $data["voiture"] = $modeleVoiture->obtenirVoiture($params["id"]); 						
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
						//var_dump("groupeMotopropulseur", $data["groupeMotopropulseur"]);
                        
						$modeleListeImage = new Model_ListeImage();						
                        $data["listeImage"] = $modeleListeImage->obtenirListeImage($params["id"]); 						
						//var_dump("listeImage", $data["listeImage"]);
						$data["systeme"]="SWT";
						$vue = "VoitureDetails";       
                        $this->showView($vue, $data);
                        break;	
				}			
            } else {
				echo "ERROR ACTION";					
			}
		}
	}
?>