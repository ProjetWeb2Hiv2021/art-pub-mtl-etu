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

						
					case "modelesDuMarqueSelectione":
						if (isset($params["idMarque"])) {
							
							$idMarque = $params["idMarque"];
							$modeleMarque = new Model_Marque();
							$data = $modeleMarque->obtenirModelesMarque($idMarque);
							
							
							
							echo json_encode($data);
							
														
						} else {													
							echo "ERROR";
						}
						break;
					case "chargerListeVoitureRecherche":
						if (isset($params["idMarque"]) && isset($params["idModele"]) && isset($params["anneeMin"]) && isset($params["anneeMax"]) && isset($params["prixMin"]) && isset($params["prixMax"])) {
							
							$idMarque = $params["idMarque"];
							$idModele = $params["idModele"];
							$anneeMin = $params["anneeMin"];
							$anneeMax = $params["anneeMax"];
							$prixMin = $params["prixMin"];
							$prixMax = $params["prixMax"];
							$modeleVoiture = new Model_Voiture();
							$data = $modeleVoiture->obtenirRechercheVoiture($idModele, $idMarque, $anneeMin, $anneeMax, $prixMin, $prixMax);
	
							echo json_encode($data);
							
														
						} else {													
							echo "ERROR";
						}
						break;
					case "chargerListeModeleRafraichir":
							$modeleModele = new Model_Modele();				
							$data["modele"] = $modeleModele->obtenirListeModele();	
							$modeleMarque = new Model_Marque();				
							$data["marque"] = $modeleMarque->obtenirListeMarque();	
							echo json_encode($data);

						break;

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
					case "connexionSWT":
                        
                        break;
					case "marqueDuModelSelectione":
						if (isset($params["idModele"])) {

							$idModele = $params["idModele"];
							$modeleModele = new Model_Modele();
							$data = $modeleModele->obtenirMarqueModel($idModele);


							echo json_encode($data);
							/* $vue = "Acceuil";
							$this->afficheVue($vue, $data); */

						} else {													
							echo "ERROR";
						}
						break;
					case "voirPlus":
						if (isset($params["offset"])) {

							$offset = $params["offset"];
							$modeleVoiture = new Model_Voiture();
							$data = $modeleVoiture->obtenirPlusDeVoitures($offset);



							echo json_encode($data);


						} else {													
							echo "ERROR";
						}
						break;
					/* case "modelesDuFabricantSelectione":
						if (isset($params["idFabricant"])) {

							$idFabricant = $params["idFabricant"];
							$modeleFabricant = new Model_Fabricant();
							$data = $modeleFabricant->obtenirModelesFabricant($idFabricant);



							echo json_encode($data);


						} else {													
							echo "ERROR";
						}
						break; */
					
				}			
            } else {
				echo "ERROR ACTION";					
			}
		}
	}
?>