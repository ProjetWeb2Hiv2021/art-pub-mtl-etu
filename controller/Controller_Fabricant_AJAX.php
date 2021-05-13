<?php
	class Controller_Fabricant_AJAX extends BaseController {
	
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

					case "ajoutFabricant":
						
						if (isset($_POST["nomFabricant"])){
							$nomFabricant = $_POST["nomFabricant"];


							$modeleFabricant = new  Model_Fabricant();
							
							$data["fabricant"] = $modeleFabricant->ajouteFabricant($nomFabricant);

							echo json_encode($data["fabricant"]);

						} else {													
                            echo "ERROR";
                        }
						break;
					case "miseAJourFabricant":

						if (  isset($_POST["nomFabricant"]) && isset($_POST["idFabricant"])){ 
							

							$idFabricant = $_POST["idFabricant"];
							$nomFabricant = $_POST["nomFabricant"];

							$modeleFabricant = new  Model_Fabricant();
							
							$data["fabricant"] = $modeleFabricant-> modifierFabricant($idFabricant, $nomFabricant);
								
							echo json_encode($data["fabricant"]);

						
						} else {													
                            echo "ERROR";
                        }
						break;
					case "supprimerFabricant":
		
						if (isset($_POST["idFabricant"])){ 
						
						$idFabricant = $_POST["idFabricant"];

						$modeleFabricant = new  Model_Fabricant();
						
						$data["fabricant"] = $modeleFabricant->supprimerFabricant($idFabricant);
						echo json_encode($data["fabricant"]);

					
						} 
						break;


				
				}			
            } else {
				echo "ERROR ACTION";					
			}
		}
	}
?>