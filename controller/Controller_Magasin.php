<?php
	class Controller_Magasin extends BaseController {
	
		//la fonction qui sera appelée par le routeur
		public function traite(array $params) {
			
			$this->showView("Head");
			$this->showView("Header");
			
			if (isset($params["action"])) {
				// Modèle et vue vides par défaut
				$data = array();
				
				// Switch en fonction de l'action qui nous est envoyée
				// Ce switch détermine la vue $vue et obtient le modèle $data
				switch($params["action"]) {
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
				
				// Action par défaut
				$vueFiltreUn = "FiltrerUnCritere";
				$this->showView($vueFiltreUn);
				$vueFiltrePlusieurs = "FiltrerPlusieursCriteres";
				$modelModele = new Model_Modele();
				$data["modele"] = $modelModele ->obtenirListeModele();
				$modelMarque = new Model_Marque();
				$data["marque"] = $modelMarque ->obtenirListeMarque();
				$this->showView($vueFiltrePlusieurs, $data);
				$vuevedette = "VoitureVedette";
				$modelVoitureVedette = new Model_Voiture();
				$data["voitureVedette"] = $modelVoitureVedette ->obtenirListeVoitureVedette();
				$this->showView($vuevedette, $data);
				$vue = "VoitureListe";
				$modelVoiture = new Model_Voiture();
				$data["voiture"] = $modelVoiture ->getListeVoiture();			
				$this->showView($vue, $data);
				$data["nombrevoitures"] = $modelVoiture ->obtenirNombreVoitures();
				$vuePlus = "VoirPlus";
				$this->showView($vuePlus, $data);
			}
			$this->showView("Footer");
		}
	}
?>