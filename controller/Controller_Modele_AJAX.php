<?php
	class Controller_Modele_AJAX extends BaseController {
	
		//la fonction qui sera appelée par le routeur
		public function traite(array $params) {
			// Initialiser la vue et la session
            $vue = "";
            session_start();

			if (isset($params["action"])) {
				// Modèle et vue vides par défaut
				$data = array();
				
				// Switch en fonction de l'action qui nous est envoyée
				// Ce switch détermine la vue $vue et obtient le modèle $data
				switch($params["action"]) {
					 /* Mettre des case selon les paramètres  
                    ne pas oublier le "default:"*/
                     case "synchroniserListesModele":	
                        if (isset($params["idModele"])) {
							$modeleModele = new Model_Modele();						
                        	$laMarque = $modeleModele->obtenirMarquePourCeModele($params["idModele"]);
							$leFabricant = $modeleModele->obtenirFabricantPourCeModele($params["idModele"]);
							$data["laMarque"] = $laMarque;
							$data["leFabricant"] = $leFabricant;
							echo json_encode($data);						

                        }
                        break;	
						case "synchroniserListesFabricant":
							$modeleModele = new Model_Modele();						
                        	$lesMarques = $modeleModele->obtenirMarquesPourCeFabricant($params["idFabricant"]);
							$lesModeles = $modeleModele->obtenirModelesPourCeFabricant($params["idFabricant"]);
							$data["marque"] = $lesMarques;							
							$data["modele"] = $lesModeles;																			
							echo json_encode($data);


							break;
						case "synchroniserListesMarque":
							$modeleModele = new Model_Modele();				
							$lesModeles = $modeleModele->obtenirModelesPourCetteMarque($params["idMarque"]);
							$data["modele"] = $lesModeles;					
							
							echo json_encode($data);
							break;
						case "miseAJourModele":
							$modeleModele = new Model_Modele();			
							$lesModeles = $modeleModele->miseAJourModele($params["idModele"],$params["idMarque"],$params["idFabricant"],$params["status"]);
							$modeleMarque = new Model_Marque();			
							$lesModeles = $modeleMarque->miseAJourMarque($params["idMarque"],$params["idFabricant"]);
							$data["marque"] = $lesModeles;					
							
							echo json_encode($data);
							break;	
			}			
			} else {
				echo "ERROR ACTION";
			}
			
		}
	}
?>