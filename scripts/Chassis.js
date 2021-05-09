class Chassis {
    constructor(el) {
        this._el = el;
        this._chassis = this._el.querySelector('[data-js-chassis]');
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
            document.location.href="index.php?Chassis&action=ajoutChassis";
        });
        this._elMisAjour.addEventListener('click', (e) => {
            e.preventDefault();
            if (this._chassis.value != 0 ) document.location.href="index.php?Chassis&action=misAjourChassis&id="+this._chassis.value;     
        });

        this._elSupprimer.addEventListener('click', (e) => {
            e.preventDefault();
            if (this._chassis.value != 0 ) this.callAJAX_Supprimer(this._chassis.value);
           
           
        });
    }

    callAJAX_Supprimer = ($id) => {

        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('POST', 'index.php?Chassis_AJAX&action=supprimerChassis');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {

                        // Traitement du DOM
                        let reponse = JSON.parse(xhr.responseText);
                        if(reponse == 1){
                            this._el.innerHTML = "<p>Le chassis a été supprimé</p>"
                            setTimeout(function(){ 
                                document.location.href='index.php?Chassis&action=connexion'; 
                            }, 2000);
                        }else{
                            this._el.innerHTML = "<p>probleme ou niveau de la suppresion</p>"
                            setTimeout(function(){ 
                                document.location.href='index.php?Chassis&action=connexion'; 
                            }, 5000);
                        }


                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète

            xhr.send('idChassis=' + $id);
        }
        
    }

}