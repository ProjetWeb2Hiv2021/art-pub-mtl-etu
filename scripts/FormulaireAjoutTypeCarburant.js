class FormulaireAjoutTypeCarburant{
    constructor(el) {
        this._el = el;
        this._elSubmit = this._el.querySelector('[data-js-btn]');
        this._elSubmitMAJ = this._el.querySelector('[data-js-btnMAJ]');
        this._nomTypeCarburant = this._el.querySelector('[data-js-param="typeCarburant"]');

        this.init();
    }
    init = (e) => {

        // appel le script de validation front-end
        
        this._elSubmit.addEventListener('click', (e) => {
            e.preventDefault();
            let validation = new FormValidator(this._el);
            if (validation.isValid){
                let nomTypeCarburant = encodeURIComponent(this._nomTypeCarburant.value);
                this.callAJAXAjoutTypeCarburant(nomTypeCarburant);                 
            }            
        });
    }


    callAJAXAjoutTypeCarburant = (nomTypeCarburant) => {

        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('POST', 'index.php?TypeCarburant_AJAX&action=ajoutTypeCarburant');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {
                        let closestElWrapper = this._nomTypeCarburant.closest('[data-js-input-wrapper]');
                        let elErrorMsg = closestElWrapper.querySelector('[data-js-error-msg]');

                        // Traitement du DOM
                        let reponse = JSON.parse(xhr.responseText);
                        if(reponse == 1){
                            this._el.innerHTML = "<p>Le type de carburant a été ajouté</p>"
                            setTimeout(function(){ 
                                document.location.href='index.php?TypeCarburant&action=connexion'; 
                            }, 2000);
                        }else{
                            this._el.innerHTML = "<p>probleme ou niveau de l'ajout</p>"
                             setTimeout(function(){ 
                                document.location.href='index.php?TypeCarburant&action=connexion'; 
                            }, 2000);
                        }


                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète

            xhr.send('nomTypeCarburant=' + nomTypeCarburant);
        }
        
    }

    

}