<?php
	class Controller_Chassis_AJAX extends BaseController {
	
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

					case "ajoutChassis":
						
						if (isset($_POST["nomChassis"])){
							$nomChassis = $_POST["nomChassis"];


							$modeleChassis = new  Model_Chassis();
							
							$data["chassis"] = $modeleChassis->ajouteChassis($nomChassis);

							echo json_encode($data["chassis"]);

						} else {													
                            echo "ERROR";
                        }
						break;
					case "miseAJourChassis":

						if (  isset($_POST["nomChassis"]) && isset($_POST["idChassis"])){ 
							

							$idChassis = $_POST["idChassis"];
							$nomChassis = $_POST["nomChassis"];

							$modeleChassis = new  Model_Chassis();
							
							$data["chassis"] = $modeleChassis-> modifierChassis($idChassis, $nomChassis);
								
							echo json_encode($data["chassis"]);

						
						} else {													
                            echo "ERROR";
                        }
						break;
					case "supprimerChassis":
		
						if (isset($_POST["idChassis"])){ 
						
						$idChassis = $_POST["idChassis"];

						$modeleChassis = new  Model_Chassis();
						
						$data["chassis"] = $modeleChassis->supprimerChassis($idChassis);
						echo json_encode($data["chassis"]);

					
						} 
						break;


				
				}			
            } else {
				echo "ERROR ACTION";					
			}
		}
	}
?>