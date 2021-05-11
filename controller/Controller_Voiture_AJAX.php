<?php
	class Controller_Voiture_AJAX extends BaseController {
	
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

					
					
					case "ajoutVoiture":
                        
						if (isset($params["vin"]) && isset($params["prixVente"]) && isset($params["annee"]) && 
                        isset($params["dateArrivee"]) && isset($params["prixPaye"])	&& 
                        isset($params["km"]) && isset($params["couleurfr"]) && isset($params["couleuren"]) &&
                        isset($params["vedette"]) && 
                        isset($params["idTypeCarburant"]) && isset($params["idModele"])	&& 
                        isset($params["idChassis"]) && isset($params["idTransmission"]) && 
                        isset($params["idGroupeMotopropulseur"]) && isset($params["idStatut"])){
							$vin = $params["vin"];
							$prixVente = $params["prixVente"];
							$annee = $params["annee"];
                            $dateArrivee = $params["dateArrivee"];
                            $prixPaye = $params["prixPaye"];
                            $km = $params["km"];
                            $couleurfr = $params["couleurfr"];
                            $couleuren = $params["couleuren"];
                            $vedette = $params["vedette"];
                            $idTypeCarburant = $params["idTypeCarburant"];
                            $idModele = $params["idModele"];
                            $idChassis = $params["idChassis"];
                            $idTransmission = $params["idTransmission"];
                            $idGroupeMotopropulseur = $params["idGroupeMotopropulseur"];
                            $idStatut = $params["idStatut"];
                            
							$modeleVoiture = new Model_Voiture();
							
							$data["voiture"] = $modeleVoiture->ajouterVoiture(
                                $vin, 
                                $prixVente, 
                                $annee, 
                                $dateArrivee, 
                                $prixPaye, 
                                $km, 
                                $couleurfr, 
                                $couleuren, 
                                $vedette, 
                                $idGroupeMotopropulseur,
                                $idTypeCarburant,
                                $idChassis, 
                                $idModele,  
                                $idTransmission,  
                                $idStatut);
                            
							echo json_encode($data["voiture"]);

						}
						break;
					case "modifierVoiture":

						
									
						if (isset($params["vin"]) && isset($params["prixVente"]) && isset($params["annee"]) && 
                        isset($params["dateArrivee"]) && isset($params["prixPaye"])	&& 
                        isset($params["km"]) && isset($params["couleurfr"]) && isset($params["couleuren"]) &&
                        isset($params["vedette"]) && 
                        isset($params["idTypeCarburant"]) && isset($params["idModele"])	&& 
                        isset($params["idChassis"]) && isset($params["idTransmission"]) && 
                        isset($params["idGroupeMotopropulseur"]) && isset($params["idStatut"])&& isset($params["id"])){ 
							
							$vin = $params["vin"];
							$prixVente = $params["prixVente"];
							$annee = $params["annee"];
                            $dateArrivee = $params["dateArrivee"];
                            $prixPaye = $params["prixPaye"];
                            $km = $params["km"];
                            $couleurfr = $params["couleurfr"];
                            $couleuren = $params["couleuren"];
                            $vedette = $params["vedette"];
                            $idTypeCarburant = $params["idTypeCarburant"];
                            $idModele = $params["idModele"];
                            $idChassis = $params["idChassis"];
                            $idTransmission = $params["idTransmission"];
                            $idGroupeMotopropulseur = $params["idGroupeMotopropulseur"];
                            $idStatut = $params["idStatut"];
                            $id = $params["id"];
							$modeleVoiture = new Model_Voiture();
							
							$data = $modeleVoiture->modifierVoiture($vin, 
                                $prixVente, 
                                $annee, 
                                $dateArrivee, 
                                $prixPaye, 
                                $km, 
                                $couleurfr, 
                                $couleuren, 
                                $vedette, 
                                $idGroupeMotopropulseur,
                                $idTypeCarburant,
                                $idChassis, 
                                $idModele,  
                                $idTransmission,  
                                $idStatut, 
                                $id);
								
							echo json_encode($data);

						
						} 
						break;
					case "supprimerVoiture":
		
						if (isset($params["idVoiture"])){ 
						
                            $idVoiture = $params["idVoiture"];

                            $modeleVoiture = new Model_Voiture();
                            
                            $data["voiture"] = $modeleVoiture->supprimerVoiture($idVoiture);
                            echo json_encode($data["voiture"]);					
						} 
						break;
                    case "voitureParId":
                        if (isset($params["idVoiture"])){ 
						
                            $idVoiture = $params["idVoiture"];

                            $modeleVoiture = new Model_Voiture();
                            
                            $data["voiture"] = $modeleVoiture->obtenirVoiture($idVoiture);
                            echo json_encode($data["voiture"]);					
						} 
                        break;		
				}			
            } else {
				echo "ERROR ACTION";					
			}
		}
	}
?>