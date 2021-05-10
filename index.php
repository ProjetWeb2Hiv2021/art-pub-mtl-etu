<?php

	/*
	https://www.php.net/manual/fr/language.oop5.autoload.php
	*/
    
    define("RACINE", $_SERVER["DOCUMENT_ROOT"] . "/projet_web_2/projetWeb2Equipe4Lebon/");
<<<<<<< HEAD
	define("RACINEWEB", "http://" . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . "/projet_web_2/projetWeb2Equipe4Lebon/");      
=======
	define("RACINEWEB", "http://" . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . "/projet_web_2/projetWeb2Equipe4Lebon/");        
>>>>>>> 020abbf7d33821d8460d0271d1b468cb429c9672
     
    /* define("RACINE", $_SERVER["DOCUMENT_ROOT"] . "/");
	define("RACINEWEB", "http://" . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . "/");        */
    

	


    
    
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