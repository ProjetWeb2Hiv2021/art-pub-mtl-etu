<?php

	/*
	https://www.php.net/manual/fr/language.oop5.autoload.php
	*/
    /* il serait bien d'avoir la meme architecture pour toute l'equipe*/
    /*/projetWeb2Equipe4Lebon/*/ 
	define("RACINE", $_SERVER["DOCUMENT_ROOT"] . "/projet_web_2/projetWeb2Equipe4Lebon/");
	define("RACINEWEB", "http://" . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . "/projet_web_2/projetWeb2Equipe4Lebon/");
    
    
    // Définition de la fonction d'autoload
    function mon_autoloader($classe) {
        // Liste des répertoires à fouiller pour trouver les classes
        $repertoires = array(RACINE . "controller/", 
						RACINE . "model/", 
						RACINE . "view/");
        
        foreach ($repertoires as $rep) {
            if (file_exists($rep . $classe . ".php")) {
                require_once($rep . $classe . ".php");
                return;
            }                
        }
    }

    // Enregistrer cette fonction comme étant notre autoloader
	spl_autoload_register("mon_autoloader");
	
	Routeur::route();
?>