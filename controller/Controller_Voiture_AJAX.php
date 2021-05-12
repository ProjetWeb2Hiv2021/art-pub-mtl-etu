<?php
	class Controller_Voiture_AJAX extends BaseController {
	
		// La fonction qui sera appelée par le routeur
		public function traite(array $params) {
			
			if (isset($params["action"])) {

				// Modèle et vue vides par défaut
				$data = array();
                $vue = "";
				$ordre = 1;
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
                            if($data["voiture"]!=0){
                                $ordre = 1;
                            }
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
                    case "ajoutImage":
                        $error = false;
                        $dossier= "./assets/images/";
                        $resultat = new stdClass;
                        $msg = "";
                        if(isset($_FILES["fichierATeleverser"])){
                            $nomFichier = basename($_FILES["fichierATeleverser"]["name"]);
                            $extensionFichier = strtolower(pathinfo($nomFichier, PATHINFO_EXTENSION));                            
                            $tailleFichier = $_FILES["fichierATeleverser"]["size"];
                            if($extensionFichier !="jpg" && $extensionFichier !="jpeg" && $extensionFichier != "png"
                            && $extensionFichier !="gif"){
                                $msg = $extensionFichier. " -> fichier de type incorrect<br>";
                                $error = true;
                            }
                            if($tailleFichier/8000000 >2){
                                $msg .= $tailleFichier/8000000 ."MB -> taille fichier en excès<br>";
                                $error = true;
                            }
                            if(file_exists($dossier."img0".$_REQUEST["id"]."_vin_".$_REQUEST["vin"]."_00".$_REQUEST["ordre"].".".$extensionFichier)){
                                $error = true;
                                $msg .= "le fichier" . $dossier."img0".$_REQUEST["id"]."_vin_".$_REQUEST["vin"]."_00".$_REQUEST["ordre"].".".$extensionFichier ." existe déjà<br>"; 
                            }
                            if($error){
                                
                                $resultat->error = $error;
                                $resultat->msg = $msg;
                                
                            }else{
                                if($_REQUEST["ordre"]<=3&&move_uploaded_file($_FILES["fichierATeleverser"]["tmp_name"], $dossier."img0".$_REQUEST["id"]."_vin_".$_REQUEST["vin"]."_00".$_REQUEST["ordre"].".".$extensionFichier)){
                                
                                    $modeleListeImage = new Model_ListeImage();
                                    $resultat->succes=$modeleListeImage->ajouteListeImage($dossier."img0".$_REQUEST["id"]."_vin_".$_REQUEST["vin"]."_00".$_REQUEST["ordre"].".".$extensionFichier, $_REQUEST["id"], $_REQUEST["ordre"]);
                                    $resultat->ordre = $_REQUEST["ordre"];
                                        
	                            }   
                                
                            }
                            echo json_encode($resultat);
                        }
                        
                        
						break;		
				}			
            } else {
				echo "ERROR ACTION";					
			}
		}
	}
?>
