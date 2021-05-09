class GroupeMotopropulseur {
    constructor(el) {
        this._el = el;
        /* Détail du modele */
        this._groupeMotopropulseur = this._el.querySelector('[data-js-groupeMotopropulseur]');
        this._elAjouter = this._el.querySelector('[data-js-btnAjouter]');
        this._elMisAjour = this._el.querySelector('[data-js-btnMisAJour]');
        this._elSupprimer = this._el.querySelector('[data-js-btnSupprimer]');

        this._parent = this._el.parentElement;
        this._valeur = 0;
        this.init();
    }

    init = (e) => {
        
        this._elAjouter.addEventListener('click', (e) => {
            e.preventDefault();
            document.location.href="index.php?GroupeMotopropulseur&action=ajoutMotopropulseur";
        });
        this._elMisAjour.addEventListener('click', (e) => {
            e.preventDefault();
            //this.callAJAX_MisAJour(e.target.value);
            if (this._groupeMotopropulseur.value != 0 ) document.location.href="index.php?GroupeMotopropulseur&action=misAjourMotopropulseur&id="+this._groupeMotopropulseur.value;          
        });

        this._elSupprimer.addEventListener('click', (e) => {
            e.preventDefault();
            //listeGroupeMotopropulseur = document.querySelector('[data-js-param="groupeMotopropulseur"]');
            if (this._groupeMotopropulseur.value != 0 ) this.callAJAX_Supprimer(this._groupeMotopropulseur.value);
           
           
        });
    }

    callAJAX_Supprimer = ($id) => {

        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('POST', 'index.php?GroupeMotopropulseur_AJAX&action=supprimerMotopropulseur');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {
/*                         let closestElWrapper = this._nomMotoPropulseur.closest('[data-js-input-wrapper]');
                        let elErrorMsg = closestElWrapper.querySelector('[data-js-error-msg]'); */

                        // Traitement du DOM
                        let reponse = JSON.parse(xhr.responseText);
                        if(reponse == 1){
                            this._el.innerHTML = "<p>Le groupe moto propulseur a été supprimé</p>"
                            setTimeout(function(){ 
                                document.location.href='index.php?GroupeMotopropulseur&action=connexion'; 
                            }, 2000);
                        }else{
                            this._el.innerHTML = "<p>probleme ou niveau de la suppresion</p>"
                            setTimeout(function(){ 
                                document.location.href='index.php?GroupeMotopropulseur&action=connexion'; 
                            }, 5000);
                        }


                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète

            xhr.send('idMotoPropulseur=' + $id);
        }
        
    }


}