<?php
	class Controller_TypeCarburant_AJAX extends BaseController {
	
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

					case "ajoutTypeCarburant":
						
						if (isset($_POST["nomTypeCarburant"])){
							$nomTypeCarburant = $_POST["nomTypeCarburant"];


							$modeleTypeCarburant = new  Model_TypeCarburant();
							
							$data["typeCarburant"] = $modeleTypeCarburant->ajouteTypeCarburant($nomTypeCarburant);

							echo json_encode($data["typeCarburant"]);

						} else {													
                            echo "ERROR";
                        }
						break;
					case "miseAJourTypeCarburant":

						if (  isset($_POST["nomTypeCarburant"]) && isset($_POST["idTypeCarburant"])){ 
							

							$idTypeCarburant = $_POST["idTypeCarburant"];
							$nomTypeCarburant = $_POST["nomTypeCarburant"];

							$modeleTypeCarburant = new  Model_TypeCarburant();
							
							$data["typeCarburant"] = $modeleTypeCarburant->modifierTC($idTypeCarburant, $nomTypeCarburant);
								
							echo json_encode($data["typeCarburant"]);

						
						} else {													
                            echo "ERROR";
                        }
						break;
					case "supprimerTypeCarburant":
		
						if (isset($_POST["idTypeCarburant"])){ 
						
						$idTypeCarburant = $_POST["idTypeCarburant"];

						$modeleTypeCarburant = new  Model_TypeCarburant();
						
						$data["typeCarburant"] = $modeleTypeCarburant->supprimerTypeCarburant($idTypeCarburant);
						echo json_encode($data["typeCarburant"]);

					
						} 
						break;


				
				}			
            } else {
				echo "ERROR ACTION";					
			}
		}
	}
?>