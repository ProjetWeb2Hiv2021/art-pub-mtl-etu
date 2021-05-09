class TypeCarburant {
    constructor(el) {
        this._el = el;
        this._typeCarburant = this._el.querySelector('[data-js-typeCarburant]');
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
            document.location.href="index.php?TypeCarburant&action=ajoutTypeCarburant";
        });
        this._elMisAjour.addEventListener('click', (e) => {
            e.preventDefault();
            if (this._typeCarburant.value != 0 ) document.location.href="index.php?TypeCarburant&action=misAjourTypeCarburant&id="+this._typeCarburant.value;     
        });

        this._elSupprimer.addEventListener('click', (e) => {
            e.preventDefault();
            if (this._typeCarburant.value != 0 ) this.callAJAX_Supprimer(this._typeCarburant.value);
           
           
        });
    }

    callAJAX_Supprimer = ($id) => {

        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('POST', 'index.php?TypeCarburant_AJAX&action=supprimerTypeCarburant');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {

                        // Traitement du DOM
                        let reponse = JSON.parse(xhr.responseText);
                        if(reponse == 1){
                            this._el.innerHTML = "<p>Le type de carburant a été supprimé</p>"
                            setTimeout(function(){ 
                                document.location.href='index.php?TypeCarburant&action=connexion'; 
                            }, 2000);
                        }else{
                            this._el.innerHTML = "<p>probleme ou niveau de la suppresion</p>"
                            setTimeout(function(){ 
                                document.location.href='index.php?TypeCarburant&action=connexion'; 
                            }, 5000);
                        }


                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète

            xhr.send('idTypeCarburant=' + $id);
        }
        
    }

}