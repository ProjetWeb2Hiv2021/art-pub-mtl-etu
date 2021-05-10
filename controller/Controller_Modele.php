<?php
	class Controller_Modele extends BaseController {
	
		//la fonction qui sera appelée par le routeur
		public function traite(array $params) {
			// Initialiser la vue et la session
            $vue = "";
            session_start();

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
                        if(isset($_SESSION["nomUtilisateur"])&&isset($_SESSION["typeUtilisateur"])&&$_SESSION["typeUtilisateur"] ==="Administrateur"||$_SESSION["typeUtilisateur"] ==="Employe"){
                            $vue="Modele";
                            $modeleModele = new Model_Modele();
							
				            $data["modele"] = $modeleModele ->obtenirModele();
							
                            $modeleMarque = new Model_Marque();
				            $data["marque"] = $modeleMarque ->obtenirListeMarque();
                            $modeleFabricant = new Model_Fabricant();
				            $data["fabricant"] = $modeleFabricant ->obtenirListeFabricant();
							
                            $this->showView($vue, $data);

                        }else{
                            $vue = "ConnexionCRM";  						
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
								var_dump($_SESSION);
								
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
					case "gererModeles":
						if(isset($_SESSION["nomUtilisateur"]) && $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]  ==="Administrateur"||$_SESSION["typeUtilisateur"]["typeUtilisateurfr"]  ==="Employe"){
							$vue="GestionModeles";
							$modeleModele = new Model_Modele();
							
							$data["modele"] = $modeleModele ->obtenirModele();
							
							$modeleMarque = new Model_Marque();
							$data["marque"] = $modeleMarque ->obtenirListeMarque();
							$modeleFabricant = new Model_Fabricant();
							$data["fabricant"] = $modeleFabricant ->obtenirListeFabricant();
							
							$this->showView($vue, $data);

						}else{
							$vue = "ConnexionCRM";  						
							$this->showView($vue);
						}
						
						break;
						case "gererMarques":
							if(isset($_SESSION["nomUtilisateur"]) && $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]  ==="Administrateur"||$_SESSION["typeUtilisateur"]["typeUtilisateurfr"]  ==="Employe"){
								$vue="GestionMarque";								
								$modeleMarque = new Model_Marque();
								$data["marque"] = $modeleMarque ->obtenirListeMarque();
								$modeleFabricant = new Model_Fabricant();
								$data["fabricant"] = $modeleFabricant ->obtenirListeFabricant();
								
								$this->showView($vue, $data);
	
							}else{
								$vue = "ConnexionCRM";  						
								$this->showView($vue);
							}
							
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