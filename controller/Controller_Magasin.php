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
					 /* Mettre des case selon les paramètres  
                    ne pas oublier le "default:"*/
					
				}			
			} else {
				
				// Action par défaut
				$vueFiltreUn = "FiltrerUnCritere";
				$this->showView($vueFiltreUn);
				$vueFiltrePlusieurs = "FiltrerPlusieursCriteres";
				$modelModele = new Model_Modele();
				$data["modele"] = $modelModele ->obtenirListeModele();
				$modelFabricant = new Model_Fabricant();
				$data["fabricant"] = $modelFabricant ->obtenirListeFabricant();
				$this->showView($vueFiltrePlusieurs, $data);
				$vue = "VoitureListe";
				$modelVoiture = new Model_Voiture();
				$data["voiture"] = $modelVoiture ->getListeVoiture();				
				$this->showView($vue, $data);
			}
			$this->showView("Footer");
		}
	}
?>