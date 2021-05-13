<?php
	class Controller_Commande_AJAX extends BaseController {
	
		// La fonction qui sera appelée par le routeur
		public function traite(array $params) {
			
			if (isset($params["action"])) {
				session_start();
				// Modèle et vue vides par défaut
				$data = array();
                $vue = "";
				
				// Switch en fonction de l'action qui nous est envoyée
				// Ce switch détermine la vue $vue et obtient le modèle $data
				switch ($params["action"]) {
                    /* Mettre des case selon les paramètres  
                    ne pas oublier le "default:"*/

					case "ajoutCommande":
						if (isset($params["idUtilisateur"]) && isset($params["idModePaiement"]) && isset($params["idExpedition"])) {
							$idUtilisateur = $params["idUtilisateur"];
							$idModePaiement = $params["idModePaiement"];
							$idExpedition = $params["idExpedition"];
							$dateCommande = date("Y-m-d");

							$modeleCommande= new Model_Commande();
                            $data["idCommande"] = $modeleCommande->ajouterCommande($idUtilisateur, $idModePaiement, $idExpedition, $dateCommande);

                            echo json_encode($data["idCommande"]);
														
						} else {													
							echo "ERROR";
						}
						break;
					case "ajoutFacture":
						if (isset($params["idCommande"])) {
							$idCommande = $params["idCommande"];
							
							$modeleFacture = new Model_Facture();
							$data["facture"] = $modeleFacture->ajouterFacture($idCommande);

							echo json_encode($data["facture"]);
														
						} else {													
							echo "ERROR";
						}
						break;
					case "ajoutLigneCommande":
						if (isset($params["idCommande"]) && isset($params["idVoiture"])) {
							$idCommande = $params["idCommande"];
							$idVoiture = $params["idVoiture"];

							$modeleLignecommande= new Model_Lignecommande();
							$data["lignecommande"] = $modeleLignecommande->ajouterLignecommande($idCommande, $idVoiture);
 
							$modelVoiture = new Model_Voiture();
							$modelVoiture->changerStatutVoiture($idVoiture);

							echo json_encode($data["lignecommande"]);
														
						} else {													
							echo "ERROR";
						}
						break;
				
				}			
            } else {
				echo "ERROR ACTION";					
			}
		}
	}
?>