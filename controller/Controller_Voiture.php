<?php
	class Controller_Voiture extends BaseController {
	
		//la fonction qui sera appelée par le routeur
		public function traite(array $params) {
			// Initialiser la vue et la session
            $vue = "";
            session_start();
			$data["systeme"]="SGC";
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
                    case "connexion":
                        if(isset($_SESSION["nomUtilisateur"])&&isset($_SESSION["typeUtilisateur"])&&$_SESSION["typeUtilisateur"]["typeUtilisateurfr"] ==="Administrateur"||$_SESSION["typeUtilisateur"]["typeUtilisateurfr"] ==="Employé"){
                            $vue="VoitureDetailsSGC";
							$data["systeme"]="SGC";
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
							//var_dump("systeme", $data["systeme"]);
                            $this->showView($vue, $data);

                        }else{
                            $vue = "ConnexionSWT";  						
						    $this->showView($vue);
                        }
                        
                        break;
					case "authentifier":
                        //var_dump($_REQUEST);
						// Vérifier qu'on a bien un utilisateur et un mot de passe
						if(isset($_REQUEST["nomUtilisateur"], $_REQUEST["motPasse"]))
						{
							// obtenir le modele
							$modeleUtilisateur = new Model_Utilisateur();
							// Vérifier si le mot de passe encrypte et celui fourni sont bien égaux
							$authentifie = $modeleUtilisateur->authentification($_REQUEST["nomUtilisateur"],$_REQUEST["motPasse"]);
							// Si c'est le cas 
							if($authentifie)
							{
								$modeleTypeUtilisateur = new Model_TypeUtilisateur();
								// Définir le champ utilisateur de la variable session comme l'utilisateur courant
								$_SESSION["nomUtilisateur"] = $_REQUEST["nomUtilisateur"];
								//var_dump($modeleTypeUtilisateur->obtenirTypeUtilisateur($_REQUEST["nomUtilisateur"]));
								$_SESSION["typeUtilisateur"] = $modeleTypeUtilisateur->obtenirTypeUtilisateur($_REQUEST["nomUtilisateur"])["typeUtilisateur"];
								$vue = "Utilisateur";
                                
								// Afficher la vue compléter les champs
								$this->showView($vue, $data);
								//var_dump($_SESSION);
								
							}else
							{                        
								// Sinon ajouter le message expliquant l'erreur
								$data["message"] = "Combinaison 'nom d'utilisateur' / 'mot de passe' invalide.";                        
								// Retourner au formulaire de connexion
								$vue = "ConnexionCRM";  						
								$this->showView($vue, $data);
							}

						}
                        break;
					case "insererVoiture":
						//var_dump("test");
						if (isset($params["vin"]) && 
						isset($params["prixVente"]) && 
						isset($params["annee"]) && 
						isset($params["dateArrivee"]) && 
						isset($params["prixPaye"]) && 
						isset($params["km"]) && 
						isset($params["couleurfr"]) && 
						isset($params["couleuren"]) && 						
						isset($params["idGroupeMotopropulseur"]) && 
						isset($params["idTypeCarburant"]) && 
						isset($params["idChassis"]) && 
						isset($params["idModele"]) && 
						isset($params["idTransmission"]))

						break;
					default:
					    // Retourner au formulaire de connexion
                        $vue = "ConnexionCRM";  						
  
                        $this->showView($vue, $data);
                        break;
    
			}			
			} else {
				// Retourner au formulaire de connexion
				$vue = "ConnexionCRM";  						
				$this->showView($vue, $data);

			}
			$this->showView("Footer");
		}
	}
?>